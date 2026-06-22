<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\News;
use App\Models\SubcategoryTranslation;
class Subcategory extends Model
{
    
    protected $fillable = [
        'category_id',
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

    public function translations()
{
    return $this->hasMany(SubcategoryTranslation::class);
}

public function translation()
{
    return $this->hasOne(SubcategoryTranslation::class)
        ->where('locale', session('lang', 'en'));
}
}
