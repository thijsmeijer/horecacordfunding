<?php

namespace App\Models;

use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'location',
        'description',
        'own_contribution',
        'external_contribution',
        'crowdfunding_contribution',
        'status',
        'iban',
        'iban_name',
        'updated_at',
    ];

    protected static function booted()
    {
        static::addGlobalScope(new Scopes\StatusScope);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function investments()
    {
        return $this->hasMany(Investment::class)->orderBy('created_at', 'desc');
    }

    public function FundingProgress(): Attribute
    {
        return Attribute::make(
            get: fn () => round($this->investments()->sum('amount') / $this->crowdfunding_contribution * 100),
        );
    }

    public function maximumInvestment(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->crowdfunding_contribution - $this->investments()->sum('amount'),
        );
    }

    public function totalAmount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->own_contribution + $this->external_contribution + $this->crowdfunding_contribution,
        );
    }

    public function belongsToCurrentUser(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->user_id !== auth()->id(),
        );
    }

    public function isPending(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->status === ProjectStatus::Pending,
        );
    }
}
