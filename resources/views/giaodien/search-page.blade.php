@extends('layout/header_footer')
@section('main')
<script >
  $(document).ready(function(){
    $('#sortpro').change(function () {
   var sort=$(this).val();
   var ramvalue=get_ram('.ramvalue');
   var capavalue=get_dungluong('.capavalue');
    var url=$('#url').val();
   
    $.ajax({
url:url,
method:"get",
dataType: "html",
data:{capavalue:capavalue,ramvalue:ramvalue,sort:sort,url:url},
success:function(data){
    $(' .ajaxupdate').html(data);
}
    });

 
}); 
  })
  </script>
<!-- Begin Li's Breadcrumb Area -->

            <!-- Begin Li's Content Wraper Area -->
            <div class="content-wraper pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Begin Li's Banner Area -->
                           
                            <!-- Li's Banner Area End Here -->
                            <!-- shop-top-bar start -->
                           <!-- shop-top-bar end -->
                            @if(count($data))
                            <!-- shop-products-wrapper start -->
                            <div class="shop-products-wrapper">
                                <div class="tab-content">
                                    <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                        <div class="product-area shop-product-area">
                                       
                                            <div class="row">
                                            @foreach($data as $searchrs)
                                            <div class="col-lg-3 col-md-4 col-sm-6 mt-40">
                                            
                                                    <!-- single-product-wrap start -->
                                                  <div class="single-product-wrap">
                                                        <div class="product-image">
                                                            <a href="{{route('chitiet_sanpham',['cateid'=>$searchrs->category_id,'id'=>$searchrs->mid])}}">
                                                                <img src="{{url('website/product')}}/{{$searchrs->image}}" alt="Li's Product Image">
                                                            </a>
                                                            <span class="sticker">Mới</span>
                                                        </div>
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <div class="product-review">
                                                                    <h5 class="manufacturer">
                                                                     
                                                                    </h5>
                                                                    <div class="rating-box">
                                                                        <ul class="rating">
                                                              @for($i=1;$i<=$searchrs->total_rated;$i++)
                                                           <li><i class="fa fa-star-o"></i></li>
                                                            @endfor
                                                              @for($j=$searchrs->total_rated+1;$j<=5;$j++)
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                       @endfor
                                                                        </ul>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <h4><a class="product_name" href="{{route('chitiet_sanpham',['cateid'=>$searchrs->category_id,'id'=>$searchrs->mid])}}">{{$searchrs->model_name}} {{$searchrs->capacity}}GB</a></h4>
                                                                <form action="{{route('com_pare',['id'=>$searchrs->mid])}}" class="compare_add" method="POST" >
                                                            @csrf
                                                  <span id="compares-{{$searchrs->mid}}">
                                                        <input type="hidden" value=" <?php echo $searchrs->id;?>" name="productid"/>
                                            
                                                          </span>
                                                        <button class="compare-btn" type="submit" style="border:none; background-color:white; color:#05A7FF;margin-left:-10px;margin-top:10px;" ><img src=" {{asset('images/menu/logo/compare.png')}}" style="width:27px;"alt="" >So Sánh</button>
 
                                           </form>
                                           @php
                                             $stocked=0;
                                     $stocked+=$searchrs->stock;
                                               @endphp
                                       @if($stocked==0)
                                    <div class="price-box">
                                                            <span class="new-price new-price-2" id="price1">Đã Hết Hàng</span>
                                                            <span id="salefix1">
                                                           </div>
                                                           @else
                                                      <div class="price-box">
                                                                @php $exsale=$searchrs->sale*$searchrs->price/100; @endphp
                                                               <span class="new-price new-price-2" id="price1">{{number_format($searchrs->price-$exsale)}} <u>đ</u></span>
                                                               @if($searchrs->sale)
                                                             <span id="salefix1">
                                                        <span class="old-price">{{number_format($searchrs->price)}}<u> đ</u></span>
                                                        <span class="discount-percentage">-{{$searchrs->sale}}%</span>
                                                        @endif
                                                        </span>
                                                        
                                                        
                                                                </div>
                                                                @endif
                                                            </div>
                                                            
                                                            <div class="add-actions">
                                                               <ul class="add-actions-link">
                                                                <form action="{{route('add_cart',['id'=>$searchrs->mid])}}" class="cart-quantity" method="POST" enctype="multipart/form-data">
                                                               @csrf
                                                                <input value="1" type="hidden" name="quaninput">
                                                                <input type="hidden" value=" <?php echo $searchrs->id;?>" name="productid"/>
                                                                @if($stocked>0)
                                                                <li style="width:145px;"> <button class="add-cart active" type="submit" style="border:none;width:145px;background-color:#FFCB09;color:black;" > Thêm Vào Giỏ Hàng </button></li>
                                                                @else
                                                                <li style="width:145px;"> <button class="add-cart active" style="border:none;width:145px;background-color:#FFCB09;color:black;" ><a href="#" style="color:black;"> Đã Hết Hàng</a></button></li>
                                                                  @endif
                                                                </form>
                                                             <form action="{{route('wish_list',['id'=>$searchrs->mid])}}" class="wishlist_add" method="POST">
                                                                @csrf
                                                              <span id="wish">
                                                                
                                                              <input type="hidden" value=" <?php echo $searchrs->id;?>" name="productidwish"/>
                                                             </span>
                                                             
                                                                   <li style="margin-left: 153px;
    margin-top: -36px;" > <button style="border:none;width:35px;"><i class="fa fa-heart-o"style="color:deeppink;" ></i></button> </li>
                                                            </form>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  
                                                    <!-- single-product-wrap end -->
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                 <div class="paginatoin-area">
                                        {!!$data->links('giaodien/partials.paginate')!!}
                                            
                                        </div>
                                </div>
                            </div>
                            <!-- shop-products-wrapper end -->
                            @else
 <!-- Error 404 Area Start -->
 <div class="error404-area pt-30 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="error-wrapper text-center ptb-50 pt-xs-20">
                                <div class="error-text">
                                   <h2>không Tìm Thấy Sản Phẩm</h2>
                                    <p>Vui Lòng Nhập Tìm Kiếm Sản Phẩm Hợp Lệ </p>
                                </div>
                                <div class="search-error">
                                <img src=" {{asset('images/menu/logo/nosearch.jpg')}}" alt="" style="width:100px;" >
                                </div>
                                <div class="error-button" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Error 404 Area End -->


                                
                                @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Wraper Area End Here -->
@stop()