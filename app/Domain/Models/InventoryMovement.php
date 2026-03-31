<?php

namespace App\Domain\Models;

use App\Domain\Enums\InventoryAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Domain\Models\User;

class InventoryMovement extends Model
{
    protected $fillable = [
        'product_variant_id',
        'action',
        'quantity',
        'balance_after',
        'description',
        'user_id'
    ];

    protected $casts = [
        'action' => InventoryAction::class,
    ];

    public function variant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
