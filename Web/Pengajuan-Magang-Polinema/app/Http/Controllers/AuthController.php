<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        $auth = \Auth::attempt(['username' => $request->username, 'password' => $request->password]);
        if($auth)
        {
            $user = User::where('username', $request->username)->first();
            if($user->level == 'Admin'){
                return redirect()->route('users.index');
            }else if($user->level == 'Dosen')
                return redirect()->route('dosen.index');
            else{
                return redirect()->route('home.index');
            }

        }else{
            echo "unsuccessfully";
        }
    }

    public function logout(Request $request)
    {
        \Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
