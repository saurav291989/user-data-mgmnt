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

Route::get('/users', [UserController::class, 'index']);