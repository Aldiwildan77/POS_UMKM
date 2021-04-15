<?php

namespace App\Http\Controllers;

use App\Models\stok_bahan;
use Illuminate\Http\Request;

class StokBahanController extends Controller
{
    public function showAll()
    {
        $stok = stok_bahan::paginate(10);

        return view('owner/Bahan', ['stok' => $stok]);
    }

    public function addData(Request $request)
    {
        $stok = new stok_bahan;

        $stok->nama = $request->name;
        $stok->jumlah = $request->qty;
        $stok->tgl_beli = $request->date;
        $stok->fraktur_id = '3';
        $stok->save();

        return "data saved";

    }
}
