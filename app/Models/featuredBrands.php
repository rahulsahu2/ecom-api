<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class featuredBrands extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class,"category_id");
    }

    public function brands(){
        return $this->belongsTo(Brand::class,"brand_id");
    }
}
