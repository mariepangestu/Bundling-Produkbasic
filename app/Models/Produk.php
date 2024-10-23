<?php

namespace App\Models;

use App\Models\Warna;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_produk';
    protected $table ='produks';
    protected $fillable = ['nama_produk','warna'];

    // public function warnas()
    // {
    //     return $this->hasMany(Warna::class); // Satu produk memiliki banyak warna
    // }
}
