<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;
use App\Services\ChatGPTService;
use Illuminate\Support\Facades\Log;  // Add this line at the top of the file


class SessionHistory extends Model
{
    use UsesUuid;

    protected $table = 'session_history';

    protected $fillable = [
        'story_id',
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

/////////////////////////////////////Chat GPT Integration/////////////////////////////////////

}