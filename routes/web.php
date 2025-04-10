<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::controller(RegisterUserController::class)->group(function(){
    Route::get('/register','create')->name('register');
    Route::post('/register','store');
});


Route::controller(SessionController::class)->group(function(){
    Route::get('/login','create')->name('login');
    Route::post('/login','store')->name('login.store');

    Route::post('/logout','destory')->name('logout');
});

Route::get('/books',[BookController::class,'index'])->name('books');
Route::post('/books',[BookController::class,'store'])->name('books.store');
Route::get("/books/create",[BookController::class,'create'])->name('books.create')->middleware(["auth"]);
Route::get('/books/{book}',[BookController::class,'show'])->name('books.show');

Route::get('/dashboard/{user}',[ProfileController::class,'dashboard'])->name('dashboard');
Route::get('/library',[ProfileController::class,'create'])->name('library');
