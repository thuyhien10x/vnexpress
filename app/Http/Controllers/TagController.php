<?php
namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;


class TagController extends Controller {

    public function show($tagId)
    {
        $tag = Tag::find($tagId);
        $posts = Post::where('tag_id',$tagId)->get();
        return view('show',compact('tag','posts'));
    }
}