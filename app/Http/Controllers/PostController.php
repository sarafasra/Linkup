<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{ 
    public function index()
    {
        $posts = Post::with('user')->latest()->get();

        return view('feed', compact('posts'));
    }
}  
