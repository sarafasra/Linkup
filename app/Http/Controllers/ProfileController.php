<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user){
        $posts = $user->posts()->latest()->get();
        return view('profile.show', compact('user', 'posts'));
    }
}
