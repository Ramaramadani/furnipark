<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    // Menampilkan semua pesanan
    public function index()
    {
        $response = Http::get('http://127.0.0.1:8080/api/orders/');
        $orders = $response->json();

        return view('orders.index', compact('orders'));
    }

    // Mengupdate status dan nomor resi
    public function update(Request $request)
    {
        $orderId = $request->input('order_id');

        $data = [
            'status_pesanan' => $request->input('status_pesanan'),
            'no_resi' => $request->input('no_resi'),
        ];

        // GUNAKAN PATCH dan asForm
        $response = Http::asForm()->patch("http://127.0.0.1:8080/api/orders/$orderId/", $data);

        if ($response->successful()) {
            return redirect('/orders')->with('success', 'Pesanan berhasil diperbarui.');
        } else {
            return back()->with('error', 'Gagal memperbarui pesanan. ' . $response->body());
        }
    }
}
