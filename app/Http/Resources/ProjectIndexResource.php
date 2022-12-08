<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectIndexResource extends JsonResource
{
    public function toArray($request): array
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'location' => $this->location,
            'crowdfunding_contribution' => $this->crowdfunding_contribution,
            'own_contribution' => $this->own_contribution,
            'external_contribution' => $this->external_contribution,
            'total_amount' => $this->total_amount,
            'funding_progress' => $this->fundingProgress,
            'formatted_crowdfunding_contribution' => number_format($this->crowdfunding_contribution, 0, ',', '.'),
            'duration' => $this->duration,
            'interest_rate' => $this->interest_rate,
            'iban' => $this->iban,
            'iban_name' => $this->iban_name,
            'user' => $this->user->name,
            'status' => $this->status,
        ];
    }
}
