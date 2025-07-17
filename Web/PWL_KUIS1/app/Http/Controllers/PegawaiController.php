<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function pegawai(){

        /* $data = DB::table('pegawai')->paginate(2);

        return view('pegawai',['pegawai' => $data]);
        */
        
        $data = pegawai::paginate(5);
        return view('pegawai', ['pegawai' => $data]);
    }
}
