@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-orange-600 mb-6">Daftar Pesanan</h1>

    @if(session('success'))
        <div class="mb-4 text-green-600 bg-green-100 border border-green-200 rounded-lg p-4">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="mb-4 text-red-600 bg-red-100 border border-red-200 rounded-lg p-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-orange-500 text-white text-left">
                <tr>
                    <th class="px-4 py-3 font-semibold">Nama Produk</th>
                    <th class="px-4 py-3 font-semibold">Pemesan</th>
                    <th class="px-4 py-3 font-semibold">Status</th>
                    <th class="px-4 py-3 font-semibold">Resi</th>
                    <th class="px-4 py-3 font-semibold">Update</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 bg-white">
                @foreach($orders as $order)
                    <tr>
                        <td class="px-4 py-3">{{ $order['nama_produk'] }}</td>
                        <td class="px-4 py-3">{{ $order['nama'] }}</td>
                        <td class="px-4 py-3 capitalize">{{ $order['status_pesanan'] }}</td>
                        <td class="px-4 py-3">{{ $order['no_resi'] ?? '-' }}</td>
                        <td class="px-4 py-3">
                            <form action="{{ route('orders.update') }}" method="POST" class="flex flex-col sm:flex-row items-start sm:items-center gap-2">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $order['id'] }}">

                                <select name="status_pesanan" required class="border rounded-md px-3 py-1 focus:ring-2 focus:ring-orange-400">
                                    <option value="processed" {{ $order['status_pesanan'] == 'processed' ? 'selected' : '' }}>Diproses</option>
                                    <option value="packaged" {{ $order['status_pesanan'] == 'packaged' ? 'selected' : '' }}>Dikemas</option>
                                    <option value="shipped" {{ $order['status_pesanan'] == 'shipped' ? 'selected' : '' }}>Dikirim</option>
                                    <option value="delivered" {{ $order['status_pesanan'] == 'delivered' ? 'selected' : '' }}>Diterima</option>
                                </select>

                                <input type="text" name="no_resi" value="{{ $order['no_resi'] }}" placeholder="Nomor Resi"
                                    class="border rounded-md px-3 py-1 focus:ring-2 focus:ring-orange-400 w-full sm:w-auto" required>

                                <button type="submit"
                                    class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-4 py-1.5 rounded-md transition">
                                    Update
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
