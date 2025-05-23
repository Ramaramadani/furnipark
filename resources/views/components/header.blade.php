<!-- resources/views/components/header.blade.php -->
<div class="border-b">
    <div class="flex items-center justify-between px-8 py-4">
        <!-- Logo -->
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/logo.png') }}" alt="FURNIPARK Logo" class="w-12 h-12">
            <span class="text-xl font-bold text-[#9B4808]">
                FURNI<span class="text-[#F7931E]">PARK</span>
            </span>
        </div>

        <!-- Search Bar -->
        <div class="flex-1 mx-8 max-w-2xl flex items-center border border-gray-300">
            <input type="text" placeholder="Search" class="w-full px-4 py-2 focus:outline-none text-gray-700">
            <div class="bg-[#F7931E] px-3 py-2 flex items-center gap-3">
                <img src="{{ asset('images/search.png') }}" alt="Search" class="w-5 h-5">
                <img src="{{ asset('images/filter.png') }}" alt="Filter" class="w-5 h-5">
            </div>
        </div>

        <!-- Icons -->
        <div class="flex items-center gap-4">
        <a href="{{ route('profile') }}" class="border p-2 rounded block">
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
<nav class="flex justify-center gap-8 py-2 text-lg font-medium">
    <a href="{{ route('product') }}" 
       class="{{ Route::is('product') ? 'font-bold underline' : 'hover:underline' }}">
        PRODUCT
    </a>
    <a href="{{ route('discount') }}" 
       class="{{ Route::is('discount') ? 'font-bold underline' : 'hover:underline' }}">
        DISCOUNT
    </a>
    <a href="{{ route('about') }}" 
       class="{{ Route::is('about') ? 'font-bold underline' : 'hover:underline' }}">
        ABOUT US
    </a>
    <a href="{{ route('contact') }}" 
       class="{{ Route::is('contact') ? 'font-bold underline' : 'hover:underline' }}">
        CONTACT US
    </a>
</nav>
</div>
