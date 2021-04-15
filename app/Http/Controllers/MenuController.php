<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function showAll()
    {
        $MenuActive = menu::where('status', '=', '1')->paginate(10); //paginate later

        $MenuNonActive = menu::where('status', '=', '0')->paginate(10);

        return view('owner/Menu' , ['active' => $MenuActive])
        ->with(['nonActive' => $MenuNonActive ]);
    }

    public function addData(Request $request)
    {
        $menu = new menu;

        // dd("test data");
        $menu->nama = $request->name;
        $menu->harga = $request->price;
        $menu->foto = $request->photo;
        $menu->status = '1';
        $menu->save();

        // TODO redirect add alert
        return "new menu successfully added";
    }

    public function editData($id, Request $request)
    {
        # code...
    }

}
