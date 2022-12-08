<?php

namespace App\Http\Resources;

class ProjectEditResource extends ProjectIndexResource
{
    public function toArray($request): array
    {
        return [
            'description' => $this->description,
        ];
    }
}
