@extends('layouts.app') <!-- Reference to app.blade.php -->

@section('content') <!-- Content section that will be placed inside the main body -->

<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Account Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
</head>
<body class="min-h-screen flex justify-center items-start p-6 bg-white font-sans"> <!-- Centering added -->
  <div class="flex space-x-12 w-full max-w-7xl"> <!-- Add max-width to avoid the content stretching too far -->
    <nav class="flex flex-col space-y-6 text-black text-base font-normal">
      <a href="#" class="no-underline">ACCOUNT</a>
      <a href="#" class="no-underline">SETTING</a>
      <a href="#" class="no-underline">MEMBER</a>
      <a href="#" class="no-underline">LOG OUT</a>
    </nav>
    <section class="flex flex-col space-y-4 w-[320px]">
      <div class="border border-gray-300 p-2 flex items-center space-x-3">
        <div class="w-10 h-10 flex items-center justify-center rounded-full border border-black">
          <i class="fas fa-user text-black text-lg"></i>
        </div>
        <div class="flex flex-col leading-tight">
          <span class="font-bold text-black text-base">Name</span>
          <span class="text-black text-sm">Email, Number</span>
        </div>
      </div>
      <div class="border border-gray-300 p-2">
        <span class="font-bold text-black text-base">Address</span><br />
        <span class="text-black text-sm">+Address</span>
      </div>
      <div class="border border-gray-300 p-2">
        <span class="font-bold text-black text-base">Your Orders</span>
        <div class="mt-1 h-20 border border-gray-300"></div>
      </div>
    </section>
  </div>
</body>
</html>

@endsection <!-- Close content section -->
