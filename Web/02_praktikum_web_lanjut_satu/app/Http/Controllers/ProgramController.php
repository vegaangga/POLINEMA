<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /* */
    public function program($id){
        echo '<a href="https://www.educastudio.com/program/'.$id.'">https://www.educastudio.com/program/'.$id.'</a>';
    }

    /*
    public function program($id=null){
        if ($id){
            echo '<a href="https://www.educastudio.com/program/'.$id.'">https://www.educastudio.com/program/'.$id.'</a>';
        } else {
            echo 'List Program';
            echo '<br>';
            echo 'https://www.educastudio.com/program/karir';
            echo '<br>';
            echo 'https://www.educastudio.com/program/magang';
            echo '<br>';
            echo 'https://www.educastudio.com/program/kunjungan-industri';
        }

    } */
}
