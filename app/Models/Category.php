<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\News;
use App\Models\Subcategory;

class Category extends Model
{
    protected $fillable =[
        'name',
        'slug',
        'status',
        'description',
    ];

  public function news()
{
    return $this->hasMany(News::class);
} 

public function subcategories()
{
    return $this->hasMany(Subcategory::class);
}
}
