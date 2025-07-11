@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-xl font-bold mb-4">PRODUCT</h2>

        <!-- Tombol untuk Menambah Produk -->
        <button id="addProductBtn" class="px-4 py-2 bg-blue-500 text-white rounded mb-4">Tambah Produk</button>

        <!-- Form untuk Menambahkan Produk -->
        <div id="addProductForm" class="hidden mb-6">
            <h3 class="text-lg font-semibold mb-4">Tambah Produk Baru</h3>
            <form id="add-product-form" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="nama_produk" class="block">Nama Produk</label>
                    <input type="text" id="nama_produk" name="nama_produk" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="harga" class="block">Harga</label>
                    <input type="number" id="harga" name="harga" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="stok" class="block">Stok</label>
                    <input type="number" id="stok" name="stok" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="gambar" class="block">Pilih Gambar</label>
                    <input type="file" id="gambar" name="gambar" class="w-full p-2 border rounded" required>
                </div>
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Tambah Produk</button>
            </form>
        </div>

        <!-- Grid Produk -->
        <div id="product-grid" class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <!-- Produk diisi oleh JS -->
        </div>
    </div>

    <!-- Modal Edit Produk -->
    <div id="editProductModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
            <h2 class="font-bold text-lg mb-4">Edit Produk</h2>
            <form id="edit-product-form" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="edit-nama_produk" class="block">Nama Produk</label>
                    <input type="text" id="edit-nama_produk" name="nama_produk" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="edit-harga" class="block">Harga</label>
                    <input type="number" id="edit-harga" name="harga" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="edit-stok" class="block">Stok</label>
                    <input type="number" id="edit-stok" name="stok" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="edit-gambar" class="block">Pilih Gambar</label>
                    <input type="file" id="edit-gambar" name="gambar" class="w-full p-2 border rounded">
                </div>
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Update Produk</button>
            </form>
        </div>
    </div>

    <!-- Modal Checkout -->
    <div id="checkout-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg overflow-y-auto max-h-screen">
            <h2 class="font-bold text-lg mb-4">Checkout Info</h2>
            
            <!-- Nama dan Alamat -->
            <div class="mb-4">
                <label for="name" class="block">Nama</label>
                <input type="text" id="name" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="address" class="block">Alamat</label>
                <input type="text" id="address" class="w-full p-2 border rounded" required>
            </div>

            <!-- Produk info -->
            <div id="checkout-content" class="mb-4">
                <!-- dynamic -->
            </div>

            <!-- Shipping -->
            <h3 class="font-bold text-base mb-2">Shipping Info</h3>
            <form class="flex flex-wrap gap-4 mb-4">
                <label class="flex flex-col items-center border border-gray-300 px-4 py-2 cursor-pointer w-32 text-center">
                    <input class="mb-1 shipping-option" type="radio" name="shipping" value="jnt" data-price="70000"/>
                    <span class="text-sm">JNT Delivery</span>
                    <span class="text-xs">3 - 4 hari</span>
                </label>
                <label class="flex flex-col items-center border border-gray-300 px-4 py-2 cursor-pointer w-32 text-center">
                    <input class="mb-1 shipping-option" type="radio" name="shipping" value="cargo" data-price="35000"/>
                    <span class="text-sm">Cargo</span>
                    <span class="text-xs">7 - 12 Hari</span>
                </label>
                <label class="flex flex-col items-center border border-gray-300 px-4 py-2 cursor-pointer w-32 text-center">
                    <input class="mb-1 shipping-option" type="radio" name="shipping" value="selfpickup" data-price="0"/>
                    <span class="text-sm">Self Pick-up</span>
                    <span class="text-xs">Ambil sendiri</span>
                </label>
            </form>

            <!-- Payment Info -->
            <div class="mb-4">
                <h3 class="font-bold text-base mb-2">Payment Transfer</h3>
                <ul class="text-sm list-disc pl-5">
                    <li>BCA: 123-456-7890</li>
                    <li>Mandiri: 098-765-4321</li>
                </ul>
            </div>
            <div class="mb-4">
                <h3 class="font-bold text-base mb-2">E-Wallet</h3>
                <ul class="text-sm list-disc pl-5">
                    <li>OVO/Gopay/Dana: 08123456789 a.n. furnipark</li>
                </ul>
            </div>

            <!-- metode pembayaran digunakan -->
            <div class="mb-4">
                <label for="metode_pembayaran" class="block font-bold mb-1">Metode Pembayaran yang Digunakan</label>
                <select id="metode_pembayaran" class="w-full border p-2 rounded">
                    <option value="">-- Pilih Metode --</option>
                    <option value="bca">Transfer BCA</option>
                    <option value="mandiri">Transfer Mandiri</option>
                    <option value="ovo">OVO</option>
                    <option value="gopay">Gopay</option>
                    <option value="dana">Dana</option>
                </select>
            </div>

            <!-- upload bukti pembayaran -->
            <div class="mb-4">
                <label class="block font-bold mb-1">Upload Bukti Pembayaran</label>
                <input type="file" id="bukti_pembayaran" class="w-full p-2 border rounded">
            </div>

            <!-- Tombol -->
            <div class="mt-4 flex justify-between">
                <button class="bg-gray-500 text-white px-4 py-1 rounded" id="close-modal">Close</button>
                <button class="bg-orange-600 text-white px-4 py-1 rounded" id="buy-button">Buy</button>
            </div>
        </div>
    </div>

    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
    let selectedProductPrice = 0;
    let productId = null;

    // Menampilkan dan Menyembunyikan Form Tambah Produk
    const addProductBtn = document.getElementById('addProductBtn');
    const addProductForm = document.getElementById('addProductForm');
    
    addProductBtn.addEventListener('click', function() {
        addProductForm.classList.toggle('hidden'); // Menyembunyikan/menampilkan form
    });

    // Fungsi untuk Mengambil Produk dari API
    function fetchProducts() {
        axios.get('http://127.0.0.1:8080/api/products/')
            .then(response => {
                const products = response.data;
                const productGrid = document.getElementById('product-grid');
                productGrid.innerHTML = '';

                products.forEach(product => {
                    const productCard = document.createElement('div');
                    productCard.classList.add('relative', 'border', 'p-3', 'rounded', 'shadow', 'hover:shadow-lg', 'cursor-pointer');

                    // HTML untuk satu kartu produk
                    productCard.innerHTML = `
                        <img src="http://127.0.0.1:8000/images/${product.gambar.split('/').pop()}" class="w-full h-40 object-contain mb-2" />
                        <div>
                            <p class="font-bold text-sm">RP. ${new Intl.NumberFormat().format(product.harga)}</p>
                            <p class="text-xs">${product.nama_produk}</p>
                        </div>
                        <button class="absolute bottom-2 right-2 bookmark-btn bg-gray-500 text-white p-2 rounded-full hover:bg-orange-600 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M5 5v16l7-5 7 5V5a2 2 0 00-2-2H7a2 2 0 00-2 2z"/>
                            </svg>
                        </button>
                        <button class="absolute bottom-2 right-12 bg-blue-500 text-white p-2 rounded-full" onclick="editProduct(${product.id})">Edit</button>
                        <button class="absolute bottom-2 right-20 bg-red-500 text-white p-2 rounded-full" onclick="deleteProduct(${product.id})">Delete</button>
                    `;

                    // event klik di card untuk open modal
                    productCard.addEventListener('click', (e) => {
                        if (e.target.closest('.bookmark-btn')) {
                            toggleBookmark(e.target.closest('.bookmark-btn'));
                            return;
                        }
                        productId = product.id;
                        openCheckoutModal(product.harga, product.nama_produk, `http://127.0.0.1:8000/images/${product.gambar.split('/').pop()}`);
                    });

                    productGrid.appendChild(productCard);
                });
            })
            .catch(error => console.error(error));
    }

