<?php

namespace App\Repositories;

use App\Enums\ProjectStatus;
use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function getHighestFundedProjects(): Collection
    {
        return Project::orderBy(DB::raw('(
            SELECT SUM(amount) / projects.crowdfunding_contribution * 100
            FROM investments
            WHERE project_id = projects.id)
            '), 'desc')->take(8)->get();
    }

    public function getNewestProjects(): Collection
    {
        return Project::latest()->take(4)->get();
    }

    public function getFundingProgress()
    {
        return DB::raw('(
            SELECT SUM(amount) / projects.crowdfunding_contribution * 100
            FROM investments
            WHERE project_id = projects.id)
        ');
    }

    public function create(array $data): Project
    {
        return Project::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'location' => $data['location'],
            'crowdfunding_contribution' => $data['amount'] * 0.6,
            'external_contribution' => $data['amount'] * 0.3,
            'own_contribution' => $data['amount'] * 0.1,
            'status' => ProjectStatus::Pending,
            'iban' => $data['iban'],
            'iban_name' => $data['iban_name'],
            'user_id' => auth()->user()->id,
        ]);
    }

    public function update(Project $project, array $data): Project
    {
        $project->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'location' => $data['location'],
            'crowdfunding_contribution' => $data['total_amount'] * 0.6,
            'external_contribution' => $data['total_amount'] * 0.3,
            'own_contribution' => $data['total_amount'] * 0.1,
            'iban' => $data['iban'],
            'iban_name' => $data['iban_name'],
        ]);

        return $project;
    }
}
