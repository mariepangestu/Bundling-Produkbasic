<?php

namespace App\Http\Controllers;

use App\Models\Warna;
use App\Models\Produk;
use Illuminate\Validation\Rule;
// use App\Http\Requests\Request;
use App\Http\Requests\UpdateProdukRequest;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('product.index', [
            'produks' => Produk::with('warna')->get(),
            // 'title' => 'Data Produk Zoya'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $warna = Warna::all();
        return view('product.create',compact('warna'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nama_produk' => 'required',
            'id_warna' => 'required',
            'harga' => 'required'
        ],[
            'nama_produk.required' => 'Nama produk tidak boleh kosong!',
            'id_warna.required' => 'Id barang tidak boleh kosong!',
            'harga.required' => 'Harga produk tidak boleh kosong!',
        ]);
        Produk::create($validated);
        session()->flash('success', 'Data Produk Berhasil Disimpan!');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $produk = Produk::find($id);
        $warna= Warna::all();
        return view('product.edit',[
            'produk' => $produk
        ],compact('warna')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukRequest $request, $id)
    {
        //
        $produk = Produk::find($id);
        $rules = [
            'nama_produk' => [
            'required',
            Rule::unique('produks')->ignore($produk->id_produk), // Mengabaikan produk yang sedang diupdate
        ],
        'id_warna' => 'required',
        'harga' => 'required|numeric',
        ];
        $produk = Produk::find($id);
        if ($request->nama_produk != $produk->nama_produk) {
            $rules['nama_produk'] = 'required';
        };
        $validated = $request->validate($rules);
        Produk::find($produk->id_produk)->update($validated);
        return redirect('produk')->with('success', 'Data Produk Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Produk::destroy($id);
        return redirect('product.index')->with('success', 'Data Produk Berhasil Dihapus!');
    }
}
