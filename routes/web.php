<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'create']);

Route::get('/register', [UserController::class, 'create'])
    ->name('register');

Route::post('/register', [UserController::class, 'store']);


Route::get('/register', [App\Http\Controllers\UserController::class, 'create'])->name('register');
Route::post('/register', [App\Http\Controllers\UserController::class, 'store']);