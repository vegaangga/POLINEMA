<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){

        $data = Home::where('home_id',1)->first();
        $header = Home::where('home_id',2)->first();
        $slider = Home::where('home_id',3)->first();

        return view ('home',['slider' => $slider],['header' => $header]);
        /*$alldata = Home::all();
        return view ('home', ['data' => $alldata]);
        */
    }
}
