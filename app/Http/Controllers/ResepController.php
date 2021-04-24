<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\resep;
use App\Models\stok_bahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResepController extends Controller
{
    public function showAll()
    {
        // SELECT r.id, m.nama as menu, group_concat(b.nama) as bahan ,group_concat(r.jumlah) as jumlah 
        // FROM resep r
        // INNER JOIN stok_bahan b ON r.stok_bahan_id = b.id
        // INNER JOIN menu m ON r.menu_id = m.id
        // group by m.id;
        $resep = DB::table('resep AS r')
        ->join('stok_bahan AS b', 'r.stok_bahan_id', '=', 'b.id')
        ->join('menu AS m', 'r.menu_id', '=', 'm.id')
        ->select('r.id', 'm.nama as menu',DB::raw('group_concat(b.nama) as bahan'),DB::raw('group_concat(r.jumlah) as jumlah'))
        ->groupBy('m.id')
        ->paginate(10);

        $menu = menu::all(); //TODO pilih yang aktif aja

        $bahan = stok_bahan::all();

        return view('owner/Resep', ['resep' => $resep])
        ->with(['menu' => $menu])
        ->with(['bahan' => $bahan]);
    }

    public function addData(Request $request)
    {
        $resep = new resep;

        $resep->stok_bahan_id = $request->ingredient_id;
        $resep->jumlah = $request->qty;
        $resep->menu_id = $request->menu_id;
        $resep->save();

        return "input data success";
    }

}
