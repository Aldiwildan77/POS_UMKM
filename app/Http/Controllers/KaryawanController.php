<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\produksi;
use App\Models\userlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                    //session(['user' => $userInfo]);
                    return redirect('dashboard');
                }
                if ($userInfo->level == 0) {
                    $request->session()->put('LoggedUser', $userInfo->id);
                    //session(['user' => $userInfo]);
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

    public function showAllUser()
    {
        $owner = DB::table('user AS u')
        ->join('karyawan AS k' , 'k.id', '=', 'u.karyawan_id')
        ->where('u.level', '=', '1')
        ->select('u.id', 'u.username', 'u.password', 'k.id as idkar','k.nama', 'k.nohp','k.email')
        ->first();

        $allusers = DB::table('user AS u')
        ->join('karyawan AS k' , 'k.id', '=', 'u.karyawan_id')
        ->where('u.level', '=', '0')
        ->select('u.id','u.status', 'u.username', 'u.password','k.id as idkar', 'k.nama','k.nohp', 'k.email')
        ->get();

        $allstaff = karyawan::all();
        
        return view('owner/Profile', ['o' => $owner])
        ->with(['all' => $allusers])
        ->with(['staff' => $allstaff]);
    }

    public function showCashier()
    {
        $idUser = session('LoggedUser');
        $userInfo = DB::table('user AS u')
        ->join('karyawan AS k' , 'k.id', '=', 'u.karyawan_id')
        ->where('u.id', '=', $idUser)
        ->select('u.id', 'u.username', 'u.password', 'k.id as idkar', 'k.nama','k.nohp', 'k.email')
        ->first();

        return view('cashier/profile')->with(['user'=>$userInfo]);
    }

    public function editOwner(Request $request)
    {
        //dd($request->all());
        $idUser = $request->iduser;
        $idStaff = $request->idstaff;
        $staff = karyawan::find($idStaff);
        $staff->nama = $request->name;
        $staff->nohp = $request->phonenum;
        $staff->email = $request->email;
        $staff->save();
        $user = userlog::find($idUser);
        $user->username = $request->username;
        $user->password = $request->password;
        $user->karyawan_id = $idStaff;
        $user->save();

        return back()->with('status', 'profile successfully edited!');

    }

    public function addUser(Request $request)
    {
        $user = new userlog();
        $user->username = $request->username;
        $user->password = $request->password;
        $user->karyawan_id = $request->staffid;
        $user->save();

        return back()->with('status', 'user successfully added!');
    }

    public function editUser(Request $request)
    {
        //dd($request->all());
        $idUser = $request->id;
        $idStaff = $request->idstaff;
        $staff = karyawan::find($idStaff);
        $staff->nama = $request->nama;
        $staff->nohp = $request->nohp;
        $staff->email = $request->email;
        $staff->save();
        $user = userlog::find($idUser);
        $user->username = $request->username;
        $user->password = $request->password;
        $user->karyawan_id = $idStaff;
        $user->save();

        return back()->with('status', 'profile successfully edited!');
    }

    public function showAll()
    {
        $active = karyawan::paginate(100);

        $gajiStaff = DB::table('produksi AS p')
        ->join('karyawan AS k','k.id', '=', 'p.karyawan_id')
        ->select('p.id AS idP', 'k.id AS idK', 'k.nama', 'k.gaji','p.tgl_produksi') 
        ->orderBy('p.tgl_produksi')
        ->get();

        $all = karyawan::all();

        return view('owner/Karyawan', ['active' => $active])
        ->with(['all' => $all])
        ->with(['salary' => $gajiStaff]);
    }

    public function addData(Request $request)
    {
        $karyawan = new karyawan;
        $karyawan->nama = $request->name;
        $karyawan->nohp = $request->phone;
        $karyawan->email = $request->email;
        $karyawan->gaji = $request->salary;
        $karyawan->status = $request->status;
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
        $karyawan->status = $request->status;
        $karyawan->save();

        return back()->with('status', 'new data successfully edited!');
    }

    public function addProductionData(Request $request)
    {
        $gajiProduksi = new produksi;
        $gajiProduksi->tgl_produksi = $request->date;
        $gajiProduksi->karyawan_id = $request->staff_id;
        $gajiProduksi->save();

        return back()->with('status', 'new production salary successfully added!');
    }
}
