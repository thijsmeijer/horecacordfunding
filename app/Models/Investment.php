<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'project_id',
        'amount',
        'iban',
        'iban_name',
        'status',
    ];

    public function returns(): HasMany
    {
        return $this->hasMany(InvestmentReturn::class);
    }

    public function project(): belongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
