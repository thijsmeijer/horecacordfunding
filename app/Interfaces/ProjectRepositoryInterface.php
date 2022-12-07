<?php

namespace App\Interfaces;

interface ProjectRepositoryInterface
{
    public function getHighestFundedProjects();

    public function getNewestProjects();
}
