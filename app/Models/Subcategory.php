<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\News;

class Subcategory extends Model
{
    
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'status',
    ];

       public function category()
    {
        return $this->belongsTo(Category::class);
    }

       public function news()
    {
        return $this->hasMany(News::class);
    }
}
