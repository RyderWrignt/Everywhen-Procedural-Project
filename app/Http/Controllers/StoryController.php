<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;

class StoryController extends Controller
{
    public function create()
    {
        return view('stories.create');
    }

    public function store(Request $request)
    {
        Story::create($request->only(['title', 'setting']));
        return redirect('/stories/create')->with('success', 'Story created!');
    }
    public function index()
{
    $stories = \App\Models\Story::all();
    return view('stories.index', compact('stories'));
}

}
