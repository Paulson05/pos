<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $guarded = [];
    protected $table = 'payments';
    use HasFactory;
    public function customer(){
        return $this->belongsTo(Customer::class, 'customers_id', 'id');
    }
}
