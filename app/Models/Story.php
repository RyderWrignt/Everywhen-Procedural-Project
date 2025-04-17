<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Story extends Model
{
    use UsesUuid;

    protected $fillable = [
        'title',
        'setting',
    ];
}

