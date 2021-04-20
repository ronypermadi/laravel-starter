<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\MessageController;


Route::get('/', function () {
    return view('welcome');
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

    Route::get('/role', [ RoleController::class, "index_view" ])->name('role');
    Route::view('/role/new', "pages.roles.role-new")->name('role.new');
    Route::view('/role/edit/{roleId}', "pages.roles.role-edit")->name('role.edit');

    Route::get('/permission', [ PermissionController::class, "index_view" ])->name('permission');
    Route::view('/permission/new', "pages.permissions.permission-new")->name('permission.new');
    Route::view('/permission/edit/{permissionId}', "pages.permissions.permission-edit")->name('permission.edit');

    Route::get('/menu', [ MenuController::class, "index_view" ])->name('menu');
    Route::view('/menu/new', "pages.menus.menu-new")->name('menu.new');
    Route::view('/menu/edit/{menuId}', "pages.menus.menu-edit")->name('menu.edit');

    Route::get('/message', [ MessageController::class, "index_view" ])->name('message');
    Route::get('/autocomplete_searchUser', [ MessageController::class, "autocomplete_searchUser" ])->name('autocomplete_searchUser');
    Route::get('/listUser', [ MessageController::class, "listUser" ])->name('listUser');
    
});

