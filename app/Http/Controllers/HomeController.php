<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectIndexResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function __invoke(Request $request)
    {
        $newestProjects = Project::latest()->take(4)->get();
        $highestProjects = Project::orderBy(DB::raw('(SELECT SUM(amount) /projects.amount * 100 FROM investments WHERE project_id = projects.id)'), 'desc')->take(8)->get();

        return Inertia::render('Home', [
            'highestProjects' => ProjectIndexResource::collection($highestProjects),
            'newestProjects' => ProjectIndexResource::collection($newestProjects),
        ]);
    }
}
