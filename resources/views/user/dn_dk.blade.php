@extends('layout/header_footer')
@section('main')
@if(Session::has('actived'))
 <script>
    swal("Đã xác nhận tài khoản thành công","Bạn có thể đăng nhập","success");
    </script>
    @endif	
    @if(Session::has('noactived'))
 <script>
    swal("Xác Nhận Tài Khoản Không Thành Công","","error");
    </script>
    @endif	
    @if(Session::has('laylaimatkhauok'))
 <script>
    swal("Lấy lại mật khẩu thành công","bây giờ bạn có thể đăng nhập","success");
    </script>
    @endif	

            <div><h1 style="text-align:center; color:#0382C7;"> CHÀO MỪNG ĐẾN VỚI <img  src=" {{asset('images/menu/logo/logo.png')}}" alt=""> SHOP  </div> </h1>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Login Content Area -->
  <div class="page-section mb-60">
  @if (session('messchualogin')) <div class="alert alert-success"> {{ session('messchualogin') }} </div> @endif
  @if (session('dangnhap')) <div class="alert alert-success"> {{ session('dangnhap') }} </div> @endif
  @if (session('messchuaxacnhan')) <div class="alert alert-success"> {!!session('messchuaxacnhan')!!} </div> @endif
  @if (session('xacnhanmail')) <div class="alert alert-success"> {{ session('xacnhanmail') }} </div> @endif
  @if (session('guifpass')) <div class="alert alert-success"> {{ session('guifpass') }} </div> @endif
  @if (session('taikhoantontai')) <div class="alert alert-success"> {{ session('taikhoantontai') }} </div> @endif
</div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">

                        
                            <!-- Login Form s-->
                            <form action="{{route('xuly_dangnhap')}}" method="POST" enctype = multipart/form-data>
                            @csrf
                                <div class="login-form">
                                    <h4 class="login-title">Đăng Nhập</h4>
                                            <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Tên Tài Khoản</label>
                                            <input class="mb-0" type="text" placeholder="Tài Khoản "name="username">
                                        <span class="">{{@$errors->first('username')}}</span>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Mật Khẩu</label>
                                            <input class="mb-0" type="password" placeholder="Mật Khẩu"name="password">
                                            <span class="">{{@$errors->first('password')}}</span>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                                <input type="checkbox" id="remember_me">
                                                <label for="remember_me">Ghi Nhớ Tôi</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                            <a href="{{route('hienthi_quenmatkhau')}}"> Quên Mật Khẩu?</a>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="register-button mt-0">Đăng Nhập</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                            <form action="{{route('xuly_dangky')}}" method="POST">
                            @csrf
                                <div class="login-form">
                                    <h4 class="login-title">Đăng Ký</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Họ Tên</label>
                                            <input class="mb-0" type="text" placeholder="Họ tên" name="ten"> 
                                            <span class="">{{@$errors->first('ten')}}</span>
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Tên Tài Khoản</label>
                                            <input class="mb-0" type="text" placeholder="Tên tài khoản"name="tentk">
                                            <span class="">{{@$errors->first('tentk')}}</span>
               		
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Số Điện Thoại</label>
                                            <input class="mb-0" type="text" placeholder="Số Điện Thoại" name="sdt">
                                            <span class="">{{@$errors->first('sdt')}}</span>
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Địa Chỉ</label>
                                            <input class="mb-0" type="text" placeholder="Địa Chỉ" name="diachi">
                                            <span class="">{{@$errors->first('diachi')}}</span>
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Địa Chỉ Email</label>
                                            <input class="mb-0" type="email" placeholder="Email" name="email">
                                            <span class="">{{@$errors->first('email')}}</span>
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Ngaỳ Sinh</label>
                                            <input class="mb-0" type="date" placeholder="Ngày Sinh" name="ngaysinh">
                                            <span class="">{{@$errors->first('ngaysinh')}}</span>
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Mật Khẩu</label>
                                            <input class="mb-0" type="password" placeholder="Mật khẩu" name="matkhau">
                                            <span class="">{{@$errors->first('matkhau')}}</span>
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Giới Tính</label>
                                            <p style="margin-bottom:-27px;font-size: 16px;font-weight: bold;"> Nam</p>
                                            <input type="radio" id="sex" name="gioitinh" value="0" />
                                            <p style="margin-bottom:-27px;font-size: 16px;font-weight: bold;"> Nữ</p>
                                            <input type="radio" id="sex" name="gioitinh" value="1" />
                                            
                                        </div>  
                                       
                                 
                                       

                                    
                                        <div class="col-12">
                                            <button class="register-button mt-0">Đăng Ký</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Login Content Area End Here -->
    
@stop()