@extends('layouts.app')

@section('content')
    @php
        $products = [
            ['name' => 'Meja anak minimalis', 'price' => 600000, 'image' => 'meja-anak.JFIF'],
            ['name' => 'Meja minimalis', 'price' => 300000, 'image' => 'meja-minimalis.JFIF'],
            ['name' => 'Kursi Kantor Black', 'price' => 850000, 'image' => 'kursi-black.JFIF'],
            ['name' => 'Kursi Kantor White', 'price' => 900000, 'image' => 'kursi-white.JFIF'],
            ['name' => 'Sofa Minimalis Grey', 'price' => 1500000, 'image' => 'sofa-grey.JFIF'],
            ['name' => 'Sofa Minimalis Brown', 'price' => 2000000, 'image' => 'sofa-brown.JFIF'],
            ['name' => 'Lampu Tidur White', 'price' => 600000, 'image' => 'lampu-white.JFIF'],
            ['name' => 'Lampu Tidur Dark Blue', 'price' => 600000, 'image' => 'lampu-blue.JFIF'],
            ['name' => 'Kasur Besar Grey', 'price' => 6000000, 'image' => 'kasur-grey.JFIF'],
            ['name' => 'Kasur Besar Brown', 'price' => 600000, 'image' => 'kasur-brown.JFIF'],
        ];
    @endphp

    <x-product-grid :products="$products" />
@endsection
