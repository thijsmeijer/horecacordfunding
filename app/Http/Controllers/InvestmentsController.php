<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserInvestmentsResource;
use Inertia\Inertia;

class InvestmentsController extends Controller
{
    public function index()
    {
        return Inertia::render('Profile/Investments/Index', [
            'user' => new UserInvestmentsResource(request()->user()),
        ]);
    }
}
