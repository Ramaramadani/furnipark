<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Definisikan kolom yang dapat diisi
    protected $fillable = ['nama_produk', 'harga', 'gambar', 'stok'];
}
