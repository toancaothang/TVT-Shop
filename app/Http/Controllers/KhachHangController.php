<?php

namespace App\Http\Controllers;
use App\Models\KhachHang;
use App\Models\SanPham;
use App\Models\ModelSP;
use App\Models\BinhLuan;
use App\Models\WishList;
use App\Models\CTHoaDon;
use App\Models\HoaDon;
use App\Models\Coupon;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;
use Auth;
use Hash;
use Mail;

class KhachHangController extends Controller
{
    public function hienthidangky()
    {
        return view('user.dn_dk');
    }
    public function xulydangky(Request $request){
        $request->validate(['tentk'=>'required',
        'matkhau'=>'required'
        ,'ten'=>'required',
        'email'=>'required',
        'ngaysinh'=>'required'
        ,'sdt'=>'required'
        ,'diachi'=>'required'
        ,'gioitinh'=>'required'
        
        
    ],['tentk.required'=>'Không được để trống tên tài khoản'
    ,'matkhau.required'=>'Không được để trống tên mật khẩu',
    'ten.required'=>'Không được để trống họ tên'
    ,'email.required'=>'Không được để trống email'
    ,'ngaysinh.required'=>'Không được để trống ngày sinh'
    ,'sdt.required'=>'Không được để trống số điện thoại'
    ,'gioitinh.required'=>'Không được để trống giới tinh'
    ,'diachi.required'=>'Không được để trống địa chỉ']);
    $checkkh=KhachHang::where('username',$request->tentk)->orWhere('email',$request->email)->first();
    if($checkkh){
        return redirect()->intended('/dangnhap')->with(['taikhoantontai' => 'Tên tài khoản hoặc email đã tồn tại, vui lòng sử dụng tên tài khoản hoặc email khác']);
    }
    $kh = new KhachHang();
        $kh->username = $request->tentk;
        $kh->full_name = $request->ten;
        $kh->password =bcrypt($request->get('matkhau'));
        $kh->email = $request->email;
        $kh->birth = $request->ngaysinh;
        $kh->address = $request->diachi;
        $kh->phone_number = $request->sdt;
        $kh->gender = $request->gioitinh;
        $kh->remember_token=Str::random(10);
  $kh->save();
  Mail::send('emails.active_account',compact('kh'),function($email) use($kh){
    $email->subject('TVT Shop - Xác Nhận Tài Khoản');
    $email->to($kh->email,$kh->full_name);
  });
  return redirect()->intended('/dangnhap')->with(['xacnhanmail' => 'Đăng Ký Tài Khoản Thành Công Vui Lòng Xác Nhận Email']);
    }
    public function hienthidangnhap(){
        return view('user.dn_dk');
        
    }
    public function xulydangnhap(Request $request){
        // dd($request->all());
        $request->validate(['username'=>'required','password'=>'required'
        
    ],['username.required'=>'Không được để trống tên tài khoản',
    'password.required'=>'Không được để trống tên mật khẩu']);
    
        $array = [
            'username' => $request->username,
            'password'=>$request->password,
        ];
        $tentkkh= $request->username;
        if(Auth::attempt($array)){
            $user=KhachHang::where('username',$tentkkh)->first();
            Auth::login($user);
           
            return redirect('/');
      
        }else{ 
            return redirect()->back()->with('dangnhap','Sai mật khẩu hoặc tài khoản');
        }
        
    }
    
    //hien thi quen mat khau
    public function hienthiquenmatkhau(){
        return view('user.quenmatkhau');
    }

//dang xuat
    public function xulydangxuat(){
        Auth::logout();
     return redirect('/');
    }
    public function hienthiprofile(){
        
        return view('user.user_profile');
    }
    //edit profile
    public function submitprofile(Request $req,$id)
    {
$editpro=KhachHang::find($id);
$editpro->full_name=$req->name;
$editpro->birth=$req->birth;
$editpro->address=$req->address;
$editpro->phone_number=$req->phone;
$editpro->gender=$req->sex;
if($req->hasfile('avt'))
{
$file=$req->avt;
$extention=$file->getClientOriginalExtension();
$filename=time().'.'.$extention;

$file->move('users/',$filename);
$editpro->avatar=$filename;
}
Session::flash('editpro');
$editpro->update();
return redirect('/profile');

    }
//edit password
public function editpassword(Request $req,$id)
{
$editpass=KhachHang::find($id);
if(Hash::check($req->oldpass,$editpass->password)){
$editpass->password=Hash::make(($req->newpass));
    $editpass->update(); 
 Session::flash('editpass');
 return redirect('/profile');
}
else{
    Session::flash('saipasscu');
    return redirect()->back();
 }
}


