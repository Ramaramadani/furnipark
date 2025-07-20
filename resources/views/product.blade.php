@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6">
    <h2 class="text-2xl font-bold text-orange-600 mb-6">Our Product</h2>

    <div id="product-grid" class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <!-- Produk diisi oleh JS -->
    </div>
</div>

<!-- Modal Checkout -->
<div id="checkout-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center z-50">
    <div class="bg-white p-6 rounded-xl shadow-2xl w-full max-w-lg overflow-y-auto max-h-screen">
        <h2 class="font-bold text-2xl text-orange-600 mb-4">Checkout</h2>

        <div class="mb-4">
            <label for="name" class="block font-semibold mb-1">Nama</label>
            <input type="text" id="name" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-orange-500" required>
        </div>
        <div class="mb-4">
            <label for="address" class="block font-semibold mb-1">Alamat</label>
            <input type="text" id="address" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-orange-500" required>
        </div>

        <div id="checkout-content" class="mb-4"></div>

        <h3 class="font-bold text-lg text-orange-600 mb-2">Shipping Info</h3>
        <form class="flex flex-wrap gap-4 mb-4">
            @foreach ([['jnt', 'JNT Delivery', '3 - 4 hari', 70000], ['cargo', 'Cargo', '7 - 12 Hari', 35000], ['selfpickup', 'Self Pick-up', 'Ambil sendiri', 0]] as [$value, $label, $desc, $price])
            <label class="flex flex-col items-center border border-gray-300 px-4 py-2 rounded-lg cursor-pointer w-32 text-center hover:border-orange-500 transition">
                <input class="mb-1 shipping-option" type="radio" name="shipping" value="{{ $value }}" data-price="{{ $price }}" />
                <span class="font-semibold text-sm">{{ $label }}</span>
                <span class="text-xs text-gray-500">{{ $desc }}</span>
            </label>
            @endforeach
        </form>

        <h3 class="font-bold text-lg text-orange-600 mb-2">Payment Transfer</h3>
        <ul class="text-sm list-disc pl-5 mb-2">
            <li><span class="font-semibold">BCA:</span> 123-456-7890</li>
            <li><span class="font-semibold">Mandiri:</span> 098-765-4321</li>
        </ul>

        <h3 class="font-bold text-lg text-orange-600 mb-2">E-Wallet</h3>
        <ul class="text-sm list-disc pl-5 mb-4">
            <li>OVO / Gopay / Dana: 08123456789 a.n. <span class="font-semibold">furnipark</span></li>
        </ul>

        <div class="mb-4">
            <label for="metode_pembayaran" class="block font-semibold mb-1">Metode Pembayaran</label>
            <select id="metode_pembayaran" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-orange-500">
                <option value="">-- Pilih Metode --</option>
                <option value="bca">Transfer BCA</option>
                <option value="mandiri">Transfer Mandiri</option>
                <option value="ovo">OVO</option>
                <option value="gopay">Gopay</option>
                <option value="dana">Dana</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Upload Bukti Pembayaran</label>
            <input type="file" id="bukti_pembayaran" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-orange-500">
        </div>

        <div class="mt-4 flex justify-between">
            <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition" id="close-modal">Close</button>
            <button class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700 transition" id="buy-button">Buy</button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
let selectedProductPrice = 0;
let productId = null;

function openCheckoutModal(price, name, image, id) {
    selectedProductPrice = Number(price);
    productId = id;

    document.getElementById('checkout-content').innerHTML = `
        <div class="flex flex-col mb-4">
            <img src="${image}" class="w-20 h-20 object-contain mb-2">
            <p><strong>Product:</strong> ${name}</p>
            <p><strong>Price:</strong> RP. ${new Intl.NumberFormat().format(price)}</p>
            <hr class="my-2">
            <p id="total-harga"><strong>Total:</strong> RP. ${new Intl.NumberFormat().format(price)}</p>
        </div>
    `;
    document.getElementById('checkout-modal').classList.remove('hidden');

    document.querySelectorAll('.shipping-option').forEach(option => {
        option.addEventListener('change', function() {
            const shippingCost = Number(this.dataset.price);
            const totalPrice = selectedProductPrice + shippingCost;
            document.getElementById('total-harga').innerHTML = `<strong>Total:</strong> RP. ${new Intl.NumberFormat().format(totalPrice)}`;
        });
    });
}

function fetchProducts() {
    axios.get('http://127.0.0.1:8080/api/products/')
        .then(response => {
            const products = response.data;
            const productGrid = document.getElementById('product-grid');
            productGrid.innerHTML = '';

            products.forEach(product => {
                const productCard = document.createElement('div');
                productCard.className = 'relative border p-3 rounded shadow hover:shadow-lg cursor-pointer';

                productCard.innerHTML = `
                    <img src="http://127.0.0.1:8000/images/${product.gambar.split('/').pop()}" class="w-full h-40 object-contain mb-2" />
                    <div>
                        <p class="font-bold text-sm">RP. ${new Intl.NumberFormat().format(product.harga)}</p>
                        <p class="text-xs">${product.nama_produk}</p>
                    </div>
                `;

                productCard.addEventListener('click', function() {
                    openCheckoutModal(product.harga, product.nama_produk, `http://127.0.0.1:8000/images/${product.gambar.split('/').pop()}`, product.id);
                });

                productGrid.appendChild(productCard);
            });
        })
        .catch(error => {
            console.error('Error fetching products:', error);
        });
}

document.getElementById('close-modal').addEventListener('click', () => {
    document.getElementById('checkout-modal').classList.add('hidden');
});

document.getElementById('buy-button').addEventListener('click', function() {
    const name = document.getElementById('name').value;
    const address = document.getElementById('address').value;
    const paymentMethod = document.getElementById('metode_pembayaran').value;
    const shippingMethod = document.querySelector('input[name="shipping"]:checked')?.value;
    const paymentReceipt = document.getElementById('bukti_pembayaran').files[0];

    if (!name || !address || !paymentMethod || !shippingMethod) {
        alert('Please complete all fields.');
        return;
    }

    const formData = new FormData();
    formData.append('name', name);
    formData.append('address', address);
    formData.append('payment_method', paymentMethod);
    formData.append('shipping_method', shippingMethod);
    formData.append('product_id', productId);
    formData.append('quantity', 1);
    formData.append('payment_receipt', paymentReceipt);

    axios.post('http://127.0.0.1:8080/api/orders/', formData)
        .then(response => {
            alert('Order placed successfully!');
            document.getElementById('checkout-modal').classList.add('hidden');
        })
        .catch(error => {
            console.error('Error placing order:', error);
            alert('There was an issue placing the order.');
        });
});

fetchProducts();
</script>
@endsection
