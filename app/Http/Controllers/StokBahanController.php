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
        $ingredients = stok_bahan::all();

        // SELECT b.id, b.nama, d.tgl_beli, d.jumlah FROM stok_bahan b
        // INNER JOIN stok_bahan_detail d ON b.id = d.stok_bahan_id
        // order by b.id
        $fullStock = DB::table('stok_bahan AS b')
            ->join('stok_bahan_detail AS d', 'b.id', '=', 'd.stok_bahan_id')
            ->select('d.id','b.id as idBahan', 'b.nama', 'd.tgl_beli', 'd.jumlah','d.qty', 'd.qty_satuan')
            ->orderBy('b.id')
            ->paginate(10);
            //->get();

        //dd($fullStock);   
        return view('owner/Bahan', ['bahan' => $ingredients])
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
        //dd($request->all());
        $id = $request->idDetail;
        $stokDetail = stok_bahan_detail::find($id);

        $stokDetail->stok_bahan_id = $request->idbahan;
        $stokDetail->qty = $request->qty;
        $stokDetail->qty_satuan = $request->unit;
        $stokDetail->jumlah = $request->nominal;
        $stokDetail->tgl_beli = $request->date;
        $stokDetail->fraktur_id = 4; //handle later
        $stokDetail->save();
        
        return "edit shop data success";
    }

    public function newShop(Request $request)
    {
        # code...ingrId
        //dd($request->all());
        $stokDetail = new stok_bahan_detail;
        
        $stokDetail->stok_bahan_id = $request->ingrId;
        $stokDetail->qty = $request->qty;
        $stokDetail->qty_satuan = $request->unit;
        $stokDetail->jumlah = $request->price;
        $stokDetail->tgl_beli = $request->date;
        $stokDetail->fraktur_id = 4; //handle later
        $stokDetail->save();
        
        return "new shop data input success";
    }
}
