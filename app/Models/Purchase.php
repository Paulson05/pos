<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $table = 'purchases';
    protected $guarded = [];

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'suppliers_id');
    }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'products_id');
    }
}