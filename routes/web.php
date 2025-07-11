<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController; // Pastikan ini diimpor
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderReportController;

Route::get('/laporan-penjualan', [OrderReportController::class, 'index'])->name('laporan.penjualan');
Route::get('/laporan-penjualan/export/excel', [OrderReportController::class, 'exportExcel'])->name('laporan.penjualan.excel');
Route::get('/laporan-penjualan/export/word', [OrderReportController::class, 'exportWord'])->name('laporan.penjualan.word');



Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('index'); // Memanggil index.blade.php
});

// Rute untuk pencarian produk
Route::get('/product/search', function (Request $request) {
    $search = $request->input('search');
    $products = Product::where('nama_produk', 'like', "%$search%")
                       ->orWhere('deskripsi', 'like', "%$search%")
                       ->get();
    return view('product.index', compact('products')); // Kirim hasil pencarian ke view
});

// Rute untuk checkout
Route::get('/checkout', function () {
    return view('checkout'); 
});

// Rute untuk profil
Route::get('/profile', function () {
    return view('profile');
})->name('profile');


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);



// Rute utama (home)
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk halaman produk, gunakan controller untuk menghindari duplikasi
Route::get('/product', [ProductController::class, 'index'])->name('product');

// Rute untuk halaman diskon, gunakan method showDiscounts pada ProductController
Route::get('/discount', [ProductController::class, 'showDiscounts'])->name('discount'); 

// Rute untuk halaman about
Route::get('/about', function () {
    return view('about');
})->name('about');

// Rute untuk halaman kontak
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
