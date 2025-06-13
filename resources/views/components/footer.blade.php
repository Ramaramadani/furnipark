<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Responsive Footer Furnipark</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-white text-black">

  <footer class="border-t border-gray-300 py-4 px-6 flex flex-wrap items-center justify-between max-w-screen-xl mx-auto">
    <div class="footer-logo flex items-center h-12">
      <!-- Using Laravel's asset() helper to link to the logo.png in public/images -->
      <img src="{{ asset('images/logo.png') }}" 
           alt="Furnipark logo with house and furniture icon in brown and orange colors" 
           class="h-12 w-auto" 
           onerror="this.style.display='none'" />
    </div>

    <div class="footer-text text-sm ml-4">
      © 2008-2025 . All rights reserved
    </div>

    <nav class="footer-links flex gap-6 text-sm flex-wrap">
      <a href="/terms" class="text-black hover:text-orange-500 transition duration-300">Terms</a>
      <a href="/privacy" class="text-black hover:text-orange-500 transition duration-300">Privacy</a>
      <a href="/copyright" class="text-black hover:text-orange-500 transition duration-300">Copyright</a>
      <a href="/imprint" class="text-black hover:text-orange-500 transition duration-300">Imprint</a>
    </nav>
  </footer>

</body>

</html>
