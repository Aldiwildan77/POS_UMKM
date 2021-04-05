<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function showAll()
    {
        $MenuActive = menu::all()->where('status', '=', '1'); //paginate later

        $MenuNonActive = menu::all()->where('status', '=', '0');

        return view('owner/Menu' , ['active' => $MenuActive])
        ->with(['nonActive' => $MenuNonActive ]);
    }


}
