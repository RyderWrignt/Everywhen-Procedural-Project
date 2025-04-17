<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class ElementLore extends Model
{
    use UsesUuid;

    protected $table = 'element_lore';

    protected $fillable = [
        'element_id',
        'pending_element_name',
        'title',
        'content',
        'is_player_visible',
        'revealed_in_session',
        'created_by',
        'tags',
    ];
    protected $casts = [
        'tags' => 'array',
    ];
}
