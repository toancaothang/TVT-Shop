@extends('layout/header_footer')
@section('main')

            <!-- Compare Area -->
            @if(Session::get('compare'))
            <div class="compare-area pt-60 pb-60">
                <div class="container">
                <div class="compare-table table-responsive">
                        <div style="margin-bottom:10px;">
                    <button style="margin-bottom:10px;background-color: #0382C7;border: none;height: 39px;width: 158px;border-radius: 2px;"><a href="{{route('delete_compare')}}" style="color:white;font-weight:bold;"> Xóa So Sánh </a> </button>
</div>
                        <table class="table table-bordered table-hover mb-0">
                            <tbody>
                                <tr>
                                    <th class="compare-column-titles">Thiết Kế Sản Phẩm</th>
                                    @foreach(Session::get('compare') as $key => $com)
                                    <td class="compare-column-productinfo">
                                  
                                        <div class="compare-pdoduct-image">
                                            <a href="{{route('chitiet_sanpham',['cateid'=>$com['cateid'],'id'=>$com['model_id']])}}">
                                                <img src="{{url('website/product')}}/{{$com['image']}}" style="width:100px;" alt="Product Image">
                                            </a>
                                          <!--  <a style="margin-left: 47px;"href="{{route('delete_procompare')}}"><i style="color: red;font-size: 18px;" class="fa fa-times"></i></a>-->
                                        </div>
                                    </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Tên Sản Phẩm</th>
                       
                                    @foreach(Session::get('compare') as $key => $com)
                                    <td>
                                        <h5 class="compare-product-name"><a href="{{route('chitiet_sanpham',['cateid'=>$com['cateid'],'id'=>$com['model_id']])}}"></a>{{$com['name']}} {{$com['capacity']}}GB</h5>
                                    </td>
                                  @endforeach
                                 
                                </tr>
                                <tr>
                              
                                    <th>Nhà Sản Xuất</th>
                                    @foreach(Session::get('compare') as $key => $com)
                                    <td>{{$com['branch']}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                @php
                                    $maxprice=0;
                                   @endphp
                                @foreach(Session::get('compare') as $key => $com)
                                @php $exsale=$com['sale']*$com['price']/100;
                                                $trueprice=$com['price']-$exsale;
                                                @endphp
                                    @if($com['stock']>0)
                                   @if($maxprice<$trueprice)
                                   @php
                                   $maxprice =$trueprice;
                                @endphp
                                @endif
                                @endif
                                        @endforeach
                                    <th>Giá</th>
                                    @foreach(Session::get('compare') as $key => $com)
                                   @php $exsale=$com['sale']*$com['price']/100;
                                                $trueprice=$com['price']-$exsale;
                                                @endphp
                                               @if($com['stock']>0)
                                               @if($trueprice==$maxprice)
                                <td style="background-color:#06BD4B;color:white;font-weight:bold;">{{number_format($trueprice)}}<u> đ</u></td>
                                @else
                                <td>{{number_format($trueprice)}}<u> đ</u></td>
                                @endif
                                @else
                                    <td style="color:red;">Hết Hàng</td>
                                   @endif
                               
                                   
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Hệ Điều Hành</th>
                                    @foreach(Session::get('compare') as $key => $com)
                                    <td>{{$com['operasystem']}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Màn Hình</th>
                                    @foreach(Session::get('compare') as $key => $com)
                                    <td>{{$com['screen']}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>CPU</th>
                                    @foreach(Session::get('compare') as $key => $com)
                                    <td>{{$com['cpu']}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>GPU</th>
                                    @foreach(Session::get('compare') as $key => $com)
                                   <td>{{$com['gpu']}}</td>
                                    @endforeach
                                
                                </tr>
                                <tr>
                                @php
                                    $maxram=0;
                                   @endphp
                                @foreach(Session::get('compare') as $key => $com)
                                   @if($maxram<$com['ram'])
                                   @php
                                   $maxram =$com['ram'];
                                @endphp
                                @endif
                                        @endforeach
                                    <th>Ram</th>
                                    @foreach(Session::get('compare') as $key => $com)
                                    @if($com['ram']==$maxram)
                                   <td style="background-color:#06BD4B;color:white;font-weight:bold;">{{$com['ram']}} GB</td>
                                 @else
                                  <td>{{$com['ram']}} GB</td>
                                  @endif

                                    @endforeach
                                </tr>
                                <tr>
                                @php
                                    $maxcapa=0;
                                   @endphp
                                @foreach(Session::get('compare') as $key => $com)
                                   @if($maxcapa<$com['capacity'])
                                   @php
                                   $maxcapa =$com['capacity'];
                                @endphp
                                @endif
                                        @endforeach
                                    <th>Dung Lượng Bộ Nhớ Trong</th>
                                    @foreach(Session::get('compare') as $key => $com)
                                    @if($com['capacity']==$maxcapa)
                                   <td style="background-color:#06BD4B;color:white;font-weight:bold;">{{$com['capacity']}} GB</td>
                                 @else
                                  <td>{{$com['capacity']}} GB</td>
                                  @endif
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Lượt Đánh Giá</th>
                                    @foreach(Session::get('compare') as $key => $com)
                                    <td>
                                        <div class="li-pro-rating li-rattingbox">
                                            <ul class="rating">
                                            @for($i=1;$i<=$com['rate'];$i++)
                                            <li><i class="fa fa-star-o" style="font-size:30px;"></i></li>
                                            @endfor
                                            @for($j=$com['rate']+1;$j<=5;$j++)
                                            <li class="no-star"><i class="fa fa-star-o" style="font-size:30px;"></i></li>
                                            @endfor
                                            </ul>
                                            </div>
                                                         
                                        </div>
                                      
                                    </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Mua Ngay</th>
                                    @foreach(Session::get('compare') as $key => $com)
                                    @if($com['stock']>0)
                                   <td>
                                    <form action="{{route('compare_cart')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <input type="hidden" value="{{$com['model_id']}}" name="moid">
                                        <input type="hidden" value="{{$com['product_id']}}" name="proid">
                                <button type="submit" style="border:none;background-color:#FED700;color:black;height:40px;border-radius:2px;font-weight:bold;"  class="ho-button ho-button-sm"> Thêm Vào Giỏ Hàng</button>
                                               
                                            </a>
                                           </form>
</td>
@else
<td> <button type="submit" style="border:none;background-color:#FED700;color:black;height:40px;border-radius:2px;font-weight:bold;"  class="ho-button ho-button-sm"> Đã Hết Hàng</button>  </td>
@endif
@endforeach
</tr>
                            </tbody>
                            
                        </table>
                        

                    </div>
                </div>
            </div>
            @else
            <!-- Error 404 Area Start -->
            <div class="error404-area pt-30 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="error-wrapper text-center ptb-50 pt-xs-20">
                                <div class="error-text">
                                   <h2>Không Có Sản Phẩm Để So Sánh</h2>
                                    <p>Hãy Chọn Sản Phẩm Để Thêm Vào </p>
                                </div>
                                <div class="search-error">
                                <img src=" {{asset('images/menu/logo/compare.webp')}}" alt="" style="width:100px;" >
                                </div>
                                <div class="error-button" style="border-rad">
                                    <a href="{{route('back_get')}}"style="color:black;">Bắt Đầu Thêm Sản Phẩm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Error 404 Area End -->
            @endif
            <!--// Compare Area -->
@stop()