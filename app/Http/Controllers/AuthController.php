<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registrationForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $register_user = new User;
        $register_user->name = $request->name;
        $register_user->email = $request->email;
        $register_user->user_id = 2;
        $register_user->password = Hash::make($request->password);
        $register_user->save();

        // $token = $register_user->createToken('API Token')->accessToken;
        // return response(['user' => $register_user, 'token' => $token]);
    }
    public function loginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        return $request->all();
        // $validator = Validator::make($request->all(), [
        //     'email' => 'email|required',
        //     'password' => 'required'
        // ]);
        // $data = $request->all();

        // if ($validator->fails()) {
        //     return response()->json($validator->errors());
        // } else {
        //     auth()->attempt($data);
        //     $token = auth()->user()->createToken('API Token')->accessToken;
        //     return response(['user' => auth()->user(), 'token' => $token]);
        // }
    }
}
