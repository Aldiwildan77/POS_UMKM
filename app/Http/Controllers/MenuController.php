<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function showAll()
    {
        $MenuActive = menu::where('status', '=', '1')->paginate(100); //paginate later

        $MenuNonActive = menu::where('status', '=', '0')->paginate(100);

        return view('owner/Menu' , ['active' => $MenuActive])
        ->with(['nonActive' => $MenuNonActive ]);
    }

    public function addData(Request $request)
    {
        $menu = new menu;
        $menu->nama = $request->name;
        $menu->harga = $request->price;
        $menu->foto = $request->photo;
        $menu->status = '1';
        $menu->save();

        //dd($request->name);

        return back()->with('status', 'new data successfully created!');
    }

    public function editData($id, Request $request)
    {
        $menu = menu::find($id);
        $menu->nama = $request->name;
        $menu->harga = $request->price;
        $menu->foto = $request->photo;
        $menu->status = '1';
        $menu->save();

        //return "new menu successfully edited";
        return back()->with('status', 'new menu successfully edited!');
    }

    public function readyForTrx()
    {
       $menu = DB::table('menu as m')
       ->join('stok_jadi_realtime as j', 'm.id', '=', 'j.menu_id')
       ->where('j.jumlah', '>' ,'0')
       ->groupBy('m.id')
       ->get();

       $groups = $menu->chunk(3);;

       //dd($groups, sizeof($groups));
       return view('customer/index' , ['menu' => $groups]);
    }

}
