<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

/*
   Route::get('/',[CompanyController::class, 'index']);
   Route::get('/about',[CompanyController::class, 'about']);
   Route::get('/profile',[CompanyController::class, 'profile']);
   Route::get('/contact',[CompanyController::class, 'contact']);
*/

//Praktikum 4 Model - Database

Route::get('/',[HomeController::class, 'index']);
Route::get('/about',[AboutController::class, 'about']);
Route::get('/profile',[ProfileController::class, 'profile']);
Route::get('/contact',[ContactController::class, 'contact']);

Route::get('/',[HomeController::class, 'index']);
