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
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
  }

  .product-card img {
    width: 100%;
    height: 200px;
    object-fit: contain;
    transition: transform 0.3s ease-in-out;
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

  .add-to-discount-btn {
    background-color: #28a745;
    color: white;
    padding: 8px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    display: inline-block;
    text-align: center;
    transition: background-color 0.3s;
  }

  .add-to-discount-btn:hover {
    background-color: #218838;
  }
</style>

<h2 style="margin-left: 20px;">Tambah Produk ke Diskon</h2>

<form id="discount-form">
  <div class="form-group">
    <label for="product">Pilih Produk:</label>
    <select id="product" name="product" class="form-control">
      <!-- Produk akan dimuat menggunakan data dari server -->
    </select>
  </div>

  <div class="form-group">
    <label for="discount-price">Harga Diskon:</label>
    <input type="number" id="discount-price" name="discount-price" class="form-control" placeholder="Masukkan harga diskon" required>
  </div>

  <button type="submit" class="add-to-discount-btn">Tambah ke Diskon</button>
</form>

<div class="slider-container">
  <button class="arrow arrow-left" onclick="moveSlide(-1)">&#10094;</button>

  <div class="slider-wrapper" id="sliderWrapper">
    <!-- Produk diskon yang diambil dari API akan dimuat di sini -->
  </div>

  <button class="arrow arrow-right" onclick="moveSlide(1)">&#10095;</button>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  // Mengirim data produk dari Laravel ke JavaScript
  const products = @json($products);  // Menggunakan Blade untuk mengirim data produk ke JavaScript

  // Memuat produk ke dropdown
  const productSelect = document.getElementById('product');
  products.forEach(product => {
    const option = document.createElement('option');
    option.value = product.id;
    option.textContent = `${product.nama_produk} - Rp ${product.harga}`;
    productSelect.appendChild(option);
  });

  // Menangani pengiriman form untuk menambahkan diskon
  document.getElementById('discount-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const productId = document.getElementById('product').value;
    const discountPrice = document.getElementById('discount-price').value;

    if (discountPrice <= 0) {
        alert("Harga diskon harus lebih besar dari 0.");
        return;
    }

    axios.post(`http://127.0.0.1:8080/api/products/${productId}/add_to_discount/`, {
      discount_price: discountPrice
    })
    .then(response => {
      alert('Produk berhasil ditambahkan ke diskon');
      fetchDiscountProducts();
    })
    .catch(error => {
      console.error("Error saat menambahkan produk ke diskon:", error);
      alert('Terjadi kesalahan saat menambahkan produk ke diskon');
    });
  });

  // Mengambil produk diskon dan menampilkannya di slider
  function fetchDiscountProducts() {
    axios.get('http://127.0.0.1:8080/api/discounts/')
      .then(response => {
        const products = response.data;
        const wrapper = document.getElementById('sliderWrapper');
        wrapper.innerHTML = '';  // Kosongkan slider sebelum menambahkan produk baru

        products.forEach((product) => {
          const productCard = document.createElement('div');
          productCard.classList.add('product-card');
          
          // Menampilkan gambar produk dengan path yang benar
          productCard.innerHTML = `
  <img src="http://127.0.0.1:8000/images/${product.gambar}" alt="${product.nama_produk}" class="w-full h-40 object-contain mb-3">
  <p class="price-now">Rp ${new Intl.NumberFormat().format(product.harga_diskon)}</p>
  <p class="price-old">Rp ${new Intl.NumberFormat().format(product.harga)}</p>
  <p>${product.nama_produk}</p>
`;


          wrapper.appendChild(productCard);
        });
      })
      .catch(error => {
        console.error('Terjadi kesalahan:', error);
        alert('Gagal mengambil data produk diskon');
      });
  }

  // Panggil fungsi untuk memuat produk diskon saat halaman dimuat
  fetchDiscountProducts();

  // Fungsi untuk navigasi slider (geser kiri/kanan)
  function moveSlide(direction) {
    const wrapper = document.getElementById('sliderWrapper');
    const cards = wrapper.children;
    const cardWidth = cards[0]?.offsetWidth || 0;
    const totalCards = cards.length;
    const maxOffset = cardWidth * totalCards;

    let currentOffset = 0;
    currentOffset += direction * cardWidth;

    if (currentOffset < 0) {
      currentOffset = (totalCards - 4) * cardWidth;
    } else if (currentOffset > (totalCards - 4) * cardWidth) {
      currentOffset = 0;
    }

    wrapper.style.transform = `translateX(-${currentOffset}px)`;
  }
</script>

@endsection