    //Binh Luan User
    public function binhluanuser($id,Request $request)
    {

        $idpro=$id;
        $sanpham=ModelSP::find($id);
        $verified_purchase=HoaDon::where('bill.user_id',Auth::user()->id)->join('bill_details','bill.id','=','bill_details.bill_id')->where('bill_details.pro_model_id',$idpro)->first();
        if($verified_purchase){
$exist_comment=BinhLuan::where('user_id',Auth::user()->id)->where('model_id',$idpro)->first();
if($exist_comment){
    Session::flash('binhluantontai');
    return redirect()->back();
}
else{
            $comment=new BinhLuan();
        $comment->model_id = $idpro;
        $comment->user_id = Auth::user()->id;
        $comment->comment_name = Auth::user()->full_name;
        $comment->content = $request->content;
        $comment->stars =  $request->stars;
        $comment->save();
        Session::flash('binhluanthanhcong');
        return redirect()->back();
    }
        }
        
        else{
            Session::flash('chuamua');
            return redirect()->back();
        }

    }
    //them vao wishlist 
    public function wishlist(Request $req,$id){
        $product=$req->productidwish;
      $prowish=Wishlist::where('product_id',$product)->where('user_id',Auth::user()->id)->first();
        if(isset($prowish))
        {   
            Session::flash('wishlisttontai');
            return redirect()->back();
        }
        else{
                $prowish = new WishList();
                $prowish->user_id=Auth::user()->id;
                $prowish->pro_model_id=$id;
                $prowish->product_id=$req->productidwish;
              $prowish->save();
        
        }   

        $auth = Auth::user()->id;
        $prowishshow = WishList::join('product_model','wishlist.pro_model_id','=','product_model.id')->
        join('product','wishlist.product_id','=','product.id')
        ->where('user_id',$auth)->get(['wishlist.id as wid',
           'product_model.model_name',
           'product_model.image',
           'product.capacity',
           'product.price',
           'product.sale',
           'product.stock'
    ]);    
   
    return redirect('/wishlist')->with(['messtontaiwishlist' => 'Đã thêm sản phẩm thành công']);

    }
    //xoa khoi wishlist
    public function deletewish($id)
    {
$delpro=WishList::find($id);
$delpro->delete();
return redirect('/wishlist')->with(['messtontaiwishlist' => 'Sản Phẩm Đã Được Xóa Khỏi Danh Sách Yêu Thích']);
    }
   
    //them vao cart 
    public function addcart(Request $request,$id){
        $product=$request->productid;
       
       $procart=Cart::where('product_id',$product)->where('user_id',Auth::user()->id)->first();
if(isset($procart))
{   
    $procart->pro_quantity+=$request->quaninput;
    $procart->update();
    return redirect('/cart')->with(['cart' => 'Cập Nhật Sản Phẩm Thành Công']);
}
else{
        $procart = new Cart();
$procart->user_id=Auth::user()->id;
$procart->pro_model_id=$id;
$procart->product_id=$request->productid;
$procart->pro_quantity=$request->quaninput;
$procart->save();
return redirect('/cart')->with(['cart' => 'Thêm Sán Phẩm Thành Công']);

}   
}

     //xoa khoi cart
     public function deletecart($id)
     {
 $delpro=Cart::where('user_id',Auth::user()->id)->find($id);
 $delpro->delete();
 Session::forget('totalafter');
 return redirect('/cart')->with(['cart' => 'Sản Phẩm Đã Được Xóa Khỏi Giỏ Hàng']);
     }
     //xoa tat ca khoi cart
     public function deleteallcart()
     {
 $delpro=Cart::truncate();
 Session::forget('totalafter');
 Session::forget('coupon');
 return redirect('/cart')->with(['cart' => 'Đã Xóa Tất Cả Sản Phẩm Khỏi Giỏ Hàng']);
     }
   
