<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait BelongsToTenant
{
    protected static function bootBelongsToTenant()
    {
        static::creating(function (Model $model) {
            $model->setConnection('tenant');
        });
    }
}
