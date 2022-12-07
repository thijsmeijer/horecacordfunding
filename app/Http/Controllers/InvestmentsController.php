<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvestmentRequest;
use App\Http\Resources\ProjectShowResource;
use App\Http\Resources\UserInvestmentsResource;
use App\Models\Project;
use App\Repositories\InvestmentRepository;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class InvestmentsController extends Controller
{
    public function __construct(
        private readonly InvestmentRepository $investmentRepository,
    ) {
    }

    public function index(): Response
    {
        return Inertia::render('Profile/Investments/Index', [
            'user' => new UserInvestmentsResource(auth()->user()),
        ]);
    }

    public function create(Project $project): Response
    {
        return Inertia::render('Profile/Investments/Create', [
            'project' => new ProjectShowResource($project),
            'user' => auth()->user(),
        ]);
    }

    public function store(Project $project, StoreInvestmentRequest $request): RedirectResponse
    {
        $this->investmentRepository->create($request->validated(), $project->id, auth()->user());

        return to_route('projects.show', $project->id)
            ->with('success', 'Investering succesvol uitgevoerd!');
    }
}
