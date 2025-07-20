@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4">
    <h1 class="text-3xl font-bold text-orange-500 mb-6">Kelola Diskon Produk</h1>

    <!-- Form Tambah -->
    <div class="bg-white p-6 rounded shadow mb-8">
        <h2 class="text-2xl font-semibold text-orange-500 mb-4">Tambah Diskon</h2>
        <form action="/discounts" method="POST" enctype="multipart/form-data" class="space-y-3">
            @csrf
            <input type="text" name="nama_produk" placeholder="Nama Produk" required class="w-full border p-2 rounded">
            <input type="number" name="harga" placeholder="Harga" required class="w-full border p-2 rounded">
            <input type="number" name="harga_diskon" placeholder="Harga Diskon" required class="w-full border p-2 rounded">
            <input type="file" name="gambar" required class="w-full border p-2 rounded">
            <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Tambah</button>
        </form>
    </div>

    <!-- Daftar Diskon -->
    <div class="bg-white p-6 rounded shadow mb-8">
        <h2 class="text-2xl font-semibold text-orange-500 mb-4">Daftar Diskon</h2>
        <table class="w-full text-center border">
            <thead class="bg-orange-500 text-white">
                <tr>
                    <th class="p-2">Nama</th>
                    <th class="p-2">Harga</th>
                    <th class="p-2">Harga Diskon</th>
                    <th class="p-2">Gambar</th>
                    <th class="p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($discounts as $d)
                    <tr class="border-b hover:bg-orange-50">
                        <td class="p-2">{{ $d['nama_produk'] }}</td>
                        <td class="p-2">Rp {{ number_format($d['harga'], 0, ',', '.') }}</td>
                        <td class="p-2">Rp {{ number_format($d['harga_diskon'], 0, ',', '.') }}</td>
                        <td class="p-2">
                            <img src="{{ $d['gambar'] }}" alt="gambar" class="w-16 h-16 object-cover mx-auto rounded">
                        </td>
                        <td class="p-2 space-y-1">
                            <button onclick="editDiscount('{{ $d['id'] }}', '{{ $d['nama_produk'] }}', '{{ $d['harga'] }}', '{{ $d['harga_diskon'] }}')" class="bg-yellow-400 px-2 py-1 rounded hover:bg-yellow-500 text-white">Edit</button>
                            <form action="/discounts/{{ $d['id'] }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="bg-red-500 px-2 py-1 rounded hover:bg-red-600 text-white">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Form Edit -->
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-semibold text-orange-500 mb-4">Edit Diskon</h2>
        <form id="editForm" method="POST" enctype="multipart/form-data" class="space-y-3">
            @csrf @method('PUT')
            <input type="text" name="nama_produk" id="editNama" required class="w-full border p-2 rounded">
            <input type="number" name="harga" id="editHarga" required class="w-full border p-2 rounded">
            <input type="number" name="harga_diskon" id="editHargaDiskon" required class="w-full border p-2 rounded">
            <input type="file" name="gambar" class="w-full border p-2 rounded">
            <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Update</button>
        </form>
    </div>
</div>

<script>
    function editDiscount(id, nama, harga, hargaDiskon) {
        document.getElementById('editForm').action = '/discounts/' + id;
        document.getElementById('editNama').value = nama;
        document.getElementById('editHarga').value = harga;
        document.getElementById('editHargaDiskon').value = hargaDiskon;
        window.scrollTo({ top: document.getElementById('editForm').offsetTop - 100, behavior: 'smooth' });
    }
</script>
@endsection