    //update cart
    public function updatecart(Request $request){
        $prod_id=$request->prodid;
     
        $prod_qty=$request->cartquan;
       // dd($prod_id,$prod_qty);
      $cart=Cart::where('product_id',$prod_id)->where('user_id',Auth::id())->first();
        $cart->pro_quantity=$prod_qty;
        $cart->update();
        return redirect()->back()->with('cart','Cập nhật giỏ hàng thành công !');
 
    }

// thanh toan
public function checkout(Request $req){

    $auth = Auth::user()->id;
 $totalafter=$req->total_after;
 $takecart = Cart::join('product_model','cart.pro_model_id','=','product_model.id')->
    join('product','cart.product_id','=','product.id')->where('product_model.status',1)->where('product.status',1)
    ->where('user_id',$auth)->get(['cart.id as cid',
       'cart.pro_quantity',
       'product_model.model_name',
       'product_model.image',
       'product.capacity',
       'product.price',
       'product.stock',
       'product.sale'
       ]);
    return view('giaodien.checkout',compact('takecart'));
}
// thanh toan quick cart
public function checkoutqc(){

    $auth = Auth::user()->id;
 $totalafter=Session::get('total_after');
 $takecart = Cart::join('product_model','cart.pro_model_id','=','product_model.id')->
    join('product','cart.product_id','=','product.id')->where('product_model.status',1)->where('product.status',1)
    ->where('user_id',$auth)->get(['cart.id as cid',
       'cart.pro_quantity',
       'product_model.model_name',
       'product_model.image',
       'product.capacity',
       'product.price',
       'product.stock',
       'product.sale'
       ]);
    return view('giaodien.checkout',compact('takecart'));
}
// dat hang
public function dathang( Request $request){
$order=new HoaDon();
$order->user_id=Auth::user()->id;
$order->receiver_fullname=$request->fname;
$order->receiver_email=$request->email;
$order->phone_number=$request->phonenum;
$order->deliver_address=$request->addr;
$order->notes=$request->notes;
$order->total=$request->total_after;
$order->save();
$orderdetail=Cart::join('product_model','cart.pro_model_id','=','product_model.id')->
join('product','cart.product_id','=','product.id')->where('product_model.status',1)->where('product.status',1)
->where('user_id',Auth::user()->id)->get(['cart.id as cid',
   'cart.pro_quantity',
   'product_model.model_name',
   'product_model.image',
   'product.capacity',
   'product.price',
   'cart.product_id','product_model.id as pid',
   'product.sale',
'product.stock']);
foreach($orderdetail as $detail)
{
    if($detail->stock>0)
    {
    $exsale=$detail->price*$detail->sale/100;
 CTHoaDon::create([
'bill_id'=>$order->id,
'product_id'=>$detail->product_id,
'quantity'=>$detail->pro_quantity,
'unit_price'=>$detail->price-$exsale,
'pro_model_id'=>$detail->pid,
]);
$trusl=SanPham::where('product.id',$detail->product_id)->get();
foreach($trusl as $ts)
{
$soluongdatru=$ts->stock-$detail->pro_quantity;
$ts->update(['stock' => $soluongdatru]);
}

}
}
$delcart=Cart::where('user_id',Auth::user()->id);
$delcart->delete();
Session::forget('totalafter');
Session::forget('coupon');
Session::flash('dathangthanhcong');
return redirect('/purchase-list');
}   

// su dung coupon 
public function checkcoupon(Request $request)
{
    $data=$request->all();
$coupon=Coupon::where('coupon_code',$data['coupon_code'])->first();
if($coupon){
    $coupon_count=$coupon->count();
    if($coupon_count>0)
    {
        $coupon_session=Session::get('coupon');
        if($coupon_session==true)
        {
            $is_available=0;
            if($is_available==0)
            {
                $cou[]=array(
                    'coupon_code'=>$coupon->coupon_code,
                   'coupon_number'=>$coupon->coupon_number,
                );
                Session::put('coupon',$cou);
            }
        } else{
            $cou[]=array(
                'coupon_code'=>$coupon->coupon_code,
                'coupon_number'=>$coupon->coupon_number,);
                Session::put('coupon',$cou);
        }
        Session::save();
        return redirect()->back()->with('cart','Thêm mã giảm giá thành công');
    }
} else{
    return redirect()->back()->with('cart','Sai mã giảm hoặc mã giảm không tồn tại');
}
}
//xoa coupon
public function deletecoupon()
{
    Session::forget('coupon');
    return redirect()->back()->with('message','Đã xóa mã giảm giá ');
}


//api ajax search
public function apiajaxsearch()
{
    $data=ModelSP::search()->get();
    return $data;
}
//ajax search
public function ajaxsearch()
{
    $data=ModelSP::join('product','product_model.id','=','product.model_id')->where('product_model.status',1)->where('product.status',1)
    ->search()->get(['product_model.id as mid',
    'product.id',
    'product_model.model_name',
    'product_model.category_id',
    'product_model.image',
    'product.price',   
     'product.capacity','product.sale',
     'product_model.total_rated',
     'product.stock',
]);
    return view('giaodien.ajax_search',compact('data'));
}
//tim kiem binh thuong
public function search(Request $request){
    $hethang=ModelSP::join('product','product_model.id','=','product.model_id')->where('product_model.status',1)->where('product.status',1)->where('model_name','like','%'.$request->searchrs.'%')->orWhere('capacity','like','%'.$request->searchrs.'%')->get([
        'product_model.id as mid',
        'product.stock',
]);
    if($request->searchdm==0){
    
        $data=ModelSP::join('product','product_model.id','=','product.model_id')->where('product_model.status',1)->where('product.status',1)->where('model_name','like','%'.$request->searchrs.'%')->orWhere('capacity','like','%'.$request->searchrs.'%')
        ->select(['product_model.id as mid',
        'product.id',
        'product_model.model_name',
        'product_model.category_id',
        'product_model.image',
        'product.price',   
         'product.capacity','product.sale',
         'product_model.total_rated',
         'product.stock',
    
        
    ])->paginate(20);
    }
    else{
$data=ModelSP::join('product','product_model.id','=','product.model_id')->where('product_model.status',1)->where('product.status',1)->where('category_id','=',$request->searchdm)->where('model_name','like','%'.$request->searchrs.'%')->orWhere('capacity','like','%'.$request->searchrs.'%')
->select(['product_model.id as mid',
    'product.id',
    'product_model.model_name',
    'product_model.category_id',
    'product_model.image',
    'product.price',   
     'product.capacity','product.sale',
     'product_model.total_rated',
     'product.stock',
    
])->paginate(20);
    }


return view('giaodien.search-page',compact('data','hethang'));
}


//huy don dang hang 
public function cancelorder( Request $request,$id){

    $cancelorder=HoaDon::find($id);
    $cancelorder->status=3;
    $cancelorder->save();
    Session::flash('huydon');
    return redirect('/purchase-list');
}
//dat lai don
public function reorder( Request $reques,$id){

    $cancelorder=HoaDon::find($id);
    $cancelorder->status=0;
    $cancelorder->save();
    Session::flash('datlai');
    return redirect('/purchase-list');
}

// so sanh san pham 
public function compare(Request $req,$id)
{
    $modelid=$id;
    $proid=$req->productid;
   $takecompare=SanPham::join('product_model','product.model_id','=','product_model.id')->where('product_model.id',$modelid)->where('product.id',$proid)->first();
   $compare=Session::get('compare');
   $compare[$proid]=[
"name"=>$takecompare->model_name,
"model_id"=>$takecompare->id,
"product_id"=>$proid,
"price"=>$takecompare->price,
"sale"=>$takecompare->sale,
"operasystem"=>$takecompare->opera_sys,
"capacity"=>$takecompare->capacity,
"image"=>$takecompare->image,
"stock"=>$takecompare->stock,
"branch"=>$takecompare->branch_id,
"screen"=>$takecompare->screen,
"cpu"=>$takecompare->cpu,
"gpu"=>$takecompare->gpu,
"backcam"=>$takecompare->back_camera,
"frontcam"=>$takecompare->front_camera,
"sim"=>$takecompare->sim,
"ram"=>$takecompare->ram,
"description"=>$takecompare->description,
"rate"=>$takecompare->total_rated,
"stock"=>$takecompare->stock,
"cateid"=>$takecompare->category_id,
   ];
   Session::put('compare',$compare);

   return redirect('/compare');
}
public function deleteprocompare(){
    

}
//them compare vao cart
public function comparecart(Request $req){
$addcart=Cart::create([
    'user_id'=>Auth::user()->id,
    'pro_model_id'=>$req->moid,
    'product_id'=>$req->proid,
    'pro_quantity'=>1,
]);
$addcart->save();
return redirect('/cart')->with(['cart' => 'Thêm Sán Phẩm Thành Công']);

}
//xoa san pham so sanh
public function deletecompare()
{
    Session::forget('compare');
    return redirect('/compare');
}
//them wish vao cart
public function wishtocart($id){
$takewish=WishList::where('id',$id)->first();
  $tocart=Cart::create([
        'user_id'=>$takewish->user_id,
        'pro_model_id'=>$takewish->pro_model_id,
        'pro_quantity'=>1,
        'product_id'=>$takewish->product_id,
    ]);
    $tocart->save();
    $takewish->delete();
return redirect('/cart')->with(['cart' => 'Thêm Sán Phẩm Thành Công']);

}

public function submitfpassword(Request $req){
    $token=Str::random(10);
    $user=KhachHang::where('email',$req->femail)->first();
    $user->update(['remember_token'=>$token]);
    Mail::send('emails.forgot_password',compact('user'),function($email) use($user){
        $email->subject('TVT Shop - Quên Mật Khẩu');
        $email->to($user->email,$user->full_name);
      });
      return redirect()->intended('/dangnhap')->with(['guifpass' => 'Xác nhận mail người dùng thành công, vui lòng gmail để tiến hành lấy lại mật khẩu']);
}
public function getfpassword(KhachHang $id,$token){
    if($id->remember_token==$token)
    {
        return view('user.doimatkhaumoi',compact('id'));
    }
}
public function changefpassword(KhachHang $id,$token,Request $req){
    $req->validate([
'newpass'=>'required',
'newpasscf'=>'required|same:newpass',
    ]);
    $password_new=bcrypt($req->newpass);
    $id->update(['password'=>$password_new,'remember_token'=>null]);
    Session::flash('laylaimatkhauok');
    return redirect()->intended('/dangnhap');
}
public function noactive(){
    return view('emails.login_active');

}
public function subnoactive(Request $req)
{
    $token=Str::random(10);
    $kh=KhachHang::where('email',$req->emailactive)->first();
    $kh->update(['remember_token'=>$token]);
    Mail::send('emails.active_account',compact('kh'),function($email) use($kh){
        $email->subject('TVT Shop - Xác Nhận Tài Khoản');
        $email->to($kh->email,$kh->full_name);
      });
     
      return redirect()->intended('/dangnhap')->with(['xacnhanmail' => 'Gửi Xác Nhận Thành Công Vui Lòng Xác Nhận Email']);
}

// thanh toan vnpay
public function checkoutvnpay()
{
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "https://localhost/checkout";
$vnp_TmnCode = "QKATYBZA";//Mã website tại VNPAY 
$vnp_HashSecret = "ULGNRRCEVMUNPCEKOZKBEEQQNQMGGQSX"; //Chuỗi bí mật

$vnp_TxnRef = '1345'; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
$vnp_OrderInfo ='Thanh Toán Đơn Hàng Demo';
$vnp_OrderType = 'billpayment';
$vnp_Amount =50000 * 100;
$vnp_Locale ='vn';
$vnp_BankCode ='NCB';
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
//Add Params of 2.0.1 Version

//Billing


$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef

);

if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}
if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
    $inputData['vnp_Bill_State'] = $vnp_Bill_State;
}

//var_dump($inputData);
ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}
$returnData = array('code' => '00'
    , 'message' => 'success'
    , 'data' => $vnp_Url);
    if (isset($_POST['redirect'])) {
        header('Location: ' . $vnp_Url);
        die();
    } else {
        echo json_encode($returnData);
    }
	// vui lòng tham khảo thêm tại code demo
}


}