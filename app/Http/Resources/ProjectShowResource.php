<?php

namespace App\Http\Resources;

use App\Enums\InvestmentStatus;

class ProjectShowResource extends ProjectIndexResource
{
    public function toArray($request)
    {
        $investments = $this->investments()->where('status', InvestmentStatus::Accepted->value)->get()->map(function ($investment) {
            return [
                'id' => $investment->id,
                'amount' => number_format($investment->amount, 0, ',', '.'),
                'invested_at' => $investment->created_at->diffForHumans(),
            ];
        });

        return parent::toArray($request) + [
            'investments' => $investments,
            'total_invested' => number_format($this->investments->sum('amount'), 0, ',', '.'),
            'formatted_own_contribution' => number_format($this->own_contribution, 0, ',', '.'),
            'formatted_external_contribution' => number_format($this->external_contribution, 0, ',', '.'),
        ];
    }
}
