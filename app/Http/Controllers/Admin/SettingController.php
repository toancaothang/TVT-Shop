<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    function index()
    {
        $dsbanner = DB::table('banner')->get();   
        return view('admin.setting.index',compact('dsbanner'));
    }
    function create()
    {
        return view('admin.setting.create');
    }

    function xulycreate(Request $req){
        $KH = new Setting();
        $KH->banner_name = $req->banner_name;
        $KH->banner_link = $req->banner_link;
        if($req->hasfile('banner_image'))
        {
       $file=$req->image;
        $extention=$file->getClientOriginalExtension();
        $filename=time().'.'.$extention;
        $file->move('banner/',$filename);
        $KH->banner_image =$filename;
        }
        $KH -> save();
        $dsbanner = Setting::all();
       return redirect()->route('setting',compact('dsbanner'));
    }
    function edit($id)
    {
        $thongtin = Setting::find($id);
        return view('admin.setting.edit',compact('thongtin'));
    }

    function xulyedit(Request $req, $id){       
        $KH = Setting::find($id);
        $KH->banner_link = $req->banner_link;
        $KH->banner_link = $req->banner_link;
        $a = $KH->banner_image;
        if($req->banner_image == '')
        {
            $KH->banner_image = $a;
        }else if($file=$req->file('banner_image'))
        {
        $extention=$file->getClientOriginalExtension();
        $filename=time().'.'.$extention;
        $file->move('banner/',$filename);
        $KH->banner_image =$filename;
        }
        $KH -> save();    
        $dsbanner = Setting::all();
       return redirect()->route('setting',compact('dsbanner'));
    }

    function xulydelete($id){       
        Setting::where('id', $id)->delete();
        $dsbanner = DB::table('user')->where('status','=','1')->get();    
        return redirect()->route('setting',compact('dsbanner'));
    } 
}
