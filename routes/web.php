<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Posts;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/post', Posts::class)->name('post');
    
});

