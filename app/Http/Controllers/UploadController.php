<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->file('image')) {
            $path = $request->file('image')->store('uploads', 'public');
            return response()->json(['success' => true, 'image_url' => Storage::url($path)]);
        }
    
        return response()->json(['success' => false, 'message' => 'File upload failed.']);
    }
    
}
