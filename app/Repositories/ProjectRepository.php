<?php

namespace App\Repositories;

use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function getHighestFundedProjects()
    {
        return Project::orderBy(DB::raw('(SELECT SUM(amount) / projects.crowdfunding_contribution * 100 FROM investments WHERE project_id = projects.id)'), 'desc')->take(8)->get();
    }

    public function getNewestProjects()
    {
        return Project::latest()->take(4)->get();
    }
}
