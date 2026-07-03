<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
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
             'headline' => 'required|string|max:255',
             'password' => 'required|min:8|confirmed',
        ]);

        $user =User::create([
            'name' => $request->name,
            'email' => $request->email,
            'headline' => $request->headline,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        Auth::login($user);
        return redirect(route('feed.index',absolute:false));
    }

    public function login (Request $request){
        if(Auth::attempt([
            'email' => $request->email,
         'password' => $request->password])){
                   
        return redirect(route('feed.index',absolute:false));
        }
        return back();
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}