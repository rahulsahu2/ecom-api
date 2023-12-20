<?php

namespace App\Models\Brands;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandBestSellers extends Model
{
    use HasFactory;
    public function Brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function Product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
