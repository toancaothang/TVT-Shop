<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\SanPham;
use App\Models\ModelSP;
use App\Models\LoaiSP;
use Illuminate\Support\Facades\DB;
session_start();
class SanphamModelController extends Controller
{
    function index()
    {
        $dsLoaisanpham =  DB::table('product_category')->where('status','=','1')->get();
        $dsNhasanxuat=  DB::table('branch')->where('status','=','1')->get();
        $dssanpham =  DB::table('product')
        ->join('product_model', 'product_model.id', '=', 'product.model_id') 
        ->orderBy('product.id', 'desc')->where('product.status','=','1')->get(); 
        $dsmausanpham =  DB::table('product_model')
        ->orderBy('product_model.id', 'desc')->where('product_model.status','=','1')->get();  
        $thongkesao = DB::table('comment')
        ->select(DB::raw("model_id, ROUND(AVG(stars),1) as start"))
        ->groupBy(DB::raw("model_id"))
        ->get();
        return view('admin.modelsanpham.index',compact('dssanpham','dsmausanpham','dsLoaisanpham','dsNhasanxuat','thongkesao'));
    }
    function create()
    {
        $dssanpham =  DB::table('product_model')->get();
        return view('admin.modelsanpham.create',compact('dssanpham'));
    }
    function xulycreate(Request $req){
        $KH = new SanPham();
        $KH->model_id = $req->model_id;
        $KH->price = $req->price;
        $KH->stock = $req->stock;
        $KH->color = $req->color;
        $KH->capacity = $req->capacity;
        $KH->status = 1;
        $KH -> save();
        $dsSanPham = SanPham::all();
       return redirect()->route('modelsanpham',compact('dsSanPham'));
    }
    function edit($id)
    {
        $thongtin = SanPham::find($id);
        $dssanpham =  DB::table('product_model')->get();
        return view('admin.modelsanpham.edit',compact('thongtin','dssanpham'));
    }

    function xulyedit(Request $req, $id){       
        $KH = SanPham::find($id);
        $KH->model_id = $req->model_id;
        $KH->price = $req->price;
        $KH->stock = $req->stock;
        $KH->color = $req->color;
        $KH->capacity = $req->capacity;
        $KH->status = 1;
        $KH -> save();    
        $dssanpham = SanPham::all();
       return redirect()->route('modelsanpham',compact('dssanpham'));
    }
    function xulydelete($id){       
        $KH = SanPham::find($id);
        $KH -> status = 0;
        $KH -> save();
        $dssanpham = DB::table('product')->where('status','=','1')->get();    
        return redirect()->route('modelsanpham',compact('dssanpham'));
    } 

