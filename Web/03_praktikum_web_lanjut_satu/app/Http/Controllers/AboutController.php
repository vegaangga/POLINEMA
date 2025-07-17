<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about(){
        echo "Nim: 2041723013";
        echo "<br>";
        echo "Nama: Vega Anggaresta";
    }

    public function aboutview(){
        return view('prak1.about-us', ['link' => 'about-us']);
    }
}
