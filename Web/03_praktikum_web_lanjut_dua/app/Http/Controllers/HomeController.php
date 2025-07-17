<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){

        // Mengambil data dari table Home sesuai id
        $data = DB::table('homes')->orderBy('home_id')->paginate(1);

        //mengirim data ke view home
        return view ('home', ['data' => $data]);

        /*$alldata = Home::all();
        return view ('home', ['data' => $alldata]);
        */
    }
}
