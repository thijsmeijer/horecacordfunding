<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
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
            'projects' => ProjectResource::collection(Project::paginate(8)),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit(Project $project): \Illuminate\Http\RedirectResponse | \Inertia\Response
    {
        if ($project->user_id !== auth()->user()->id) {
            return redirect()->route('profile.projects');
        }

        return Inertia::render('Profile/Projects/Edit', [
            'project' => new ProjectResource($project),
        ]);
    }

    public function update(Request $request, Project $project)
    {
        $parse = new \Parsedown();
        $project->update([
            'name' => $request->name,
            'description' => $parse->text($request->description),
            'location' => $request->location,
            'total_amount' => $request->amount,
            'duration' => $request->duration,
            'interest_rate' => $request->interest_rate,
            'iban' => $request->iban,
            'iban_name' => $request->iban_name,
        ]);

        return redirect()->route('profile.projects.edit', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
