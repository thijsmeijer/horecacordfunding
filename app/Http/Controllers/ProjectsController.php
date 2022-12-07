<?php

namespace App\Http\Controllers;

use App\Enums\ProjectStatus;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\EditProjectRequest;
use App\Http\Resources\ProjectIndexResource;
use App\Http\Resources\ProjectShowResource;
use App\Models\Investment;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(): \Inertia\Response
    {
        $projects = Project::where('name', 'like', '%' . request()->search . '%')
            ->when(request()->sort, function ($query) {
                $fundingProgress = DB::raw('(SELECT SUM(amount) /projects.amount * 100 FROM investments WHERE project_id = projects.id)');

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

    public function store(StoreProjectRequest $request)
    {
        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'amount' => $request->amount,
            'duration' => $request->duration,
            'interest_rate' => $request->interest_rate,
            'iban' => $request->iban,
            'iban_name' => $request->iban_name,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('profile.projects');
    }

    public function show(Project $project): \Inertia\Response
    {
        if ($project->status === ProjectStatus::Pending->value && $project->user_id !== auth()->id()) {
            abort(404);
        }

        return Inertia::render('Projects/Show', [
            'project' => new ProjectShowResource($project),
        ]);
    }

    public function edit(Project $project): \Illuminate\Http\RedirectResponse|\Inertia\Response
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
        $project->update([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'amount' => $request->amount,
            'duration' => $request->duration,
            'interest_rate' => $request->interest_rate,
            'iban' => $request->iban,
            'iban_name' => $request->iban_name,
        ]);

        return redirect()->route('profile.projects.edit', $project);
    }

    public function destroy($id)
    {
        //
    }
}
