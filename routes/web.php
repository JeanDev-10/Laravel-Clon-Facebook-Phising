<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;



Route::get('/', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'create'])->name('register.create');
