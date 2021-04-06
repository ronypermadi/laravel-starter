<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Posts;
use App\Http\Livewire\Users;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/menus', function (App\Models\Menu $menu) {
    return json_encode($menu->all());
});

Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::view('/dashboard', "dashboard")->name('dashboard');

    Route::get('/user', [ UserController::class, "index_view" ])->name('user');
    Route::view('/user/new', "pages.users.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.users.user-edit")->name('user.edit');

    Route::get('/menu', [ MenuController::class, "index" ])->name('menu');
    
});

