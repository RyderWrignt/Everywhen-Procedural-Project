<?php

use App\Http\Controllers\StoryController;
use App\Http\Controllers\SessionHistoryController;

Route::get('/stories', [StoryController::class, 'index']);  // List all stories
Route::get('/stories/create', [StoryController::class, 'create']);  // Create story form
Route::post('/stories', [StoryController::class, 'store']);  // Store new story

Route::get('/sessions', [SessionHistoryController::class, 'index']);  // List all sessions
Route::get('/sessions/create', [SessionHistoryController::class, 'create']);  // Create session form
Route::post('/sessions', [SessionHistoryController::class, 'store']);  // Store new session


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return 'Hello, world!';
});
