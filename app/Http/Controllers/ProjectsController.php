<?php

namespace App\Http\Controllers;

use App\Enums\ProjectStatus;
use App\Http\Requests\EditProjectRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Resources\ProjectIndexResource;
use App\Http\Resources\ProjectShowResource;
use App\Models\Project;
use App\Repositories\ProjectRepository;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ProjectsController extends Controller
{
    public function __construct(
        private readonly ProjectRepository $projectRepository,
    ) {
    }

    public function index(): Response
    {
        $projects = Project::where('name', 'like', '%'.request()->search.'%')
            ->when(request()->sort, function ($query) {
                $fundingProgress = $this->projectRepository->getFundingProgress();

                if (request()->sort === 'newest') {
                    $query->orderBy('created_at', 'desc');
                } elseif (request()->sort === 'oldest') {
                    $query->orderBy('created_at', 'asc');
                } elseif (request()->sort === 'highest') {
                    $query->orderBy($fundingProgress, 'desc');
                } elseif (request()->sort === 'lowest') {
                    $query->orderBy($fundingProgress, 'asc');
                }
            })->paginate(8)->withQueryString();

        return Inertia::render('Projects/Index', [
            'projects' => ProjectIndexResource::collection($projects),
            'sorting' => request()->sort,
            'search' => request()->search,
        ]);
    }

    public function create()
    {
        return Inertia::render('Profile/Projects/New',
            [
                'user' => auth()->user(),
            ]);
    }

    public function store(StoreProjectRequest $request): RedirectResponse
    {
        $this->projectRepository->create($request->validated());

        return redirect()->route('profile.projects');
    }

    public function show(Project $project): Response
    {
        if ($project->status === ProjectStatus::Pending->value && $project->user_id !== auth()->id()) {
            abort(404);
        }

        return Inertia::render('Projects/Show', [
            'project' => new ProjectShowResource($project),
        ]);
    }

    public function edit(Project $project): RedirectResponse|Response
    {
        if ($project->user_id !== auth()->user()->id) {
            return redirect()->route('profile.projects');
        }

        return Inertia::render('Profile/Projects/Edit', [
            'project' => new ProjectIndexResource($project),
        ]);
    }

    public function update(EditProjectRequest $request, Project $project)
    {
        $this->projectRepository->update($project, $request->validated());

        return redirect()->route('profile.projects.edit', $project);
    }
}
