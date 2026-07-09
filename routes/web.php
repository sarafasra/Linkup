<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return response('OK', 200);
});

Route::middleware('auth')->group(function () {

   
    Route::get('/feed', [PostController::class, 'index'])->name('feed.index');

     Route::post('/posts/{post}/like' , [LikeController::class, 'toggle'])->name('posts.like');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])
        ->name('comments.store');
Route::get('/users/{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::delete('/comments/{comment}' , [CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');