<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailCheckController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'loginPage'])->name('loginPage');

Route::get('/register', [AuthController::class, 'registerPage'])->name('registerPage');

Route::post('/user_create', [AuthController::class, 'register'])->name('register');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout' , [AuthController::class , 'logout'])->name('logout');

Route::get('/users' ,[UserController::class , 'index']);

Route::get('/check_code' , [EmailCheckController::class , 'index'])->name('check.code');
Route::post('/verify' , [EmailCheckController::class, 'check_code'])->name('verify');
