@extends('admin/app')
@section('title') Dashboard @endsection
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<section class="recent" style="margin-top: 0px;">
  <div class="activity-grid">
    <div class="activity-card" style="width:1050px">
    <div class="content" style="padding-top: 10px; padding-bottom:0px">
        <div class="container" style="padding-bottom: 15px;">
            <div class="row align-items-stretch no-gutters contact-wrap">
            <div class="col-md-12">
                <div class="form h-100" style="padding-bottom:10px">
                <h4>Thay đổi tình trạng hoá đơn</h4>
                
                <form class="mb-5" method="POST" acction="{{route('xylysuaHD',['HD'=>$thongtin->id])}}" style="margin-left :20px">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Họ tên khách hàng*</label>
                            <input type="text" class="form-control" name="name_user" id="name_user" value="{{$thongtin->receiver_fullname}}" readonly>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Địa chỉ khách hàng</label>
                            <input type="text" class="form-control" name="deliver_address" id="deliver_address" value="{{$thongtin->deliver_address}}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Tổng tiền</label>
                            <input type="text" class="form-control" value="{{$thongtin->total}} đ" readonly>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Số điện thoại khách hàng</label>
                            <input type="text" class="form-control" value="0{{$thongtin->phone_number}}" readonly>
                        </div>
                        @if($thongtin->status == 2||$thongtin->status == 3)
                       
                    @else
                    <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Tình trạng</label>
                            <select class="form-control" name="status" id="status">
                                @if ($thongtin->status == 0){
                                    <option value="0" selected>Đang xác nhận</option>
                                    <option value="1" >Đã xác nhận</option>
                                    <option value="2" >Đã giao</option>
                                    <option value="3" >Đã huỷ</option>
                                }@elseif ($thongtin->status == 1){
                                    <option value="0" >Đang xác nhận</option>
                                    <option value="1" selected>Đã xác nhận</option>
                                    <option value="2" >Đã giao</option>
                                    <option value="3" >Đã huỷ</option>
                                }@elseif ($thongtin->status == 2){
                                    <option value="0" >Đang xác nhận</option>
                                    <option value="1" >Đã xác nhận</option>
                                    <option value="2" selected>Đã giao</option>
                                    <option value="3" >Đã huỷ</option>
                                }@elseif ($thongtin->status == 3)
                                <option value="0" >Đang xác nhận</option>
                                <option value="1" >Đã xác nhận</option>
                                <option value="2" >Đã giao</option>
                                <option value="3" selected>Đã huỷ</option>
                                @endif 
                              </select>
                        </div>
                        @endif
                    </div>
                   
                    <div class="row">
                    <div class="col-md-12 form-group">
                    @if($thongtin->status == 2||$thongtin->status == 3)
                    <a href="http://127.0.0.1:8000/admin/hoadon/index"> Trở lại</a>
                       @else
                        <input style="font-size:20px;" type="submit" value="Lưu" class="button type2">
                        @endif
                        <span class="submitting"></span>
                    </div>
                    </div>
                </form>
                <hr>
                <h4>Chi tiết hoá đơn</h4>
                <div class="table-responsive">
                    <table>
                        <thead>
                          <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($chitiethoadon as $a)
                            <tr>
                              <td>
                                @foreach ($modelsanpham as $b)
                                    @if ($b->id == $a->model_id)
                                        {{$b->model_name}}
                                    @endif
                                @endforeach  
                              </td>
                              <td>{{$a->quantity}}</td>
                              <td>{{number_format($a->unit_price)}} đ</td>
                              <td>{{number_format($a->unit_price * $a->quantity)}} đ</td>
                            </tr>
                          @endforeach  
                        </tbody>
                      </table>
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
    


