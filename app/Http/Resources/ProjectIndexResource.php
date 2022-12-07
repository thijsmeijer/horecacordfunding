<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $parse = new \Parsedown();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $parse->text($this->description),
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
