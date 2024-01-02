<?php

namespace App\Models\lux_range;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lux_BestSellers extends Model
{
    use HasFactory;
    public function Product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
