<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Role;
use App\Models\Subcategory;
use App\Models\NewsTranslation;
use App\Models\User;
use App\Models\Media;

class News extends Model
{
    protected $fillable = [
        'slug',
        'image',
        'category_id',
        'subcategory_id',
        'author_id',
        'status',
        'approved_by',
        'approved_at'

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
    return $this->hasMany(NewsTranslation::class, 'news_id');
}

    public function author()
{
    return $this->belongsTo(User::class, 'author_id');
}

/**
 * A news article can have many media files.
 */
public function media()
{
    return $this->hasMany(Media::class);
}

/**
 * Get the featured image.
 */
public function featuredMedia()
{
    return $this->hasOne(Media::class)
                ->where('is_featured', true);
}

/**
 * Gallery images only.
 */
public function galleryMedia()
{
    return $this->hasMany(Media::class)
                ->where('media_type', 'gallery');
}

/**
 * Active media only.
 */
public function activeMedia()
{
    return $this->hasMany(Media::class)
                ->where('status', 'active');
}
}