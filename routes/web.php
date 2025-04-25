<?php

use Illuminate\Support\Facades\Route;

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
