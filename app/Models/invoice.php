<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'invoice';

    public function payment(){
        return $this->belongsTo(payment::class, 'id', 'invoice_id');
    }

}
