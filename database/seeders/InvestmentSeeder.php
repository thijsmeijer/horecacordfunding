<?php

namespace Database\Seeders;

use App\Enums\ProjectStatus;
use App\Models\Investment;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class InvestmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $projects = Project::where('status', '!=', ProjectStatus::Pending->value)->get();

        foreach ($users as $user) {
            foreach ($projects as $project) {
                Investment::factory(1)->create([
                    'user_id' => $user->id,
                    'project_id' => $project->id,
                ]);
            }
        }
    }
}
