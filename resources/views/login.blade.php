<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Page</title>
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
      <h2 class="text-3xl font-bold text-gray-800">Login to Your Account</h2>
    </div>

    <!-- Menampilkan pesan sukses jika login berhasil -->
    @if(session('success'))
      <div class="alert alert-success text-green-600 mb-4">
        {{ session('success') }}
      </div>
    @endif

    <!-- Menampilkan pesan error jika login gagal -->
    @if(session('error'))
      <div class="alert alert-danger text-red-600 mb-4">
        {{ session('error') }}
      </div>
    @endif

    <form id="loginForm" method="POST" action="{{ route('login') }}">
      @csrf
      <div class="mb-4">
        <label for="username" class="block text-gray-700">Username</label>
        <input type="text" name="username" id="username" class="w-full p-3 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="yourusername" required />
      </div>
      <div class="mb-6">
        <label for="password" class="block text-gray-700">Password</label>
        <input type="password" name="password" id="password" class="w-full p-3 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="" required />
      </div>
      <button type="submit" class="w-full bg-orange-600 text-white py-3 rounded-full hover:bg-orange-700 transition duration-200">Login</button>
      
      <!-- Pesan sukses setelah register -->
      @if(session('success'))
        <div class="text-green-600 mt-4">{{ session('success') }}</div>
      @endif

      <!-- Pesan error jika login gagal -->
      @if($errors->has('login'))
        <div class="text-red-600 mt-4">{{ $errors->first('login') }}</div>
      @endif
    </form>

    <div class="mt-6 text-center">
      <p class="text-gray-700">Don't have an account? <a href="{{ route('register') }}" class="text-orange-600 hover:text-orange-700">Sign up here</a></p>
    </div>
  </div>
