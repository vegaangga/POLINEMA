<?php

use Illuminate\Http\Request;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [HomeController::class,'index'])->name('home');
// Route::get('/', [HomeController::class,'index']);
Route::get('/', [HomeController::class,'index']);

Route::resource('user', UserController::class);

Route::resource('anggota', AnggotaController::class);

Route::resource('buku', BukuController::class);
Route::get('/format_buku', [BukuController::class,'format']);
Route::post('/import_buku', [BukuController::class,'import']);

Route::resource('transaksi', TransaksiController::class);

Route::get('/laporan', [LaporanController::class,'index']);

Route::get('/laporan/trs', [LaporanController::class,'transaksi']);
Route::get('/laporan/trs/pdf', [LaporanController::class,'transaksiPdf']);
Route::get('/laporan/trs/excel', [LaporanController::class,'transaksiExcel']);

Route::get('/laporan/buku', [LaporanController::class,'buku']);
Route::get('/laporan/buku/pdf', [LaporanController::class,'bukuPdf']);
Route::get('/laporan/buku/excel', [LaporanController::class,'bukuExcel']);

Route::get('/laporan/user/pdf', [LaporanController::class,'userPdf']);
Route::get('/laporan/user/excel', [LaporanController::class,'userExcel']);

Route::get('/laporan/anggota/pdf', [LaporanController::class,'anggotaPdf']);
Route::get('/laporan/anggota', [LaporanController::class,'anggota']);
Route::get('/laporan/anggota/excel', [LaporanController::class,'anggotaExcel']);

Route::get('/katalog', [BukuController::class,'katalog']);
