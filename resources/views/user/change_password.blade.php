@extends('layout/header_footer')
@section('main')
@if(Session::has('saipasscu'))
 <script>
    swal("Sai mật khẩu cũ","Vui lòng nhập đúng mật khẩu hiện tại để thay đổi mật khẩu mới","error");
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
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                        <form action="{{route('edit_password',['id'=>Auth::user()->id])}}" method="POST" enctype = multipart/form-data>
                                                        @csrf
                                                            <div class="card-block">
                                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Thay Đổi Mật Khẩu Mới</h6>
                                                                <div class="row">
                                                                <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Mật Khẩu Cũ:</p>
                                                                        <input type="password" value="" name="oldpass" placeholder="Nhập vào mật khẩu cũ...">
                                                                      
                                                                      
                                                                    </div>
                                                                   
                                                                  
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Mật Khẩu Mới:</p>
                                                                 
                                                                        <input type="password" value="" name="newpass" placeholder="Nhập vào mật khẩu mới...">
                                                              
                                                                    </div>
                                                                                           
                                                                 
                                                                   
                                                                </div>
                                                                <br>
                                                               <button type="submit" style="border:none;width:150px;height:30px;background-color:#0382C7;color:white;border-radius:2px;font-weight:bold;"> Lưu Thay Đổi</button>
                                                                </form>
                                                                    
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