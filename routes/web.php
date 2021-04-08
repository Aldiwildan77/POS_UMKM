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
Route::view('/index', 'cashier/home'); //home kasir

Route::view('/home', 'customer/Index'); //home customer

Route::get('/menuData', 'MenuController@showAll'); //home owner
Route::post('/menuData', 'MenuController@addData');

Route::get('/bahanData', 'StokBahanController@showAll');
Route::post('/bahanData', 'StokBahanController@addData');

Route::get('/karyawanData', 'KaryawanController@showAll');
Route::post('/karyawanData', 'KaryawanController@addData');

Route::get('/operasionalData', 'OperasionalController@showAll');
Route::post('/operasionalData', 'OperasionalController@addData');

Route::get('/resepData', 'ResepController@showAll');
Route::post('/resepData', 'ResepController@addData');

Route::get('/stokData', 'StokJadiController@showAll');

Route::get('/laporanData', 'TranksaksiController@showDataTrx');

Route::get('/topData', 'TranksaksiController@showDataMenu');