// Fungsi untuk edit produk
function editProduct(id) {
    // Ambil data produk dari API berdasarkan ID
    axios.get('http://127.0.0.1:8080/api/products/' + id)
        .then(response => {
            const product = response.data;
            // Isi form edit dengan data produk
            document.getElementById('edit-nama_produk').value = product.nama_produk;
            document.getElementById('edit-harga').value = product.harga;
            document.getElementById('edit-stok').value = product.stok;

            // Tampilkan modal edit produk
            document.getElementById('editProductModal').classList.remove('hidden');

            // Update event listener untuk form submit
            document.getElementById('edit-product-form').onsubmit = function (event) {
                event.preventDefault();
                updateProduct(id); // Panggil fungsi update produk
            };
        })
        .catch(error => console.error(error));
}

// Fungsi untuk update produk
function updateProduct(id) {
    const formData = new FormData(document.getElementById('edit-product-form'));

    // Kirim request untuk update produk
    axios.put('http://127.0.0.1:8080/api/products/' + id, formData) // Gunakan PUT untuk update
        .then(response => {
            alert('Produk berhasil diperbarui');
            fetchProducts(); // Refresh produk yang ada
            document.getElementById('editProductModal').classList.add('hidden'); // Sembunyikan modal
        })
        .catch(error => {
            console.error(error);
            alert('Gagal memperbarui produk');
        });
}
// Fungsi untuk delete produk
function deleteProduct(id) {
    if (confirm('Apakah Anda yakin ingin menghapus produk ini?')) {
        axios.delete('http://127.0.0.1:8080/api/products/' + id + '/')  // Pastikan ada / di akhir
            .then(response => {
                alert('Produk berhasil dihapus');
                fetchProducts(); // Refresh produk yang ada
            })
            .catch(error => {
                console.error(error);
                alert('Gagal menghapus produk');
            });
    }
}



    function toggleBookmark(bookmarkBtn) {
        bookmarkBtn.classList.toggle('bg-orange-600'); // Toggle warna oren saat klik
        bookmarkBtn.classList.toggle('bg-gray-500'); // Kembali ke warna dasar ketika tombol dilepas
    }

    function openCheckoutModal(price, name, image) {
        selectedProductPrice = Number(price); 
        const checkoutModal = document.getElementById('checkout-modal');
        const checkoutContent = document.getElementById('checkout-content');
        checkoutContent.innerHTML = `
            <div class="flex flex-col mb-4">
                <img src="${image}" class="w-20 h-20 object-contain mb-2">
                <p><strong>Product:</strong> ${name}</p>
                <p><strong>Price:</strong> RP. ${new Intl.NumberFormat().format(price)}</p>
                <hr class="my-2">
                <p id="total-harga"><strong>Total:</strong> RP. ${new Intl.NumberFormat().format(price)}</p>
            </div>
        `;
        checkoutModal.classList.remove('hidden');

        // Handle shipping cost change and update total price
        document.querySelectorAll('.shipping-option').forEach(option => {
            option.addEventListener('change', function() {
                let shippingCost = 0;
                switch (this.value) {
                    case 'jnt': shippingCost = 70000; break;
                    case 'cargo': shippingCost = 35000; break;
                    case 'selfpickup': shippingCost = 0; break;
                }
                const totalPrice = selectedProductPrice + shippingCost;
                document.getElementById('total-harga').innerHTML = `<strong>Total:</strong> RP. ${new Intl.NumberFormat().format(totalPrice)}`;
            });
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
                alert('There was an issue placing the order.');
                console.error(error);
            });
    });

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

    fetchProducts();
    </script>
@endsection
