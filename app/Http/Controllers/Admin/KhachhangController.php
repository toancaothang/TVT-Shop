<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Khachhang;
use Illuminate\Support\Facades\DB;

class KhachhangController extends Controller
{
    function index()
    {
        $dskhachhang = DB::table('user')->where('status','=','1')->get();   
        return view('admin.khachhang.index',compact('dskhachhang'));
    }
    function create()
    {
        $dskhachhang = DB::table('user')->where('status','=','1')->get();
        return view('admin.khachhang.create');
    }

    function xulycreate(Request $req){
        $KH = new khachhang();
        $KH->full_name = $req->hoten;
        $KH->username = $req->tentaikhoan;
        $KH->email = $req->email;
        $KH->password = $req->matkhau;
        $KH->birth = $req->ngaysinh;
        $KH->address = $req->diachi;
        $KH->gender = $req->gioitinh;
        $KH->phone_number = $req->sodienthoai;
        if($req->hasfile('anhdaidien'))
        {
       $file=$req->anhdaidien;
        $extention=$file->getClientOriginalExtension();
        $filename=time().'.'.$extention;
        $file->move('users/',$filename);
        $KH->avatar =$filename;
        }
        $KH->status = 1;
        $KH -> save();
        $dskhachhang = khachhang::all();
       return redirect()->route('khachhang',compact('dskhachhang'));
    }
    function edit($id)
    {
        $thongtin = khachhang::find($id);
        return view('admin.khachhang.edit',compact('thongtin'));
    }

    function xulyedit(Request $req, $id){       
        $KH = khachhang::find($id);
        $KH->full_name = $req->hoten;
        $KH->username = $req->tentaikhoan;
        $KH->email = $req->email;
        $KH->address = $req->diachi;
        $KH->gender = $req->gioitinh;
        $KH->phone_number = $req->sodienthoai;

        $a = $KH->birth;
        if($req->ngaysinh == null)
        {
            $KH->birth = $a;
        }else{
            $KH->birth = $req->ngaysinh;
        } 
        $a = $KH->avatar;
       if($req->anhdaidien == '')
        {
            $KH->avatar = $a;
        }else if($file=$req->file('anhdaidien'))
        {
            $extention=$file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('users/',$filename);
            $KH->avatar =$filename;
        }
        $KH->status = 1;
        $KH -> save();    
        $dskhachhang = khachhang::all();
       return redirect()->route('khachhang',compact('dskhachhang'));
    }

    function xulydelete($id){       
        $KH = khachhang::find($id);
        $KH -> status = 0;
        $KH -> save();
        $dskhachhang = DB::table('user')->where('status','=','1')->get();    
        return redirect()->route('khachhang',compact('dskhachhang'));
    } 
    public function xylytkKH(Request $request)
    {
        $khachhang_name = $request->khachhang_name;
        $dskhachhang = DB::table('user')
        ->where('full_name', 'LIKE', "%$khachhang_name%")
        ->where('status','=','1')->get();
        return view('admin.khachhang.index',compact('dskhachhang'));
    }
}
