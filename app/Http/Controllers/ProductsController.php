<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductsController extends Controller
{
    public function index()
    {
        $response = Http::get('http://127.0.0.1:8080/api/products/');
        $products = $response->json();
        return view('products', compact('products'));
    }

public function store(Request $request)
{
    $response = Http::asMultipart()
        ->attach('gambar', fopen($request->file('gambar'), 'r'), $request->file('gambar')->getClientOriginalName())
        ->post('http://127.0.0.1:8080/api/products/', [
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

    return redirect('/products');
}

public function update(Request $request, $id)
{
    $url = "http://127.0.0.1:8080/api/products/{$id}/";

    $http = Http::asMultipart();

    if ($request->hasFile('gambar')) {
        $http = $http->attach('gambar', fopen($request->file('gambar'), 'r'), $request->file('gambar')->getClientOriginalName());
    }

    $http->send('PATCH', $url, [
        'multipart' => [
            [
                'name' => 'nama_produk',
                'contents' => $request->nama_produk,
            ],
            [
                'name' => 'harga',
                'contents' => $request->harga,
            ],
            [
                'name' => 'stok',
                'contents' => $request->stok,
            ],
        ],
    ]);

    return redirect('/products');
}



public function delete($id)
{
    Http::delete("http://127.0.0.1:8080/api/products/{$id}/");
    return redirect('/products');
}

}
