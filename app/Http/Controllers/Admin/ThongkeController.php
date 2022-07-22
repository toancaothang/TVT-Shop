<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ThongkeController extends Controller
{
    function index()
    {
        $BangThongKe  = DB::table('bill_details')
            ->select(DB::raw("product_model.model_name as tensanpham, product.stock as tonkho, SUM(bill_details.quantity) as soluong, SUM(bill_details.quantity*bill_details.unit_price) as tongtien"))
            ->join('bill', 'bill.id', '=', 'bill_details.bill_id')
            ->join('product', 'product.id', '=', 'bill_details.product_id')
            ->join('product_model', 'product_model.id', '=', 'product.model_id')
            ->where("bill.status",2)
            ->groupBy(DB::raw("product_model.model_name,product.stock"))
            ->get(); 
        //$dsnhasanxuat = DB::table('nha_sx')->get();  
        return view('admin.thongke.index',compact('BangThongKe'));
    }
    function ThongKeTheoNgay(){
        $ThongKeTheoNgay  = DB::table('bill')
            ->select(DB::raw("SUM(total) as total, day(created_at) as ngay"))
            ->whereMonth('created_at', '7')
            ->whereYear('created_at', '2022')
            ->where("status",2)
            ->groupBy(DB::raw("day(created_at)"))
            ->get(); 
        return response()->json($ThongKeTheoNgay);
    }
    function ThongKeTheoThang(){
        $ThongKeTheoThang  = DB::table('bill')
            ->select(DB::raw("SUM(total) as total, month(created_at) as thang"))
            ->where("status",2)
            ->whereYear('created_at', '2022')
            ->groupBy(DB::raw("month(created_at)"))
            ->get(); 
        return response()->json($ThongKeTheoThang);
    }
    function TimKiemThongKeTheoNgay($Tong){
       // $nam = $request->TheoNam;
        $TimKiemThongKeTheoNgay  = DB::table('bill')
            ->select(DB::raw("SUM(total) as total, day(created_at) as ngay"))
            ->whereMonth('created_at', $Tong[0])
            ->whereYear('created_at', substr($Tong, 2))
            ->where("status",2)
            ->groupBy(DB::raw("day(created_at)"))
            ->get();
        return response()->json($TimKiemThongKeTheoNgay);
    }
    function TimKiemTheoNam($TKNam){
        $ThongKeTheoThang  = DB::table('bill')
            ->select(DB::raw("SUM(total) as total, month(created_at) as thang"))
            ->where("status",2)
            ->whereYear('created_at', $TKNam)
            ->groupBy(DB::raw("month(created_at)"))
            ->get(); 
        return response()->json($ThongKeTheoThang);
    }
    function LoadBangDanhSach(){
        // $nam = $request->TheoNam;
        $LoadBangDanhSach  = DB::table('bill_details')
        ->select(DB::raw("product_model.id as Sid,branch_name,model_name, SUM(bill_details.quantity) as soluong, SUM(bill_details.quantity*bill_details.unit_price) as tongtien"))
        ->join('bill', 'bill.id', '=', 'bill_details.bill_id')
        ->join('product', 'product.id', '=', 'bill_details.product_id')
        ->join('product_model', 'product_model.id', '=', 'product.model_id')
        ->join('branch', 'branch.id', '=', 'product_model.branch_id')
        ->where("bill.status",2)
        ->groupBy(DB::raw("product_model.id,model_name,branch_name"))
        ->orderBy('soluong', 'desc')
        ->get();
         return response()->json($LoadBangDanhSach);
     }
     function Doanhthucaonhat(){
        // $nam = $request->TheoNam;
        $LoadBangDanhSach  = DB::table('bill_details')
        ->select(DB::raw("product_model.id as Sid,branch_name,model_name, SUM(bill_details.quantity) as soluong, SUM(bill_details.quantity*bill_details.unit_price) as tongtien"))
        ->join('bill', 'bill.id', '=', 'bill_details.bill_id')
        ->join('product', 'product.id', '=', 'bill_details.product_id')
        ->join('product_model', 'product_model.id', '=', 'product.model_id')
        ->join('branch', 'branch.id', '=', 'product_model.branch_id')
        ->where("bill.status",2)
        ->groupBy(DB::raw("product_model.id,model_name,branch_name"))
        ->orderBy('tongtien', 'desc')
        ->get();
         return response()->json($LoadBangDanhSach);
     }
}
