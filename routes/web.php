<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::view('/login', 'owner/Login');

Route::get('/login', 'KaryawanController@logfirst');
Route::post('/login', 'KaryawanController@login');
Route::get('/logout', 'KaryawanController@logout');

Route::get('/index', 'TranksaksiController@showMenuCashier')->middleware('AuthCheck');//home kasir
Route::post('/index', 'TranksaksiController@addData');//post new transaction
Route::view('/cashier', 'cashier/profile')->middleware('AuthCheck'); // profile cashier

Route::get('/home', 'MenuController@readyForTrx');//home customer

Route::view('/dashboard', 'owner/Report')->middleware('AuthCheck'); //home owner

Route::get('/profile', 'KaryawanController@showAllUser')->middleware('AuthCheck'); // profile owner

Route::get('/menuData', 'MenuController@showAll')->middleware('AuthCheck');
Route::post('/menuData', 'MenuController@addData');
Route::post('/menuData/{id}', 'MenuController@editData');

Route::get('/bahanData', 'StokBahanController@showAll')->middleware('AuthCheck');
Route::post('/bahanData', 'StokBahanController@newIngredient'); //new bahan
Route::post('/bahanEdit', 'StokBahanController@editData'); //edit data belanja
Route::post('/bahanNew', 'StokBahanController@newShop'); //new belanja

Route::get('/karyawanData', 'KaryawanController@showAll')->middleware('AuthCheck');
Route::post('/karyawanData', 'KaryawanController@addData');
Route::post('/karyawanData/{id}', 'KaryawanController@editData');

Route::get('/operasionalDlaporanAllata', 'OperasionalController@showAll')->middleware('AuthCheck');
Route::post('/operasionalData', 'OperasionalController@addData');
Route::post('/operasionalData/{id}', 'OperasionalController@editData');

Route::get('/resepData', 'ResepController@showAll')->middleware('AuthCheck');
Route::post('/resepData', 'ResepController@addData'); 
Route::post('/resepData/{id}', 'ResepController@editData'); // issue, edit current recipe nambah data baru not edited

Route::get('/stokData', 'StokJadiController@showAll')->middleware('AuthCheck');
Route::post('/stokData', 'StokJadiController@addData');
Route::post('/stokData/{id}', 'StokJadiController@editData');

Route::get('/laporanData', 'TranksaksiController@showDataTrx')->middleware('AuthCheck');

Route::get('/laporanProduksi', 'StokJadiController@showProdReport')->middleware('AuthCheck');

Route::get('/topData', 'TranksaksiController@showDataMenu')->middleware('AuthCheck');

Route::get('/transaksi', 'TranksaksiController@cashierTrx')->middleware('AuthCheck');

Route::get('/laporanAll', 'LaporanController@financeCount')->middleware('AuthCheck');
Route::post('/laporanAll', 'LaporanController@financeCountbyR')->middleware('AuthCheck');
