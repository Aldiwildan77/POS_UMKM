<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TranksaksiController extends Controller
{
    public function showDataTrx()
    {
        // SELECT t.id, t.metode, t.nama, t.no_hp, m.nama as menu, m.harga, d.qty, sum(d.sub_total) as total
        // FROM transaksi as t
        // INNER JOIN detail_transaksi as d ON d.transaksi_id = t.id
        // INNER JOIN menu as m ON d.menu_id = m.id
        // group by d.transaksi_id;
        
        $allTrans = DB::table('transaksi AS t')
        ->join('detail_transaksi AS d', 'd.transaksi_id', '=', 't.id')
        ->join('menu AS m', 'd.menu_id', '=', 'm.id')
        ->select('t.id', 't.metode', 't.nama', 't.no_hp', 'm.nama as menu', 'm.harga','d.qty', DB::raw('SUM(d.sub_total) AS total'))
        ->groupBy('d.transaksi_id')
        ->get();

        //dd($allTrans);
        //TODO check level to decide which view
        return view('owner/Laporan', ['transaksi' => $allTrans]);
    }

    public function cashierTrx()
    {
        //just temporary fun, change later
        $allTrans = DB::table('transaksi AS t')
        ->join('detail_transaksi AS d', 'd.transaksi_id', '=', 't.id')
        ->join('menu AS m', 'd.menu_id', '=', 'm.id')
        ->select('t.id', 't.metode', 't.nama', 't.no_hp', 'm.nama as menu', 'm.harga','d.qty', DB::raw('SUM(d.sub_total) AS total'))
        ->groupBy('d.transaksi_id')
        ->get();

        return view('cashier/Transaction', ['transaksi' => $allTrans]);
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
