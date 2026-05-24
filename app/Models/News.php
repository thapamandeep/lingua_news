<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Role;
use App\Models\Subcategory;
use App\Models\NewsTranslation;

class News extends Model
{
    protected $fillable = [
        'slug',
        'image',
        'category_id',
        'subcategory_id',
        'role_id',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function translations()
    {
        return $this->hasMany(NewsTranslation::class);
    }
}