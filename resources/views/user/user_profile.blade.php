@extends('layout/header_footer')
@section('main')
@if(Session::has('editpass'))
 <script>
    swal("Thay đổi mật khẩu thành công","","success");
    </script>
    @endif	
    @if(Session::has('editpro'))
 <script>
    swal("Thay đổi thông tin thành công","","success");
    </script>
    @endif	
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
<div class="col-xl-6 col-md-12"> 
                                                <div class="card user-card-full">
                                                    <div class="row m-l-0 m-r-0">
                                                        <div class="col-sm-4 bg-c-lite-green user-profile">
                                                            <div class="card-block text-center text-white">
                                                          
                                                                <div class="m-b-25">
                                                                
                                                                    <div style=" width:180px;height:160px;border-radius:100px; margin-left:70px;">
                                                                    @if(Auth::user()->avatar)
                                                                    <img src="{{url('users/')}}/{{Auth::user()->avatar}}" class="img-radius" alt="User-Profile-Image" style="width:100%;height:100%;">
                                                                    @else
                                                                    <img src=" {{asset('images/menu/logo/davatar.png')}}" class="img-radius" alt="User-Profile-Image" style="width:100%;height:100%;">
                                                                     @endif
                                                                    </div>
                                                                </div>
                                                             
                                                                <h6 class="f-w-600" style="color:white;">{{Auth::user()->full_name}}</h6>
                                                              
                                                                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                                                <li><a href="{{route('edit_profile')}}"><img src=" {{asset('images/menu/logo/edit.png')}}" style="width:27px;"alt="" > </a>Thay đổi thông tin cá nhân </li>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                        
                                                            <div class="card-block">
                                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Thông Tin Khách Hàng</h6>
                                                                <div class="row">
                                                                <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Họ Và Tên:</p>
                                                                      
                                                                        <h6 class="text-muted f-w-400">{{Auth::user()->full_name}}</h6>
                                                                      
                                                                    </div>
                                                                   
                                                                  
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Ngày Sinh:</p>
                                                                 
                                                                        <h6 class="text-muted f-w-400">{{Auth::user()->birth}} </h6>
                                                              
                                                                    </div>
                                                                                           
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Số Điện Thoại:</p>
                                                                   
                                                                        <h6 class="text-muted f-w-400">{{Auth::user()->phone_number}}</h6>
                                                               
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Địa Chỉ:</p>
                                                                   
                                                                        <h6 class="text-muted f-w-400">{{Auth::user()->address}}</h6>
                                                                     
                                                                    </div>
                                                                </div>
                                                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Thông Tin Tài Khoản</h6>
                                                                <div class="row">
                                                                <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Tên Tài Khoản:</p>
                                                                      
                                                                        <h6 class="text-muted f-w-400">{{Auth::user()->username}}</h6>
                                                                      
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Email:</p>
                                                               
                                                                        <h6 class="text-muted f-w-400">{{Auth::user()->email}}</h6>
                                                                   
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                    <p class="m-b-10 f-w-600">Mật Khẩu:</p>
                                                                   
                                                                        <h6 class="text-muted f-w-400" >*************</h6>
                                                                        <li><a href="{{route('show_edit_password')}}"><img src=" {{asset('images/menu/logo/edit.png')}}" style="width:20px;"alt="" > </a> Thay đổi mật khẩu</li>
                                                               
                                                                    </div>
                                                                    
                                                                </div>
                                                               
                                                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             </div>
                                                </div>
                                            </div>
    
@stop()