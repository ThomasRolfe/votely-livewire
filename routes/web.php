<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubmissionSchemaController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/google', [LoginController::class, 'redirectToGoogle'])->name('login');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('/file/{file:uuid}/download', [FileController::class, 'download']);

// Authenticated application routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Contests
    Route::resource('contests', ContestController::class);

    // Submission schema
    Route::prefix('contests/{contest}/submission-schema')->group(function() {
        Route::get('/edit', [SubmissionSchemaController::class, 'edit'])->name('contests.submission-schema.edit');
    });

    // Questions
    Route::prefix('contests/{contest}/questions')->group(function() {
        Route::get('/edit', [QuestionController::class, 'edit'])->name('contests.questions.edit');
    });

    // Tags
    Route::get('/tags', [TagController::class, 'index'])->name('tags');

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
});
