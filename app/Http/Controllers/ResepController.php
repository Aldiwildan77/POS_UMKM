<?php

namespace App\Http\Controllers;

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
        ->get();

        //dd($resep);

        return view('owner/Resep', ['resep' => $resep]);
    }

}
