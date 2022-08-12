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
            <h3>Vui lòng nhập vào gmail xác nhận của bạn </h3>
            <form action="{{route('sub_no_active')}}" method="POST" enctype = multipart/form-data>
            @csrf
          <div class="form-group">
                  <input type="text" class="form-control" placeholder="Email xác nhận..." required name="emailactive">
                
               </div>
           
            <button type="submit" class="btn">Gửi Xác Nhận</button>
        </form>
         </div>
      </div>
   </body>
@stop()