<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

Route::group(['prefix' => '/'], function () {
    Route::get('/login', [Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [Admin\LoginController::class, 'login'])->name('admin.login.post');
    Route::get('register', [Admin\RegisterController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('register', [Admin\RegisterController::class, 'register'])->name('admin.register.post');
    Route::get('logout', [Admin\LoginController::class, 'logout'])->name('admin.logout');
     Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/',[Admin\DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('ThongKeBanHang',[Admin\DashboardController::class, 'ThongKeBanHang'])->name('ThongKeBanHang');
        Route::get('ThongkeNhapHang',[Admin\DashboardController::class, 'ThongkeNhapHang'])->name('ThongkeNhapHang');
        // Route::get('/', function () {
        //     return view('admin.dashboard.index');
        //     })->name('admin.dashboard');
     });
});
 //Nhà sản xuất
 Route::group(['prefix' => 'nhasanxuat'], function() {
    Route::get('index',[Admin\NhasanxuatController::class, 'index'])->name('nhasanxuat');
    Route::get('create',[Admin\NhasanxuatController::class, 'create'])->name('formthemNSX');
    Route::post('xulycreate',[Admin\NhasanxuatController::class, 'xulycreate'])->name('xylythemNSX');
    Route::get('edit/{NSX}',[Admin\NhasanxuatController::class, 'edit'])->name('SuaNSX');
    Route::post('edit/{NSX}',[Admin\NhasanxuatController::class, 'xulyedit'])->name('xylysuaNSX');
    Route::get('delete/{NSX}',[Admin\NhasanxuatController::class, 'xulydelete'])->name('xylyxoaNSX');
    Route::get('xylytkNSX',[Admin\NhasanxuatController::class, 'xylytkNSX'])->name('xylytkNSX');
});
    //Nhân viên
 Route::group(['prefix' => 'nhanvien'], function() {
    Route::get('index',[Admin\NhanvienController::class, 'index'])->name('nhanvien');
    Route::get('create',[Admin\NhanvienController::class, 'create'])->name('formthemNV');
    Route::post('xulycreate',[Admin\NhanvienController::class, 'xulycreate'])->name('xylythemNV');
    Route::get('edit/{NV}',[Admin\NhanvienController::class, 'edit'])->name('SuaNV');
    Route::post('edit/{NV}',[Admin\NhanvienController::class, 'xulyedit'])->name('xylysuaNV');
    Route::get('delete/{NV}',[Admin\NhanvienController::class, 'xulydelete'])->name('xylyxoaNV');
    Route::get('xylytkNV',[Admin\NhanvienController::class, 'xylytkNV'])->name('xylytkNV');
});
 //Thống kê
 Route::group(['prefix' => 'thongke'], function() {
    Route::get('index',[Admin\ThongkeController::class, 'index'])->name('thongke');
    Route::get('ThongKeTheoThang',[Admin\ThongkeController::class, 'ThongKeTheoThang'])->name('ThongKeTheoThang');
    Route::get('ThongKeTheoNgay',[Admin\ThongkeController::class, 'ThongKeTheoNgay'])->name('ThongKeTheoNgay');
    Route::get('create/{Tong}','App\Http\Controllers\Admin\ThongkeController@TimKiemThongKeTheoNgay')->name('TimKiemThongKeTheoNgay');
    Route::get('TimKiemTheoNam/{TKNam}','App\Http\Controllers\Admin\ThongkeController@TimKiemTheoNam')->name('TimKiemTheoNam');
    Route::get('LoadBangDanhSach',[Admin\ThongkeController::class, 'LoadBangDanhSach'])->name('LoadBangDanhSach');
    Route::get('Doanhthucaonhat',[Admin\ThongkeController::class, 'Doanhthucaonhat'])->name('Doanhthucaonhat');
});
//Sản phẩm model
Route::group(['prefix' => 'modelsanpham'], function() {
    // Model Sản phẩm
    Route::get('index',[Admin\SanphamModelController::class, 'index'])->name('modelsanpham');
    Route::get('createmodel',[Admin\SanphamModelController::class, 'createmodel'])->name('formthemmodelSP');
    Route::post('xulycreatemodel',[Admin\SanphamModelController::class, 'xulycreatemodel'])->name('xylythemmodelSP');
    Route::get('editmodel/{modelSP}',[Admin\SanphamModelController::class, 'editmodel'])->name('SuamodelSP');
    Route::post('editmodel/{modelSP}',[Admin\SanphamModelController::class, 'xulyeditmodel'])->name('xylysuamodelSP');
    Route::get('deletemodel/{modelSP}',[Admin\SanphamModelController::class, 'xulydeletemodel'])->name('xylyxoamodelSP');
    Route::get('xylytkModelSP',[Admin\SanphamModelController::class, 'xylytkModelSP'])->name('xylytkModelSP');
    
});
Route::group(['prefix' => 'sanpham'], function() {
    //Sản phẩm
    Route::get('index',[Admin\SanphamController::class, 'index'])->name('sanpham');
    Route::get('create',[Admin\SanphamController::class, 'create'])->name('formthemSP');
    Route::post('xulycreate',[Admin\SanphamController::class, 'xulycreate'])->name('xylythemSP');
    Route::get('edit/{SP}',[Admin\SanphamController::class, 'edit'])->name('SuaSP');
    Route::post('edit/{SP}',[Admin\SanphamController::class, 'xulyedit'])->name('xylysuaSP');
    Route::get('delete/{SP}',[Admin\SanphamController::class, 'xulydelete'])->name('xylyxoaSP');
    Route::get('xylytkSP',[Admin\SanphamController::class, 'xylytkSP'])->name('xylytkSP');
});
//Ảnh mẫu sản phẩm
Route::group(['prefix' => 'anhmodelsanpham'], function() {
    Route::get('index',[Admin\AnhmausanphamController::class, 'index'])->name('anhmodelsanpham');
    Route::get('create',[Admin\AnhmausanphamController::class, 'create'])->name('formthemAMSP');
    Route::post('xulycreate',[Admin\AnhmausanphamController::class, 'xulycreate'])->name('xylythemAMSP');
    Route::get('edit/{AMSP}',[Admin\AnhmausanphamController::class, 'edit'])->name('SuaAMSP');
    Route::post('edit/{AMSP}',[Admin\AnhmausanphamController::class, 'xulyedit'])->name('xylysuaAMSP');
    Route::get('delete/{AMSP}',[Admin\AnhmausanphamController::class, 'xulydelete'])->name('xylyxoaAMSP');
    Route::get('xylytkAMSP',[Admin\AnhmausanphamController::class, 'xylytkAMSP'])->name('xylytkAMSP');
});
 //Loại sản phẩm
 Route::group(['prefix' => 'loaisanpham'], function() {
    Route::get('index',[Admin\LoaisanphamController::class, 'index'])->name('loaisanpham');
    Route::get('create',[Admin\LoaisanphamController::class, 'create'])->name('formthemLSP');
    Route::post('xulycreate',[Admin\LoaisanphamController::class, 'xulycreate'])->name('xylythemLSP');
    Route::get('edit/{LSP}',[Admin\LoaisanphamController::class, 'edit'])->name('SuaLSP');
    Route::post('edit/{LSP}',[Admin\LoaisanphamController::class, 'xulyedit'])->name('xylysuaLSP');
    Route::get('delete/{LSP}',[Admin\LoaisanphamController::class, 'xulydelete'])->name('xylyxoaLSP');
    Route::get('xylytkLSP',[Admin\LoaisanphamController::class, 'xylytkLSP'])->name('xylytkLSP');
});

// Hoá đơn
Route::group(['prefix' => 'hoadon'], function() {
    Route::get('index',[Admin\HoadonController::class, 'index'])->name('hoadon');
    Route::get('edit/{HD}',[Admin\HoadonController::class, 'edit'])->name('SuaHD');
    Route::post('edit/{HD}',[Admin\HoadonController::class, 'xulyedit'])->name('xylysuaHD');
    Route::get('delete/{HD}',[Admin\HoadonController::class, 'xulydelete'])->name('xylyxoaHD');
    Route::get('xylytkHD',[Admin\HoadonController::class, 'xylytkHD'])->name('xylytkHD');
});

// Hoá đơn nhập 
Route::group(['prefix' => 'hoadonnhap'], function() {
    Route::get('index',[Admin\HoadonnhapController::class, 'index'])->name('hoadonnhap');
    Route::get('create',[Admin\HoadonnhapController::class, 'create'])->name('formthemHDN');
    Route::post('xulycreate',[Admin\HoadonnhapController::class, 'xulycreate'])->name('xylythemHDN');
    Route::get('edit/{HDN}',[Admin\HoadonnhapController::class, 'edit'])->name('SuaHDN');
    Route::post('edit/{HDN}',[Admin\HoadonnhapController::class, 'xulyedit'])->name('xylysuaHDN');
    Route::get('delete/{HDN}',[Admin\HoadonnhapController::class, 'xulydelete'])->name('xylyxoaHDN');
    Route::get('xylytkHDN',[Admin\HoadonnhapController::class, 'xylytkHDN'])->name('xylytkHDN');

    Route::get('getNhasanxuat',[Admin\HoadonnhapController::class, 'getNhasanxuat'])->name('getNhasanxuat');
    //Route::get('create/{idd}', 'App\Http\Controllers\Admin\HoadonnhapController@getDetails')->name('getDetails');
    Route::get('create/{id}','App\Http\Controllers\Admin\HoadonnhapController@GetDanhSachSanPham')->name('GetDanhSachSanPham');
    Route::post('TaoMoiHoaDonNhap','App\Http\Controllers\Admin\HoadonnhapController@TaoMoiHoaDonNhap')->name('TaoMoiHoaDonNhap');
    //Route::get('create/{id}', [Admin\HoadonnhapController::class, 'getDetails'])->name('getDetails');
});

// Bài viết vs danh mục bài viết
Route::group(['prefix' => 'baiviet'], function() {
    // Bài viết
     Route::get('index',[Admin\BaivietController::class, 'index'])->name('baiviet');
    Route::get('create',[Admin\BaivietController::class, 'create'])->name('formthemBV');
    Route::post('xulycreate',[Admin\BaivietController::class, 'xulycreate'])->name('xylythemBV');
    Route::get('edit/{BV}',[Admin\BaivietController::class, 'edit'])->name('SuaBV');
    Route::post('edit/{BV}',[Admin\BaivietController::class, 'xulyedit'])->name('xylysuaBV');
    Route::get('delete/{BV}',[Admin\BaivietController::class, 'xulydelete'])->name('xylyxoaBV');
    Route::get('xylytkBV',[Admin\BaivietController::class, 'xylytkBV'])->name('xylytkBV');
});

// Comment
Route::group(['prefix' => 'binhluankhachhang'], function() {
    //Comment
    Route::get('index',[Admin\BinhluanController::class, 'index'])->name('binhluankhachhang');
    Route::get('delete/{BL}',[Admin\BinhluanController::class, 'xulydelete'])->name('xylyxoaBL');
    Route::get('xylytkBL',[Admin\BinhluanController::class, 'xylytkBL'])->name('xylytkBL');
 });

// Profile
Route::group(['prefix' => 'profile'], function() {
    // Bài viết
     Route::get('suaprofile/{profile}',[Admin\profileController::class, 'suaprofile'])->name('suaprofile');
     Route::post('suaprofile/{profile}',[Admin\profileController::class, 'xylysuaprofile'])->name('xylysuaprofile');
});

//Setting
Route::group(['prefix' => 'setting'], function() {
    //Banner
    Route::get('index',[Admin\SettingController::class, 'index'])->name('setting');
    Route::get('create',[Admin\SettingController::class, 'create'])->name('formthemBN');
    Route::post('xulycreate',[Admin\SettingController::class, 'xulycreate'])->name('xylythemBN');
    Route::get('edit/{BN}',[Admin\SettingController::class, 'edit'])->name('SuaBN');
    Route::post('edit/{BN}',[Admin\SettingController::class, 'xulyedit'])->name('xylysuaBN');
    Route::get('delete/{BN}',[Admin\SettingController::class, 'xulydelete'])->name('xylyxoaBN');
});

//khách hàng
Route::group(['prefix' => 'khachhang'], function() {
    Route::get('index',[Admin\KhachhangController::class, 'index'])->name('khachhang');
    Route::get('create',[Admin\KhachhangController::class, 'create'])->name('formthemKH');
    Route::post('xulycreate',[Admin\KhachhangController::class, 'xulycreate'])->name('xylythemKH');
    Route::get('edit/{KH}',[Admin\KhachhangController::class, 'edit'])->name('SuaKH');
    Route::post('edit/{KH}',[Admin\KhachhangController::class, 'xulyedit'])->name('xylysuaKH');
    Route::get('delete/{KH}',[Admin\KhachhangController::class, 'xulydelete'])->name('xylyxoaKH');
    Route::get('xylytkKH',[Admin\KhachhangController::class, 'xylytkKH'])->name('xylytkKH');
});

// Mã giảm giá
Route::group(['prefix' => 'magiamgia'], function() {
    // Bài viết
     Route::get('index',[Admin\MagiamgiaController::class, 'index'])->name('magiamgia');
    Route::get('create',[Admin\MagiamgiaController::class, 'create'])->name('formthemMGG');
    Route::post('xulycreate',[Admin\MagiamgiaController::class, 'xulycreate'])->name('xylythemMGG');
    Route::get('edit/{MGG}',[Admin\MagiamgiaController::class, 'edit'])->name('SuaMGG');
    Route::post('edit/{MGG}',[Admin\MagiamgiaController::class, 'xulyedit'])->name('xylysuaMGG');
    Route::get('delete/{MGG}',[Admin\MagiamgiaController::class, 'xulydelete'])->name('xylyxoaMGG');
    Route::get('xylytkMGG',[Admin\MagiamgiaController::class, 'xylytkMGG'])->name('xylytkMGG');
});
