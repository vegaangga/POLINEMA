<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){


        $header = Home::where('home_id',2)->first();
        $slider = Home::where('home_id',3)->first();
        $image = Home::where('home_title','image_slider')->first();
        $we = Home::where('home_id',4)->first();


        //return view ('home',['slider' => $slider],['header' => $header],['data' => $data]);

        return view('home')
            ->with('slider', $slider)
            ->with('header', $header)
            ->with('data', $image)
            ->with('we',$we);
        /*$alldata = Home::all();
        return view ('home', ['data' => $alldata]);
        */
    }
}
