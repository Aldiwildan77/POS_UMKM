<?php

namespace App\Http\Controllers;

use App\Models\stok_bahan;
use App\Models\stok_bahan_detail;
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
            ->select('d.id','b.id as idBahan', 'b.nama', 'd.tgl_beli', 'd.jumlah')
            ->orderBy('b.id')
            ->paginate(10);
            //->get();

        return view('owner/Bahan', ['stok' => $newStock])
        ->with(['fullstock' => $fullStock]);
    }

    public function newIngredient(Request $request)
    {
        $stok = new stok_bahan;

        $stok->nama = $request->name;
        $stok->save();

        return "new menu saved";
    }

    public function editData(Request $request)
    {
        $id = $request->idDetail;
        $stokDetail = stok_bahan_detail::find($id);

        $stokDetail->stok_bahan_id = $request->idbahan;
        $stokDetail->jumlah = $request->qty;
        $stokDetail->tgl_beli = $request->date;
        $stokDetail->fraktur_id = 4; //handle later
        $stokDetail->save();
        
        return "edit shop data success";
    }

    public function newShop(Request $request)
    {
        # code...ingrId
        $stokDetail = new stok_bahan_detail;
        
        $stokDetail->stok_bahan_id = $request->ingrId;
        $stokDetail->jumlah = $request->qty;
        $stokDetail->tgl_beli = $request->date;
        $stokDetail->fraktur_id = 4; //handle later
        $stokDetail->save();
        
        return "new shop data input success";
    }
}
