<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{ 
    public function index()
    {
        $posts = Post::with('user')->latest()->get();

        return view('feed', compact('posts'));
    }

    public function create(){

    return view ('posts.create');
    }

    public function store(){

    }
}    
