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
    flex: 0 0 25%; /* 4 per layar */
    box-sizing: border-box;
    padding: 10px;
    text-align: center;
  }

  .product-card img {
    width: 100%;
    height: 200px;
    object-fit: contain;
  }

  .price-now {
    font-weight: bold;
    margin: 5px 0;
  }

  .price-old {
    text-decoration: line-through;
    color: gray;
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

<h2 style="margin-left: 20px;">Produk Diskon</h2>

<div class="slider-container">
  <button class="arrow arrow-left" onclick="moveSlide(-1)">&#10094;</button>

  <div class="slider-wrapper" id="sliderWrapper">
    @php
      $products = [
        ['img' => 'meja-anak.jfif', 'now' => 'Rp300.000', 'old' => 'Rp400.000', 'name' => 'Meja minimalis M-01'],
        ['img' => 'lampu-white.jfif', 'now' => 'Rp350.000', 'old' => 'Rp450.000', 'name' => 'Lampu tidur L-01'],
        ['img' => 'kursi-black.jfif', 'now' => 'Rp3.000.000', 'old' => 'Rp4.000.000', 'name' => 'Kasur tunggal K-01'],
        ['img' => 'sofa-grey.jfif', 'now' => 'Rp800.000', 'old' => 'Rp900.000', 'name' => 'Sofa L-01'],
        ['img' => 'sofa-brown.jfif', 'now' => 'Rp800.000', 'old' => 'Rp900.000', 'name' => 'Sofa L-02'],
        ['img' => 'meja-anak.jfif', 'now' => 'Rp300.000', 'old' => 'Rp400.000', 'name' => 'Meja M-02'],
        ['img' => 'lampu-white.jfif', 'now' => 'Rp350.000', 'old' => 'Rp450.000', 'name' => 'Lampu L-02'],
      ];
    @endphp

    @foreach ($products as $product)
      <div class="product-card">
        <img src="{{ asset('images/' . $product['img']) }}" alt="{{ $product['name'] }}">
        <p class="price-now">{{ $product['now'] }}</p>
        <p class="price-old">{{ $product['old'] }}</p>
        <p>{{ $product['name'] }}</p>
      </div>
    @endforeach
  </div>

  <button class="arrow arrow-right" onclick="moveSlide(1)">&#10095;</button>
</div>

<script>
  const wrapper = document.getElementById('sliderWrapper');
  const cards = wrapper.children;
  const cardWidth = cards[0].offsetWidth;
  let currentOffset = 0;

  function moveSlide(direction) {
    const totalCards = cards.length;
    const maxOffset = cardWidth * totalCards;

    currentOffset += direction * cardWidth;

    // Looping
    if (currentOffset < 0) {
      currentOffset = (totalCards - 4) * cardWidth;
    } else if (currentOffset > (totalCards - 4) * cardWidth) {
      currentOffset = 0;
    }

    wrapper.style.transform = `translateX(-${currentOffset}px)`;
  }

  // Fix resizing layout bug
  window.addEventListener('resize', () => {
    currentOffset = 0;
    wrapper.style.transform = `translateX(0px)`;
  });
</script>
@endsection
