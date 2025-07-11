<?php
namespace App\Http\Controllers;

use App\Models\Product;  
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
        $products = Product::all();
        return view('discount', compact('products'));
    }

    // Fungsi untuk update produk
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->nama_produk = $request->input('nama_produk');
        $product->harga = $request->input('harga');
        $product->stok = $request->input('stok');
        if ($request->hasFile('gambar')) {
            $product->gambar = $request->file('gambar')->store('images');
        }
        $product->save();

        return response()->json(['message' => 'Produk berhasil diperbarui', 'product' => $product]);
    }

    // Fungsi untuk delete produk
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Produk berhasil dihapus']);
    }
}

