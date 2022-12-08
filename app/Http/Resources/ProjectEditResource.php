<?php

namespace App\Http\Resources;

class ProjectEditResource extends ProjectIndexResource
{
    public function toArray($request): array
    {
        return parent::toArray($request) + [
            'description' => $this->description,
        ];
    }
}
