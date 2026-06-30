<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
             'headline' => 'required|min:8|max:255',
             'password' => 'required|min:8|confirmed',
        ]);

        $user =User::create([
            'name' => $request->name,
            'email' => $request->email,
            'headline' => $request->headline,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);
        return redirect('/feed');
    }
}