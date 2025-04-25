@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6">
    <h2 class="text-2xl font-semibold mb-6">Discount</h2>

    <div class="relative">
        <!-- Left Arrow -->
        <button id="prevBtn" class="absolute left-0 top-1/2 -translate-y-1/2 bg-white border p-2 z-10">
            <i class="fas fa-chevron-left"></i>
        </button>

        <!-- Product Slider -->
        <div id="slider" class="flex overflow-x-auto space-x-6 scroll-smooth no-scrollbar">
            <!-- Produk 1 -->
            <div class="min-w-[200px] flex-shrink-0 text-center">
                <img src="{{ asset('images/meja.jpg') }}" alt="Meja" class="w-40 h-40 mx-auto object-contain">
                <div class="font-bold">Rp300.000</div>
                <div class="line-through text-gray-500">Rp400.000</div>
                <div>Meja minimalis M-01</div>
            </div>

            <!-- Produk 2 -->
            <div class="min-w-[200px] flex-shrink-0 text-center">
                <img src="{{ asset('images/lampu.jpg') }}" alt="Lampu" class="w-40 h-40 mx-auto object-contain">
                <div class="font-bold">Rp350.000</div>
                <div class="line-through text-gray-500">Rp450.000</div>
                <div>Lampu tidur L-01</div>
            </div>

            <!-- Produk 3 -->
            <div class="min-w-[200px] flex-shrink-0 text-center">
                <img src="{{ asset('images/kasur.jpg') }}" alt="Kasur" class="w-40 h-40 mx-auto object-contain">
                <div class="font-bold">Rp3.000.000</div>
                <div class="line-through text-gray-500">Rp4.000.000</div>
                <div>Kasur tunggal K-01</div>
            </div>

            <!-- Produk 4 -->
            <div class="min-w-[200px] flex-shrink-0 text-center">
                <img src="{{ asset('images/lemari.jpg') }}" alt="Lemari" class="w-40 h-40 mx-auto object-contain">
                <div class="font-bold">Rp800.000</div>
                <div class="line-through text-gray-500">Rp900.000</div>
                <div>Lemari minimalis L-01</div>
            </div>
        </div>

        <!-- Right Arrow -->
        <button id="nextBtn" class="absolute right-0 top-1/2 -translate-y-1/2 bg-white border p-2 z-10">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
</div>

<!-- Slider Script -->
<script>
    const slider = document.getElementById('slider');
    const next = document.getElementById('nextBtn');
    const prev = document.getElementById('prevBtn');

    next.addEventListener('click', () => {
        slider.scrollBy({ left: 220, behavior: 'smooth' });
    });

    prev.addEventListener('click', () => {
        slider.scrollBy({ left: -220, behavior: 'smooth' });
    });
</script>

<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
@endsection
