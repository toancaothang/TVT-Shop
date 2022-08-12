@extends('layout/header_footer')
@section('main')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<style>
body{
    margin-top:20px;
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}

    </style>
    <body>
        
<div class="page-content container">
    <div class="page-header text-blue-d2">
        <div class="page-tools">
           
        </div>
    </div>



                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Gửi Đến: </span>
                            <span class="text-600 text-110 text-blue align-middle">{{$billinfo->receiver_fullname}}</span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                            Địa Chỉ: {{$billinfo->deliver_address}}
                            </div>
                            
                            <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600">0 {{$billinfo->phone_number}}</b></div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                Hóa Đơn
                            </div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Mã Hóa Đơn:</span>A{{$billinfo->id}}</div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Ngày Đặt:</span> {{date_format($billinfo->created_at,"d/m/y H:i:s")}}</div>
                          @if($billinfo->status==0)
                            <div class="my-2" ><i class="fa fa-circle text-blue-m2 text-xs mr-1" ></i> <span class="text-600 text-90" >Tình Trạng:</span> <span class="badge badge-warning badge-pill px-25" style="background-color:red;color:white;">Đang xác nhận đơn</span></div>
                          
                          @elseif($billinfo->status==1)
                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Tình Trạng:</span> <span class="badge badge-warning badge-pill px-25" style="background-color:green;color:white;">Đang trong quá trình vận chuyển</span></div>
                          
                          @elseif($billinfo->status==2)
                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Tình Trạng:</span> <span class="badge badge-warning badge-pill px-25" style="background-color:yellow;color:black;">Đã giao hàng</span></div>
                            @else
                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Tình Trạng:</span> <span class="badge badge-warning badge-pill px-25" style="background-color:gray;color:white;">Đơn đã bị hủy</span></div>
                          @endif
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                    <div class="row text-600 text-white py-25" style="background-color:#4B5366;">
                <div class="d-none d-sm-block col-1" style="flex: 28 21 12.333333%;max-width:142px;">Ảnh Sản Phẩm</div>
                        <div class="col-9 col-sm-5" style="max-width: 37.666667%;">Sản Phẩm</div>
                        <div class="d-none d-sm-block col-4 col-sm-2">Số Lượng</div>
                        <div class="d-none d-sm-block col-sm-2">Đơn Giá</div>
                        <div class="col-2">Tổng Sản Phẩm</div>
                    </div>
                @foreach($billdetails as $bt)
                    <div class="text-95 text-secondary-d3">
                        <div class="row mb-2 mb-sm-0 py-25">
                         <div class="d-none d-sm-block col-1" style="flex: 28 21 12.333333%;max-width:142px;"><a href="{{route('chitiet_sanpham',['cateid'=>$bt->category_id,'id'=>$bt->pid])}}"><img src="{{url('website/product')}}/{{$bt->image}}" alt="" style="width:50px;"></a></div>
                            <div class="col-9 col-sm-5" style="max-width: 37.666667%;"><a href="{{route('chitiet_sanpham',['cateid'=>$bt->category_id,'id'=>$bt->pid])}}"> {{$bt->model_name}} {{$bt->capacity}}GB</a></div>
                            <div class="d-none d-sm-block col-2">{{$bt->quantity}}</div>
                            <div class="d-none d-sm-block col-2 text-95"> {{number_format($bt->unit_price)}} <u>đ </u></div>
                            @php $tongsp=$bt->unit_price*$bt->quantity; @endphp
                            <div class="col-2 text-secondary-d2"> {{number_format($tongsp)}} <u>đ </u></div>
                        </div>

                       @endforeach

                    <div class="row border-b-2 brc-default-l2"></div>

                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                            
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
             <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right">
                                   Tổng Tiền:
                                </div>
                                <div class="col-5">
                                    <span class="text-150 text-success-d3 opacity-2">{{number_format($billinfo->total)}} <u>đ </u></span>
                                </div>
                            </div>
                        </div>
                    </div>
<hr />
                    <div>
                        
                        @if($billinfo->status>=3)
                        <form action="{{route('re_order',['id'=>$billinfo->id])}}" method="POST" >
                        @csrf
                     <button type="submit" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0">Đặt Lại Đơn</button>
</form>
@else
                        <form action="{{route('cancel_order',['id'=>$billinfo->id])}}" method="POST" >
                        @csrf
                     <button type="submit" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0">Hủy Đơn</button>
</form>
@endif
                    </div><br>
                    <div>
                        <span class="text-secondary-d1 text-105">TVT Shop cảm ơn vì đã mua hàng.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@stop()