<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use App\Models\operasional;
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
        // from req
        $month = '04';
        $year = '2021';

        $income = DB::table('transaksi')->where('created_at', 'like', $year.'-'.$month.'-%')
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
        // ->select('m.id', 'm.nama as menu', DB::raw('sum(r.jumlah) as costbasedProd') , 'm.porsi as porsi',
        // DB::raw('(sum(r.jumlah)/m.porsi) as hpp'),'d.qty as qtysold',DB::raw('((sum(r.jumlah)/m.porsi)*d.qty) as costAsSold'), 'd.created_at')
        // ->where('d.created_at', 'like' ,'2021-04-%')
        // ->groupBy('m.id')
        // ->get();

        $productionCost = DB::table('resep AS r')
        ->join('menu AS m', 'r.menu_id', '=' ,'m.id')
        ->join('detail_transaksi AS d', 'd.menu_id', '=', 'm.id')
        ->where('d.created_at', 'like' , $year.'-'.$month.'-%')
        ->value(DB::raw('((sum(r.jumlah)/m.porsi)*d.qty) as prodcost'));

        $operational = DB::table('operasional')
        ->where('tanggal', 'like' , $year.'-'.$month.'-%')->value(DB::raw('sum(biaya) as cost'));

        $operationalDetails = operasional::where('tanggal', 'like', $year.'-'.$month.'-%')
        ->select( 'keterangan', 'biaya', 'tanggal')
        ->get();

        // SELECT sum(k.gaji) as total FROM produksi p
        // INNER JOIN karyawan k ON k.id = p.karyawan_id
        // WHERE tgl_produksi like '2021-04-%';
        $salarytotal = DB::table('produksi as p')
        ->join('karyawan as k', 'k.id', '=', 'p.karyawan_id')
        ->where('tgl_produksi', 'like', $year.'-'.$month.'-%')
        ->value(DB::raw('sum(k.gaji) as total'));

        // SELECT p.tgl_produksi,sum(k.gaji) as gaji FROM produksi p
        // INNER JOIN karyawan k ON k.id = p.karyawan_id
        // WHERE tgl_produksi like '2021-04-%'
        // GROUP BY tgl_produksi;
        $salaryDetails = DB::table('produksi as p')
        ->join('karyawan as k', 'k.id', '=', 'p.karyawan_id')
        ->where('tgl_produksi', 'like', $year.'-'.$month.'-%')
        ->select('p.tgl_produksi', DB::raw('sum(k.gaji) as gaji'))
        ->groupBy('p.tgl_produksi')
        ->get();

        $profit = $income - ($productionCost +$operational+$salarytotal);

        //dd($productionCost, $income, $operational, $laba);

        return view('owner/Finance' , ['production' => $productionCost])
        ->with(['income' => $income])
        ->with(['operational' => $operational])
        ->with(['profit' => $profit])
        ->with(['salary' => $salarytotal])
        ->with(['oprdetails' => $operationalDetails])
        ->with(['saldetails' => $salaryDetails]);
    }
}
