<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post){ 
    Comment::create([
        'content' =>$request->content,
         'user_id' =>Auth::id(),
         'post_id' =>$post->id,

    ]);

    return redirect()->back();
    }

}
