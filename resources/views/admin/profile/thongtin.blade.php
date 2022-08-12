@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Thông tin người dùng</h3>

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <form class="form-horizontal form-material"  method="POST" acction="{{route('xylysuaprofile',['profile'=>$thongtin->id])}}" enctype = multipart/form-data>
    <div class="row">
        <!-- Column -->
        <div class="col-lg-3 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-block">
                    <center class="m-t-30"> <img src="{!! url('adminavatar/'.$thongtin->avatar.'') !!}" class="img-circle" width="150" style="margin-top: 10px;margin-bottom:10px"/>
                        <h6 class="card-title m-t-10" >{{$thongtin->full_name}}</h6>
                        <input style="font-size: 10px; margin-bottom:20px" type="file" id="avatar" name="avatar">
                    </center>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-9 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    
                        @csrf
                        <input type="hidden" value="{{$thongtin->id}}" name="id">
                        <div class="form-group">
                            <label class="col-md-12">Họ tên</label>
                            <div class="col-md-12">
                                <input type="text" id="full_name" name="full_name" value="{{$thongtin->full_name}}" placeholder="Nhập họ tên" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Tên đăng nhập</label>
                            <div class="col-md-12">
                                <input type="text" id="username" name="username" value="{{$thongtin->username}}" placeholder="Nhập tên đăng nhập" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" id="email" name="email" value="{{$thongtin->email}}"  placeholder="Nhập email của bạn" class="form-control form-control-line" name="example-email" id="example-email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Địa chỉ</label>
                            <div class="col-md-12">
                                <input type="text" id="address" name="address" value="{{$thongtin->address}}" placeholder="Nhập địa chỉ của bạn" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Số điện thoại</label>
                            <div class="col-md-12">
                                <input type="text" id="phone_number" name="phone_number" value="0{{$thongtin->phone_number}}" placeholder="Nhập số điện thoại" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Ngày sinh</label>
                            <div class="col-md-12">
                                <input type="date" id="birth" name="birth" value="{{$thongtin->birth}}" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Giới tính</label>
                            <div class="col-md-12">
                                <select id="gender" name="gender"  class="form-control form-control-line">
                                    @if ($thongtin->gender == 0){
                                        <option value="0" selected>Nữ</option>
                                        <option value="1">Nam</option>
                                    }@else{
                                        <option value="0" >Nữ</option>
                                        <option value="1" selected>Nam</option>
                                    }
                                        
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="button type2" href="">Thay đổi thông tin</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
{{--jquery.autocomplete.js--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.10/jquery.autocomplete.min.js"></script>
{{--custom css item suggest search--}}
<style>
    .autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
    .autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
    .autocomplete-selected { background: #F0F0F0; }
    /*.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }*/
    .autocomplete-group { padding: 2px 5px; }
    .autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
</style>
@endsection
