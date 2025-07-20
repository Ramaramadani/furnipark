<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register Page</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Tailwind CSS -->
    <style>
        /* CSS untuk mengatur latar belakang gambar furnitur */
        .bg-image {
            background-image: url('{{ asset('images/furniture_background.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed; /* Agar gambar tetap saat scroll */
        }
    </style>
</head>

<body class="bg-orange-100 min-h-screen flex items-center justify-center bg-image">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Create a New Account</h2>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
        <div class="alert alert-success text-green-600 mb-4">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger text-red-600 mb-4">
            {{ session('error') }}
        </div>
        @endif

        <form id="registerForm" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Username</label>
                <input type="text" name="username" id="username" class="w-full p-3 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="yourusername" required />
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email Address</label>
                <input type="email" name="gmail" id="email" class="w-full p-3 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="you@example.com" required />
            </div>
            <div class="mb-4">
                <label for="kontak" class="block text-gray-700">Contact</label>
                <input type="text" name="kontak" id="kontak" class="w-full p-3 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="08123456789" required />
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="w-full p-3 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="********" required />
            </div>
            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full p-3 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="********" required />
            </div>
            <button type="submit" class="w-full bg-orange-600 text-white py-3 rounded-full hover:bg-orange-700 transition duration-200">
                Register
            </button>

            <!-- Registration Error -->
            @if($errors->has('register'))
            <div class="text-red-600 mt-4">{{ $errors->first('register') }}</div>
            @endif
        </form>

        <div class="mt-6 text-center">
            <p class="text-gray-700">Already have an account? <a href="{{ route('login') }}" class="text-orange-600 hover:text-orange-700">Login here</a></p>
        </div>
    </div>
</body>

</html>
