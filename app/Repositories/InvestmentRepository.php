<?php

namespace App\Repositories;

use App\Enums\InvestmentStatus;
use App\Interfaces\InvestmentRepositoryInterface;
use App\Models\Investment;
use App\Models\User;

class InvestmentRepository implements InvestmentRepositoryInterface
{
    public function create(array $data, int $projectId, User $user): Investment
    {
        return Investment::create([
            'project_id' => $projectId,
            'user_id' => $user->id,
            'amount' => $data['amount'],
            'iban' => $data['iban'],
            'iban_name' => $data['iban_name'],
        ]);
    }

    public function getPendingInvestment(User $user): ?Investment
    {
        return Investment::where('user_id', $user->id)
            ->where('status', InvestmentStatus::pending->value)
            ->first();
    }

    public function setInvestmentStatus(Investment $investment, string $status): void
    {
        $investment->update([
            'status' => $status,
        ]);
    }
}
