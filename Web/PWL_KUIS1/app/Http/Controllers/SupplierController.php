<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function supplier(){

        $data = supplier::paginate(5);
        return view('supplier', ['supplier' => $data]);
        }
}
