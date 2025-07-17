<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function barang(){

        $data = barang::paginate(10);
        return view('barang', ['barang' => $data]);

        /*
        $data = DB::table('barang')->paginate(1);

        return view('barang',['barang' => $data]);
        */
    }
}
