<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Posts;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/post', Posts::class)->name('post');
    
});

