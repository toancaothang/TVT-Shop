   


@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<section class="recent" style="margin-top: 0px;">
  <div class="activity-grid">
    <div class="activity-card" style="width:1050px">
    <div class="content" style="padding-top: 10px; padding-bottom:0px">
        <div class="container">
            <div class="row align-items-stretch no-gutters contact-wrap">
            <div class="col-md-12">
                <div class="form h-100" style="padding-bottom: 0px">
                <h4>Thay đổi thông tin banner</h4>
                <form class="mb-5" method="POST" acction="{{route('xylysuaBN',['BN'=>$thongtin->id])}}" style="margin-left :20px"enctype = multipart/form-data>
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Tên banner *</label>
                            <input type="text" class="form-control" name="banner_name" id="banner_name" value="{{$thongtin->banner_name}}" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Link *</label>
                            <input type="text" class="form-control" name="banner_link" id="banner_link"  value="{{$thongtin->banner_link}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Ảnh banner</label>
                            <input type="file" class="form-control" name="banner_image" id="banner_image" value="{{$thongtin->banner_image}}">
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12 form-group">
                        <input style="font-size:20px;" type="submit" value="Lưu" class="button type2">
                        <span class="submitting"></span>
                    </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    
        </div>
    </div>
</div>
</section>
@endsection
    


