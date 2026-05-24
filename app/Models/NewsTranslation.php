<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\News;
use App\Models\Language;
class NewsTranslation extends Model
{
    protected $fillable = [
        'news_id',
        'language_id',
        'title',
        'description',
        'content'
    ];

    public function news()
    {
        return $this->belongsTo(
            News::class
        );
    }
    public function language()
{
    return $this->belongsTo(Language::class);
}
}