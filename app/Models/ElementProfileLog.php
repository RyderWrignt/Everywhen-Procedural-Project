<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ElementProfileLog extends Model
{


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid(); // <- this line must exist and must NOT be conditional
        });
    }

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';

    protected $fillable = [
        'element_id',
        'session_id',
        'summary',
        'created_by',
        'tags',
    ];
    
}
