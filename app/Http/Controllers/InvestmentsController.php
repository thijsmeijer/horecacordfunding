<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectShowResource;
use App\Http\Resources\UserInvestmentsResource;
use App\Models\Project;
use Inertia\Inertia;

class InvestmentsController extends Controller
{
    public function index()
    {
        return Inertia::render('Profile/Investments/Index', [
            'user' => new UserInvestmentsResource(request()->user()),
        ]);
    }

    public function create(Project $project)
    {
        return Inertia::render('Profile/Investments/Create', [
            'project' => new ProjectShowResource($project),
        ]);
    }
}
