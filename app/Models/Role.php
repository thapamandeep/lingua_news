<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\News;

class Role extends Model
{
    protected $fillable = [
        'name'
    ];

    public function users()
{
    return $this->hasMany(User::class);
}

public function news()
{
    return $this->hasMany(News::class);
}
}
