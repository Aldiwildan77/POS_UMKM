<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use Illuminate\Http\Request;

class karyawanController extends Controller
{
    public function showAll()
    {
        $active = karyawan::all()->where('status', '=', '1');

        $NonActive = karyawan::all()->where('status', '=', '0');

        return view('owner/Karyawan', ['active' => $active])
        ->with(['nonActive' => $NonActive]);
    }

    public function addData(Request $request)
    {
        $karyawan = new karyawan;
        $karyawan->id = date("Ymdhi");
        $karyawan->nama = $request->name;
        $karyawan->nohp = $request->phone;
        $karyawan->email = $request->email;
        $karyawan->gaji = $request->salary;
        $karyawan->status = '1';
        $karyawan->save();

        return "input data success";
    }
}
