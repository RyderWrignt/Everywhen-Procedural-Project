<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Element extends Model
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
        'story_id',
        'element_code',
        'name',
        'type',
        'status',
        'hook',
        'known_aliases',
        'priority_score',
        'introduced_in_session',
        'created_by',
    ];
}
