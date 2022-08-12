<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
class NhanvienController extends Controller
{
    function index()
    {
        $dsnhanvien = DB::table('admin')->where('status','=','1')->get();   
        return view('admin.nhanvien.index',compact('dsnhanvien'));
    }
    function create()
    {
        $dsnhanvien = DB::table('admin')->where('status','=','1')->get();
        return view('admin.nhanvien.create');
    }

    function xulycreate(Request $req){
        $KH = new Admin();
        $KH->full_name = $req->hoten;
        $KH->username = $req->tentaikhoan;
        $KH->email = $req->email;
        $KH->password = bcrypt($req->matkhau);
        $KH->birth = $req->ngaysinh;
        $KH->address = $req->diachi;
        $KH->gender = $req->gioitinh;
        $KH->phone_number = $req->sodienthoai;
        if($file=$req->file('anhdaidien'))
        {
        $extention=$file->getClientOriginalExtension();
        $filename=time().'.'.$extention;
        $file->move('adminavatar/',$filename);
        $KH->avatar =$filename;
        }
        //$KH->anhdaidien = $req->anhdaidien;
        $KH->status = 1;
        $KH -> save();
        $dsnhanvien = Admin::all();
       return redirect()->route('nhanvien',compact('dsnhanvien'));
    }
    function edit($id)
    {
        $thongtin = Admin::find($id);
        return view('admin.nhanvien.edit',compact('thongtin'));
    }

    function xulyedit(Request $req, $id){       
        $KH = Admin::find($id);
        $KH->full_name = $req->hoten;
        $KH->username = $req->tentaikhoan;
        $a = $KH->birth;
        if($req->ngaysinh == null)
        {
            $KH->birth = $a;
        }else{
            $KH->birth = $req->ngaysinh;
        }
        $KH->address = $req->diachi;
        $KH->gender = $req->gioitinh;
        $KH->phone_number = $req->sodienthoai;
        $KH->status = 1;
        $a = $KH->avatar;
        if($req->anhdaidien == '')
        {
            $KH->avatar = $a;
        }else if($file=$req->file('anhdaidien'))
        {
        $extention=$file->getClientOriginalExtension();
        $filename=time().'.'.$extention;
        $file->move('adminavatar/',$filename);
        $KH->avatar =$filename;
        }
        $KH -> save();    
        $dsnhanvien = Admin::all();
       return redirect()->route('nhanvien',compact('dsnhanvien'));
    }

    function xulydelete($id){       
        $KH = Admin::find($id);
        $KH -> status = 0;
        $KH -> save();
        $dsnhanvien = DB::table('admin')->where('status','=','1')->get();    
        return redirect()->route('nhanvien',compact('dsnhanvien'));
    } 
    function suaprofile($id)
    {
        $thongtin = Admin::find($id);
        return view('admin.profile.thongtin',compact('thongtin'));
    }
    
    function xylysuaprofile($id)
    {
        $KH = Admin::find($req->$id);
        $KH->full_name = $req->full_name;
        $KH->id = $req->id;
        $KH->username = $req->username;
        $a = $KH->birth;
        if($req->birth == null)
        {
            $KH->birth = $a;
        }else{
            $KH->birth = $req->birth;
        }
        $KH->address = $req->address;
        $KH->gender = $req->gender;
        $KH->phone_number = $req->phone_number;
        $KH->status = 1;
        $a = $KH->avatar;
        if($req->avatar == '')
        {
            $KH->avatar = $a;
        }else if($file=$req->file('anhdaidien'))
        {
        $extention=$file->getClientOriginalExtension();
        $filename=time().'.'.$extention;
        dd($filename);
        $file->move('adminavatar/',$filename);
        $KH->avatar =$filename;
        }
        $KH -> save();    
        $dsnhanvien = Admin::all();
       return redirect()->route('nhanvien',compact('dsnhanvien'));
    }
    public function xylytkNV(Request $request)
    {
        $name = $request->name;
        $dsnhanvien = DB::table('admin')
        ->where('full_name', 'LIKE', "%$name%")
        ->where('status','=','1')->get();
        return view('admin.nhanvien.index',compact('dsnhanvien'));
    }
}
