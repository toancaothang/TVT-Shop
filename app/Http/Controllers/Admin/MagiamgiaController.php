<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Magiamgia;
use Illuminate\Support\Facades\DB;

class MagiamgiaController extends Controller
{
    function index()
    {
        $dsmagiamgia = DB::table('coupon')->get();   
        return view('admin.magiamgia.index',compact('dsmagiamgia'));
    }
    function create()
    {
        return view('admin.magiamgia.create');
    }

    function xulycreate(Request $req){
        $KH = new Magiamgia();
        $KH->coupon_name = $req->coupon_name;
        $KH->coupon_time = $req->coupon_time;
        $KH->coupon_condition = $req->coupon_condition;
        $KH->coupon_number = $req->coupon_number;
        $KH->coupon_code = $req->coupon_code;
        $KH -> save();
        $dsmagiamgia = Magiamgia::all();
       return redirect()->route('magiamgia',compact('dsmagiamgia'));
    }
    function edit($coupon_id)
    {
        $thongtin = Magiamgia::where('coupon_id', $coupon_id)->first(); 
return view('admin.magiamgia.edit',compact('thongtin'));
    }

    function xulyedit(Request $req, $coupon_id){  
        $id=$coupon_id;     
        $KH = Magiamgia::where('coupon_id',$id)->first();
        $KH->coupon_name = $req->coupon_name;
        $KH->coupon_time = $req->coupon_time;
        $KH->coupon_condition = $req->coupon_condition;
        $KH->coupon_number = $req->coupon_number;
        $KH->coupon_code = $req->coupon_code;
          $KH -> update();    
        $dsmagiamgia = Magiamgia::all();
       return redirect()->route('magiamgia',compact('dsmagiamgia'));
    }

    function xulydelete($coupon_id){      
        Magiamgia::where('coupon_id', $coupon_id)->delete(); 
        $dsmagiamgia = DB::table('coupon')->get();    
        return redirect()->route('magiamgia',compact('dsmagiamgia'));
    } 
    public function xylytkKH(Request $request)
    {
        $coupon_name = $request->coupon_name;
        $dsmagiamgia = DB::table('coupon')
        ->where('coupon_name', 'LIKE', "%$coupon_name%")->get();   
        return view('admin.magiamgia.index',compact('dsmagiamgia'));
    }
}
