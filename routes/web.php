<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\UserController;

Route::view('/', 'upload')
    ->name('form');

Route::post('/import', [UserDataController::class, 'import'])
    ->name('user.import');

Route::get('/users', [UserController::class, 'dispaly']);

Route::get('/delete/{id}', [UserController::class, 'delete']);

Route::get('/edit/{id}', [UserController::class, 'edit']);

Route::post('/update/{id}', [UserController::class, 'update']);

// Route::get('/api/users', [UserController::class, 'getUsers']);

Route::view('/users-api', 'users_api');

// Route::get('/users-api', function () {
//     dd('web route');
// });

// Route::get('/users-api', function () {
//     logger('web route hit');
//     return view('users_api');
// });