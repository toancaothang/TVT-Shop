<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Binhluan;
use Illuminate\Support\Facades\DB;
session_start();
class BinhluanController extends Controller
{
    function index()
    {
        $dsbinhluan = DB::table('comment')
        ->select(DB::raw("comment.id as id,content, comment_name,stars,full_name,model_name"))
        ->join('product_model', 'product_model.id', '=', 'comment.model_id') 
        ->join('user', 'user.id', '=', 'comment.user_id')->get(); 
        return view('admin.binhluankhachhang.index',compact('dsbinhluan',));
    }
    function xulydelete($id){       
        $KH = Binhluan::find($id);
        Binhluan::where('id', $id)->delete();
        $dsbinhluan = DB::table('comment')
        ->select(DB::raw("comment.id as id,content, comment_name,stars,full_name,model_name"))
        ->join('product_model', 'product_model.id', '=', 'comment.model_id') 
        ->join('user', 'user.id', '=', 'comment.user_id')->get();  
        return redirect()->route('binhluankhachhang',compact('dsbinhluan'));
    } 
    public function xylytkBV(Request $request)
    {
        $name = $request->name;
        $dsbinhluan = DB::table('comment')
        ->select(DB::raw("comment.id as id,content, comment_name,stars,full_name,model_name"))
        ->join('product_model', 'product_model.id', '=', 'comment.model_id') 
        ->join('user', 'user.id', '=', 'comment.user_id')
        ->where('model_name', 'LIKE', "%$name%")->get();
        return view('admin.binhluankhachhang.index',compact('dsbaiviet'));
    }
}
