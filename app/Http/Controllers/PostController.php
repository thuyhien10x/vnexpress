<?php
namespace App\Http\Controllers;

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
}
