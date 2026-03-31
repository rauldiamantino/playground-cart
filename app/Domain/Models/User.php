<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
    ];

    public function movements(): HasMany
    {
        return $this->hasMany(InventoryMovement::class);
    }
}
