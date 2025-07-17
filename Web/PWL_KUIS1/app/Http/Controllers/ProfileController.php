<?php

namespace App\Http\Controllers;
use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function profile(){

        $data = Profile::paginate(5);

        $header = Profile::where('profile_id', 21)->first();
        return view('profile', ['profile' => $data], ['headers' => $header]);
        }
}
