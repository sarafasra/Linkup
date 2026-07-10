<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response('OK', 200);
});

Route::middleware('auth')->group(function () {

    // Feed
    Route::get('/feed', [PostController::class, 'index'])->name('feed.index');

    // Posts
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    // Likes
    Route::post('/posts/{post}/like', [LikeController::class, 'toggle'])
        ->name('posts.like');

    // Comments
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])
        ->name('comments.store');

    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
        ->name('comments.destroy');

    // Public Profile
    Route::get('/users/{user}', [ProfileController::class, 'show'])
        ->name('profile.show');

    // Edit My Profile
    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    // Update My Profile
    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
});


// Authentication

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');