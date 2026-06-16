<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
     protected $fillable = [
        'about_site_name',
        'about_hero_description',

        'feature_1',
        'feature_2',
        'feature_3',
        'feature_4',

        'story_title',

        'who_we_are',
        'mission_quote',
        'vision_content',

        'stat1_number',
        'stat1_label',

        'stat2_number',
        'stat2_label',

        'stat3_number',
        'stat3_label',
    ];
}
