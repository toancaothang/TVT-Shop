<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModelSP;
class BinhLuan extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $fillable = [
        'id',
        'stars',
        'model_name',
        'comment_name',
    ];
    public function getmodel()
    {
            return $this->belongsTo(ModelSP::class);
    }

}
