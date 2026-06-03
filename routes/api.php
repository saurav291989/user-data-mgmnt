<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\UserController;


Route::get('/users', [UserController::class, 'getUsers']);