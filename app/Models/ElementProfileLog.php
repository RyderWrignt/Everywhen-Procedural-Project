<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class ElementProfileLog extends Model
{
    use UsesUuid;

    protected $fillable = [
        'element_id',
        'session_id',
        'summary',
        'created_by',
        'tags',
    ];

    protected $casts = [
        'tags' => 'array',
    ];
}
