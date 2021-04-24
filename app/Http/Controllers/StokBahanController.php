<?php

namespace App\Http\Controllers;

use App\Models\stok_bahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokBahanController extends Controller
{
    public function showAll()
    {
        // SELECT b.id, b.nama, sum(d.jumlah) as jumlah FROM stok_bahan b
        // INNER JOIN stok_bahan_detail d ON b.id = d.stok_bahan_id
        // GROUP by b.id
        $newStock = DB::table('stok_bahan AS b')
            ->join('stok_bahan_detail AS d', 'b.id', '=', 'd.stok_bahan_id')
            ->select('b.id', 'b.nama', DB::raw('sum(d.jumlah) as jumlah'))
            ->groupBy('b.id')
            ->paginate(10);

        // SELECT b.id, b.nama, d.tgl_beli, d.jumlah FROM stok_bahan b
        // INNER JOIN stok_bahan_detail d ON b.id = d.stok_bahan_id
        // order by b.id
        $fullStock = DB::table('stok_bahan AS b')
            ->join('stok_bahan_detail AS d', 'b.id', '=', 'd.stok_bahan_id')
            ->select('b.id', 'b.nama', 'd.tgl_beli', 'd.jumlah')
            ->orderBy('b.id')
            ->paginate(10);

        //dd($newStock);
        return view('owner/Bahan', ['stok' => $newStock])
        ->with(['fullstock' => $fullStock]);
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
