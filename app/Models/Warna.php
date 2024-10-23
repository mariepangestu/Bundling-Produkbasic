<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warna extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_warna';
    protected $table ='warnas';
    protected $fillable = ['warna'];

    // public function produk()
    // {
    //     return $this->belongsTo(Produk::class); // Setiap warna milik satu produk
    // }
}
