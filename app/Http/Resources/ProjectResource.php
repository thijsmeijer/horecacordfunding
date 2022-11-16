<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'location' => $this->location,
            'amount' => $this->total_amount,
            'duration' => $this->duration,
            'interest_rate' => $this->interest_rate,
            'iban' => $this->iban,
            'iban_name' => $this->iban_name,
            'user' => $this->user->name,
            'status' => $this->status,
        ];
    }
}
