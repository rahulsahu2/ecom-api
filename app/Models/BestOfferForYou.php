<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestOfferForYou extends Model
{
    use HasFactory;
    public function Product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
