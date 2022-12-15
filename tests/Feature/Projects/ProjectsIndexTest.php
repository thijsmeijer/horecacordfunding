<?php

use App\Enums\ProjectStatus;
use App\Models\Investment;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->projects = Project::factory([
        'user_id' => User::factory()->create()->id,
        'own_contribution' => 100000,
        'external_contribution' => 300000,
        'crowdfunding_contribution' => 600000,
        'status' => ProjectStatus::Active->name,
    ])->count(24)
        ->sequence(fn ($sequence) => ['created_at' => now()->subHour($sequence->index)])
        ->create();

    $projects = $this->projects->each(function ($project, $index) {
        Investment::factory([
            'user_id' => User::factory()->create()->id,
            'project_id' => $project->id,
            'amount' => 100 * ($index + 1),
        ])->count($index)->create();
    });

    $this->pendingProject = Project::factory([
        'user_id' => User::factory()->create()->id,
        'status' => ProjectStatus::Pending->name,
        'created_at' => now()->subHour($this->projects->count()),
    ])->create();
});

it('loads the projects index page', function () {
    $this->get(route('projects.index'))
        ->assertStatus(200);
});

it('loads the projects index page with pagination', function () {
    $this->get(route('projects.index'))
        ->assertStatus(200)
        ->assertSee('Volgende')
        ->assertSee('Vorige');
});

it('shows twelve projects per page', function () {
    $this->get(route('projects.index'))
        ->assertStatus(200)
        ->assertSee($this->projects[0]->title)
        ->assertSee($this->projects[11]->title)
        ->assertDontSee($this->projects[12]->title);
});

it('does not show projects that are not active', function () {
    $this->get(route('projects.index'))
        ->assertStatus(200)
        ->assertDontSee($this->pendingProject->title);
});

it('also shows my own projects no matter the status', function () {
    $this->actingAs($this->pendingProject->user)
        ->get(route('projects.index'))
        ->assertStatus(200)
        ->assertSee($this->pendingProject->title);
});

it('shows the projects that have a name like the search query', function () {
    $this->get(route('projects.index', ['search' => $this->projects[0]->name]))
        ->assertStatus(200)
        ->assertSee($this->projects[0]->name)
        ->assertDontSee($this->projects[1]->name);
});

it('sorts the projects from new to old', function () {
    $this->get(route('projects.index', ['sort' => 'newest']))
        ->assertStatus(200)
        ->assertSeeInOrder([
            $this->projects[0]->name,
            $this->projects[1]->name,
            $this->projects[2]->name,
        ]);
});

it('sorts the projects from old to new', function () {
    $this->get(route('projects.index', ['sort' => 'oldest']))
        ->assertStatus(200)
        ->assertSeeInOrder([
            $this->projects[23]->name,
            $this->projects[22]->name,
            $this->projects[21]->name,
        ]);
});

it('sorts the projects from highest funding to lowest funding', function () {
    $projects = $this->projects->reverse()->take(3)->pluck('name')->toArray();

    $this->get(route('projects.index', ['sort' => 'highest']))
        ->assertStatus(200)
        ->assertSeeInOrder($projects);
});

it('sorts the projects from lowest funding to highest funding', function () {
    $projects = $this->projects->take(3)->pluck('name')->toArray();

    $this->get(route('projects.index', ['sort' => 'lowest']))
        ->assertStatus(200)
        ->assertSeeInOrder($projects);
});