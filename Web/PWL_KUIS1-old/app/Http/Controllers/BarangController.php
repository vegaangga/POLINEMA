<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function barang(){

        $data = DB::table('barang')->paginate(1);

        return view('barang',['barang' => $data]);
    }
}
