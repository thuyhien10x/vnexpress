<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Tag;
use App\Models\Post;


class TagController extends Controller {

    public function show($tagId)
    {
        $tag = Tag::find($tagId);
        $posts = Post::where('tag_id',$tagId)->get();
        return view('show',compact('tag','posts'));
    }
    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tag,name',
        ]);

        Tag::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Thêm danh mục thành công!');
    }

    public function edit($tagId)
    {
        $tag = Tag::findOrFail($tagId);
        return view('tags.edit', compact('tag'));
    }
    public function update(Request $request, $tagId)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tags,name,' . $tagId,
        ]);

        $tag = Tag::findOrFail($tagId);
        $tag->update($request->all());

        return redirect()->route('tags.index')->with('success', 'Tag đã được cập nhật!');
    }
  
    public function index()
{
    $tags = Tag::all();
    return view('tags.index', compact('tags'));
}

}