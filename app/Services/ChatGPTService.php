<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ChatGPTService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('OPENAI_API_KEY');
    }

    public function generateSessionBriefingAndDescriptors($story, $sessionData)
    {
        // Load the context
        $context = $this->loadContext();

        // Prepare the session context
        $sessionContext = [
            'story_title' => $story->title,
            'story_setting' => $story->setting,
            'session_title' => $sessionData['session_title'],
            'session_setting' => $sessionData['session_setting'],
            'goal' => $sessionData['goal'],
            'noun' => $sessionData['noun'],
            'complications' => $sessionData['complications'],
        ];

        // Combine context and session context
        $prompt = $this->buildPrompt($context, $sessionContext);

        // Send request to OpenAI API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
        ])->post('https://api.openai.com/v1/completions', [
            'model' => 'gpt-4',
            'prompt' => $prompt,
            'max_tokens' => 500,
            'temperature' => 0.7,
        ]);

        // Handle the response
        $responseBody = $response->json();

        if (isset($responseBody['choices'][0]['text'])) {
            return [
                'briefing' => $responseBody['choices'][0]['text'],
                'descriptors' => $responseBody['choices'][0]['text'],
            ];
        }

        return [
            'briefing' => 'No valid briefing response.',
            'descriptors' => 'No valid descriptors response.',
        ];
    }

    private function loadContext()
    {
        // Load the context from the context.txt file
        return file_get_contents(storage_path('app/context.txt')); // Ensure the context.txt file exists at this location
    }

    private function buildPrompt($context, $sessionContext)
{
    // Check if sessionContext is properly encoded
    $encodedSessionContext = json_encode($sessionContext);

    // If json_encode failed, return an error message
    if ($encodedSessionContext === false) {
        return $context . "\n\n" . 'Error encoding session data: ' . json_last_error_msg();
    }

    // Return the context combined with the properly encoded session data
    return $context . "\n\n" . $encodedSessionContext;}
}
