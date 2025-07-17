<?php

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
    return view('auth.login');
});

// Auth::routes();

Route::resource('users', 'UsersController');
Route::resource('admin', 'AdminController');
Route::resource('dosen', 'DosenController');
Route::resource('mahasiswa', 'MahasiswaController');
Route::resource('proposal', 'ProposalController');
Route::resource('aplication_letter', 'AplicationLetterController');
Route::patch('/aplication_letter/refuse/{id}','AplicationLetterController@refuse')->name('refuse');
Route::resource('report', 'ReportController');
Route::patch('/report/refuse/{id}','ReportController@refuse')->name('refuse_response_letter');
Route::resource('home', 'HomeController');


Route::post('/login', 'AuthController@login')->name('login');
Route::post('/logout', 'AuthController@logout')->name('logout');
