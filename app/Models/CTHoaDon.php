<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTHoaDon extends Model
{
    use HasFactory;
    protected $table = 'bill_details';
    protected $fillable = [
        'pro_model_id',
        'bill_id',
        'product_id',
        'quantity',
        'unit_price',
        
    
    ];

}
