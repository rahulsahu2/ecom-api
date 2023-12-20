<?php

namespace App\Models\Brands;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandCategories extends Model
{
    use HasFactory;
    public function Brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
}
