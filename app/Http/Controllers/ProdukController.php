<?php

namespace App\Http\Controllers;

use App\Models\Warna;
use App\Models\Produk;
use Illuminate\Validation\Rule;
// use App\Http\Requests\Request;
use App\Http\Requests\UpdateProdukRequest;
use Illuminate\Http\Request;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('product.index', [
            'produks' => Produk::with('warna')->paginate(15),
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
        return view('product.create', compact('warna'));
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
        ], [
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
        $warna = Warna::all();
        return view('product.edit', [
            'produk' => $produk
        ], compact('warna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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
        if ($request->id_produk != $produk->id_produk) {
            $rules['nama_produk'] = 'required';
        };
        $validated = $request->validate($rules);
        Produk::find($produk->id_produk)->update($validated);
        return redirect('product')->with('success', 'Data Produk Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Produk::destroy($id);
        return redirect()->route('product.index')->with('success', 'Data Produk Berhasil Dihapus!');
    }


    public function getWarna($id)
    {
        $produk = Produk::with('warna')->find($id);

        if ($produk) {
            return response()->json(['warna' => $produk->warna->pluck('warna')]);
        }

        return response()->json(['warna' => []], 404); // Mengembalikan warna kosong jika produk tidak ditemukan
    }

    public function upload(Request $request)
    {
        // Validasi file yang diupload
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx|max:2048',
        ]);

        // Simpan file yang diupload
        $filePath = $request->file('file')->store('uploads');
        $fullPath = storage_path('app/' . $filePath);
        $reader = ReaderEntityFactory::createReaderFromFile($fullPath);
        $reader->open($fullPath);

        $isFirstRow = true;
        $insertedCount = 0; // Hitung berapa banyak data yang berhasil disimpan

        // Ambil semua warna dari database
        $warnaMap = Warna::pluck('id_warna')->toArray(); // Ubah nama_warna dan id_warna sesuai dengan kolom Anda

        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $row) {
                if ($isFirstRow) {
                    $isFirstRow = false;
                    continue; // Lewati header
                }

                $cells = $row->getCells();

                if (count($cells) >= 3) { // Memastikan ada setidaknya 3 kolom
                    // Ambil data dari sel
                    $namaProduk = $cells[0]->getValue(); // Nama Produk
                    $idWarna = $cells[1]->getValue(); // ID Warna
                    $harga = $cells[2]->getValue(); // Harga

                    // Cek apakah ID warna valid
                    if (array_key_exists($idWarna, $warnaMap)) {
                        // Simpan data ke tabel produk
                        Produk::create([
                            'nama_produk' => $namaProduk,
                            'id_warna' => $idWarna, // Simpan ID warna
                            'harga' => $harga,
                        ]);
                        $insertedCount++; // Increment counter
                    }
                }
            }
        }

        $reader->close();

        return redirect()->route('product.index')->with('success', "Data produk berhasil di-upload! Total data yang di-upload: $insertedCount");
    }
}
