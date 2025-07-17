<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function data(){

        $data = DB::table('pegawai')->paginate(1);

        return view('table.data',['pegawai' => $data]);
    }
}