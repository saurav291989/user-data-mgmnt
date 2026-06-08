<?php


use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

require __DIR__.'/web/users.php';

require __DIR__.'/auth.php';
