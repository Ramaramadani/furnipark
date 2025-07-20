<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelance Impianmu</title>
    @vite('resources/css/app.css')
    <style>
        /* CSS untuk mengatur latar belakang gambar */
        .bg-image {
            background-image: url('{{ asset('images/landing_page.JPEG') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-orange-100 to-orange-300 min-h-screen bg-image flex items-center justify-center">
    <div class="w-full max-w-6xl px-8 py-16 md:py-20 flex flex-col md:flex-row items-center justify-between text-center md:text-left bg-white bg-opacity-70 rounded-lg shadow-lg">
        <!-- Teks Konten -->
        <div class="space-y-6 max-w-lg">
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900">
                Halo 👋, selamat datang di <span class="text-orange-600">Furnipark</span><br>
                <span class="text-gray-700">Temukan berbagai furnitur berkualitas untuk mempercantik rumahmu.</span>
            </h1>
            <!-- Tombol Daftar dan Login di samping -->
            <div class="flex justify-center md:justify-start space-x-6">
                <a href="/register" class="bg-orange-600 text-white px-6 py-3 rounded-full hover:bg-orange-700 transition transform hover:scale-105">Daftar</a>
                <a href="/login" class="border border-orange-500 text-orange-700 px-6 py-3 rounded-full hover:bg-orange-100 transition transform hover:scale-105">Login</a>
            </div>
        </div>
        <!-- Gambar -->
        <div class="mt-8 md:mt-0">
            <img src="{{ asset('images/landing_page.JPEG') }}" alt="landing_page" class="w-full max-w-xs md:max-w-sm rounded-lg shadow-xl">
        </div>
    </div>
</body>
</html>
