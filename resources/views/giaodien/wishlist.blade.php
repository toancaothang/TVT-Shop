@extends('layout/header_footer')
@section('main')

            @if(session()->has('messtontaiwishlist'))
    <div class="alert alert-success">
        {{ session()->get('messtontaiwishlist') }}
    </div>
@endif

@if(count($prowishshow))
            {
            <!--Wishlist Area Strat-->
            <div class="wishlist-area pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form action="#">
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr style="background-color: pink;">
                               
                                                <th class="li-product-thumbnail">Ảnh Sản Phẩm</th>
                                                <th class="cart-product-name">Tên Sản Phẩm</th>
                                                <th class="li-product-price">Giá</th>
                                                <th class="li-product-stock-status">Tình Trạng</th>
                                                <th class="li-product-add-cart">Mua Sản Phẩm</th>
                                                <th class="li-product-remove">Xóa Khỏi Danh Sách</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($prowishshow as $ps)
                                            <tr>
                                               
                                                <td class="li-product-thumbnail"><a href="{{route('chitiet_sanpham',['cateid'=>$ps->category_id,'id'=>$ps->mid])}}"><img src="{{url('website/product')}}/{{$ps->image}}" alt="" style="width:100px;height:100px;"></a></td>
                                                <td class="li-product-name"><a href="{{route('chitiet_sanpham',['cateid'=>$ps->category_id,'id'=>$ps->mid])}}"> </a> {{$ps->model_name}}  {{$ps->capacity}} GB</td>
                                                @php $exsale=$ps->sale*$ps->price/100;
                                                $trueprice=$ps->price-$exsale;
                                                 @endphp
                                                <td class="li-product-price">
                                                    
                                    
                                    @if($ps->stock>0)
                                                    <span class="amount"> {{number_format($trueprice)}} <u> đ</u></span></td>
                                                    <td class="li-product-stock-status"><span class="in-stock">Còn Hàng</span></td>
                                                    @else
                                                    <span class="amount" style="color:red"> Hết Hàng</span></td>
                                                <td class="li-product-stock-status"><span class="in-stock" style="color:red;">Hết Hàng</span></td>
                                                @endif
                                                <td class="li-product-add-cart"> @if($ps->stock>0)<a href="{{route('wishto_cart',['id'=>$ps->wid])}}">Thêm Vào Giỏ Hàng</a> @else<a href="#" style="">Đã Hết Hàng</a>@endif  </td>
                                                <td class="li-product-remove"><a href="{{route('delete_wish',['id'=>$ps->wid])}}"><i class="fa fa-times"></i></a></td>
                                                
                                            </tr>
                                            @endforeach
                                         
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
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
                                   <h2>Bạn Chưa Thêm Sản Phẩm Vào WishList</h2>
                                    <p>Hãy Chọn Sản Phẩm Để Thêm Vào </p>
                                </div>
                                <div class="search-error">
                                <img src=" {{asset('images/menu/logo/wishlist.png')}}" alt="" style="width:250px;" >
                                </div>
                                <div class="error-button">
                                <a href="{{route('back_get')}}"style="color:black;">Bắt Đầu Thêm Sản Phẩm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Error 404 Area End -->

            @endif
            <!--Wishlist Area End-->
@stop()