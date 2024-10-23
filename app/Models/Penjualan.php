<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_penjualan';
    protected $table ='penjualans';
    protected $fillable = ['nama_poduk','warna','jumlah'];
}
