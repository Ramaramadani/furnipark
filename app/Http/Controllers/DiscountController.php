<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DiscountController extends Controller
{
    public function index()
    {
        $response = Http::get('http://127.0.0.1:8080/api/discounts/');
        $discounts = $response->json();
        return view('discounts.index', compact('discounts'));
    }

    public function store(Request $request)
    {
        $image = fopen($request->file('gambar')->getPathname(), 'r');
        Http::attach('gambar', $image, $request->file('gambar')->getClientOriginalName())
            ->post('http://127.0.0.1:8080/api/discounts/', [
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'harga_diskon' => $request->harga_diskon,
            ]);

        return redirect('/discounts')->with('success', 'Diskon berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'harga_diskon' => $request->harga_diskon,
        ];

        if ($request->hasFile('gambar')) {
            $image = fopen($request->file('gambar')->getPathname(), 'r');
            Http::attach('gambar', $image, $request->file('gambar')->getClientOriginalName())
                ->put("http://127.0.0.1:8080/api/discounts/{$id}/", $data);
        } else {
            Http::put("http://127.0.0.1:8080/api/discounts/{$id}/", $data);
        }

        return redirect('/discounts')->with('success', 'Diskon berhasil diupdate');
    }

    public function destroy($id)
    {
        Http::delete("http://127.0.0.1:8080/api/discounts/{$id}/");
        return redirect('/discounts')->with('success', 'Diskon berhasil dihapus');
    }
}
