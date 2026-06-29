<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';

    protected $fillable = [
        'news_id',
        'image',
        'alt_text',
        'caption',
        'media_type',
        'mime_type',
        'file_size',
        'width',
        'height',
        'is_featured',
        'status',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'file_size'   => 'integer',
        'width'       => 'integer',
        'height'      => 'integer',
    ];

    /**
     * Relationship: Media belongs to News
     */
    public function news()
    {
        return $this->belongsTo(News::class);
    }

    /**
     * Get full image URL
     */
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }

    /**
     * Get formatted file size
     */
    public function getFormattedSizeAttribute()
    {
        if (!$this->file_size) {
            return 'N/A';
        }

        $size = $this->file_size;

        if ($size >= 1073741824) {
            return round($size / 1073741824, 2) . ' GB';
        }

        if ($size >= 1048576) {
            return round($size / 1048576, 2) . ' MB';
        }

        if ($size >= 1024) {
            return round($size / 1024, 2) . ' KB';
        }

        return $size . ' Bytes';
    }

    /**
     * Check if media is active
     */
    public function isActive()
    {
        return $this->status === 'active';
    }

    /**
     * Check if media is featured
     */
    public function isFeatured()
    {
        return $this->is_featured;
    }
}