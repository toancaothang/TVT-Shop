@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<section class="recent" style="margin-top: 0px;">
  <div class="activity-card" style="width:1050px">
    <div class="content" style="padding-top: 10px; padding-bottom:0px">
        <div class="container">
            <div class="row align-items-stretch no-gutters contact-wrap">
            <div class="col-md-12">
                <div class="form h-100" style="padding-bottom: 0px">
                <h3>Sửa mã giảm giá</h3>
                <form class="mb-5" method="POST" acction="{{route('xylysuaMGG',['MGG'=>$thongtin->coupon_id])}}" style="margin-left :20px">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Tên mã giảm giá *</label>
                            <input type="text" class="form-control" name="coupon_name" id="coupon_name" value="{{$thongtin->coupon_name}}"  placeholder="Nhập tên mã giảm giá" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Số lượng *</label>
                            <input type="text" class="form-control" name="coupon_time" id="coupon_time" value="{{$thongtin->coupon_time}}" placeholder="Nhập số lượng" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Điều kiện *</label>
                            <input type="text" class="form-control" name="coupon_condition" id="coupon_condition" value="{{$thongtin->coupon_condition}}" placeholder="Nhập điều kiện" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Số lượng *</label>
                            <input type="text" class="form-control" name="coupon_time" id="coupon_time" value="{{$thongtin->coupon_time}}" placeholder="Nhập số lượng" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Số tiền giảm *</label>
                            <input type="text" class="form-control" name="coupon_number" id="coupon_number" value="{{$thongtin->coupon_number}}" placeholder="Nhập số tiền giảm" required>
                        </div>
                        <div class="col-md-12 form-group mb-12">
                            <label for="" class="col-form-label">Mã giảm</label>
                            <input class="form-control" type="text" class="form-control" name="coupon_code" value="{{$thongtin->coupon_code}}" id="coupon_code" placeholder="Nhập mã giảm" required>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12 form-group">
                        <input style="font-size:20px;" type="submit" value="Lưu" class="button type2">
                        <span class="submitting"></span>
                    </div>
                    </div>
                </form>
    
    
                {{-- <div id="form-message-warning mt-4"></div> 
                <div id="form-message-success">
                    Your message was sent, thank you!
                </div> --}}
    
                </div>
            </div>
            </div>
        </div>
    
        </div>
    </div>
  </div>
</section>
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