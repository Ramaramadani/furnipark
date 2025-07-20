@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4 text-orange-500">Product Management</h1>

    <!-- Add Product -->
    <form action="/products/store" method="POST" enctype="multipart/form-data" class="mb-6 bg-white p-4 rounded shadow">
        @csrf
        <div class="flex flex-wrap gap-2">
            <input type="text" name="nama_produk" placeholder="Nama Produk" required class="border p-2 rounded w-full md:w-auto">
            <input type="number" name="harga" placeholder="Harga" required class="border p-2 rounded w-full md:w-auto">
            <input type="number" name="stok" placeholder="Stok" required class="border p-2 rounded w-full md:w-auto">
            <input type="file" name="gambar" required class="border p-2 rounded w-full md:w-auto">
            <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Tambah</button>
        </div>
    </form>

    <!-- List Products -->
    <div class="overflow-x-auto bg-white p-4 rounded shadow">
        <table class="table-auto border-collapse w-full text-center">
            <thead>
                <tr class="bg-orange-500 text-white">
                    <th class="border p-2">Nama</th>
                    <th class="border p-2">Harga</th>
                    <th class="border p-2">Stok</th>
                    <th class="border p-2">Gambar</th>
                    <th class="border p-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $p)
                <tr>
                    <form action="/products/update/{{ $p['id'] }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <td class="border p-2">
                            <input type="text" name="nama_produk" value="{{ $p['nama_produk'] }}" class="border p-1 w-full rounded" required>
                        </td>
                        <td class="border p-2">
                            <input type="number" name="harga" value="{{ $p['harga'] }}" class="border p-1 w-full rounded" required>
                        </td>
                        <td class="border p-2">
                            <input type="number" name="stok" value="{{ $p['stok'] }}" class="border p-1 w-full rounded" required>
                        </td>
                        <td class="border p-2">
                            <img src="{{ $p['gambar'] }}" alt="gambar" class="w-16 h-16 mx-auto mb-1 object-cover rounded">
                            <input type="file" name="gambar" class="border p-1 w-full rounded">
                        </td>
                        <td class="border p-2 space-y-1">
                            <button type="submit" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Update</button>
                    </form>
                            <form action="/products/delete/{{ $p['id'] }}" method="POST" class="mb-1">
    @csrf
    @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
