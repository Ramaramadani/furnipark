<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Furnipark Header</title>
  <!-- Google Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-900 font-sans">
  <header role="banner" class="border-b border-gray-300">
    <div class="container mx-auto px-4">
      <div class="flex items-center justify-between py-3 gap-4 flex-wrap">
        <!-- Left section: Logo and Search -->
        <div class="flex items-center gap-6 flex-grow min-w-0">
          <!-- Logo -->
          <div class="flex items-center gap-2">
            <img src="{{ asset('images/logo.png') }}" alt="FURNIPARK Logo" class="w-24 h-24"> <!-- Logo lebih besar -->
          </div>
          
          <!-- Search Bar -->
          <form action="{{ url('/product/search') }}" method="GET" role="search" class="flex border-2 border-orange-500 rounded-lg overflow-hidden bg-white h-10 flex-grow">
            <input type="search" name="search" placeholder="Search" aria-label="Search furniture products" class="flex-grow px-3 text-sm text-gray-600 border-none focus:outline-none" />
            <div class="flex">
              <button type="submit" class="bg-orange-500 text-white w-12 flex items-center justify-center hover:bg-orange-600">
                <span class="material-icons">search</span>
              </button>
            </div>
          </form>
        </div>

        <!-- Right section: Icons -->
        <div class="flex items-center gap-4">
          <a href="{{ url('/profile') }}" class="border p-2 rounded block">
            <img src="{{ asset('images/account.png') }}" alt="Account" class="w-6 h-6">
          </a>
          <button class="border p-2 rounded bg-white">
            <img src="{{ asset('images/bookmark.png') }}" alt="Bookmark" class="w-6 h-6">
          </button>
          <button class="border p-2 rounded bg-white">
            <img src="{{ asset('images/cart.png') }}" alt="Cart" class="w-6 h-6">
          </button>
        </div>
      </div>

      <!-- Navigation Menu -->
      <nav class="mt-2">
        <ul class="flex gap-8 list-none pl-0 m-0 text-sm font-medium">
          <li>
            <a href="{{ url('/product') }}" class="text-black hover:text-orange-500 {{ Request::is('product') ? 'font-bold' : '' }}">PRODUCT</a>
          </li>
          <li>
            <a href="{{ url('/discount') }}" class="text-black hover:text-orange-500 {{ Request::is('discount') ? 'font-bold' : '' }}">DISCOUNT</a>
          </li>
          <li>
            <a href="{{ url('/about') }}" class="text-black hover:text-orange-500 {{ Request::is('about') ? 'font-bold' : '' }}">ABOUT US</a>
          </li>
          <li>
            <a href="{{ url('/contact') }}" class="text-black hover:text-orange-500 {{ Request::is('contact') ? 'font-bold' : '' }}">CONTACT US</a>
          </li>
        </ul>
      </nav>

    </div>
  </header>
</body>
</html>
