<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SessionHistory extends Model
{

    protected static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        $model->id = (string) Str::uuid();
    });
}



    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';

    protected $table = 'session_history'; // 👈 This line fixes the issue

    protected $fillable = [
        'story_id',
        'session_code',
        'session_title',
        'date',
        'type',
        'session_setting',
        'goal',
        'noun',
        'complications',
        'descriptors',
        'consequences',
        'briefing',
        'summary',
        'gpt_summary',
        'transcript',
        'gpt_transcript',
        'gpt_transcript_tagged',
        'notable_npcs',
        'plot_hooks',
        'google_doc_link',
        'multitrack_recording',
    ];
}
