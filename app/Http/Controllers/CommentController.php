<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(StorCommentRequest $request, Post $post)
    {
        Comment::create([
            'content' => $request->content,
            'user_id' => Auth::id(),
            'post_id' => $post->id,
        ]);

        return back();
    }
}