<?php

namespace App\Http\Controllers;

use App\Models\Warna;
use App\Http\Requests\StoreWarnaRequest;
use App\Http\Requests\UpdateWarnaRequest;
use Illuminate\Http\Request;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;


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
            // 'title' => 'Data Warna Produk Zoya'
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
        return view('color.import');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $warna = Warna::findOrFail($id);
        // dd($warna);
        return view('color.edit', compact('warna'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $warna = Warna::findOrFail($id);
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
    public function destroy($id)
    {
        //
        $warna = Warna::find($id);
        $warna->delete();
        return redirect('color')->with('success', 'Data Warna Berhasil Dihapus!');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx|max:2048',
        ]);

        $filePath = $request->file('file')->store('uploads');
        $fullPath = storage_path('app/' . $filePath);
        $reader = ReaderEntityFactory::createReaderFromFile($fullPath);
        $reader->open($fullPath);

        $isFirstRow = true;
        $insertedCount = 0; // Hitung berapa banyak data yang berhasil disimpan

        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $row) {
                if ($isFirstRow) {
                    $isFirstRow = false;
                    continue; // Lewati header
                }

                $cells = $row->getCells();

                if (count($cells) >= 1) { // Ubah menjadi 8 untuk 8 kolom
                    // Simpan data
                    Warna::create([
                        'warna' => $cells[1]->getValue(), // warna
                    ]);
                    $insertedCount++; // Increment counter
                }
            }
        }

        $reader->close();

        return redirect()->route('color.index')->with('success', "Data warna berhasil di-upload! Total data yang di-upload: $insertedCount");
    }
}
