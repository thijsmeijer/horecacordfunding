<?php

namespace Database\Seeders;

use App\Enums\ProjectStatus;
use App\Models\Investment;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class InvestmentSeeder extends Seeder
{
    public function run(): void
    {
        $projects = Project::where('status', '!=', ProjectStatus::Pending->value)->get();

        foreach ($projects as $project) {
            Investment::factory(1)->create([
                'project_id' => $project->id,
            ]);
        }
    }
}
