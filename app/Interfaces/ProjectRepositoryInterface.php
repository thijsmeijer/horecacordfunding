<?php

namespace App\Interfaces;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

interface ProjectRepositoryInterface
{
    public function getHighestFundedProjects(): Collection;

    public function getNewestProjects(): Collection;

    public function getFundingProgress();

    public function create(array $data): Project;

    public function update(Project $project, array $data): Project;
}
