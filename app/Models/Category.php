<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\News;

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
}
