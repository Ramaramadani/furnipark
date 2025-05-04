<div class="max-w-7xl mx-auto px-6">
    <h2 class="text-xl font-bold mb-4">PRODUCT</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach($products as $product)
        <div class="border p-3 rounded shadow-sm hover:shadow-md transition">
            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-40 object-contain mb-3">

            <p class="font-bold text-sm">RP. {{ number_format($product['price'], 0, ',', '.') }}</p>
            <p class="text-sm">{{ $product['name'] }}</p>
        </div>
        @endforeach
    </div>
</div>
