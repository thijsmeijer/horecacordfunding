<?php

namespace App\Http\Resources\Investments;

use App\Enums\ProjectStatus;
use Illuminate\Http\Resources\Json\JsonResource;

class InvestmentProjectResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status->value,
        ];
    }
}
