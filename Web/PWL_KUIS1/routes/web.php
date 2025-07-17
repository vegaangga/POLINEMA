<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\VarDumper\Cloner\Data;

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

/*
   Route::get('/',[CompanyController::class, 'index']);
   Route::get('/about',[CompanyController::class, 'about']);
   Route::get('/profile',[CompanyController::class, 'profile']);
   Route::get('/contact',[CompanyController::class, 'contact']);
*/

//Praktikum 4 Model - Database

Route::get('/',[HomeController::class, 'index']);
Route::get('/data',[DataController::class, 'data']);

Route::prefix('data')->group(function () {
   Route::get('/pegawai', [PegawaiController::class,'pegawai']);
   Route::get('/barang', [BarangController::class,'barang']);
   Route::get('/supplier', [SupplierController::class,'supplier']);
   Route::get('/pelanggan', [PelangganController::class,'pelanggan']);
});

Route::get('/about',[AboutController::class, 'about']);
Route::get('/profile',[ProfileController::class, 'profile']);
Route::get('/contact',[ContactController::class, 'contact']);



