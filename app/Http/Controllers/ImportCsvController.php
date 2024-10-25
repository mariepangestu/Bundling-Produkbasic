<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Warna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ImportCsvController extends Controller
{
    //
    // public function import(Request $request)
    // {
    //     // Validasi file upload
    //     $request->validate([
    //         'file' => 'required|mimes:xlsx,csv,xls|max:2048', // Tipe file dan ukuran maksimum
    //     ]);

    //     // Memproses file yang diunggah
    //     try {
    //         Excel::import(new Warna(), $request->file('file')); // Menggunakan class DataImport yang akan kita buat
    //         return Redirect::back()->with('success', 'Data berhasil diimpor!');
    //     } catch (\Exception $e) {
    //         return Redirect::back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    //     }
    // }
}
