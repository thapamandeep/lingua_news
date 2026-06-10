<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'profile_img',
        'country',
        'status',
    ];

    protected $hidden = [
        'password',
    ];
}