<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;



Route::get('/', [PostController::class, 'index'])->name('home');


Route::get('/tags/{tagId}', [TagController::class, 'show'])->name('tags.show');


Route::get('/posts/{postId}', [PostController::class, 'show'])->name('posts.show');
