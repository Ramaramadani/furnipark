@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-xl font-bold mb-4">PRODUCT</h2>

        <!-- Tampilkan hasil pencarian jika ada -->
        @if(isset($products) && $products->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($products as $product)
                    <div class="product-card border p-3 rounded shadow-sm hover:shadow-md transition hover:scale-105 transform hover:bg-gray-100">
                        <img src="{{ asset('images/' . $product->gambar) }}" alt="{{ $product->nama_produk }}" class="w-full h-40 object-contain mb-3">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="font-bold text-sm">RP. {{ number_format($product->harga, 0, ',', '.') }}</p>
                                <p class="text-sm">{{ $product->nama_produk }}</p>
                            </div>
                            <button class="text-gray-400 hover:text-orange-500">
                                <span class="material-icons">bookmark</span>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500">Tidak ada produk yang ditemukan.</p>
        @endif
    </div>
@endsection
