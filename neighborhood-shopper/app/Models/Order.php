<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'house_id',
        'qtd',
        'isPaymentOk',
        'isDelivered'
    ];

    protected function casts(): array
    {
        return [
            'isPaymentOk' => 'boolean',
            'isDelivered' => 'boolean',
        ];
    }
    


    // Um order faz parte de uma house
    public function house(): BelongsTo
    {
        return $this->belongsTo(House::class);
    }

    // Um order pode ter uns par de  products
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_order')
                    ->withPivot('qtd');
    }
}
