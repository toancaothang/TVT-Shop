<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnhSP extends Model
{
    use HasFactory;
    protected $table = 'model_image';
    protected $fillable = [
        'id',
        'model_id',
        'file_name',
        
    
    ];
}
