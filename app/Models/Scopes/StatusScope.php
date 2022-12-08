<?php

namespace App\Models\Scopes;

use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class StatusScope implements Scope
{
    /**
     * {@inheritDoc}
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('status', ProjectStatus::Active->value)->orWhere('user_id', auth()->id());
    }
}
