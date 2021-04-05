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


Route::get('/bahanData', 'StokBahanController@showAll');

Route::get('/karyawanData', 'KaryawanController@showAll');

Route::get('/operasionalData', 'OperasionalController@showAll');

Route::get('/resepData', 'ResepController@showAll');

Route::get('/stokData', 'StokJadiController@showAll');

Route::view('/laporanData', 'owner/Laporan');

Route::view('/topData', 'owner/Top');