<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Furnipark</title>
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900">

    <x-header />

    <main class="min-h-screen py-6">
        @yield('content')
    </main>

    <x-footer />

</body>
</html>