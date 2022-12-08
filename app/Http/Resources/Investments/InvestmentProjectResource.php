<?php

namespace App\Http\Resources\Investments;

use Illuminate\Http\Resources\Json\JsonResource;

class InvestmentProjectResource extends JsonResource
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
            'name' => $this->name,
            'status' => $this->status,
        ];
    }
}