    function createmodel()
    {
        $dsLoaisanpham =  DB::table('product_category')->where('status','=','1')->get();
        $dsNhasanxuat=  DB::table('branch')->where('status','=','1')->get();
        $dsmausanpham =  DB::table('product_model')
        ->join('product', 'product.model_id', '=', 'product_model.id')
        ->join('branch', 'branch.id', '=', 'product_model.branch_id')
        ->join('product_category', 'product_category.id', '=', 'product_model.category_id')
        ->orderBy('product_model.id', 'desc')->where('product_model.status','=','1')->get();  
        return view('admin.modelsanpham.createmodel',compact('dsmausanpham','dsLoaisanpham','dsNhasanxuat'));
    }
    function xulycreatemodel(Request $req){
       
        $KH = new ModelSP();
        $KH->model_name = $req->model_name;
        $KH->opera_sys = $req->opera_sys;
        $KH->branch_id = $req->branch_id;
        $KH->category_id = $req->category_id;
        $KH->screen = $req->screen;
        $KH->cpu = $req->cpu;
        $KH->gpu = $req->gpu;
        $KH->front_camera = $req->front_camera;
        $KH->back_camera = $req->back_camera;
        $KH->sim = $req->sim;
        $KH->pin = $req->pin;
        $KH->ram = $req->ram;
        $KH->description = $req->description;
        $KH->status = 1;
        if($req->hasfile('image'))
        {
       $file=$req->image;
        $extention=$file->getClientOriginalExtension();
        $filename=time().'.'.$extention;
        $file->move('website/product/',$filename);
        $KH->image =$filename;
        }
        $KH -> save();
        $dsSanPham = ModelSP::all();
       return redirect()->route('modelsanpham',compact('dsSanPham'));
    }
    function editmodel($id)
    {
        $thongtin = ModelSP::find($id);
        $dsLoaisanpham =  DB::table('product_category')->where('status','=','1')->get();
        $dsNhasanxuat=  DB::table('branch')->where('status','=','1')->get();
        return view('admin.modelsanpham.editmodel',compact('thongtin','dsLoaisanpham','dsNhasanxuat'));
    }
    function xulyeditmodel(Request $req, $id){       
        $KH = ModelSP::find($id);
        $KH->model_name = $req->model_name;
        $KH->opera_sys = $req->opera_sys;
        $KH->branch_id = $req->branch_id;
        $KH->category_id = $req->category_id;
        $KH->screen = $req->screen;
        $KH->cpu = $req->cpu;
        $KH->gpu = $req->gpu;
        $KH->front_camera = $req->front_camera;
        $KH->back_camera = $req->back_camera;
        $KH->sim = $req->sim;
        $KH->pin = $req->pin;
        $KH->ram = $req->ram;
        $KH->description = $req->description;
        if($req->image == '')
        {
            $KH->image = $a;
        }else if($req->hasfile('image'))
        {
       $file=$req->image;
        $extention=$file->getClientOriginalExtension();
        $filename=time().'.'.$extention;
        $file->move('website/product/',$filename);
        $KH->image =$filename;
        }
     $KH->status = 1;
        $KH -> save();    
        $dssanpham = ModelSP::all();
       return redirect()->route('modelsanpham',compact('dssanpham'));
    }
    function xulydeletemodel($id){       
        $KH = ModelSP::find($id);
        $KH -> status = 0;
        $KH -> save();
        $dssanpham = DB::table('product')->where('status','=','1')->get();    
        return redirect()->route('modelsanpham',compact('dssanpham'));
    } 
    public function xylytkSP(Request $request)
    {
        $name = $request->name;
        $dssanpham = DB::table('product')
        ->join('product_model', 'product_model.id', '=', 'product.model_id') 
        ->where('model_name', 'LIKE', "%$name%")->where('product.status','1')->get();
        $dsLoaisanpham =  DB::table('product_category')->where('status','=','1')->get();
        $dsNhasanxuat=  DB::table('branch')->where('status','=','1')->get();
        $dsmausanpham =  DB::table('product_model')
        ->orderBy('product_model.id', 'desc')->where('product_model.status','=','1')->get();  
        return view('admin.modelsanpham.index',compact('dssanpham','dsmausanpham','dsLoaisanpham','dsNhasanxuat'));
    }
    public function xylytkModelSP(Request $request)
    {
        $name = $request->name;
        $branch_id = $request->branch_id;
        $category_id = $request->category_id;
        $dssanpham =  DB::table('product')
        ->join('product_model', 'product_model.id', '=', 'product.model_id') 
        ->orderBy('product.id', 'desc')->where('product.status','=','1')->get(); 
        $dsLoaisanpham =  DB::table('product_category')
        ->where('status','=','1')->get();
        $dsNhasanxuat=  DB::table('branch')->where('status','=','1')->get();

        if($name == ''){
            if($branch_id == 0){
                $dsmausanpham =  DB::table('product_model')
                ->where('status','=','1')
                ->where('category_id',$category_id)->get(); 
            }else if($category_id == 0){
                $dsmausanpham =  DB::table('product_model')
                ->where('status','=','1')
                ->where('branch_id',$branch_id)->get(); 
            }else{
                $dsmausanpham =  DB::table('product_model')
                ->where('status','=','1')
                ->where('branch_id',$branch_id)
                ->where('category_id',$category_id)->get(); 
            }
        }else if($branch_id == 0){
            if($name == 0){
                $dsmausanpham =  DB::table('product_model')
                ->where('status','=','1')
                ->where('category_id',$category_id)->get(); 
            }else if($category_id == 0){
                $dsmausanpham =  DB::table('product_model')
                ->where('status','=','1')
                ->where('model_name', 'LIKE', "%$name%")->get(); 
            }
        }else if($category_id == 0 ){
            if($name == 0){
                $dsmausanpham =  DB::table('product_model')
                ->where('status','=','1')
                ->where('branch_id',$branch_id)->get(); 
            }else if($branch_id == 0){
                $dsmausanpham =  DB::table('product_model')
                ->where('status','=','1')
                ->where('model_name', 'LIKE', "%$name%")->get(); 
            }
        }else{
            $dsmausanpham =  DB::table('product_model')
            ->where('model_name', 'LIKE', "%$name%")
            ->where('status','=','1')
            ->where('branch_id',$branch_id)
            ->where('category_id',$category_id)
            ->get(); 
        }

        return view('admin.modelsanpham.index',compact('dssanpham','dsmausanpham','dsLoaisanpham','dsNhasanxuat'));
    }
    public function xylythemLSP(Request $req){
        $KH = new LoaiSP();
        $KH->category_name = $req->category_name;
        $KH->status =1;
        $KH -> save();
        $dssanpham = DB::table('product')->where('status','=','1')->get();    
        return redirect()->route('modelsanpham',compact('dssanpham'));
    }
    public function xylyxoaLSP($id){
        $KH = LoaiSP::find($id);
        $KH -> status = 0;
        $KH -> save();
        $dssanpham = DB::table('branch')->where('status','=','1')->get();    
        return redirect()->route('modelsanpham',compact('dssanpham'));
    }
    function xylysuaLSP(Request $req, $id){       
        $KH = LoaiSP::find($id);
        $KH->category_name = $req->category_name;
        $KH -> save();    
        $dssanpham = LoaiSP::all();
       return redirect()->route('modelsanpham',compact('dssanpham'));
    }
}
