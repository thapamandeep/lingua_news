<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class News extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'image',
        'category_id',
        'user_id',
        'status'
    ];

    public function category()
{
    return $this->belongsTo(Category::class);
}
}
