@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4">
    @if(session('is_logged_in'))
        <div class="flex justify-between items-center mb-6">
            <div>
                {{-- Menampilkan pesan selamat datang berdasarkan role --}}
                @if(session('role') == 'admin')
                    <h1 class="text-3xl font-bold text-gray-800">Selamat datang, Admin {{ session('username') }}</h1>
                @elseif(session('role') == 'owner')
                    <h1 class="text-3xl font-bold text-gray-800">Selamat datang, Owner {{ session('username') }}</h1>
                @elseif(session('role') == 'cashier')
                    <h1 class="text-3xl font-bold text-gray-800">Selamat datang, Cashier {{ session('username') }}</h1>
                @else
                    <h1 class="text-3xl font-bold text-gray-800">Selamat datang, {{ session('username') }}</h1>
                @endif
                <p class="text-gray-500">Dashboard Furnipark</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="text-red-600 hover:underline text-sm">Logout</button>
            </form>
        </div>

        {{-- Dashboard Menu --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            
            {{-- Show 'Manajemen Pesanan' only for Cashier --}}
            @if(session('role') == 'cashier')
                <a href="http://127.0.0.1:8000/orders" class="p-5 bg-white shadow-md rounded-xl hover:shadow-lg transition group">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-yellow-100 rounded-full text-yellow-600 text-2xl">
                            🛒
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 group-hover:text-yellow-700">Manajemen Pesanan</h3>
                            <p class="text-sm text-gray-500">Kelola & pantau pesanan pelanggan</p>
                        </div>
                    </div>
                </a>
            @endif

            {{-- Show 'Manajemen Diskon' only for Admin --}}
            @if(session('role') == 'admin')
                <a href="http://127.0.0.1:8000/discounts" class="p-5 bg-white shadow-md rounded-xl hover:shadow-lg transition group">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-pink-100 rounded-full text-pink-600 text-2xl">
                            💰
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 group-hover:text-pink-700">Manajemen Diskon</h3>
                            <p class="text-sm text-gray-500">Atur promo & diskon produk</p>
                        </div>
                    </div>
                </a>
            @endif

            {{-- Show 'Manajemen Produk' only for Admin --}}
            @if(session('role') == 'admin')
                <a href="http://127.0.0.1:8000/products" class="p-5 bg-white shadow-md rounded-xl hover:shadow-lg transition group">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-green-100 rounded-full text-green-600 text-2xl">
                            🪑
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 group-hover:text-green-700">Manajemen Produk</h3>
                            <p class="text-sm text-gray-500">Tambah & kelola produk furnitur</p>
                        </div>
                    </div>
                </a>
            @endif

            {{-- Show 'Laporan Penjualan' for Cashier and Owner --}}
            @if(session('role') == 'cashier' || session('role') == 'owner')
                <a href="http://127.0.0.1:8000/laporan-penjualan" class="p-5 bg-white shadow-md rounded-xl hover:shadow-lg transition group">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-blue-100 rounded-full text-blue-600 text-2xl">
                            📊
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-700">Laporan Penjualan</h3>
                            <p class="text-sm text-gray-500">Lihat laporan & statistik penjualan</p>
                        </div>
                    </div>
                </a>
            @endif

            {{-- Show 'Kontak & Feedback' only for Owner --}}
            @if(session('role') == 'owner')
                <a href="http://127.0.0.1:8000/contacts" class="p-5 bg-white shadow-md rounded-xl hover:shadow-lg transition group">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-purple-100 rounded-full text-purple-600 text-2xl">
                            📞
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 group-hover:text-purple-700">Kontak & Feedback</h3>
                            <p class="text-sm text-gray-500">Tanggapi saran & masukan pelanggan</p>
                        </div>
                    </div>
                </a>
            @endif

            {{-- Show 'Manajemen Pengguna' for Admin and Owner --}}
            @if(session('role') == 'admin' || session('role') == 'owner')
                <a href="http://127.0.0.1:8000/users" class="p-5 bg-white shadow-md rounded-xl hover:shadow-lg transition group">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-blue-100 rounded-full text-blue-600 text-2xl">
                            👥
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-700">Manajemen Pengguna</h3>
                            <p class="text-sm text-gray-500">Kelola data pengguna dan peran</p>
                        </div>
                    </div>
                </a>
            @endif
        </div>

        {{-- Bagian Pesanan --}}
        <div x-data="orders()" x-init="fetchOrders()" class="bg-white p-6 rounded-xl shadow-md">
            <template x-if="loading">
                <div class="flex items-center justify-center py-12">
                    <svg class="animate-spin h-8 w-8 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                    </svg>
                </div>
            </template>

            <template x-if="!loading && orders.length === 0">
                <p class="text-center text-gray-500 py-8">Anda belum memiliki pesanan.</p>
            </template>

            <template x-if="!loading && orders.length > 0">
                <div class="grid md:grid-cols-2 gap-6">
                    <template x-for="order in orders" :key="order.id">
                        <div class="border border-gray-200 rounded-lg p-5 hover:shadow-md transition bg-gray-50">
                            <div class="flex justify-between items-start mb-3">
                                <h3 class="text-lg font-semibold text-gray-800" x-text="order.nama_produk"></h3>
                                <span 
                                    class="px-2 py-1 rounded-full text-xs font-semibold"
                                    :class="{
                                        'bg-yellow-100 text-yellow-700': order.status_pesanan === 'processed',
                                        'bg-blue-100 text-blue-700': order.status_pesanan === 'packaged',
                                        'bg-purple-100 text-purple-700': order.status_pesanan === 'shipped',
                                        'bg-green-100 text-green-700': order.status_pesanan === 'delivered'
                                    }"
                                    x-text="statusMap[order.status_pesanan] || order.status_pesanan">
                                </span>
                            </div>

                            <div class="text-sm text-gray-600 space-y-1">
                                <p><strong>Harga:</strong> Rp <span x-text="formatHarga(order.harga)"></span></p>
                                <p><strong>Waktu:</strong> <span x-text="formatWaktu(order.waktu_pembelian)"></span></p>
                                <template x-if="order.no_resi">
                                    <p><strong>Nomor Resi:</strong> <span x-text="order.no_resi"></span></p>
                                </template>
                                <p><strong>Kurir:</strong> <span x-text="order.shipping_info"></span></p>
                            </div>
                        </div>
                    </template>
                </div>
            </template>
        </div>

    @else
        <div class="text-center py-16">
            <h2 class="text-xl text-gray-700">Silakan <a href="{{ route('login') }}" class="text-blue-600 underline">login</a> untuk melihat profil Anda.</h2>
        </div>
    @endif
</div>

<script>
    function orders() {
        return {
            orders: [],
            loading: true,
            statusMap: {
                'processed': 'Diproses',
                'packaged': 'Dikemas',
                'shipped': 'Dikirim',
                'delivered': 'Diterima',
            },
            fetchOrders() {
                const username = "{{ session('username') }}";
                fetch('http://127.0.0.1:8080/api/orders/')
                    .then(res => res.json())
                    .then(data => {
                        this.orders = data.filter(order => order.nama === username);
                        this.loading = false;
                    })
                    .catch(error => {
                        console.error("Gagal mengambil data:", error);
                        this.loading = false;
                    });
            },
            formatWaktu(datetime) {
                const date = new Date(datetime);
                return date.toLocaleString('id-ID');
            },
            formatHarga(harga) {
                return parseInt(harga).toLocaleString('id-ID');
            }
        };
    }
</script>
@endsection
