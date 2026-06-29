<?php

use App\Http\Controllers\UsersController;
use App\Http\Requests\UserRequest;
use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Home')->name('home');
Route::post('/', function (UserRequest $request) {
    dd($request->safe());
})->middleware([HandlePrecognitiveRequests::class])->name('home');
Route::inertia('/settings', 'Settings')->name('settings');

// Route::resource('users', UsersController::class)->middleware([HandlePrecognitiveRequests::class]);

Route::get('/users', [UsersController::class, 'index'])
    ->name('users.index');

Route::get('/users/create', [UsersController::class, 'create'])
    ->name('users.create');

Route::post('/users', [UsersController::class, 'store'])
    ->middleware([HandlePrecognitiveRequests::class])
    ->name('users.store');

Route::get('/users/{user}', [UsersController::class, 'show'])
    ->name('users.show');

Route::get('/users/{user}/edit', [UsersController::class, 'edit'])
    ->name('users.edit');

Route::put('/users/{user}', [UsersController::class, 'update'])
    ->name('users.update');

Route::patch('/users/{user}', [UsersController::class, 'update'])
    ->name('users.update');

Route::delete('/users/{user}', [UsersController::class, 'destroy'])
    ->name('users.destroy');

Route::post('/logout', function () {
    dd('logout', request()->all());
})->name('logout');
