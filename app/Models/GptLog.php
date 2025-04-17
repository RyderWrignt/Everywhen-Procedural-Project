<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class GptLog extends Model
{
    use UsesUuid;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'session_id',
        'purpose',
        'prompt_tokens',
        'completion_tokens',
        'total_tokens',
        'input_snapshot',
        'output_snapshot',
        'model',
    ];

    protected $casts = [
        'input_snapshot' => 'array',
        'output_snapshot' => 'array',
    ];
}
