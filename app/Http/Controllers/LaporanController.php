<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function showAll()
    {
        $laporan = laporan::paginate(100); 

        return view('owner/Menu' , ['laporan' => $laporan]);
    }

    public function financeCount(Request $request)
    {
        // SELECT sum(nominal) as total FROM transaksi
        // WHERE created_at like '2021-04-%';
        $income = DB::table('transaksi')->where('created_at', 'like', '2021-04-%')
        ->value(DB::raw('sum(nominal) as total'));

        // SELECT m.id, m.nama as menu, sum(r.jumlah) as cost , m.porsi as `porsi`,
        // (sum(r.jumlah)/m.porsi) as hpp, d.qty, ((sum(r.jumlah)/m.porsi)*d.qty) as prodcost, d.created_at as `buy date`
        // FROM resep r INNER JOIN menu m ON r.menu_id = m.id
        // INNER JOIN detail_transaksi d ON d.menu_id  = m.id
        // where d.created_at like '2021-04-%'
        // group by m.id;

        // per menu
        // $productionCost = DB::table('resep AS r')
        // ->join('menu AS m', 'r.menu_id', '=' ,'m.id')
        // ->join('detail_transaksi AS d', 'd.menu_id', '=', 'm.id')
        // ->select('m.id', 'm.nama as menu', DB::raw('sum(r.jumlah) as cost') , 'm.porsi as porsi',
        // DB::raw('(sum(r.jumlah)/m.porsi) as hpp'),'d.qty',DB::raw('((sum(r.jumlah)/m.porsi)*d.qty) as prodcost'), 'd.created_at')
        // ->where('d.created_at', 'like' ,'2021-04-%')
        // ->groupBy('m.id')
        // ->get();

        $productionCost = DB::table('resep AS r')
        ->join('menu AS m', 'r.menu_id', '=' ,'m.id')
        ->join('detail_transaksi AS d', 'd.menu_id', '=', 'm.id')
        ->where('d.created_at', 'like' ,'2021-04-%')
        ->value(DB::raw('((sum(r.jumlah)/m.porsi)*d.qty) as prodcost'));


        // SELECT keterangan, sum(biaya) as cost, tanggal FROM operasional
        // WHERE tanggal like '2021-04-%'
        // group by tanggal;
        $operational = DB::table('operasional')
        ->where('tanggal', 'like' ,'2021-04-%')->value(DB::raw('sum(biaya) as cost'));

        //$laba = $income->total - ($productionCost->prodcost +$operational->cost);
        $laba = $income - ($productionCost +$operational);

        // TODO think later
        // SELECT x.*, SUM(x.oprcost+x.prodcost) as totalcost, SUM(x.income-(x.oprcost+x.prodcost)) as laba
        // FROM (SELECT sum(t.nominal) as income,((sum(r.jumlah)/m.porsi)*d.qty) as prodcost, sum(o.biaya) as oprcost , d.created_at as `date`
        // FROM resep r INNER JOIN menu m ON r.menu_id = m.id
        // INNER JOIN detail_transaksi d ON d.menu_id  = m.id
        // JOIN operasional o
        // JOIN transaksi t
        // WHERE t.created_at like '2021-04-%' and o. tanggal like '2021-04-%') as x;

        //dd($productionCost, $income, $operational, $laba);

        return view('owner/Finance' , ['production' => $productionCost])
        ->with(['income' => $income])
        ->with(['operational' => $operational])
        ->with(['laba' => $laba]);
    }
}
