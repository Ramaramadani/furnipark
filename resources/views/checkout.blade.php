@extends('layouts.app') <!-- Extend app.blade.php layout -->

@section('content') <!-- Content section that will be inserted in the main content area -->

<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>Checkout Info</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body>
  <div class="max-w-5xl mx-auto p-4 flex flex-col md:flex-row md:justify-between md:items-start gap-6">
   <!-- Left side: Checkout and Shipping Info -->
   <div class="flex-1">
    <!-- Checkout Info -->
    <div class="mb-6">
     <h2 class="font-bold text-base mb-2">
      CHECKOUT INFO
     </h2>
     <form class="flex flex-col md:flex-row md:space-x-8">
      <div class="flex flex-col mb-4 md:mb-0">
       <label class="mb-1 text-sm" for="name">
        Name
       </label>
       <input class="border border-gray-300 px-2 py-1 w-64 max-w-full" id="name" name="name" type="text"/>
      </div>
      <div class="flex flex-col">
       <label class="mb-1 text-sm" for="email">
        Email
       </label>
       <input class="border border-gray-300 px-2 py-1 w-64 max-w-full" id="email" name="email" type="email"/>
      </div>
     </form>
    </div>
    <!-- Shipping Info -->
    <div>
     <h2 class="font-bold text-base mb-2">
      SHIPPING INFO
     </h2>
     <form class="flex flex-wrap gap-4">
      <label class="flex flex-col items-center border border-gray-300 px-4 py-2 cursor-pointer w-32 text-center">
       <input class="mb-1" name="shipping" type="radio" value="jnt"/>
       <span class="text-sm">
        JNT Delivery
       </span>
       <span class="text-xs">
        3 - 4 hari
       </span>
      </label>
      <label class="flex flex-col items-center border border-gray-300 px-4 py-2 cursor-pointer w-32 text-center">
       <input class="mb-1" name="shipping" type="radio" value="cargo"/>
       <span class="text-sm text-gray-700">
        Cargo
       </span>
       <span class="text-xs text-gray-400">
        7 - 12 Hari
       </span>
      </label>
      <label class="flex flex-col items-center border border-gray-300 px-4 py-2 cursor-pointer w-32 text-center">
       <input class="mb-1" name="shipping" type="radio" value="selfpickup"/>
       <span class="text-sm">
        Self Pick-up
       </span>
       <span class="text-xs text-gray-400">
        Come to our shop
       </span>
      </label>
     </form>
    </div>
    <!-- Buttons -->
    <div class="mt-6 flex space-x-4">
     <button class="bg-orange-600 text-black px-4 py-1 text-sm" type="button">
      CANCEL
     </button>
     <button class="bg-orange-600 text-black px-4 py-1 text-sm" type="submit">
      BUY
     </button>
    </div>
   </div>
   <!-- Right side: Summary and Items in Cart -->
   <div class="w-full md:w-80">
    <div class="mb-4">
     <h2 class="font-bold text-base mb-2">
      SUMMARY
     </h2>
     <div class="text-sm leading-tight">
      <p>
       Total price: RP.600.000
      </p>
      <p>
       Discount: - 
      </p>
      <p>
       Shipping Cost: RP.35.000
      </p>
      <hr class="my-1 border-t border-gray-400"/>
      <p>
       Total price: 
      </p>
      <p>
       RP.635.000
      </p>
     </div>
    </div>
    <div>
     <h2 class="font-bold text-base mb-2">
      ITEMS IN CART
     </h2>
     <div class="flex items-start gap-3">
      <img alt="Small wooden minimalist child's desk with light wood finish" class="w-20 h-20 object-contain" height="80" src="https://storage.googleapis.com/a1aa/image/0d3a5aa9-cf4c-4562-9fbb-f843048c488d.jpg" width="80"/>
      <div>
       <p class="font-bold text-base leading-none">
        RP. 600.000
       </p>
       <p class="text-sm leading-tight">
        Meja anak minimalis
       </p>
      </div>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>

@endsection <!-- Close content section -->
