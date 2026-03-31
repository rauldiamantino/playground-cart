<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Domain\Models\AttributeDefinition;

class AttributeOption extends Model
{
    protected $fillable = [
        'attribute_definition_id',
        'value',
        'visual_code',
    ];

    public function definition(): BelongsTo
    {
        return $this->belongsTo(AttributeDefinition::class, 'attribute_definition_id');
    }
}
