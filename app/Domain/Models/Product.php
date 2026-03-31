<?php

namespace App\Domain\Models;

use App\Domain\Enums\ProductStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Domain\Models\ProductVariant;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'category_id',
    ];

    protected $casts = [
        'status' => ProductStatus::class,
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', ProductStatus::ACTIVE);
    }
}
