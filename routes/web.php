<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/google', [LoginController::class, 'redirectToGoogle'])->name('login');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

// Authenticated application routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('contests', ContestController::class);

    Route::get('/questions', [QuestionController::class, 'index'])->name('questions');
    Route::get('/tags', [TagController::class, 'index'])->name('tags');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
});
