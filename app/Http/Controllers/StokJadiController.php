<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\stok_jadi;
use App\Models\stok_jadi_realtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokJadiController extends Controller
{
    public function showAll()
    {
        $stok = DB::table('stok_jadi_realtime AS j')
        ->join('menu AS m', 'j.menu_id', '=', 'm.id')
        ->select('m.id', 'm.nama', DB::raw('sum(j.jumlah) AS jumlah'), DB::raw('group_concat(j.jumlah) AS qtyd'),
        DB::raw('group_concat(j.tgl_produksi) AS dated'), DB::raw('count(j.jumlah) AS type')) 
        ->groupBy('m.id')
        ->distinct()
        //->get();
        ->paginate(10);

        $stokProd = DB::table('stok_jadi AS j')
        ->join('menu AS m','m.id', '=', 'j.menu_id')
        ->select('j.id AS id', 'm.id AS idm', 'm.nama', 'j.jumlah','j.tgl_produksi') 
        ->orderBy('j.tgl_produksi')
        ->paginate(10);

        $menu = menu::all();

        //dd($stok);
        return view('owner/Stok', ['stok' => $stok])
        ->with(['menu' => $menu])
        ->with(['stokprod' => $stokProd]);
    }

    public function addData(Request $request)
    {
        $stokupdate = new stok_jadi_realtime;
        $stokupdate->menu_id = $request->menu_id;
        $stokupdate->jumlah = $request->qty;
        $stokupdate->tgl_produksi = $request->date;
        $stokupdate->save();
        $stok = new stok_jadi;
        $stok->menu_id = $request->menu_id;
        $stok->jumlah = $request->qty;
        $stok->tgl_produksi = $request->date;
        $stok->save();

        return "new data input success";
    }

    public function editData(Request $request, $id)
    {
        $stokupdate = stok_jadi_realtime::find($id);
        $stokupdate->menu_id = $request->menu_id;
        $stokupdate->jumlah = $request->qty;
        $stokupdate->tgl_produksi = $request->date;
        $stokupdate->save();
        $stok = stok_jadi::find($id);
        $stok->menu_id = $request->menu_id;
        $stok->jumlah = $request->qty;
        $stok->tgl_produksi = $request->date;
        $stok->save();

        return "new data edited success";
    }
}
