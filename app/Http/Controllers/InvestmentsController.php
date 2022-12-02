<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvestmentRequest;
use App\Http\Resources\ProjectShowResource;
use App\Http\Resources\UserInvestmentsResource;
use App\Models\Investment;
use App\Models\Project;
use App\Models\User;
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
            'user' => request()->user(),
        ]);
    }

    public function store(Project $project, StoreInvestmentRequest $request)
    {
        $data = $request->validated();

        $request->user()->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        Investment::create([
            'user_id' => request()->user()->id,
            'project_id' => $project->id,
            'amount' => $data['amount'],
            'iban' => $data['iban'],
            'iban_name' => $data['iban_name'],
        ]);

        return redirect()->route('projects.show', $project->id)->with('success', 'Investering succesvol uitgevoerd!');
    }
}
