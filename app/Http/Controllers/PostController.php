<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function show($postId)
    {
        $post = Post::find($postId);
        $tag = $post->tag;
        $posts = Post::where('tag_id', $post->tag_id)->get();

        return view('postshow', compact('post', 'tag', 'posts'));
    }
    public function index()
    {
        $posts = Post::all();
        return view('home', compact('posts'));
    }

    //hiển thị form tạo bài viết
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'image_path' => 'required',
            'tag_id' => 'required|exists:tag,id'
        ]);
        Post::create($request->all());
        return redirect()->route('posts.index')->with('success', 'Bai viet da duo tao');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post')); // ✅ ĐÚNG
    }
    
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'image_path' => 'required',
            'tag_id' => 'required|exists:tag,id'
        ]);
        $post->update($request->all());
        return redirect()->route('posts.index')->with('success', 'Bai viet da duoc cap nhat');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts')->with('success', 'Bài viết đã bị xóa.');
    }

    public function list()
{
    $posts = Post::all();
    return view('posts.list', compact('posts')); 
}

}
