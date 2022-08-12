<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\BaiViet;
use App\Models\DMBaiviet;
use Illuminate\Support\Facades\DB;
session_start();
class BaivietController extends Controller
{
    function index()
    {
        $dsbaiviet = DB::table('news')
        ->where('news.status','=','1')->get();  
        return view('admin.baiviet.index',compact('dsbaiviet',));
    }
    function create()
    { 
        return view('admin.baiviet.create');
    }

    function xulycreate(Request $req){
        $KH = new Baiviet();
        $KH->title = $req->title;
        $KH->content = $req->content;
        $KH->image = $req->image;
        $KH->status = 1;
        if($req->hasfile('image'))
        {
       $file=$req->image;
        $extention=$file->getClientOriginalExtension();
        $filename=time().'.'.$extention;
        $file->move('website/news/',$filename);
        $KH->image =$filename;
        }
        $KH -> save();
        $dsbaiviet = Baiviet::all();
       return redirect()->route('baiviet',compact('dsbaiviet'));
    }
    function edit($id)
    {
        $thongtin = Baiviet::find($id);
        return view('admin.baiviet.edit',compact('thongtin'));
    }

    function xulyedit(Request $req, $id){       
        $KH = Baiviet::find($id);
        $KH->title = $req->title;
        $KH->content = $req->content;
        $a = $KH->image;
        if($req->image == '')
        {
            $KH->image = $a;
        }else if($req->hasfile('image'))
        {
       $file=$req->image;
        $extention=$file->getClientOriginalExtension();
        $filename=time().'.'.$extention;
        $file->move('website/news/',$filename);
        $KH->image =$filename;
        }
        $KH -> save();
        $dsbaiviet = Baiviet::all();
       return redirect()->route('baiviet',compact('dsbaiviet'));
    }

    function xulydelete($id){       
        $KH = Baiviet::find($id);
        $KH -> status = 0;
        $KH -> save();
        $dsbaiviet = DB::table('news')->where('status','=','1')->get();    
        return redirect()->route('baiviet',compact('dsbaiviet'));
    } 
    public function xylytkBV(Request $request)
    {
        $name = $request->name;
        $dsbaiviet = DB::table('news')
        ->where('status','=','1')->where('title', 'LIKE', "%$name%")
        ->where('status','=','1')->get();
        return view('admin.baiviet.index',compact('dsbaiviet'));
    }
}
