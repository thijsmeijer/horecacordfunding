<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectShowResource extends ProjectIndexResource
{
    public function toArray($request)
    {
        $investments = $this->investments->map(function ($investment) {
            return [
                'id' => $investment->id,
                'amount' => number_format($investment->amount, 0, ',', '.'),
                'invested_at' => $investment->created_at->diffForHumans(),
            ];
        });

        return parent::toArray($request) + [
                'investments' => $investments,
                'total_invested' => number_format($this->investments->sum('amount'), 0, ',', '.'),
                'total_invested_percent' => round($this->investments->sum('amount') / $this->amount * 100) . '%',
            ];
    }
}
