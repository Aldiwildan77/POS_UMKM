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
Route::get('/index', 'TranksaksiController@showMenuCashier');//home kasir
Route::post('/index', 'TranksaksiController@addData');//post new transaction

Route::view('/home', 'customer/Index'); //home customer

Route::view('/dashboard', 'owner/Report'); //home owner

Route::get('/menuData', 'MenuController@showAll'); 
Route::post('/menuData', 'MenuController@addData');
Route::post('/menuData/{id}', 'MenuController@editData');

Route::get('/bahanData', 'StokBahanController@showAll');
Route::post('/bahanData', 'StokBahanController@newIngredient'); //new bahan
Route::post('/bahanEdit', 'StokBahanController@editData'); //edit data belanja
Route::post('/bahanNew', 'StokBahanController@newShop'); //new belanja

Route::get('/karyawanData', 'KaryawanController@showAll');
Route::post('/karyawanData', 'KaryawanController@addData');
Route::post('/karyawanData/{id}', 'KaryawanController@editData');

Route::get('/operasionalData', 'OperasionalController@showAll');
Route::post('/operasionalData', 'OperasionalController@addData');
Route::post('/operasionalData/{id}', 'OperasionalController@editData');

Route::get('/resepData', 'ResepController@showAll');
Route::post('/resepData', 'ResepController@addData'); 
Route::post('/resepData/{id}', 'ResepController@editData'); // issue, edit current recipe nambah data baru not edited

Route::get('/stokData', 'StokJadiController@showAll');
Route::post('/stokData', 'StokJadiController@addData');
Route::post('/stokData/{id}', 'StokJadiController@editData');

Route::get('/laporanData', 'TranksaksiController@showDataTrx');

Route::get('/topData', 'TranksaksiController@showDataMenu');

Route::get('/transaksi', 'TranksaksiController@cashierTrx');

Route::get('/laporanAll', 'LaporanController@financeCount');