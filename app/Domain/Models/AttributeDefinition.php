<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Domain\Models\AttributeOption;

class AttributeDefinition extends Model
{
    protected $fillable = [
        'name',
        'type',
    ];

    public function options(): HasMany
    {
        return $this->hasMany(AttributeOption::class);
    }
}
