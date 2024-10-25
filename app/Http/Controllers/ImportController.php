<?php

namespace App\Http\Controllers;

use App\Models\Warna;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class ImportController extends Controller
{
    //
    public function importWarna(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv|max:2048',
        ]);

        $file = $request->file('file');
        $reader = ReaderEntityFactory::createCSVReader();
        $reader->open($file->getRealPath());

        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $row) {
                $data = $row->toArray();

                if (isset($data[0])) {
                    Warna::create(['warna' => $data[0]]);
                }
            }
        }

        $reader->close();

        return redirect()->back()->with('success', 'Data Warna berhasil diimpor dari CSV!');
    }
}
