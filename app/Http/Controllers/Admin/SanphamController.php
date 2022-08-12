<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\SanPham;
use App\Models\ModelSP;
use App\Models\LoaiSP;
use Illuminate\Support\Facades\DB;
session_start();
class SanphamController extends Controller
{
    function index()
    {
        $dsLoaisanpham =  DB::table('product_category')->where('status','=','1')->get();
        $dsNhasanxuat=  DB::table('branch')->where('status','=','1')->get();
        $dssanpham =  DB::table('product')
        ->select(DB::raw("product.id as id, model_id, stock, capacity, product_model.model_name, product_model.image,product_model.description,sale,price,color"))
        ->join('product_model', 'product_model.id', '=', 'product.model_id') 
        ->orderBy('product.id', 'desc')->where('product.status','=','1')->get(); 
        $dsmausanpham =  DB::table('product_model')
        ->orderBy('product_model.id', 'desc')->where('product_model.status','=','1')->get();  
        return view('admin.sanpham.index',compact('dssanpham','dsmausanpham','dsLoaisanpham','dsNhasanxuat'));
    }
    function create()
    {
        $dsLoaisanpham =  DB::table('product_category')->where('status','=','1')->get();
        $dssanpham =  DB::table('product_model')->where('status','=','1')->get();
        return view('admin.sanpham.create',compact('dssanpham','dsLoaisanpham'));
    }
    function xulycreate(Request $req){
        $KH = new SanPham();
        $KH->model_id = $req->model_id;
        $KH->price = $req->price;
        $KH->stock = $req->stock;
        $KH->color = $req->color;
        $KH->capacity = $req->capacity;
        $KH->sale = $req->sale;
        $KH->status = 1;
        $KH -> save();
        $dsSanPham = SanPham::all();
       return redirect()->route('sanpham',compact('dsSanPham'));
    }
    function edit($id)
    {
        $thongtin = SanPham::find($id);
        $dssanpham =  DB::table('product_model')->get();
        return view('admin.sanpham.edit',compact('thongtin','dssanpham'));
    }

    function xulyedit(Request $req, $id){       
        $KH = SanPham::find($id);
        $KH->model_id = $req->model_id;
        $KH->price = $req->price;
        $KH->stock = $req->stock;
        $KH->color = $req->color;
        $KH->capacity = $req->capacity;
        $KH->sale = $req->sale;
        $KH->status = 1;
        $KH -> save();    
        $dssanpham = SanPham::all();
       return redirect()->route('sanpham',compact('dssanpham'));
    }
    function xulydelete($id){       
        $KH = SanPham::find($id);
        $KH -> status = 0;
        $KH -> save();
        $dssanpham = DB::table('product')->where('status','=','1')->get();    
        return redirect()->route('sanpham',compact('dssanpham'));
    } 
    public function xylytkSP(Request $request)
    {
        $name = $request->name;
        $dssanpham = DB::table('product')
        ->join('product_model', 'product_model.id', '=', 'product.model_id') 
        ->where('model_name', 'LIKE', "%$name%")->where('product.status','1')->get();
        $dsLoaisanpham =  DB::table('product_category')->where('status','=','1')->get();
        $dsNhasanxuat=  DB::table('branch')->where('status','=','1')->get();
        $dsmausanpham =  DB::table('product_model')
        ->orderBy('product_model.id', 'desc')->where('product_model.status','=','1')->get();  
        return view('admin.sanpham.index',compact('dssanpham','dsmausanpham','dsLoaisanpham','dsNhasanxuat'));
    }
}
