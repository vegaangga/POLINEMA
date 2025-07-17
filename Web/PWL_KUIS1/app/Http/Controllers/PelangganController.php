<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    public function pelanggan(){

    $data = pelanggan::paginate(5);

    return view('pelanggan', ['pelanggan' => $data]);
    }
}
