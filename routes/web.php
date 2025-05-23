<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/product', [ProductController::class, 'index'])->name('product');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);



Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('home');
});
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/discount', [PageController::class, 'discount'])->name('discount');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
// routes/web.php
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/discount', function () {
    return view('discount');
})->name('discount');
