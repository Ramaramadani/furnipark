@extends('layouts.app')

@section('content')
<div class="container mx-auto my-12 flex flex-wrap justify-center">
  <section class="contact-form w-full lg:w-3/5 p-8 bg-white rounded-xl shadow-lg">
    <h2 class="text-3xl font-bold mb-6">Contact Us - Furnipark</h2>
    <form id="contactForm" class="space-y-6">
      @csrf {{-- Laravel CSRF protection --}}
      <div>
        <label for="fullName" class="block text-sm font-semibold text-gray-600">Full Name</label>
        <input type="text" id="fullName" name="fullName" placeholder="Your Name" autocomplete="name" required
          class="w-full p-4 border border-gray-300 rounded-lg text-gray-800 bg-gray-200 focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500">
      </div>

      <div>
        <label for="emailAddress" class="block text-sm font-semibold text-gray-600">Email Address</label>
        <input type="email" id="emailAddress" name="emailAddress" placeholder="Your Email" autocomplete="email" required
          class="w-full p-4 border border-gray-300 rounded-lg text-gray-800 bg-gray-200 focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500">
      </div>

      <div>
        <label for="message" class="block text-sm font-semibold text-gray-600">Message</label>
        <textarea id="message" name="message" placeholder="Your Message" required
          class="w-full p-4 border border-gray-300 rounded-lg text-gray-800 bg-gray-200 focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 resize-y min-h-[150px] max-h-[300px]"></textarea>
      </div>

      <button type="submit"
        class="mt-6 w-full py-3 bg-orange-500 text-white font-bold rounded-lg transition-all hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
        Send Message
      </button>

      <p id="responseMessage" class="mt-4 text-center text-sm font-semibold"></p>
    </form>
  </section>

  <!-- Google Map Embed -->
  <aside class="map-container w-full lg:w-2/5 mt-8 lg:mt-0">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d73442.38548689148!2d103.95217443218095!3d1.1328093073428955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d9890417b5dfdf%3A0x59a4ed4e809899d6!2sMitra10%20Batam!5e0!3m2!1sid!2sid!4v1751290418649!5m2!1sid!2sid"
      class="w-full h-96 rounded-lg border-0" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"></iframe>
  </aside>
</div>

<!-- Bottom Contact Info -->
<section class="bottom-info w-full mt-12 bg-white p-6 rounded-lg shadow-lg flex flex-wrap gap-6 justify-center">
  <!-- Address -->
  <div class="info-item text-center flex-1 max-w-[220px]">
    <div class="info-icon bg-orange-500 w-10 h-10 rounded-full flex items-center justify-center mb-4">
      <svg viewBox="0 0 24 24" class="fill-white w-5 h-5">
        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 11.001-5.001A2.5 2.5 0 0112 11.5z"/>
      </svg>
    </div>
    <strong>Address:</strong><br />
    Jl. Raja H. Fisabilillah No.31, Tlk. Tering, Kec. Batam Kota, Kota Batam, Kepulauan Riau 29444
  </div>

  <!-- Phone -->
  <div class="info-item text-center flex-1 max-w-[220px]">
    <div class="info-icon bg-orange-500 w-10 h-10 rounded-full flex items-center justify-center mb-4">
      <svg viewBox="0 0 24 24" class="fill-white w-5 h-5">
        <path d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.11-.21c1.21.5 2.53.77 3.88.77a1 1 0 011 1v3.5a1 1 0 01-1 1A17 17 0 013 6a1 1 0 011-1h3.5a1 1 0 011 1c0 1.35.27 2.67.77 3.88a1 1 0 01-.21 1.11l-2.2 2.2z"/>
      </svg>
    </div>
    <strong>Phone:</strong><br />
    <a href="tel:+1235235598" class="text-orange-500 hover:underline">+ 1235 2355 98</a>
  </div>

  <!-- Email -->
  <div class="info-item text-center flex-1 max-w-[220px]">
    <div class="info-icon bg-orange-500 w-10 h-10 rounded-full flex items-center justify-center mb-4">
      <svg viewBox="0 0 24 24" class="fill-white w-5 h-5">
        <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
      </svg>
    </div>
    <strong>Email:</strong><br />
    <a href="mailto:info@furnipark.com" class="text-orange-500 hover:underline">info@furnipark.com</a>
  </div>

  <!-- Website -->
  <div class="info-item text-center flex-1 max-w-[220px]">
    <div class="info-icon bg-orange-500 w-10 h-10 rounded-full flex items-center justify-center mb-4">
      <svg viewBox="0 0 24 24" class="fill-white w-5 h-5">
        <path d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 3a7 7 0 017 7h-2a5 5 0 10-5 5v2a7 7 0 010-14z"/>
      </svg>
    </div>
    <strong>Website:</strong><br />
    <a href="https://furnipark.com" target="_blank" rel="noopener" class="text-orange-500 hover:underline">furnipark.com</a>
  </div>
</section>

<script>
document.getElementById('contactForm').addEventListener('submit', async function (e) {
  e.preventDefault();

  const fullName = document.getElementById('fullName').value;
  const emailAddress = document.getElementById('emailAddress').value;
  const message = document.getElementById('message').value;
  const responseEl = document.getElementById('responseMessage');

  try {
    const response = await fetch('http://127.0.0.1:8080/api/contact/', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        // Jika perlu token:
        // 'Authorization': 'Bearer <your-token>'
      },
      body: JSON.stringify({
        nama: fullName,
        email: emailAddress,
        saran: message
      })
    });

    if (response.ok) {
      responseEl.innerText = 'Pesan berhasil dikirim!';
      responseEl.classList.remove('text-red-500');
      responseEl.classList.add('text-green-500');
      document.getElementById('contactForm').reset();
    } else {
      const errorData = await response.json();
      responseEl.innerText = 'Gagal mengirim pesan: ' + (errorData.detail || 'Terjadi kesalahan.');
      responseEl.classList.remove('text-green-500');
      responseEl.classList.add('text-red-500');
    }
  } catch (error) {
    responseEl.innerText = 'Terjadi kesalahan jaringan.';
    responseEl.classList.remove('text-green-500');
    responseEl.classList.add('text-red-500');
  }
});
</script>
@endsection
