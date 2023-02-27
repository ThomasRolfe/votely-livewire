<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/auth/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('/file/{file:uuid}/download', [FileController::class, 'download']);

Route::get('/enter/{contest:public_key}', \App\Http\Livewire\App\Contests\Show::class)->name('enter.show');
Route::post('/enter/{contest:public_key}', \App\Http\Livewire\App\Contests\Show::class)->name('enter.store');

// Authenticated application routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Contests
    Route::prefix('/contests')->group(function () {
        Route::get('/', \App\Http\Livewire\App\Contests\Index::class)->name('contests.index');
        Route::get('/create', \App\Http\Livewire\App\Contests\Create::class)->name('contests.create');
        Route::get('/{contest}', \App\Http\Livewire\App\Contests\Show::class)->name('contests.show');
        Route::get('/{contest}/edit', \App\Http\Livewire\App\Contests\Show::class)->name('contests.edit');
    });

    Route::prefix('/contests/{contest}')->group(function () {
        // Submission schema
        Route::prefix('/submission-schemas')->group(function () {
            Route::get('/', \App\Http\Livewire\App\SubmissionSchemas\Index::class)->name('contests.submission-schema.index');
        });

        // Questions
        Route::prefix('/questions')->group(function () {
            Route::get('/', \App\Http\Livewire\App\Questions\Index::class)->name('contests.questions.index');
        });
    });

    // Tags
    Route::prefix('/tags')->group(function () {
        Route::get('/', \App\Http\Livewire\App\Tags\Index::class)->name('tags.index');
        Route::get('/create', \App\Http\Livewire\App\Tags\Create::class)->name('tags.create');
        Route::get('/{tag}/edit', \App\Http\Livewire\App\Tags\Edit::class)->name('tags.edit');
        //Route::get('/tags/{contest}', \App\Http\Livewire\App\Tags\Show::class)->name('tags.show');
        //Route::get('/tags/{contest}/edit', \App\Http\Livewire\App\Tags\Show::class)->name('tags.edit');
    });

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
});

if (App::environment('local')) {
    Route::get('/local-auth', [LoginController::class, 'localAuth']);
}
