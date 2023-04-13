<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'post_text', 'category_id'];

    // accessing category of posts table aka field_category_id from db
    public function category()
    {
        // one to many relationship
        return $this->belongsTo(Category::class);
    }
}
