<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\HoaDon;
use Illuminate\Support\Facades\DB;

class HoadonController extends Controller
{
    function index()
    {
        $dshoadon = DB::table('bill') 
        ->orderBy('id','DESC')->get(); 
        return view('admin.hoadon.index',compact('dshoadon'));
    }
    
    function edit($id)
    {
        $thongtin = HoaDon::find($id);
        $nhanvien = DB::table('admin')->get();
        $khachhang = DB::table('user')->get();
        $modelsanpham = DB::table('product_model')->get();
        $chitiethoadon = DB::table('bill_details')
        ->join('bill', 'bill.id', '=', 'bill_details.bill_id')
        ->join('product', 'product.id', '=', 'bill_details.product_id')
        ->where('bill_id' ,'=',$id)->get();  
        return view('admin.hoadon.edit',compact('thongtin','khachhang','nhanvien','chitiethoadon','modelsanpham'));
    }

    function xulyedit(Request $req, $id){       
        $KH = HoaDon::find($id);
        $KH->status = $req->status;
        $KH -> save();    
        $dshoadon = HoaDon::all();
       return redirect()->route('hoadon',compact('dshoadon'));
    }

    function xulydelete($id){       
        $KH = khachhang::find($id);
        $KH -> status = 0;
        $KH -> save();
        $dskhachhang = DB::table('user')->where('status','=','1')->get();    
        return redirect()->route('hoadon',compact('dskhachhang'));
    } 
    public function xylytkHD(Request $request)
    {
        $receiver_fullname = $request->name;
        $status = $request->status;
        if($status == '')
        {
            $dshoadon = DB::table('bill')->where('receiver_fullname', 'LIKE', "%$receiver_fullname%")->get();
        }else if($receiver_fullname == ''){
            $dshoadon = DB::table('bill')->where('status' ,'=',  "$status")->get();
        }else{
            $dshoadon = DB::table('bill')->where('receiver_fullname', 'LIKE', "%$receiver_fullname%")
            ->Where('status' ,'=', "$status")->get();
        }
        // $dshoadon = DB::table('bill')
        // ->where('name_user','LIKE', "%$name%")->orWhere('status', intval("$status"))->get();
        // dd($dshoadon);
        return view('admin.hoadon.index',compact('dshoadon'));
    }
}
