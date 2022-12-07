<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
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
            'amount' => $this->amount,
            'funded' => $this->fundingProgress,
            'formatted_amount' => number_format($this->amount, 0, ',', '.'),
            'duration' => $this->duration,
            'interest_rate' => $this->interest_rate,
            'iban' => $this->iban,
            'iban_name' => $this->iban_name,
            'user' => $this->user->name,
            'status' => $this->status,
        ];
    }
}
