<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'id',
        'model_id',
        'capaticy',
        'price',
        'sale',
        'stock',
    ];

    public function getModelProduct(){
        return $this->hasOne(ModelSP::class,'model_id','id');
    }
}
