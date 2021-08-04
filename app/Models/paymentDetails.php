<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paymentDetails extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }

}
