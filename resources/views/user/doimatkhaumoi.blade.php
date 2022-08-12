@extends('layout/header_footer')
@section('main')
<head>
      <style>
         body {
         background-color: #17c0eb;

         }
         .btn {
         background-color: #0382C7;
         width: 100%;
         color: #fff;
         padding: 10px;
         font-size: 18px;
         }
         .btn:hover {
         background-color: #2d3436;
         color: #fff;
         }
         input {
         height: 50px !important;
         }
         .form-control:focus {
         border-color: #18dcff;
         box-shadow: none;
         }
         h3 {
         color: #0382C7;
         font-size: 36px;
         }
         .cw {
         width: 35%;
         }
         @media(max-width: 992px) {
         .cw {
         width: 60%;
         }
         }
         @media(max-width: 768px) {
         .cw {
         width: 80%;
         }
         }
         @media(max-width: 492px) {
         .cw {
         width: 90%;
         }
         }
      </style>
   </head>
   <body>
      <div class="container d-flex justify-content-center align-items-center vh-100" style="height:550px;">
         <div class="bg-white text-center p-5 mt-3 center">
            <h3>Nhập vào mật khẩu mới của bạn </h3>
            <form action="{{route('change_fpassword',['id'=>$id->id,'token'=>$id->remember_token])}}" method="POST" enctype = multipart/form-data>
            @csrf
          <div class="form-group">
                  <input type="password" class="form-control" placeholder="Nhập vào mật khẩu mới..." required name="newpass"><br>
                  <input type="password" class="form-control" placeholder="Xác nhận mật khẩu mới..." required name="newpasscf">
               </div>
           
            <button type="submit" class="btn">Xác Nhận</button>
        </form>
         </div>
      </div>
   </body>
@stop()