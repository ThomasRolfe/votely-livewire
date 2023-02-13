<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/google', [LoginController::class, 'redirectToGoogle'])->name('login');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('/file/{file:uuid}/download', [FileController::class, 'download']);

if (App::environment('local')) {
    Route::get('/local-auth', [LoginController::class, 'localAuth']);
}

// Authenticated application routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Contests
    Route::get('/contests', \App\Http\Livewire\App\Contests\Index::class)->name('contests.index');
    Route::get('/contests/create', \App\Http\Livewire\App\Contests\Create::class)->name('contests.create');
    Route::get('/contests/{contest}', \App\Http\Livewire\App\Contests\Show::class)->name('contests.show');
    Route::get('/contests/{contest}/edit', \App\Http\Livewire\App\Contests\Show::class)->name('contests.edit');

    // Submission schema
    Route::prefix('contests/{contest}/submission-schemas')->group(function () {
        Route::get('/', \App\Http\Livewire\App\SubmissionSchemas\Index::class)->name('contests.submission-schema.index');
    });

    // Questions
    Route::prefix('contests/{contest}/questions')->group(function () {
        Route::get('/edit', [QuestionController::class, 'edit'])->name('contests.questions.edit');
    });

    // Tags
    Route::get('/tags', [TagController::class, 'index'])->name('tags');

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
});
