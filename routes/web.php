<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\UserController;

Route::view('/', 'upload')
    // function () {
    // return view('upload');});
    ->name('form');

Route::post('/import', [UserDataController::class, 'import'])
    ->name('user.import');

Route::get('/users', [UserController::class, 'dispaly']);

Route::get('/delete/{id}', [UserController::class, 'delete']);

Route::get('/edit/{id}', [UserController::class, 'edit']);

Route::post('/update/{id}', [UserController::class, 'update']);

// Route::get('/api/users', [UserController::class, 'getUsers']);

Route::view('/users-api', 'users_api');