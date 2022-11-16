<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectIndexResource;
use App\Http\Resources\ProjectShowResource;
use App\Models\Project;
use Illuminate\Http\Request;
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
        return Inertia::render('Projects/Index', [
            'projects' => ProjectIndexResource::collection(Project::paginate(8)),
        ]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        //
    }

    public function show(Project $project): \Inertia\Response
    {
        return Inertia::render('Projects/Show', [
            'project' => new ProjectShowResource($project),
        ]);
    }

    public function edit(Project $project): \Illuminate\Http\RedirectResponse | \Inertia\Response
    {
        if ($project->user_id !== auth()->user()->id) {
            return redirect()->route('profile.projects');
        }

        return Inertia::render('Profile/Projects/Edit', [
            'project' => new ProjectIndexResource($project),
        ]);
    }

    public function update(Request $request, Project $project)
    {
        $project->update([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'total_amount' => $request->amount,
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
