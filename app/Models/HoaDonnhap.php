<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KhachHang;
class HoaDonnhap extends Model
{
    use HasFactory;
    protected $table = 'bill_input';
    public function getname(){
        return $this->belongsTo(KhachHang::class,'user_id','id');
    }
}