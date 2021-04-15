<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function showAll()
    {
        $laporan = laporan::paginate(10); 

        return view('owner/Menu' , ['laporan' => $laporan]);
    }
}
