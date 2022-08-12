@extends('admin.app')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<section class="recent" style="margin-top: 0px;">
  <div class="activity-card" style="width:1050px">
    <div class="content" style="padding-top: 10px; padding-bottom:0px">
        <div class="container">
            <div class="row align-items-stretch no-gutters contact-wrap">
            <div class="col-md-12">
                <div class="form h-100" style="padding-bottom: 0px">
                <h4>Sửa mẫu sản phẩm</h4>
                <form class="mb-5" method="POST" action="{{route('xylysuamodelSP',['modelSP'=>$thongtin->id])}}" style="margin-left :20px">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Loại sản phẩm</label>
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach ($dsLoaisanpham as $a)
                                    @if ($a->id == $thongtin->category_id)
                                        <option value="{{$a->id}}" selected>{{$a->category_name}}</option>
                                    @else
                                        <option value="{{$a->id}}">{{$a->category_name}}</option>
                                    @endif
                                @endforeach  
                              </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                          <label for="" class="col-form-label">Nhà sản xuất</label>
                          <select class="form-control" name="branch_id" id="branch_id">
                            @foreach ($dsNhasanxuat as $a)
                                @if ($a->id == $thongtin->branch_id)
                                    <option value="{{$a->id}}" selected>{{$a->branch_name}}</option>
                                @else
                                    <option value="{{$a->id}}">{{$a->branch_name}}</option>
                                @endif
                            @endforeach  
                          </select>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Tên mẫu sản phẩm *</label>
                            <input type="text" class="form-control" name="model_name" id="model_name" value="{{$thongtin->model_name}}"  placeholder="Nhập tên mẫu sản phẩm" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Ram *</label>
                            <input type="text" class="form-control" name="ram" value="{{$thongtin->ram}}" id="ram" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Hệ điều hành *</label>
                            <input type="text" class="form-control" name="opera_sys" value="{{$thongtin->opera_sys}}" id="opera_sys" placeholder="Nhập tên hệ điều hành" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Pin *</label>
                            <input type="text" class="form-control" name="pin" value="{{$thongtin->pin}}" id="pin" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Chip xử lý (CPU) *</label>
                            <input type="text" class="form-control" name="cpu" value="{{$thongtin->cpu}}" id="cpu"  required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Chip đồ họa (GPU) *</label>
                            <input type="text" class="form-control" name="gpu" value="{{$thongtin->gpu}}" id="gpu" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Camera trước *</label>
                            <input type="text" class="form-control" name="front_camera" value="{{$thongtin->front_camera}}" id="front_camera" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                          <label for="" class="col-form-label">Camera sau *</label>
                          <input type="text" class="form-control" name="back_camera" value="{{$thongtin->back_camera}}" id="back_camera" required>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Khe cắm sim *</label>
                            <input type="text" class="form-control" name="sim" value="{{$thongtin->sim}}" id="sim" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Kích thước màn hình *</label>
                            <input type="text" class="form-control" name="screen" value="{{$thongtin->screen}}" id="screen" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group mb-12">
                            <label for="" class="col-form-label">Mô tả *</label>
                            <textarea style="height:200px" class="form-control" id="description" name="description">{{$thongtin->description}}</textarea>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Hình ảnh *</label>
                            <input type="file" class="form-control" name="image" value="{{$thongtin->image}}" id="image" style="border:none;">
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