<?php

namespace App\Http\Controllers;

use App\Models\stok_bahan;
use Illuminate\Http\Request;

class StokBahanController extends Controller
{
    public function showAll()
    {
        $stok = stok_bahan::all();

        return view('owner/Bahan', ['stok' => $stok]);
    }
}
