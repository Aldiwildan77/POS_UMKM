<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokJadiController extends Controller
{
    public function showAll()
    {
        $stok = DB::table('stok_jadi AS j')
        ->join('menu AS m', 'j.menu_id', '=', 'm.id')
        ->select('j.id', 'm.nama', 'j.jumlah')
        ->paginate(10);

        $menu = menu::all();

        return view('owner/Stok', ['stok' => $stok])
        ->with(['menu' => $menu]);
    }
}
