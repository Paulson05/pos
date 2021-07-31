<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'invoice';

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'suppliers_id', 'id');
    }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function customers(){
        return $this->belongsTo(Customer::class, 'customers_id', 'id');

    }
}
