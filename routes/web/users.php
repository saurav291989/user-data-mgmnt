<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDataController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','nocache'])->name('dashboard');

Route::middleware(['auth', 'nocache'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::view('/upload', 'upload')->name('form');

    Route::post('/import', [UserDataController::class, 'import'])
        ->name('user.import');

    Route::resource('users', UserController::class)
        ->except(['show']);

    // Route::resource('users', UserController::class)
    //     ->only(['index', 'edit', 'update', 'destroy']);

    // Route::get('/users', [UserController::class, 'dispaly']);

    // Route::get('/edit/{id}', [UserController::class, 'edit']);

    // Route::post('/update/{id}', [UserController::class, 'update']);

    // Route::get('/delete/{id}', [UserController::class, 'delete']);

    Route::view('/users-api', 'users_api');


});