<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;

class SubcategoryTranslation extends Model
{
    protected $fillable = [
        'subcategory_id',
        'locale',
        'name',
        'description',
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}