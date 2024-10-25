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
    protected $fillable = ['nama_produk','id_warna','harga'];

    public function warna()
    {
        return $this->belongsTo(Warna::class,'id_warna', 'id_warna'); // banyak produk memiliki banyak warna
    }
}
