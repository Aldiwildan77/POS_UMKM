<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\userlog;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function logfirst()
    {
        return view('owner/Login');    
    }

    public function login(Request $request)
    {
        //dd($request->all());

        $userInfo = userlog::where('username', '=', $request->username)->first();

        if (!$userInfo) {
            return back()->with('status', 'login failed, user info not matched!');
        }
        else{
            //dd($userInfo);
            if ($userInfo->password == $request->pass){
                if ($userInfo->level == 1) {
                    $request->session()->put('LoggedUser', $userInfo->id);
                    return redirect('dashboard');
                }
                if ($userInfo->level == 0) {
                    $request->session()->put('LoggedUser', $userInfo->id);
                    return redirect('index')->with('status', 'Hi cashier!');
                }
            }
            else{
                return back()->with('status', 'password not match!');
            }
        }
    }

    public function logout()
    {
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }

    public function showAll()
    {
        $active = karyawan::where('status', '=', '1')->paginate(100);

        $NonActive = karyawan::where('status', '=', '0')->paginate(100);

        return view('owner/Karyawan', ['active' => $active])
        ->with(['nonActive' => $NonActive]);
    }

    public function addData(Request $request)
    {
        $karyawan = new karyawan;
        $karyawan->nama = $request->name;
        $karyawan->nohp = $request->phone;
        $karyawan->email = $request->email;
        $karyawan->gaji = $request->salary;
        $karyawan->status = '1';
        $karyawan->save();

        return back()->with('status', 'new data successfully created!');
    }

    public function editData(Request $request, $id)
    {
        $karyawan = karyawan::find($id) ;
        $karyawan->nama = $request->name;
        $karyawan->nohp = $request->phone;
        $karyawan->email = $request->email;
        $karyawan->gaji = $request->salary;
        $karyawan->status = '1';
        $karyawan->save();

        return back()->with('status', 'new data successfully edited!');
    }
}
