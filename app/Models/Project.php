<?php

namespace App\Models;

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
        'interest_rate',
        'status',
        'iban',
        'iban_name',
        'duration',
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

    public function getFundingProgressAttribute()
    {
        return round($this->investments()->sum('amount') / $this->crowdfunding_contribution * 100).'%';
    }

    public function maximumInvestment(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->crowdfunding_contribution - $this->investments->sum('amount'),
        );
    }
}
