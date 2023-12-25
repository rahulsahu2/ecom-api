<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBestSellers extends Model
{
    use HasFactory;
    public function Category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
