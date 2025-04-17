<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SessionHistory;

class SessionHistoryController extends Controller
{
    public function create()
    {
        $goals = [
            'Find', 'Fetch', 'Carry/Deliver', 'Protect', 'Escort',
            'Fix', 'Clean', 'Communicate', 'Learn', 'Destroy',
            'Discover', 'Evacuate', 'Escape', 'Rescue', 'Survive',
            'Endure', 'Control', 'Suppress', 'Explore', 'Gather',
            'Repel', 'Fight', 'Disable', 'Stall', 'Deceive', 'Recover',
        ];

        return view('sessions.create', compact('goals'));
    }

    public function store(Request $request)
    {
        $goal = $request->input('goal') === 'random'
            ? collect($request->input('goals'))->random()
            : $request->input('goal');

        SessionHistory::create([
            'story_id' => $request->input('story_id'),
            'session_title' => $request->input('session_title'),
            'type' => $request->input('type'),
            'session_setting' => $request->input('session_setting'),
            'goal' => $goal,
            'noun' => $request->input('noun'),
            'date' => now(),
        ]);

        return redirect('/sessions/create')->with('success', 'Session created!');
    }

    public function index()
    {
        $sessions = SessionHistory::with('story')->get();
        return view('sessions.index', compact('sessions'));
    }
}
