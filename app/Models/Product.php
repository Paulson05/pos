<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    protected $table ='products';
    use HasFactory;
    public function unit(){
        return $this->belongsTo(Unit::class, 'units_id', 'id');
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'suppliers_id', 'id');
    }
public function category(){
        return $this->belongsTo(Category::class, 'categories_id', 'id');
}
}
