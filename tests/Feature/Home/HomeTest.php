<?php

use App\Enums\ProjectStatus;
use App\Models\Investment;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->latestProjects = Project::factory([
        'user_id' => User::factory()->create()->id,
        'status' => ProjectStatus::Active->name,
    ])->count(10)->create();

    $this->pendingProject = Project::factory([
        'user_id' => User::factory()->create()->id,
        'status' => ProjectStatus::Pending->name,
    ])->create();

    $this->highFundedProjects = Project::factory([
        'user_id' => User::factory()->create()->id,
        'status' => ProjectStatus::Active->name,
        'created_at' => now()->subDays(2),
        'updated_at' => now()->subDays(2),
    ])->count(8)->create();

    $this->highFundedProjects->each(function ($project) {
        Investment::factory([
            'user_id' => User::factory()->create()->id,
            'project_id' => $project->id,
            'amount' => 1000,
        ])->count(10)->create();
    });
});

it('loads the home page', function () {
    $this->get(route('home'))
        ->assertStatus(200);
});

it('shows the four most recent projects', function () {
    $response = $this->get(route('home'));

    $this->latestProjects->take(4)->each(function ($project) use ($response) {
        $response->assertSee($project->name);
    });
});

it('shows the eight highest funded projects', function () {
    $response = $this->get(route('home'));

    $this->highFundedProjects->each(function ($project) use ($response) {
        $response->assertSee($project->name);
    });
});

it('does not show projects that are not active', function () {
    $this->get(route('home'))
        ->assertDontSee($this->pendingProject->name);
});
