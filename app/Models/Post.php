<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';
    //cho pheps mass assignment
    protected $fillable = ['title', 'description', 'image_path', 'content', 'tag_id'];

    public function Tag() {
        return $this->belongsTo(Tag::class);
    }
}
