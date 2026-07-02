<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

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

public function store(StorePostRequest $request){
                   Post::create([
                    'content' => $request->content,
                    'user_id' => Auth::id(),
                   ]);
                   return redirect()->route('feed.index');
    }

    public function edit(Post $post){
        return view('posts.edit',compact('post'));
    }
public function update(StorePostRequest $request, Post $post){
    $post->update([
        'content' =>$request->content,
    ]);
    return redirect()->route('feed.index');

}
    
}    
