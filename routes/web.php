<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController; // Pastikan ini diimpor
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderReportController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('index');
});


Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::put('/users/{id}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');


Route::get('/discounts', [DiscountController::class, 'index']);
Route::post('/discounts', [DiscountController::class, 'store']);
Route::put('/discounts/{id}', [DiscountController::class, 'update']);
Route::delete('/discounts/{id}', [DiscountController::class, 'destroy']);


Route::get('/products', [ProductsController::class, 'index']);
Route::post('/products/store', [ProductsController::class, 'store'])->name('products.store');

Route::post('/products/update/{id}', [ProductsController::class, 'update']);
Route::delete('/products/delete/{id}', [ProductsController::class, 'delete']);



Route::get('/orders', [OrderController::class, 'index']);
Route::post('/orders/update', [OrderController::class, 'update'])->name('orders.update');


Route::get('/contacts', [ContactController::class, 'index']);


Route::get('/laporan-penjualan', [OrderReportController::class, 'index'])->name('laporan.penjualan');
Route::get('/laporan-penjualan/export/excel', [OrderReportController::class, 'exportExcel'])->name('laporan.penjualan.excel');
Route::get('/laporan-penjualan/export/pdf', [OrderReportController::class, 'exportPDF'])->name('laporan.penjualan.pdf');




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
