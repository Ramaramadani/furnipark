<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesanan Saya - Shopee</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
  <!-- Header -->
  <header class="bg-orange-500 p-4 text-white flex items-center justify-between">
    <h1 class="text-2xl font-bold">Furnipark</h1>
    <input type="text" placeholder="Cari pesanan..." class="rounded p-2 text-black w-1/3">
  </header>

  <div class="flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-white p-4 border-r">
      <div class="mb-4">
      </div>
      <nav class="space-y-2">
        <a href="#" class="block text-orange-500 font-semibold">Pesanan Saya</a>
        <a href="#" class="block text-gray-700">Akun Saya</a>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
      <div class="flex space-x-4 border-b mb-4">
        <button class="pb-2 border-b-2 border-orange-500 text-orange-500">Semua</button>
        <button class="pb-2 text-gray-600">Belum Bayar</button>
        <button class="pb-2 text-gray-600">Dikirim</button>
        <button class="pb-2 text-gray-600">Selesai</button>
        <button class="pb-2 text-gray-600">Dibatalkan</button>
      </div>

      <!-- Card 1 -->
      <div class="bg-white rounded shadow p-4 mb-4">
        <div class="flex justify-between items-center">
          <span class="text-sm text-gray-500">bagusmedia</span>
          <span class="text-green-600 font-semibold">SELESAI</span>
        </div>
        <div class="flex items-center mt-2">
          <img src="https://via.placeholder.com/60" alt="Produk" class="w-16 h-16 border">
          <div class="ml-4">
            <p class="font-semibold text-sm">Lampu Biru</p>
            <p class="text-gray-500 text-sm">Stok: 15</p>
          </div>
        </div>
        <div class="text-right mt-2">
          <p class="text-gray-700">Total Pesanan: <span class="font-semibold">Rp100.000</span></p>
          <button class="bg-orange-500 text-white px-4 py-1 rounded mt-2">Pesanan Selesai</button>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="bg-white rounded shadow p-4">
        <div class="flex justify-between items-center">
          <span class="text-sm text-gray-500">difamulti</span>
          <span class="text-green-600 font-semibold">SELESAI</span>
        </div>
        <div class="flex items-center mt-2">
          <img src="https://via.placeholder.com/60" alt="Produk" class="w-16 h-16 border">
          <div class="ml-4">
            <p class="font-semibold text-sm">Meja Belajar</p>
            <p class="text-gray-500 text-sm">Stok: 5</p>
          </div>
        </div>
        <div class="text-right mt-2">
          <p class="text-gray-700">Total Pesanan: <span class="font-semibold">Rp500.000</span></p>
          <button class="bg-orange-500 text-white px-4 py-1 rounded mt-2">Pesanan Selesai</button>
        </div>
      </div>
    </main>
  </div>
</body>
</html>