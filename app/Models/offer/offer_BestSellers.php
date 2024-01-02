<?php

namespace App\Models\Offer;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offer_BestSellers extends Model
{
    use HasFactory;
    public function Product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
