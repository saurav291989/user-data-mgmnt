<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDataController;

Route::view('/', 'upload');
    // function () {
    // return view('upload');});

Route::post('/import', [UserDataController::class, 'import'])
    ->name('user.import');