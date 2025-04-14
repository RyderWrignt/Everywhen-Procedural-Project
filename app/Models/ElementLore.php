<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElementLore extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected $table = 'element_lore';


    protected $fillable = [
        'id',
        'element_id',
        'pending_element_name',
        'title',
        'content',
        'is_player_visible',
        'revealed_in_session',
        'created_by',
        'tags',
    ];
    
}
