@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Laporan Penjualan</h2>

    <div class="mb-6 flex flex-col sm:flex-row gap-3">
        <a href="{{ route('laporan.penjualan.excel') }}" class="inline-flex items-center justify-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
            Export Excel
        </a>
        <a href="{{ route('laporan.penjualan.pdf') }}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
            Export PDF
        </a>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full text-sm text-left text-gray-700 border">
            <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                <tr>
                    <th class="px-6 py-3 border">No</th>
                    <th class="px-6 py-3 border">Produk</th>
                    <th class="px-6 py-3 border">Harga</th>
                    <th class="px-6 py-3 border">Pembeli</th>
                    <th class="px-6 py-3 border">Alamat</th>
                    <th class="px-6 py-3 border">Metode</th>
                    <th class="px-6 py-3 border">Pengiriman</th>
                    <th class="px-6 py-3 border">Status</th>
                    <th class="px-6 py-3 border">Waktu</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($orders as $index => $order)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-6 py-4 border">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 border">{{ $order['nama_produk'] }}</td>
                    <td class="px-6 py-4 border">Rp{{ number_format($order['harga'], 2, ',', '.') }}</td>
                    <td class="px-6 py-4 border">{{ $order['nama'] }}</td>
                    <td class="px-6 py-4 border">{{ $order['alamat'] }}</td>
                    <td class="px-6 py-4 border">{{ $order['metode_pembayaran'] }}</td>
                    <td class="px-6 py-4 border">{{ $order['shipping_info'] }}</td>
                    <td class="px-6 py-4 border">{{ $order['status_pesanan'] }}</td>
                    <td class="px-6 py-4 border">{{ date('d-m-Y H:i', strtotime($order['waktu_pembelian'])) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
