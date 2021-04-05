<?php

namespace App\Http\Controllers;

use App\Models\operasional;
use Illuminate\Http\Request;

class OperasionalController extends Controller
{
    public function showAll()
    {
        $operasional = operasional::all();

        return view('owner/Operasional', ['oprerasional' => $operasional]);
    }
}
