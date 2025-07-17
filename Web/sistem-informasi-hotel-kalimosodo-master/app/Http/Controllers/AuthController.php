<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = new Repository($user);
    }

    public function showLogin()
    {
        return view('user.login');
    }

    public function showRegister()
    {
        return view('user.register');
    }

    public function login(LoginRequest $request)
    {
        $data = [
            'email'     => $request->email,
            'password'  => $request->password,
        ];

        Auth::attempt($data);

        if (Auth::check()) {
            if (Auth::user()->role == 1) {
                return redirect()->route('dashboard.index');
            }
            return redirect()->route('home.index');
        } else {
            return redirect()->route('auth.showLogin')->with('error', 'Email atau password salah');
        }
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->only(['name', 'email', 'address', 'phone']);
        $password = Hash::make($request->password);
        $payload = array_merge($data, ['password' => $password]);
        $this->model->create($payload);
        return redirect()->route('auth.showLogin')->with('success', 'Registrasi berhasil');
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('home.index');
    }
}