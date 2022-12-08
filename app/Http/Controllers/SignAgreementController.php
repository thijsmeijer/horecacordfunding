<?php

namespace App\Http\Controllers;

use App\Enums\InvestmentStatus;
use App\Repositories\InvestmentRepository;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class SignAgreementController extends Controller
{
    public function __construct(
        private readonly InvestmentRepository $investmentRepository,
    ) {
    }

    public function show(): Response
    {
        $pendingInvestment = $this->investmentRepository->getPendingInvestment(auth()->user());

        abort_if(!$pendingInvestment, 404);

        return Inertia::render('Profile/Investments/Agreement');
    }

    public function store(): RedirectResponse
    {
        $pendingInvestment = $this->investmentRepository->getPendingInvestment(auth()->user());

        abort_if(!$pendingInvestment, 404);

        $this->investmentRepository->setInvestmentStatus($pendingInvestment, InvestmentStatus::Accepted->value);

        return to_route('projects.show', $pendingInvestment->project->id)->with('success', 'Investering succesvol uitgevoerd.');
    }
}
