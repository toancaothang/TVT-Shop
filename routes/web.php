<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\GiaoDienController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('trangchu');
// USER:
// Dang ky
Route::get('/dangky',[KhachHangController::class,'hienthidangky'])->name('hienthi_dangky');
Route::post('/dangky',[KhachHangController::class,'xulydangky'])->name('xuly_dangky');

//quen mat khau

Route::get('/forgot-password',[KhachHangController::class,'hienthiquenmatkhau'])->name('hienthi_quenmatkhau');
Route::post('/submit-fpassword',[KhachHangController::class,'submitfpassword'])->name('submit_fpassword');
Route::get('/get-fpassword/{id}/{token}',[KhachHangController::class,'getfpassword'])->name('get_fpassword');
Route::post('/change-fpassword/{id}/{token}',[KhachHangController::class,'changefpassword'])->name('change_fpassword');
// Dang Nhap
Route::get('/dangnhap',[KhachHangController::class,'hienthidangnhap'])->name('hienthi_dangnhap');
Route::post('/dangnhap',[KhachHangController::class,'xulydangnhap'])->name('xuly_dangnhap');
Route::post('/dangxuat',[KhachHangController::class,'xulydangxuat'])->name('xuly_dangxuat');
Route::get('/profile',[KhachHangController::class,'hienthiprofile'])->name('hienthi_profile')->middleware('CheckLogin');
//dang nhap tai khoan chua kich hoat
Route::get('/no-active',[KhachHangController::class,'noactive'])->name('no_active');
Route::post('/sub-no-active',[KhachHangController::class,'subnoactive'])->name('sub_no_active');
//tim kiem
Route::post('/',[KhachHangController::class,'xulytimkiem'])->name('timkiem');
//edit profile
Route::post('/edit-profile/{id}',[KhachHangController::class,'submitprofile'])->name('submit_profile'); 
//edit password
Route::post('/edit-password/{id}',[KhachHangController::class,'editpassword'])->name('edit_password'); 
//binh luan
Route::post('/comment/{id}',[KhachHangController::class,'binhluanuser'])->name('binh_luan')->middleware('CheckLogin');

//them vao wishlist
Route::post('/wishlist/{id}',[KhachHangController::class,'wishlist'])->name('wish_list')->middleware('CheckLogin');

//xoa khoi wishlist
Route::get('/delete-wishlist/{id}',[KhachHangController::class,'deletewish'])->name('delete_wish');

//xoa khoi giohang
Route::get('/delete-cart/{id}',[KhachHangController::class,'deletecart'])->name('delete_cart');
//xoa khoi giohang
Route::get('/delete-all-cart',[KhachHangController::class,'deleteallcart'])->name('delete_all_cart');
// them vao gio hang
Route::post('/cart/{id}',[KhachHangController::class,'addcart'])->name('add_cart')->middleware('CheckLogin');
//them vao so sanh
Route::post('/compare/{id}',[KhachHangController::class,'compare'])->name('com_pare')->middleware('CheckLogin');
//update gio hang
Route::post('update-cart',[KhachHangController::class,'updatecart'])->name('update_cart');
//thanh toan
Route::post('/checkout',[KhachHangController::class,'checkout'])->name('check_out');
//thanh toan qc
Route::get('/checkout-qc',[KhachHangController::class,'checkoutqc'])->name('checkout_qc');
//huy don dat hang
Route::post('/cancel-order/{id}',[KhachHangController::class,'cancelorder'])->name('cancel_order');
//dat lai don
Route::post('/re-order/{id}',[KhachHangController::class,'reorder'])->name('re_order');

//dat hang
Route::post('/place-order',[KhachHangController::class,'dathang'])->name('dat_hang');

//check coupon
Route::post('check-coupon',[KhachHangController::class,'checkcoupon'])->name('check_coupon');
//delete coupon
Route::get('/delete-coupon',[KhachHangController::class,'deletecoupon'])->name('delete_coupon');
//tim kiem ajax
Route::get('/ajax-search-product',[KhachHangController::class,'ajaxsearch'])->name('ajax_search');
//tim kiem binh thuong
Route::get('/search-product',[KhachHangController::class,'search'])->name('search_product');
//Xoa san pham so sanh
Route::get('/delete-compare',[KhachHangController::class,'deletecompare'])->name('delete_compare');
//Xoa tung san pham so sanh
Route::get('/delete-procompare',[KhachHangController::class,'deleteprocompare'])->name('delete_procompare');
// them san pham tu wishlist vao cart
Route::get('/wish-to-cart/{id}',[KhachHangController::class,'wishtocart'])->name('wishto_cart')->middleware('CheckLogin');
//them compare vao cart
Route::post('/compare-to-cart',[KhachHangController::class,'comparecart'])->name('compare_cart')->middleware('CheckLogin');

