<?php

namespace App\Http\Controllers;

use App\Models\operasional;
use App\Models\fraktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OperasionalController extends Controller
{
    public function showAll()
    {
        //$operasional = operasional::paginate(100);
        $operasional = DB::table('operasional')
        ->join('fraktur', 'fraktur.id', '=', 'operasional.fraktur_id')
        ->select('operasional.*', 'fraktur.id as idf', 'fraktur.foto')
        ->paginate(100);

        return view('owner/Operasional', ['operasional' => $operasional]);
    }

    public function addData(Request $request)
    {
        $fraktur = new fraktur;
        $fraktur->foto = $request->foto;
        $fraktur->save();
        $frakturId = $fraktur->id;
        $operasional = new operasional;
        $operasional->keterangan = $request->desc;
        $operasional->biaya = $request->price;
        $operasional->tanggal = $request->date;
        $operasional->fraktur_id = $frakturId;
        $operasional->save();

        return back()->with('status', 'new data successfully created!');
    }

    public function editData(Request $request, $id)
    {
        $fraktur = new fraktur;
        $fraktur->foto = $request->foto;
        $fraktur->save();
        $frakturId = $fraktur->id;
        $operasional = operasional::find($id);
        $operasional->keterangan = $request->desc;
        $operasional->biaya = $request->price;
        $operasional->tanggal = $request->date;
        $operasional->fraktur_id = $frakturId;
        $operasional->save();

        return back()->with('status', 'new data successfully edited!');
    }
}
