@extends('layouts.app')

@section('content')
<div class="flex justify-center bg-white py-10 min-h-screen">
    <div class="flex w-full max-w-6xl gap-12">
        <!-- Sidebar -->
        <aside class="w-1/4">
            <ul class="space-y-6 text-lg font-semibold">
                <li class="text-black">ACCOUNT</li>
                <li class="hover:text-orange-500 cursor-pointer font-normal">SETTING</li>
                <li class="hover:text-orange-500 cursor-pointer font-normal">MEMBER</li>
                <li class="hover:text-red-500 cursor-pointer font-normal">LOG OUT</li>
            </ul>
        </aside>

        <!-- Main Content -->
        <section class="w-3/4 space-y-6">
            <!-- Profile Box -->
            <div class="flex items-center border border-gray-300 rounded-md p-4 bg-white shadow-sm">
                <img src="{{ asset('image/3f7440e7-898b-4d83-8af7-8a01c9f7c7a9.png') }}" alt="Profile Icon" class="w-10 h-10 mr-4">
                <div>
                    <p class="font-bold">Name</p>
                    <p class="text-gray-600 text-sm">Email, Number</p>
                </div>
            </div>

            <!-- Address Box -->
            <div class="border border-gray-300 rounded-md p-4 bg-white shadow-sm">
                <p class="font-bold mb-1">Address</p>
                <p class="text-gray-600 text-sm">+Address</p>
            </div>

            <!-- Orders Box -->
            <div class="border border-gray-300 rounded-md p-4 bg-white shadow-sm h-40">
                <p class="font-bold">Your Orders</p>
            </div>
        </section>
    </div>
</div>
@endsection
