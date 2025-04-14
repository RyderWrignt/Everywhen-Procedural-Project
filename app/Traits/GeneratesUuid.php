<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait GeneratesUuid
{
    protected static function boot()
    {
        parent::boot(); // call parent's boot method if it exists

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
}

