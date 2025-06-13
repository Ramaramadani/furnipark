<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Furnipark</title>
    @vite('resources/css/app.css')

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900">

    <x-header />

    <main class="min-h-screen py-6">
        @yield('content')
    </main>

    <x-footer />

</body>
</html>
