<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UploadController;


Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);


Route::get('/', [PostController::class, 'index'])->name('dashboard');

Route::resource('posts', PostController::class);


Route::get('/tags/{tagId}', [TagController::class, 'show'])->name('tags.show');


Route::get('/posts/{postId}', [PostController::class, 'show'])->name('posts.show');


Route::get('/dashboard', [PostController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/posts-list', [PostController::class, 'list'])->name('posts.list');
Route::get('/tags-list', [TagController::class, 'index'])->name('tags.list');
Route::resource('tags', TagController::class)->parameters(['tags' => 'tagId']);
Route::post('/tag', [TagController::class, 'store'])->name('tag.store');
Route::get('/upload', function () {
    return view('upload');
});

Route::get('/upload', function () {
    return view('upload');
});

Route::post('/upload', [UploadController::class, 'store'])->name('upload.store');


require __DIR__ . '/auth.php';
