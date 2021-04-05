<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokJadiController extends Controller
{
    public function showAll()
    {
        // SELECT j.id, m.nama, j.jumlah FROM stok_jadi as j
        // INNER JOIN menu as m ON j.menu_id = m.id;
        $stok = DB::table('stok_jadi AS j')
        ->join('menu AS m', 'j.menu_id', '=', 'm.id')
        ->select('j.id', 'm.nama', 'j.jumlah')
        ->get();

        return view('owner/Stok', ['stok' => $stok]);
    }
}
