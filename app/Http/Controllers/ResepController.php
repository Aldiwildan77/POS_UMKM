<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\resep;
use App\Models\stok_bahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResepController extends Controller
{
    public function showAll()
    {
        // SELECT r.id, m.nama as menu, group_concat(b.nama) as bahan ,group_concat(r.jumlah) as jumlah 
        // FROM resep r
        // INNER JOIN stok_bahan b ON r.stok_bahan_id = b.id
        // INNER JOIN menu m ON r.menu_id = m.id
        // group by m.id;
        $resep = DB::table('resep AS r')
        ->join('stok_bahan AS b', 'r.stok_bahan_id', '=', 'b.id')
        ->join('menu AS m', 'r.menu_id', '=', 'm.id')
        ->select('m.id','m.porsi','m.nama as menu',DB::raw('group_concat(b.nama) as bahan'), DB::raw('(sum(r.jumlah)/m.porsi) as hpp'),
        DB::raw('group_concat(b.id) as idbahan') ,DB::raw('group_concat(r.jumlah) as jumlah'),DB::raw('group_concat(r.id) as idresep'))
        ->groupBy('m.id')
        ->paginate(10);

        $menu = DB::table('menu AS m')
        ->leftJoin('resep AS r', 'r.menu_id', '=','m.id')
        ->where('r.stok_bahan_id', '=', null)
        ->select('m.id','m.nama')
        ->get();

        $bahan = stok_bahan::all();

        //dd($menu);
        return view('owner/Resep', ['resep' => $resep])
        ->with(['menu' => $menu])
        ->with(['bahan' => $bahan]);
    }

    public function addData(Request $request)
    {
        //dd($request->all());
        $menu = menu::find($request->menu_id);
        $menu->porsi = $request->porsi;
        $menu->save();
        $currentid = $menu->id;
        
        $qtybahan = $request->matkind;

        for ($i=1; $i <=$qtybahan; $i++) { 
            $resep = new resep;
            $bahan = "ingredient_id".$i;
            $resep->stok_bahan_id = $request->$bahan;
            $qty = "qty".$i;
            $resep->jumlah = $request->$qty;
            $resep->menu_id = $currentid;
            $resep->save();
        }

        return back()->with('status', 'new data successfully created!');
    }

    public function editData(Request $request, $id)
    {
        //dd($request->all());

        $menu = menu::find($id);
        $menu->porsi = $request->porsi;
        $menu->save();
        $currentid = $menu->id;
        $qtybahan = $request->matkind;

        for ($i=0; $i < $qtybahan; $i++) {
            $idrsp = "recipeid".$i;
            if ($request->$idrsp == 0) {
                $resep = new resep;
            }
            else {
                $resep = resep::find($id);
            }
            $bahan = "ingredient_id".$i;
            $resep->stok_bahan_id = $request->$bahan;
            $qty = "qty".$i;
            $resep->jumlah = $request->$qty;
            $resep->menu_id = $currentid;
            $resep->save();
        }

        return back()->with('status', 'new data successfully edited!');
    }

}
