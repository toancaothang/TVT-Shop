<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\HoaDonnhap;
use App\Models\CTHoaDonnhap;
use App\Models\SanPham;
use Illuminate\Support\Facades\DB; 

class HoadonnhapController extends Controller
{
    function index()
    {
        $dshoadonnhap = DB::table('branch')
        ->join('bill_input', 'bill_input.branch_id', '=', 'branch.id')
        ->get();  
        return view('admin.hoadonnhap.index',compact('dshoadonnhap'));
    }
    function create()
    {
        $dsNhasanxuat=  DB::table('branch')->where('status','=','1')->get();
        $dsnhanvien = DB::table('bill_input')->where('status','=','1')->get();
        $chitiethoadon = DB::table('bill_input_details')
        ->join('bill_input', 'bill_input.id', '=', 'bill_input_details.bill_input_id')
        ->join('product', 'product.id', '=', 'bill_input_details.product_id')->get();
        $dssanpham =  DB::table('product')->where('product.status','=','1')->get();
        return view('admin.hoadonnhap.create',compact('chitiethoadon','dsNhasanxuat','dssanpham'));
    }
    function edit($id)
    {
        $thongtin = HoaDonnhap::find($id);
        $nhanvien = DB::table('admin')->get();
        $nhasanxuat = DB::table('branch')->get();
        $modelsanpham = DB::table('product_model')->get();
        $chitiethoadon = DB::table('bill_input_details')
        ->join('bill_input', 'bill_input.id', '=', 'bill_input_details.bill_input_id')
        ->join('product', 'product.id', '=', 'bill_input_details.product_id')
        ->where('bill_input_id' ,'=',$id)->get();  
        return view('admin.hoadonnhap.edit',compact('thongtin','nhasanxuat','nhanvien','chitiethoadon','modelsanpham'));
    }
    function TaoMoiHoaDonNhap(Request $req){
        if(request()->ajax()){
            $HDN = new HoaDonnhap();
            $HDN->branch_id = $req->branch_id;
            $HDN->phone_number = $req->phone_number;
            $HDN->receiver_fullname = $req->receiver_fullname;
            $HDN->deliver_address = $req->deliver_address;
            $HDN->notes = $req->notes;
            $HDN->total = $req->total;
            $HDN->status = 0;
            $HDN -> save();
            $NewBranch_id = DB::table('bill_input')
                            ->select(DB::raw("id")) 
                            ->orderBy('id', 'desc')
                            ->first();
            $TongHang = $req->TableData;
            foreach($TongHang as $detail){
                $CTHDN = new CTHoaDonnhap();
                $id = ($detail['id']);
                $idSanPham = (int)$id;
                $SL = ($detail['quantity']);
                $SoLuong = (int)$SL;
                $gia = ($detail['unit_price']);
                $GIASP = (int)$gia;
                $CTHDN->bill_input_id = $NewBranch_id->id;
                $CTHDN->product_id = $idSanPham;
                $CTHDN->quantity = $SoLuong;
                $CTHDN->unit_price = $GIASP;
                $KH = SanPham::find($id);
                $KH->stock += $SoLuong;
                $KH -> save(); 
                $CTHDN->status = 1;
                $CTHDN->save();
            }
          }
          $dshoadonnhap = DB::table('bill_input')
          ->join('branch', 'branch.id', '=', 'bill_input.branch_id')
          ->get();  
          return redirect()->route('hoadonnhap',compact('dshoadonnhap'));
    }
    function xulyedit(Request $req, $id){       
        $KH = HoaDonnhap::find($id);
        $KH->status = $req->status;
        $KH -> save();    
        $dshoadonnhap = DB::table('branch')
        ->join('bill_input', 'bill_input.branch_id', '=', 'branch.id')
        ->get();  
        return redirect()->route('hoadonnhap',compact('dshoadonnhap'));
    }

    function xulydelete($id){       
        $KH = khachhang::find($id);
        $KH -> status = 0;
        $KH -> save();
        $dskhachhang = DB::table('user')->where('status','=','1')->get();    
        return redirect()->route('hoadonnhap',compact('dskhachhang'));
    } 
    public function xylytkHDN(Request $request)
    {
        $status = $request->status;
        $dshoadonnhap = DB::table('branch')
        ->join('bill_input', 'bill_input.branch_id', '=', 'branch.id')
        ->where('bill_input.status' ,'=',  "$status")->get();  
        return view('admin.hoadonnhap.index',compact('dshoadonnhap'));
    }
    function getNhasanxuat()
    {
        $nhasanxuat = DB::table('branch')
        ->where("status",1)
        ->get(); 
        return response()->json($nhasanxuat);
    }
    function GetDanhSachSanPham($id){
        $DanhSachSanPham  = DB::table('product')
            ->select(DB::raw("product.id as SPid, product.capacity , product.color, product.model_id, product_model.model_name, product_model.image"))
            ->join('product_model', 'product_model.id', '=', 'product.model_id')
            ->where("product_model.status",1)
            ->where("product.status",1)
            ->where("branch_id",$id)
            //->where("product_model.id",1)
            ->groupBy(DB::raw("SPid, product.capacity , product.color, product.model_id, product_model.model_name, product_model.image"))
            ->get(); 
        return response()->json($DanhSachSanPham);
    }
}
