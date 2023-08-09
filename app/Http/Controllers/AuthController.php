<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function registrationForm()
    {
        return view('auth.register');
    }
    public function register(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $register_user = new User;
        $register_user->name = $req->name;
        $register_user->email = $req->email;
        $register_user->user_id = 2;
        $register_user->password = Hash::make($req->password);
        $register_user->save();

        // $token = $register_user->createToken('API Token')->accessToken;
        // return response(['user' => $register_user, 'token' => $token]);
    }
    public function loginForm()
    {
        return view('auth.login');
    }
    public function login(Request $req)
    {
        $credentials = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        Auth::attempt($credentials);
        return redirect()->to(url('/'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
