<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectIndexResource;
use App\Models\Project;
use Illuminate\Http\Request;
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
        return Inertia::render('Home', [
            'projects' => ProjectIndexResource::collection(Project::latest()->take(12)->get()),
        ]);
    }
}
