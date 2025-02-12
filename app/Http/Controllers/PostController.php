<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;


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
        $tags = Tag::all();
        return view('posts.create', compact('tags')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tag_id' => 'required|exists:tag,id'
        ]);
    
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public');
        }
    
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image_path' => $path ?? null, // Nếu không có ảnh, đặt null
            'tag_id' => $request->tag_id
        ]);
    
        return redirect()->route('posts.index')->with('success', 'Bài viết đã được tạo');
    }
    

    public function edit(Post $post)
    {
        $tags = Tag::all();
        return view('posts.edit', compact('tags','post')); 
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
        return redirect()->route('posts.index')->with('success', 'Bài viết đã bị xóa.');
    }

    public function list()
{
    $posts = Post::all();
    return view('posts.list', compact('posts')); 
}

}
