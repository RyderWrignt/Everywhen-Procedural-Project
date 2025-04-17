<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Element extends Model
{
    use UsesUuid;

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
