<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function showAll()
    {
        $laporan = laporan::all(); 

        return view('owner/Menu' , ['laporan' => $laporan]);
    }
}
