<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Home')->name('home');
Route::inertia('/settings', 'Settings')->name('settings');

Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::get('/users/user', [UsersController::class, 'credit'])->name('users.create');
Route::get('/users/user/{user}', [UsersController::class, 'show'])->name('users.show');
Route::get('/users/user/{user}/edit', [UsersController::class, 'credit'])->name('users.edit');
Route::post('/users/user', [UsersController::class, 'upsert'])->name('users.store');
Route::patch('/users/user/{user}', [UsersController::class, 'upsert'])->name('users.update');

Route::post('/logout', function () {
    dd('logout', request()->all());
})->name('logout');
