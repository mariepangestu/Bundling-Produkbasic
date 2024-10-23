<?php

namespace App\Http\Controllers;

use App\Models\Warna;
use App\Http\Requests\StoreWarnaRequest;
use App\Http\Requests\UpdateWarnaRequest;
use Illuminate\Http\Request;

class WarnaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('color.index', [
            'warnas' => Warna::all(),
            'title' => 'Data Warna Produk Zoya'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'warna' => 'required|unique:warnas'
        ], [
            'warna.required' => 'Data Warna tidak boleh kosong!',
        ]);
        Warna::create($validated);
        session()->flash('success', 'Data Warna Berhasil Disimpan!');
        return redirect()->route('color.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Warna $warna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Warna $id)
    // {
    //     //
    //     // $warna = Warna::find($id);
    //     // return view('color.edit',[
    //     //     'warna' => $warna
    //     // ]);
    //     $warna = Warna::findOrFail($id);
    //     // $warna = Warna::where('id_warna', $id)->firstOrFail();
    //     return view('color.edit', compact('warna'));
    // }
    public function edit(Warna $warna)
    {
        // Route model binding sudah otomatis mengambil Warna berdasarkan ID, tidak perlu findOrFail lagi
        return view('color.edit', compact('warna'));
    }
    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Warna $id)
    // {
    //     //
    //     $rules = [
    //         'warna' => 'required'
    //     ];
    //     $warna = Warna::find($id);
    //     if ($request->warna != $warna->id_warna) {
    //         $rules['warna'] = 'required|unique:warnas';
    //     };
    //     $validated = $request->validate($rules);
    //     Warna::where('id_warna', $warna->id_warna)->update($validated);
    //     session()->flash('success', 'Data Warna Berhasil Diubah!');
    //     return redirect()->route('color.index');
    // }
    public function update(Request $request, Warna $warna)
    {
        // Aturan validasi
        $rules = [
            'warna' => 'required'
        ];

        // Jika warna yang diinput berbeda dari warna di database, cek unique
        if ($request->warna != $warna->warna) {
            $rules['warna'] = 'required|unique:warnas';
        }

        // Validasi input
        $validated = $request->validate($rules);

        // Update data warna yang diambil dari route model binding
        $warna->update($validated);

        // Set flash message dan redirect
        session()->flash('success', 'Data Warna Berhasil Diubah!');
        return redirect()->route('color.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warna $id)
    {
        //
        Warna::destroy($id);
        return redirect('color')->with('success', 'Data Warna Berhasil Dihapus!');
    }
}
