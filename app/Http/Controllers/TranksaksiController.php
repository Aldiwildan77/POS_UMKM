<?php

namespace App\Http\Controllers;

use App\Models\detailTransaksi;
use App\Models\menu;
use App\Models\tranksaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TranksaksiController extends Controller
{
    public function showDataTrx()
    {
        //just sum of menu ordered
        $transaction = DB::table('transaksi AS t')
        ->join('detail_transaksi AS d', 'd.transaksi_id', '=', 't.id')
        ->join('menu AS m', 'd.menu_id', '=', 'm.id')
        ->select('t.id', 't.metode', 't.nama', 't.no_hp', DB::raw('GROUP_CONCAT(m.nama) AS menu'), DB::raw('GROUP_CONCAT(d.qty) AS qeach'), 'm.harga', DB::raw('SUM(d.qty) AS qty'), 't.nominal')
        ->groupBy('t.id')
        //->orderBy('t.id', 'desc') //use later
        ->paginate(10);

        //qty of each menu ordered
        $detailTransaction = DB::table('transaksi AS t')
        ->join('detail_transaksi AS d', 'd.transaksi_id', '=', 't.id')
        ->join('menu AS m', 'd.menu_id', '=', 'm.id')
        ->select('t.id', 't.metode', 't.nama', 't.no_hp', 'm.nama as menu', 'm.harga','d.qty', 't.nominal')
        ->groupBy('d.id')
        //->orderBy('t.id', 'desc') //use later
        ->get();

        //dd($allTrans);
        //TODO check level to decide which view
        return view('owner/Laporan', ['transaksi' => $transaction]);
    }

    public function cashierTrx()
    {
        //just temporary fun, change later
        //just sum of menu ordered
        $transaction = DB::table('transaksi AS t')
        ->join('detail_transaksi AS d', 'd.transaksi_id', '=', 't.id')
        ->join('menu AS m', 'd.menu_id', '=', 'm.id')
        ->select('t.id', 't.metode', 't.nama', 't.no_hp', DB::raw('GROUP_CONCAT(m.nama) AS menu'), DB::raw('GROUP_CONCAT(d.qty) AS qeach'), DB::raw('SUM(d.qty) AS qty'), 't.nominal')
        ->groupBy('t.id')
        //->orderBy('t.id', 'desc') //use later
        ->paginate(10);

        //qty of each menu ordered
        $detailTransaction = DB::table('transaksi AS t')
        ->join('detail_transaksi AS d', 'd.transaksi_id', '=', 't.id')
        ->join('menu AS m', 'd.menu_id', '=', 'm.id')
        ->select('t.id', 't.metode', 't.nama', 't.no_hp', 'm.nama as menu', 'm.harga','d.qty', 't.nominal')
        ->groupBy('d.id')
        //->orderBy('t.id', 'desc') //use later
        ->get();

        //dd($allTrans);
        //TODO check level to decide which view
        //dd($transaction);
        return view('cashier/Transaction', ['transaksi' => $transaction]);
    }

    public function showDataMenu()
    {
        // by date filter - request get from ajax
        // SELECT t.id, t.metode, t.nama, t.no_hp, m.nama as menu, m.harga, d.qty, sum(d.sub_total)
        // FROM transaksi as t
        // INNER JOIN detail_transaksi as d ON d.transaksi_id = t.id
        // INNER JOIN menu as m ON d.menu_id = m.id
        // where t.created_at LIKE '%2021-04-03%'
        // group by d.transaksi_id;

        // if necessery get date from ajax
        // SELECT m.nama as menu, m.harga, sum(d.qty) as qty
        // FROM transaksi as t
        // INNER JOIN detail_transaksi as d ON d.transaksi_id = t.id
        // INNER JOIN menu as m ON d.menu_id = m.id
        // -- where t.created_at LIKE '%2021-04-03%' //activate if need time filter
        // group by d.menu_id
        // order by qty desc;

        $bestSellMenu = DB::table('transaksi AS t')
        ->join('detail_transaksi AS d', 'd.transaksi_id', '=', 't.id')
        ->join('menu AS m', 'd.menu_id', '=', 'm.id')
        ->select('m.id','m.nama AS menu', 'm.harga', DB::raw('SUM(d.qty) AS qty'))
        ->groupBy('d.menu_id')
        ->orderBy('qty', 'desc')
        ->get();

        //dd($bestSellMenu);

        return view('owner/Top', ['menu' => $bestSellMenu]);
    }

    public function showMenuCashier()
    {
        // SELECT m.id,m.nama, m.harga, m.foto,sum(j.jumlah) FROM menu m
        // INNER JOIN stok_jadi_realtime j ON m.id = j.menu_id
        // WHERE m.status = 1
        // GROUP BY m.id;
        $allMenu = DB::table('menu AS m')
        ->join('stok_jadi_realtime AS j', 'm.id', '=', 'j.menu_id')
        ->select('m.id','m.nama','m.harga', 'm.foto',DB::raw('sum(j.jumlah) AS qty'))
        ->where('m.status', '=' ,'1')
        ->groupBy('m.id')
        ->get();

        //dd($allMenu);
        return view('cashier/home', ['menu' => $allMenu]);
    }

    public function addData(Request $request)
    {
        $transaksi = new tranksaksi();

        $transaksi->metode = $request->pm;
        $transaksi->nominal = $request->total;
        $transaksi->nama = $request->name;
        $transaksi->no_hp = $request->phone;
        $transaksi->alamat = $request->addr;
        $transaksi->status = $request->status;

        //dd($request->all());
        //dd($request->$indexqty);
        $transaksi->save();
        $currentid = $transaksi->id;
        $itemtotal = $request->itemtotal;

        for ($i=0; $i < $itemtotal; $i++) { 
            $detailTransaksi = new detailTransaksi();
            $indexqty = "menuqty".$i;
            $detailTransaksi->qty = $request->$indexqty;
            $indextotal = "menutotal".$i;
            $detailTransaksi->sub_total = $request->$indextotal;
            $detailTransaksi->transaksi_id = $currentid;
            $menuindex = "menuname".$i;
            $namaMenu = $request->$menuindex;
            $detailTransaksi->menu_id = menu::where('nama', $namaMenu)->value('id');

            $detailTransaksi->save();
        }

        return "input data success";
    }

}
