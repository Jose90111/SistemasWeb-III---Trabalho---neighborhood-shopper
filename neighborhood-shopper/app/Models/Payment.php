<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'house_id',
        'debt',
        'method'
    ];

    // Um payment faz parte de uma house
    public function house(): BelongsTo
    {
        return $this->belongsTo(House::class);
    }
}
