<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
class profileController extends Controller
{
    function suaprofile($id)
    {
        $thongtin = Admin::find($id);
        return view('admin.profile.thongtin',compact('thongtin'));
    }
    
    function xylysuaprofile(Request $req, $id)
    {
        $KH = Admin::find($id);
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
        }else if($file = $req->file('avatar'))
        {
        $extention=$file->getClientOriginalExtension();
        $filename=time().'.'.$extention;
        $file->move('adminavatar/',$filename);
        $KH->avatar =$filename;
        }
        $KH -> save();    
        return redirect()->intended(route('admin.dashboard'));
    }
}
