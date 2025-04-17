<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatGPT
{
    protected $apiKey;

    public function __construct()
    {
        // Retrieve your OpenAI API key from .env
        $this->apiKey = env('OPENAI_API_KEY');
    }

    public function generateSessionBriefingAndDescriptors($story, $sessionData)
    {
        // Load the context block (rich text block to be read first by ChatGPT)
        $context = $this->loadContext();

        // Add session-specific data to the context
        $sessionContext = [
            'story_title' => $story->title,
            'story_setting' => $story->setting,
            'session_title' => $sessionData['session_title'],
            'session_setting' => $sessionData['session_setting'],
            'goal' => $sessionData['goal'],
            'noun' => $sessionData['noun'],
            'complications' => $sessionData['complications'],
        ];

        // Combine context and session data to form the full prompt
        $prompt = $this->buildPrompt($context, $sessionContext);

        // Log the request payload for debugging purposes
        Log::info('Sending request to OpenAI:', ['prompt' => $prompt]);

        // Send request to OpenAI API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
        ])->post('https://api.openai.com/v1/completions', [
            'model' => 'gpt-4',
            'prompt' => $prompt,
            'max_tokens' => 500,
            'temperature' => 0.7,
        ]);

        // Handle response
        $responseBody = $response->json();

        if ($response->failed()) {
            Log::error('OpenAI API request failed:', ['response' => $response->json()]);
            return [
                'briefing' => 'Failed to generate briefing.',
                'descriptors' => 'Failed to generate descriptors.',
            ];
        }

        if (isset($responseBody['choices'][0]['text'])) {
            return [
                'briefing' => $responseBody['choices'][0]['text'],
                'descriptors' => $responseBody['choices'][0]['text'],
            ];
        }

        Log::error('Invalid response from OpenAI:', ['response' => $responseBody]);
        return [
            'briefing' => 'No valid briefing response.',
            'descriptors' => 'No valid descriptors response.',
        ];
    }

    private function loadContext()
    {
        // Load the rich context from a text file or directly define it
        return file_get_contents(storage_path('app/context.txt')); // You could store the context in a separate text file
    }

    private function buildPrompt($context, $sessionContext)
    {
        // Combine the context and session data into the final prompt for ChatGPT
        return $context . "\n\n" . json_encode($sessionContext);
    }
}
