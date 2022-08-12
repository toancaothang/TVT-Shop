<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\LoaiSP;
use Illuminate\Support\Facades\DB;
class LoaisanphamController extends Controller
{
    function index()
    {
        $dsloaisanpham = DB::table('product_category')->where('status','=','1')->get();   
        return view('admin.loaisanpham.index',compact('dsloaisanpham'));
    }
    function create()
    {
        $dskhachhang = DB::table('product_category')->get();
        return view('admin.loaisanpham.create');
    }

    function xulycreate(Request $req){
        $KH = new LoaiSP();
        $KH->category_name = $req->category_name;
        //$KH->anhdaidien = $req->anhdaidien;
        $KH->status = 1;
        $KH -> save();
        $dsloaisanpham = LoaiSP::all();
       return redirect()->route('loaisanpham',compact('dsloaisanpham'));
    }
    function edit($id)
    {
        $thongtin = LoaiSP::find($id);
        return view('admin.loaisanpham.edit',compact('thongtin'));
    }

    function xulyedit(Request $req, $id){       
        $KH = LoaiSP::find($id);
        $KH->category_name = $req->category_name;
        $KH -> save();    
        $dsloaisanpham = LoaiSP::all();
       return redirect()->route('loaisanpham',compact('dsloaisanpham'));
    }

    function xulydelete($id){       
        $KH = LoaiSP::find($id);
        $KH->status = 0;
        $KH->save();
        $dsloaisanpham = DB::table('product_category')->where('status','=','1')->get();   
        return redirect()->route('loaisanpham',compact('dsloaisanpham'));
    } 
    public function xylytkLSP(Request $request)
    {
        $category_name = $request->category_name;
        $dsloaisanpham = DB::table('product_category')
        ->where('category_name', 'LIKE', "%$category_name%")
        ->where('status','=','1')->get();  
        return view('admin.loaisanpham.index',compact('dsloaisanpham'));
    }
}
