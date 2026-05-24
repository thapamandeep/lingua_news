<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class Language extends Model
{
    protected $fillable = [
        'name',
        'code',
    ];

    public function news()
{
    return $this->hasMany(News::class);
}
}
