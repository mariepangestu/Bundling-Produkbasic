<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Http\Requests\StorePenjualanRequest;
use App\Http\Requests\UpdatePenjualanRequest;
use App\Models\Produk;
use App\Models\Warna;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('transaction.index', [
            'penjualans' => Penjualan::with('produk', 'warna')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $produk = Produk::all();
        $warna = Warna::all();
        return view('transaction.create', compact('produk', 'warna'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // dd($request->all());
    $validated = $request->validate([
        'id_produk' => 'required|array',
        'id_produk.*' => 'required|exists:produks,id_produk', // Pastikan setiap id_produk valid
        'id_warna' => 'required|array',
        'id_warna.*' => 'required|exists:warnas,id_warna', // Pastikan setiap id_warna valid
        'jumlah' => 'required|array',
        'jumlah.*' => 'required|numeric|min:1', // Pastikan jumlah valid
    ]);

    // Simpan penjualan untuk setiap produk
    foreach ($validated['id_produk'] as $index => $id_produk) {
        $id_warna = $validated['id_warna'][$index]; // Ambil id_warna yang sesuai
        Penjualan::create([
            'id_produk' => $id_produk,
            'id_warna' => $id_warna,
            'jumlah' => $validated['jumlah'][$index],
        ]);
    }

    session()->flash('success', 'Data Penjualan Berhasil Disimpan!');
    return redirect()->route('transaction.index');
}


    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $penjualan = Penjualan::find($id);
        $produk = Produk::all();
        $warna = Warna::all();
        return view('transaction.edit', [
            'penjualan' => $penjualan
        ], compact('produk', 'warna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenjualanRequest $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Penjualan::destroy($id);
        return redirect('transaction.index')->with('success', 'Data Transaksi Berhasil Dihapus!');
    }
}
