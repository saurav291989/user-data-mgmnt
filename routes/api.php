<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\AuthController;


Route::get('/users', [UserController::class, 'getUsers']);


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);



Route::middleware('auth:api')->get('/profile', [AuthController::class, 'profile']);