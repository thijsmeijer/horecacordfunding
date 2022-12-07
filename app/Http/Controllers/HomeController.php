<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectIndexResource;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function __construct(
        private readonly ProjectRepository $projectRepository
    ) {
    }

    public function __invoke(Request $request)
    {
        $newestProjects = $this->projectRepository->getNewestProjects();
        $highestFundedProjects = $this->projectRepository->getHighestFundedProjects();

        return Inertia::render('Home', [
            'highestFundedProjects' => ProjectIndexResource::collection($highestFundedProjects),
            'newestProjects' => ProjectIndexResource::collection($newestProjects),
        ]);
    }
}
