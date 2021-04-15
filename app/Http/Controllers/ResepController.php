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
        $resep = DB::table('resep AS r')
        ->join('stok_bahan AS s', 'r.stok_bahan_id', '=', 's.id')
        ->join('menu AS m', 'r.menu_id', '=', 'm.id')
        ->select('r.id', 's.nama AS bahan', 'm.nama AS menu', 'r.jumlah')
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
