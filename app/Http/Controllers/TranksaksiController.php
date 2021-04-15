<?php

namespace App\Http\Controllers;

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

}
