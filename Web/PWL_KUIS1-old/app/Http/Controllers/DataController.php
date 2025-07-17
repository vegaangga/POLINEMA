<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function data(){

        $data = pegawai::paginate(2);

        return view ('table.data',['pegawai' => $data]);

        
    }
}