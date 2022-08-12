<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\NSX;
use Illuminate\Support\Facades\DB;
class NhasanxuatController extends Controller
{
    function index()
    {
        $dsnhasanxuat = DB::table('branch')->where('status','=','1')->get();   
        return view('admin.nhasanxuat.index',compact('dsnhasanxuat'));
    }
    function create()
    {
        return view('admin.nhasanxuat.create');
    }

    function xulycreate(Request $req){
        $KH = new NSX();
        $KH->branch_name = $req->ten_nsx;
        $KH->info = $req->thong_tin;
        $KH->status = 1; 
        //$KH->anhdaidien = $req->anhdaidien;
        //$KH->trang_thai = 1;
        $KH -> save();
        $dsnhasanxuat = NSX::all();
       return redirect()->route('nhasanxuat',compact('dsnhasanxuat'));
    }
    function edit($id)
    {
        $thongtin = NSX::find($id);
        return view('admin.nhasanxuat.edit',compact('thongtin'));
    }

    function xulyedit(Request $req, $id){       
        $KH = NSX::find($id);
        $KH->branch_name = $req->ten_nsx;
        $KH->info = $req->thong_tin;
        //$KH->trang_thai = 1;
        // $a = $KH->anhdaidien;
        // if($req->anhdaidien == '')
        // {
        //     $KH->anhdaidien = $a;
        // }else{
        //     $KH->anhdaidien = $req->anhdaidien;
        // }
        $KH -> save();    
        $dsnhasanxuat = NSX::all();
       return redirect()->route('nhasanxuat',compact('dsnhasanxuat'));
    }

    function xulydelete($id){       
        $KH = NSX::find($id);
        $KH->status = 0; 
        $KH -> save();
        $dsnhasanxuat = DB::table('branch')->where('status','=','1')->get();   
        return redirect()->route('nhasanxuat',compact('dsnhasanxuat'));
    } 
    public function xylytkNSX(Request $request)
    {
        $branch_name = $request->name;
        $dsnhasanxuat = DB::table('branch')
        ->where('branch_name', 'LIKE', "%$branch_name%")
        ->where('status','=','1')->get(); 
        return view('admin.nhasanxuat.index',compact('dsnhasanxuat'));
    }
}
