@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4">
    @if(session('is_logged_in'))
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Selamat datang, {{ session('username') }} 👋</h1>
                <p class="text-gray-500">Berikut adalah status pesanan Anda</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="text-red-600 hover:underline text-sm">Logout</button>
            </form>
        </div>

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
