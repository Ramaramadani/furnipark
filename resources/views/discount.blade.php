@extends('layouts.app')

@section('content')
<style>
  .slider-container {
    position: relative;
    overflow: hidden;
    margin: 20px;
  }

  .slider-wrapper {
    display: flex;
    transition: transform 0.5s ease-in-out;
  }

  .product-card {
    flex: 0 0 25%;
    box-sizing: border-box;
    padding: 10px;
    text-align: center;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    margin: 5px;
    transition: transform 0.3s;
  }

  .product-card:hover {
    transform: translateY(-5px);
  }

  .product-card img {
    width: 100%;
    height: 200px;
    object-fit: contain;
    border-radius: 4px;
  }

  .price-now {
    font-weight: bold;
    color: #f97316; /* orange */
    margin: 5px 0;
  }

  .price-old {
    text-decoration: line-through;
    color: gray;
    font-size: 0.9em;
  }

  .arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: white;
    border: none;
    font-size: 24px;
    padding: 5px 10px;
    cursor: pointer;
    z-index: 1;
    box-shadow: 0 0 4px rgba(0,0,0,0.2);
    border-radius: 50%;
  }

  .arrow-left {
    left: 0;
  }

  .arrow-right {
    right: 0;
  }

  @media (max-width: 768px) {
    .product-card {
      flex: 0 0 50%;
    }
  }

  @media (max-width: 480px) {
    .product-card {
      flex: 0 0 100%;
    }
  }
</style>

<h2 class="text-2xl font-bold text-orange-500 ml-5 mb-4">Produk Diskon</h2>

<div class="slider-container">
  <button class="arrow arrow-left" onclick="moveSlide(-1)">&#10094;</button>

  <div class="slider-wrapper" id="sliderWrapper">
    <!-- Produk diskon akan dimuat di sini -->
  </div>

  <button class="arrow arrow-right" onclick="moveSlide(1)">&#10095;</button>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  let currentOffset = 0;

  function fetchDiscountProducts() {
    axios.get('http://127.0.0.1:8080/api/discounts/')
      .then(response => {
        const products = response.data;
        const wrapper = document.getElementById('sliderWrapper');
        wrapper.innerHTML = '';

        products.forEach(product => {
          const card = document.createElement('div');
          card.classList.add('product-card');
          card.innerHTML = `
            <img src="${product.gambar}" alt="${product.nama_produk}">
            <p class="price-now">Rp ${new Intl.NumberFormat().format(product.harga_diskon)}</p>
            <p class="price-old">Rp ${new Intl.NumberFormat().format(product.harga)}</p>
            <p>${product.nama_produk}</p>
          `;
          wrapper.appendChild(card);
        });

        currentOffset = 0;
        wrapper.style.transform = translateX(0px);
      })
      .catch(error => {
        console.error('Gagal mengambil data:', error);
        alert('Gagal mengambil data produk diskon');
      });
  }

  function moveSlide(direction) {
    const wrapper = document.getElementById('sliderWrapper');
    const card = wrapper.querySelector('.product-card');
    if (!card) return;

    const cardWidth = card.offsetWidth;
    const visibleCards = Math.floor(wrapper.parentElement.offsetWidth / cardWidth);
    const totalCards = wrapper.children.length;
    const maxOffset = (totalCards - visibleCards) * cardWidth;

    currentOffset += direction * cardWidth;

    if (currentOffset < 0) currentOffset = maxOffset;
    if (currentOffset > maxOffset) currentOffset = 0;

    wrapper.style.transform = translateX(-${currentOffset}px);
  }

  fetchDiscountProducts();
</script>

@endsection
