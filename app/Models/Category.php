<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\News;
use App\Models\Subcategory;

class Category extends Model
{
    protected $fillable =[
        
        'slug',
        'status',
    ];

  public function news()
{
    return $this->hasMany(News::class);
} 

public function subcategories()
{
    return $this->hasMany(Subcategory::class);
}

public function translations()
{
return $this->hasMany(CategoryTranslation::class);
}

public function translation()
{
    return $this->hasOne(CategoryTranslation::class)
        ->where('locale', session('lang', 'en'));
}

}
