<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    function index()
    {
        $ThongKeTheoThang  = DB::table('bill')
            ->select(DB::raw("SUM(total) as total"))
            ->where("status",2)
            ->get(); 
        $Thongkenhaphang  = DB::table('bill_input')
                            ->select(DB::raw("SUM(total) as total"))
                            ->where("status",2)
                            ->get(); 
        $TongSoLuong = DB::table('product')
        ->select(DB::raw("SUM(stock) as stock"))
        ->where("status",1)
        ->get(); 
        $SPSapHetHang = DB::table('product')
        ->select(DB::raw(" COUNT(*) as dem"))
        ->where("status",1)
        ->where("stock","<",10)
        ->get(); 
        $SPHetHang = DB::table('product')
        ->select(DB::raw(" COUNT(*) as dem"))
        ->where("status",1)
        ->where("stock",0)
        ->get(); 
        return view('admin.dashboard.index',compact('ThongKeTheoThang','TongSoLuong','Thongkenhaphang','SPSapHetHang','SPHetHang'));
    }
    function ThongKeTheoNgay(){
        $ThongKeTheoNgay  = DB::table('bill')
            ->select(DB::raw("SUM(total) as total, day(created_at) as ngay"))
            ->where("status",2)
            ->groupBy(DB::raw("day(created_at)"))
            ->get(); 
        return response()->json($ThongKeTheoNgay);
    }
    function ThongKeBanHang(){
        $ThongKeBanHang  = DB::table('bill')
            ->select(DB::raw("SUM(total) as total, month(created_at) as thang"))
            ->where("status",2)
            ->groupBy(DB::raw("month(created_at)"))
            ->get(); 
        return response()->json($ThongKeBanHang);
    }
    function ThongkeNhapHang(){
        $ThongkeNhapHang  = DB::table('bill_input')
            ->select(DB::raw("SUM(total) as total, month(created_at) as thang"))
            ->where("status",2)
            ->groupBy(DB::raw("month(created_at)"))
            ->get(); 
        return response()->json($ThongkeNhapHang);
    }

}
