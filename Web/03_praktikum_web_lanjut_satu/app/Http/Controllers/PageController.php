<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        echo "Selamat Datang";
    }

    public function about(){
        echo "Nim: 2041723013";
        echo "<br>";
        echo "Nama: Vega Anggaresta";
    }
    public function articles($id){
        return "Halaman Artikel dengan ID ke->$id";
    }
    /*
    public function news($id){
        return '<a href="https://www.educastudio.com/news">News</a>';
    } */
    public function educa($id){
        return '<a href="https://www.educastudio.com/news/'.$id.'">https://www.educastudio.com/news/'.$id.'</a>';
    }

    public function news($id=null){
        return '<a href="https://www.educastudio.com/news">News</a>';
    }
}
