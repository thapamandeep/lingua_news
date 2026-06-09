<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name','username',
        'email','password',
        'profile_img','country',
        'status',
    ];
}