Auth::routes();
//checkout vnpay
Route::post('/checkout-vnpay',[KhachHangController::class,'checkoutvnpay'])->name('checkout_vnpay');

//=====================================================================================================
// GIAO DIEN:
Route::get('/',[GiaoDienController::class,'httrangchu'])->name('htsp_trangchu')->middleware('CheckVerify');
// mail xac nhan 
Route::get('/actived-mail/{id}/{token}', [GiaoDienController::class, 'activedmail'])->name('actived_mail');
//about us
Route::get('/about-us',[GiaoDienController::class,'aboutus'])->name('about_us');
//contact
Route::get('/contact',[GiaoDienController::class,'contact'])->name('con_tact');
//hien thi tat ca san pham
Route::get('/product-all',[GiaoDienController::class,'allproduct'])->name('all_product');
//hien thi san pham trong danh muc
Route::get('/product/{id}',[GiaoDienController::class,'hienthidanhmuc'])->name('hienthi_danhmuc');
//hien thi bai viet
Route::get('/blogs',[GiaoDienController::class,'hienthibaiviet'])->name('hienthi_baiviet');
//hien thi chi tiet san pham
Route::get('/chi-tiet-sanpham/{cateid}/{id}',[GiaoDienController::class,'chitietsanpham'])->name('chitiet_sanpham');
// GIAO DIEN:
//hien thi edit profile
Route::get('/edit-profile',[GiaoDienController::class,'editprofile'])->name('edit_profile'); 
//hien thi edit password
Route::get('/edit-password', function () {
    return view('user.change_password');
})->name('show_edit_password');
//hien thi wishlist
Route::get('/wishlist',[GiaoDienController::class,'hienthiwishlist'])->name('hienthi_wishlist')->middleware('CheckLogin');
Route::get('/wishlist_count/{id}',[GiaoDienController::class,'wishlistcount'])->name('wish_count');

//chuyen doi bien the model
Route::get('/selectbienthe',[GiaoDienController::class,'selectbienthe'])->name('select_bienthe');


//chuyen doi bien the model wishlist
Route::get('/selectwish',[GiaoDienController::class,'selectwishlist'])->name('select_wishlist');
//thay doi thong tin theo model
Route::get('/changeinfo',[GiaoDienController::class,'changeinfo'])->name('change_info');
//thay doi thong tin de so sanh
Route::get('/selectcompare',[GiaoDienController::class,'selectcompare'])->name('select_compare');
//thay doi thong tin gia sale
Route::get('/selectsale',[GiaoDienController::class,'selectsale'])->name('select_sale');
//thay doi thong tin gia sale category
Route::get('/selectsalecate',[GiaoDienController::class,'selectsalecate'])->name('select_sale_cate');
//hien thi gio hang
Route::get('/cart',[GiaoDienController::class,'hienthicart'])->name('hienthi_cart')->middleware('CheckLogin');
//hien thi thong tin mua hang
Route::get('/purchase-list',[GiaoDienController::class,'purchaselist'])->name('purchase_list')->middleware('CheckLogin');
//tim kiem don hang
Route::get('/searchhd',[GiaoDienController::class,'searchhd'])->name('search_hd');
//hien thi chi tiet hoa don mua hang
Route::get('/bill-details/{id}',[GiaoDienController::class,'billdetails'])->name('user_bill_details')->middleware('CheckLogin');
//hien thi so sanh san pham
Route::get('/compare', function () {
    return view('giaodien.compare');
})->name('compare');
Auth::routes();
//back lai
Route::get('/back-get', function () {
    return redirect('/product-all');
})->name('back_get');
//xem chi tiet bai viet
Route::get('/blog-details/{id}',[GiaoDienController::class,'blogdetails'])->name('blog_details');
//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

