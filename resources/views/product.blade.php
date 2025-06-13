@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-xl font-bold mb-4">PRODUCT</h2>

        <!-- Tombol untuk Menambah Produk -->
        <button id="addProductBtn" class="px-4 py-2 bg-blue-500 text-white rounded mb-4">Tambah Produk</button>

        <!-- Form untuk Menambahkan Produk (disembunyikan saat pertama kali) -->
        <div id="addProductForm" class="hidden mb-6">
            <h3 class="text-lg font-semibold mb-4">Tambah Produk Baru</h3>
            <form id="add-product-form" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="nama_produk" class="block">Nama Produk</label>
                    <input type="text" id="nama_produk" name="nama_produk" class="w-full p-2 border rounded" placeholder="Masukkan nama produk" required>
                </div>
                <div class="mb-4">
                    <label for="harga" class="block">Harga</label>
                    <input type="number" id="harga" name="harga" class="w-full p-2 border rounded" placeholder="Masukkan harga" required>
                </div>
                <div class="mb-4">
                    <label for="stok" class="block">Stok</label>
                    <input type="number" id="stok" name="stok" class="w-full p-2 border rounded" placeholder="Masukkan stok" required>
                </div>
                <div class="mb-4">
                    <label for="gambar" class="block">Pilih Gambar</label>
                    <input type="file" id="gambar" name="gambar" class="w-full p-2 border rounded" required>
                </div>
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Tambah Produk</button>
            </form>
        </div>

        <!-- Grid Produk yang Ada -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6" id="product-grid">
            <!-- Produk akan dimuat di sini menggunakan Axios -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Fungsi untuk Mengambil Produk dari API Django
        function fetchProducts() {
            axios.get('http://127.0.0.1:8080/api/products/')
                .then(function (response) {
                    const products = response.data;
                    const productGrid = document.getElementById('product-grid');
                    productGrid.innerHTML = ''; // Clear grid sebelum menambahkan produk baru

                    products.forEach(product => {
                        const productCard = document.createElement('div');
                        productCard.classList.add('product-card', 'border', 'p-3', 'rounded', 'shadow-sm', 'hover:shadow-md', 'transition', 'hover:scale-105', 'transform', 'hover:bg-gray-100');
                        
                        productCard.innerHTML = `
                            <img src="http://127.0.0.1:8000/images/${product.gambar.split('/').pop()}" alt="${product.nama_produk}" class="w-full h-40 object-contain mb-3">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="font-bold text-sm">RP. ${new Intl.NumberFormat().format(product.harga)}</p>
                                    <p class="text-sm">${product.nama_produk}</p>
                                </div>
                                <button class="text-gray-400 hover:text-orange-500" x-data="{ isBookmarked: false }" @click="isBookmarked = !isBookmarked">
                                    <svg x-bind:class="{ 'text-orange-500': isBookmarked }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v18l7-4 7 4V3z"></path>
                                    </svg>
                                </button>
                            </div>
                        `;
                        productGrid.appendChild(productCard);
                    });
                })
                .catch(function (error) {
                    console.error('Error:', error);
                });
        }

        // Fetch produk saat halaman dimuat
        fetchProducts();

        // Menambahkan Produk Baru
        const form = document.getElementById('add-product-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            const formData = new FormData();
            formData.append('nama_produk', document.getElementById('nama_produk').value);
            formData.append('harga', document.getElementById('harga').value);
            formData.append('stok', document.getElementById('stok').value);
            formData.append('gambar', document.getElementById('gambar').files[0]);

            axios.post('http://127.0.0.1:8080/api/products/', formData)
                .then(function (response) {
                    console.log('Produk berhasil ditambahkan:', response.data);
                    alert('Produk berhasil ditambahkan!');
                    fetchProducts(); // Refresh produk yang ada
                })
                .catch(function (error) {
                    console.error('Error:', error);
                    alert('Gagal menambahkan produk');
                });
        });

        // Menampilkan dan Menyembunyikan Form dengan Tombol "Tambah"
        const addProductBtn = document.getElementById('addProductBtn');
        const addProductForm = document.getElementById('addProductForm');

        addProductBtn.addEventListener('click', function() {
            addProductForm.classList.toggle('hidden'); // Menyembunyikan/menampilkan form
        });
    </script>
@endsection
