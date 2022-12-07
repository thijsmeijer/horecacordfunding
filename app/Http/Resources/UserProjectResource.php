<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserProjectResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'projects' => ProjectShowResource::collection($this->projects->sortByDesc('created_at')),
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
