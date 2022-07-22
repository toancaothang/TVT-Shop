<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\AnhSP;
use Illuminate\Support\Facades\DB;
class AnhmausanphamController extends Controller
{
    function index()
    {
        $dsanhmausanpham = DB::table('model_image')
        ->select(DB::raw("model_image.id as id,model_name, file_name"))
        ->join('product_model', 'product_model.id', '=', 'model_image.model_id') ->get();
        return view('admin.anhmodelsanpham.index',compact('dsanhmausanpham'));
    }
    function create()
    {
        $dssanpham =  DB::table('product_model')->where('status','=','1')->get(); 
        return view('admin.anhmodelsanpham.create',compact('dssanpham'));
    }

    function xulycreate(Request $req){
        $input=$req->all();
        $images=array();
        if($files=$req->file('filename')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('website/product/',$name);
                $images[]=$name; 
            }
        };
        for($i =0 ; $i < count($images) ; $i++){
            $KH = new AnhSP();
            $KH->model_id = $req->model_id;
            $KH->file_name = $images[$i];
            $KH->save();
        }  
        $dsanhmausanpham = AnhSP::all();
       return redirect()->route('anhmodelsanpham',compact('dsanhmausanpham'));
    }
    function xulydelete($id){       
        $KH = AnhSP::find($id);
        AnhSP::where('id', $id)->delete();
        $dsanhmausanpham = DB::table('model_image')->get();    
        return redirect()->route('anhmodelsanpham',compact('dsanhmausanpham'));
    } 
    public function xylytkAMSP(Request $request)
    {
        $model_name = $request->model_name;
        $dsanhmausanpham = DB::table('model_image')
        ->select(DB::raw("model_image.id as id,model_name, file_name"))
        ->join('product_model', 'product_model.id', '=', 'model_image.model_id')
        ->where('model_name', 'LIKE', "%$model_name%")->get();  
        return view('admin.anhmodelsanpham.index',compact('dsanhmausanpham'));
    }
}
