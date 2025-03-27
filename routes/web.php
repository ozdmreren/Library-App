<?php

use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/register',[RegisterUserController::class,'create'])->name('register');
Route::get('/login',)->name('login');
