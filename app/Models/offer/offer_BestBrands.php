<?php

namespace App\Models\Offer;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offer_BestBrands extends Model
{
    use HasFactory;
    public function Brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
}
