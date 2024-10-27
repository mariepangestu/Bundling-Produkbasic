<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_penjualan';
    protected $table = 'penjualans';
    protected $fillable = ['id_produk', 'id_warna','jumlah']; // Tambahkan warna jika perlu

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }

    // Jika Anda ingin mendapatkan warna juga dari penjualan
    public function warna()
    {
        return $this->belongsTo(Warna::class, 'id_warna','id_warna');
    }
}

