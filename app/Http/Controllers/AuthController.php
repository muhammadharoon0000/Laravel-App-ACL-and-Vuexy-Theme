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
            'password' => 'min:3|required_with:confirm_password | same:confirm_password',
            'confirm_password' => 'min:3'
        ]);

        $register_user = new User;
        $register_user->user_role_id = 2;
        $register_user->name = $req->name;
        $register_user->email = $req->email;
        $register_user->password = Hash::make($req->password);
        $register_user->save();

        return redirect()->to(url('/login'));
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
        if (Auth::check() && Auth::user()->user_role['name'] === 'ADMIN') {
            return redirect()->to(url('/dashboard'));
        }
        return redirect()->to(url('/home'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
