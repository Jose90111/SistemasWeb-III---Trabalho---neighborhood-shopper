<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class House extends Model
{
    use HasFactory;

    protected $fillable = [
        'street',
        'number',
        'city',
        'state',
        'resident_id'
    ];

    // Uma house tem 1 resident (a foreing key resident_id)
    public function resident(): BelongsTo
    {
        return $this->belongsTo(Resident::class);
    }

    // Uma house pode ter varios payments
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    // Uma house pode ter varios orders
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
