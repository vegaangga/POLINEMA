<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function world(){
        return "Hallo dunia menggunakan controller";
    }
    public function home(){
        return '<a href=" https://www.educastudio.com/">Educational Games</a>';
    }

    public function hello() {
        return view('blog.hello', ['name' => 'Vega']);
       }

}
