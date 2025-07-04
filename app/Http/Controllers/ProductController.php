<?php

namespace App\Http\Controllers;

use App\Models\Product;  // Pastikan Anda mengimpor model Product
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Fungsi untuk menampilkan halaman produk
    public function index()
    {
        return view('product');
    }

    // Fungsi untuk menampilkan halaman diskon
    public function showDiscounts()
    {
        // Mengambil semua produk atau sesuai dengan filter yang Anda inginkan
        $products = Product::all(); // Anda bisa menambahkan filter atau query untuk produk diskon tertentu

        // Mengirim data produk ke view 'discount'
        return view('discount', compact('products')); // Mengirim variabel $products ke view discount.blade.php
    }
}
