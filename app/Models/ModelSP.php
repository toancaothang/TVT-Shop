<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BinhLuan;
use App\Models\SanPham;
use App\Models\ModelSP;
class ModelSP extends Model
{
    use HasFactory;
    protected $table = 'product_model';
    
    public function getpro()
    {
            return $this->hasMany(SanPham::class,'model_id','id')->where('status',1)->where('stock','>',0);
    }
    public function getrate()
    {
            return $this->hasMany(BinhLuan::class,'model_id','id');
    }
    public function getimage()
    {
            return $this->hasMany(AnhSP::class,'model_id','id');
    }
    public function getcomment()
    {
            return $this->hasMany(BinhLuan::class,'model_id','id');
    }
    public function scopeSearch($query){
        if(request('key')){
            $key=request('key');
            $query=$query->where('model_name','like','%'.$key.'%')->orWhere('capacity','like','%'.$key.'%');
        }
        if(request('category_id')){
            $request=$request->where('category_id',request('cat_id'));
        }
        return $query;
    }
}
