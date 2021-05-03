<?php

namespace App\Http\Controllers;

use App\Models\operasional;
use Illuminate\Http\Request;

class OperasionalController extends Controller
{
    public function showAll()
    {
        $operasional = operasional::paginate(10);

        return view('owner/Operasional', ['operasional' => $operasional]);
    }

    public function addData(Request $request)
    {
        $operasional = new operasional;
        $operasional->keterangan = $request->desc;
        $operasional->biaya = $request->price;
        $operasional->tanggal = $request->date;
        $operasional->fraktur_id = '4'; //think later
        $operasional->save();

        return "data saved";
    }

    public function editData(Request $request, $id)
    {
        $operasional = operasional::find($id);
        $operasional->keterangan = $request->desc;
        $operasional->biaya = $request->price;
        $operasional->tanggal = $request->date;
        $operasional->fraktur_id = '4'; //think later
        $operasional->save();

        return "data edited";
    }
}
