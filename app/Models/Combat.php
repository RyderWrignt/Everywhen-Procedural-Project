<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Combat extends Model
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
        'session_id',
        'rabble_count',
        'toughs_count',
        'villain_name',
        'flavor_notes',
    ];
    
}
