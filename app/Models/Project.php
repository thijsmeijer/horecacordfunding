<?php

namespace App\Models;

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
        'amount',
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
        return round($this->investments->sum('amount') / $this->amount * 100);
    }
}
