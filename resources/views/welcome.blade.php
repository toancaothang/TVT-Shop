@extends('layout/header_footer')
@section('main')

<!--xu ly bien -->
<script>
  $(document).ready(function(){
$('.update-bienthe').click(function(){
 var bienthes=$(this).data("type");
 var produm = $('#produm-' + $(this).data('id')).change().val();
 const price=$(this).data('id');
 $.ajax({
    
type:'get',
dataType:'html',
url:'<?php echo url('/selectbienthe');?>',
data: "bienthes="+ bienthes +"&produm="+produm,
success:function (response){
    console.log(response);
    $('#price-'+price).html(response);
    $('#price1-'+price).html(response);
    $('#price2-'+price).html(response);
}
}); 
$.ajax({
    
    type:'get',
    dataType:'html',
    url:'<?php echo url('/selectwish');?>',
    data: "bienthes="+ bienthes +"&produm="+produm,
    success:function (response){
        console.log(response);
        $('#wish-'+price).html(response); 
        $('#wish1-'+price).html(response); 
        $('#wish2-'+price).html(response); 
    }
    }); 
$.ajax({
    
    type:'get',
    dataType:'html',
    url:'<?php echo url('/selectsalecate');?>',
    data: "bienthes="+ bienthes +"&produm="+produm,
    success:function (response){
        console.log(response);
        $('#salefix-'+price).html(response); 
        $('#salefix1-'+price).html(response);
        $('#salefix2-'+price).html(response);
    }
    }); 
    $.ajax({
    
    type:'get',
    dataType:'html',
    url:'<?php echo url('/selectcompare');?>',
    data: "bienthes="+ bienthes +"&produm="+produm,
    success:function (response){
        console.log(response);
        $('#compares-'+price).html(response);
        $('#compares1-'+price).html(response);
        $('#compares2-'+price).html(response);
    }
    }); 
    
});

  });
    </script>
 <!-- Begin Slider With Banner Area -->
 <div class="slider-with-banner">
                <div class="container">
                    <div class="row">
                        <!-- Begin Slider Area -->
                        <div class="col-lg-8 col-md-8">
                            <div class="slider-area pt-sm-30 pt-xs-30">
                                <div class="slider-active owl-carousel">
                                     <!-- Begin Single Slide Area -->
                                     <div class="single-slide align-center-left animation-style-01 bg-3">
                                        <div class="slider-progress"></div>
                                        <div class="slider-content">
                                            <h5>Giảm giá <span>10%</span> Tuần Này</h5>
                                            <h2>Realme 8 Series</h2>
                                            <div class="default-btn slide-btn">
                                                <a class="links" href="{{route('chitiet_sanpham',['cateid'=>6,'id'=>33])}}">Mua Ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Slide Area End Here -->
                                    <!-- Begin Single Slide Area -->
                                    <div class="single-slide align-center-left animation-style-01 bg-1">
                                        <div class="slider-progress"></div>
                                        <div class="slider-content">
                                            <h5>Giảm giá <span>8% </span> Tuần Này</h5>
                                            <h2> Samsung Galaxy S22 Ultra 5G </h2>
                                           <div class="default-btn slide-btn">
                                                <a class="links" href="{{route('chitiet_sanpham',['cateid'=>1,'id'=>20])}}">Mua Ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Slide Area End Here -->
                                    <!-- Begin Single Slide Area -->
                                    <div class="single-slide align-center-left animation-style-02 bg-2">
                                        <div class="slider-progress"></div>
                                        <div class="slider-content">
                                            <h5>Giảm giá <span>8%</span> Tuần Này</h5>
                                            <h2>Iphone 13 Pro Max</h2>
                                          <div class="default-btn slide-btn">
                                                <a class="links" href="{{route('chitiet_sanpham',['cateid'=>2,'id'=>26])}}">Mua Ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Slide Area End Here -->
                                   
                                </div>
                            </div>
                        </div>
                        <!-- Slider Area End Here -->
                        <!-- Begin Li Banner Area -->
                        <div class="col-lg-4 col-md-4 text-center pt-sm-30 pt-xs-30">
                            <div class="li-banner">
                                <a href="{{route('chitiet_sanpham',['cateid'=>1,'id'=>20])}}">
                                    <img src="images/banner/xiaomi-redmi-note-10-3-1024x682.jpg" alt="">
                                </a>
                            </div>
                            <div class="li-banner mt-15 mt-md-30 mt-xs-25 mb-xs-5">
                                <a href="{{route('chitiet_sanpham',['cateid'=>9,'id'=>31])}}">
                                    <img src="images/banner/banner-PC.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- Li Banner Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Slider With Banner Area End Here -->
           
            <!-- team area wrapper start -->
            <div class="team-area pt-60 pt-sm-44">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="li-section-title capitalize mb-25">
                                <h2><span>Mã Khuyến Mãi</span></h2>
                            </div>
                        </div>
                    </div> <!-- section title end -->
                    <div class="row">
                    @foreach($coupon as $cp)
                        <div class="col-lg-3 col-md-6 col-sm-6" style="margin-right: 100px;">
                            
                            <div class="team-member mb-60 mb-sm-30 mb-xs-30">
                            
                            <div style="width:370px;height:200px;background-image: url(images/menu/logo/coupon2.webp);background-size:cover;">
                                   <img style="height:90px;width:90px;margin-top:7px;"src="{{url('images/menu/logo/sticky.png')}}" alt="cart products">
                                    <h4 style="color: #dc0e0e;margin-left: 100px;margin-top: -77px;"> Mã: {{$cp->coupon_code}} </h4>
                                    <div style="margin-left: 87px;border: solid #393434 2px;width: 133px;border-radius: 2px;height: 64px;">
                                    <p style="    font-size: 16px;background-color: #393434;width: 76px;margin-left: 6px;margin-top: 4px;color: white;padding-left: 5px;font-weight:bold;">Mã Giảm</p>
                                    <p style="height: 10px;font-size: 20px;color: #dc0e0e;font-weight: bold;margin-top: -13px; margin-left: 15px;"> Giảm {{$cp->coupon_number}}% </p>
                                         </div>
                                         <div>
                                         <p style="margin-left: 29px;font-size: 14px;color: #393434;font-weight:bold;"> Điều Kiện: Người Dùng Đã Đăng Ký </p>
                                         <input type="text" value="{{$cp->coupon_code}}" id="couponcode" style="display:none;">
                                         <button style="border: none;color: white;background-color: #c41212;width: 114px;border-radius: 2px;height: 35px; margin-left: 178px; margin-top: -9px;font-weight: bold;}" onclick="copcode()" type="submit"> Sao Chép Mã </button>
                                         </div>
<script>
    function copcode() {
  /* Get the text field */
  var copyText = document.getElementById("couponcode");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);

  /* Alert the copied text */
  swal("Đã lấy mã "+copyText.value,"Bạn có thể sử dụng mã giảm giá khi thanh toán","success");
}
    </script>
                               
                            </div>
                        </div> <!-- end single team member -->
                       
                    </div>
                    @endforeach
                </div>
              
            </div>
            <!-- team area wrapper end -->
                           <!-- Begin Static Top Area -->
            <div class="static-top-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="static-top-content mt-sm-30">
                                Mừng Ngày Khai Trương Website TvT Shop - Giảm Giá Siêu Ưu Đãi!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product-area start -->
            <div class="product-area pt-55 pb-25 pt-xs-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#li-new-product"><span>Sản Phẩm Mới</span></a></li>
                                   <li><a data-toggle="tab" href="#li-bestseller-product"><span>Sản Phẩm Khuyến Mãi</span></a></li>
                                   
                                </ul>               
                            </div>
                            <!-- Begin Li's Tab Menu Content Area -->
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                            <div class="row">
                                <div class="product-active owl-carousel">
                                @foreach($newpro as $value)
                               
                                    <div class="col-lg-12">
                                       <!-- single-product-wrap start -->
                                       <div class="single-product-wrap" id="updateDiv">
                                                        <div class="product-image">
                                                            <a href="{{route('chitiet_sanpham',['cateid'=>$value->category_id,'id'=>$value->id])}}">
                                                                <img src="{{url('website/product')}}/{{$value->image}}" alt="">
                                                            </a>
                                                            <span class="sticker">Mới</span>
                                                        </div>
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <div class="product-review">
                                                                <h5 class="manufacturer">

                                                              
                                                                    @foreach($value->getpro as $getpro)
                                                                        
                                                                        <div class="update-bienthe"  type="submit" data-type="{{$getpro->capacity}}" data-id="{{$value->id}}" tabindex="1" style="width:70px; padding-left:17px;padding-top:7px; margin-bottom:0px;" >{{$getpro->capacity}}GB</div>
                                                                        
                                                                  @endforeach
                                                                  <input type="hidden" value="<?php echo $value->id?>" id="produm-{{ $value->id }}" class="produm"/> 
                                                                    </h5>
                                                                    
                                                                   
                                                                </div>
                                                                
                                                                <h4><a class="product_name" href="{{route('chitiet_sanpham',['cateid'=>$value->category_id,'id'=>$value->id])}}">{{$value->model_name}} </a></h4>
                                                                
                                                            <form action="{{route('com_pare',['id'=>$value->id])}}" class="compare_add" method="POST" >
                                            @csrf
                                            <span id="compares-{{$value->id}}">
                                            <input type="hidden" value=" <?php echo $value->getpro->first()->id;?>" name="productid"/>
                                            
                                            </span>
                                            <button class="compare-btn" type="submit" style="border:none; background-color:white; color:#05A7FF;margin-left:-10px;margin-top:10px;" ><img src=" {{asset('images/menu/logo/compare.png')}}" style="width:27px;"alt="" >So Sánh</button>

                                           </form>
                                          
                                                               <div class="price-box">
                                                                
                                                                <form action="{{route('add_cart',['id'=>$value->id])}}" class="cart-quantity" method="POST" enctype="multipart/form-data" style="margin-top:-4px;">
                                                                @php $exsale=$value->getpro->first()->sale*$value->getpro->first()->price/100; @endphp
                                                                @csrf
                                                               <span class="new-price new-price-2" id="price-{{$value->id}}">{{number_format($value->getpro->first()->price-$exsale)}} <u>đ</u>
                                                             <input type="hidden" value=" <?php echo $value->getpro->first()->id;?>" name="productid" />
                                                            </span>
                                                               @if($value->getpro->first()->sale)
                                                             <span id="salefix-{{ $value->id }}">
                                                        <span class="old-price">{{number_format($value->getpro->first()->price)}}<u> đ</u></span>
                                                        <span class="discount-percentage">-{{$value->getpro->first()->sale}}%</span>
                                                        </span>
                                                        @endif
                                                                </div>
                                                            
                                                                <div class="rating-box">
                                                                        <ul class="rating">
                                                                        @for($i=1;$i<=$value->total_rated;$i++)
                                            <li><i class="fa fa-star-o"></i></li>
                                            @endfor
                                            @for($j=$value->total_rated+1;$j<=5;$j++)
                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            @endfor
                                                                        </ul>
                                                                    </div>
                                                            </div>
                                                            <div class="add-actions">
                                                                <ul class="add-actions-link">
                                                                <input class="cart-plus-minus-box " value="1" type="hidden" name="quaninput">
                                                               <li style="width:145px;"> <button class="add-cart active" type="submit" style="border:none;width:145px;background-color:#FFCB09;color:black;" > Thêm Vào Giỏ Hàng </button></li>
                                                                    
                                                                    </form> 
                                                                   
                                                                    <form action="{{route('wish_list',['id'=>$value->id])}}" class="wishlist_add" method="POST">
                                                                @csrf
                                                              <span id="wish-{{$value->id}}">
                                                                
                                                              <input type="hidden" value=" <?php echo $value->getpro->first()->id;?>" name="productidwish"/>
                                                             </span>
                                                             
                                                                   <li > <button style="border:none;width:35px;"><i class="fa fa-heart-o"style="color:deeppink;" ></i></button> </li>
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
                        <div id="li-bestseller-product" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="product-active owl-carousel">
                                @foreach($sale as $searchrs)
                             
                                 <div class="col-lg-12">
                                      
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product-wrap">
                                                        <div class="product-image">
                                                            <a href="{{route('chitiet_sanpham',['cateid'=>$searchrs->category_id,'id'=>$searchrs->id])}}">
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
                                                                <h4><a class="product_name" href="{{route('chitiet_sanpham',['cateid'=>$searchrs->category_id,'id'=>$searchrs->id])}}">{{$searchrs->model_name}} {{$searchrs->capacity}}GB</a></h4>
                                                                <form action="{{route('com_pare',['id'=>$searchrs->mid])}}" class="compare_add" method="POST" >
                                                            @csrf
                                                  <span id="compares-{{$searchrs->mid}}">
                                                        <input type="hidden" value=" <?php echo $searchrs->id;?>" name="productid"/>
                                            
                                                          </span>
                                                        <button class="compare-btn" type="submit" style="border:none; background-color:white; color:#05A7FF;margin-left:-10px;margin-top:10px;" ><img src=" {{asset('images/menu/logo/compare.png')}}" style="width:27px;"alt="" >So Sánh</button>

                                           </form>
                                                                <div class="price-box">
                                                                @php $exsale=$searchrs->sale*$searchrs->price/100; @endphp
                                                               <span class="new-price new-price-2" id="price1">{{number_format($searchrs->price-$exsale)}} <u>đ</u></span>
                                                               @if($searchrs->sale)
                                                             <span id="salefix1">
                                                        <span class="old-price">{{number_format($searchrs->price)}}<u> đ</u></span>
                                                        <span class="discount-percentage">-{{$searchrs->sale}}%</span>
                                                        </span>
                                                        @endif
                                                                </div>
                                                            </div>
                                                            <div class="add-actions">
                                                               
                                                                <ul class="add-actions-link">
                                                                <form action="{{route('add_cart',['id'=>$searchrs->mid])}}" class="cart-quantity" method="POST" enctype="multipart/form-data">
                                                               @csrf
                                                                <input value="1" type="hidden" name="quaninput">
                                                                <input type="hidden" value=" <?php echo $searchrs->id;?>" name="productid"/>
                                                                <li style="width:145px;"> <button class="add-cart active" type="submit" style="border:none;width:145px;background-color:#FFCB09;color:black;" > Thêm Vào Giỏ Hàng </button></li>
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
                        
                    </div>
                </div>
            </div>
            <!-- product-area end -->
            <!-- Begin Li's Static Banner Area -->
            <div class="li-static-banner li-static-banner-4 text-center pt-20">
                <div class="container">
                    <div class="row">
                        <!-- Begin Single Banner Area -->
                        <div class="col-lg-6">
                            <div class="single-banner pb-sm-30 pb-xs-30">
                                <a href="{{route('chitiet_sanpham',['cateid'=>8,'id'=>34])}}">
                                    <img src="images/banner/Vivo-V23e-ban.jpg" alt="Li's Static Banner">
                                </a>
                            </div>
                        </div>
                        <!-- Single Banner Area End Here -->
                        <!-- Begin Single Banner Area -->
                        <div class="col-lg-6">
                            <div class="single-banner">
                                <a href="{{route('chitiet_sanpham',['cateid'=>9,'id'=>35])}}">
                                    <img src="images/banner/Vivo-V23e-banner.jpg" alt="Li's Static Banner">
                                </a>
                            </div>
                        </div>
                        <!-- Single Banner Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Li's Static Banner Area End Here -->
            <!-- Begin Li's Laptop Product Area -->
            <section class="product-area li-laptop-product pt-60 pb-45 pt-sm-50 pt-xs-60">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Samsung</span>
                                </h2>
                               
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    @foreach($samsung as $value)
                                    
                                    <div class="col-lg-12">
                                       <!-- single-product-wrap start -->
                                       <div class="single-product-wrap" id="updateDiv">
                                                        <div class="product-image">
                                                            <a href="{{route('chitiet_sanpham',['cateid'=>$value->category_id,'id'=>$value->id])}}">
                                                                <img src="{{url('website/product')}}/{{$value->image}}" alt="">
                                                            </a>
                                                            <span class="sticker">Mới</span>
                                                        </div>
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <div class="product-review">
                                                                <h5 class="manufacturer">

                                                              
                                                                    @foreach($value->getpro as $getpro)
                                                                        
                                                                        <div class="update-bienthe"  type="submit" data-type="{{$getpro->capacity}}" data-id="{{$value->id}}" tabindex="1" style="width:70px; padding-left:17px;padding-top:7px; margin-bottom:0px;" >{{$getpro->capacity}}GB</div>
                                                                        
                                                                  @endforeach
                                                                  <input type="hidden" value="<?php echo $value->id?>" id="produm-{{ $value->id }}" class="produm"/> 
                                                                    </h5>
                                                                    
                                                                   
                                                                </div>
                                                                
                                                                <h4><a class="product_name" href="{{route('chitiet_sanpham',['cateid'=>$value->category_id,'id'=>$value->id])}}">{{$value->model_name}} </a></h4>
                                                                
                                                            <form action="{{route('com_pare',['id'=>$value->id])}}" class="compare_add" method="POST" >
                                            @csrf
                                            <span id="compares1-{{$value->id}}">
                                            <input type="hidden" value=" <?php echo $value->getpro->first()->id;?>" name="productid"/>
                                            
                                            </span>
                                            <button class="compare-btn" type="submit" style="border:none; background-color:white; color:#05A7FF;margin-left:-10px;margin-top:10px;" ><img src=" {{asset('images/menu/logo/compare.png')}}" style="width:27px;"alt="" >So Sánh</button>

                                           </form>
                                                               <div class="price-box">
                                                                
                                                                <form action="{{route('add_cart',['id'=>$value->id])}}" class="cart-quantity" method="POST" enctype="multipart/form-data" style="margin-top:-4px;">
                                                                @php $exsale=$value->getpro->first()->sale*$value->getpro->first()->price/100; @endphp
                                                                @csrf
                                                               <span class="new-price new-price-2" id="price1-{{ $value->id }}">{{number_format($value->getpro->first()->price-$exsale)}} <u>đ</u>
                                                             <input type="hidden" value=" <?php echo $value->getpro->first()->id;?>" name="productid" />
                                                            </span>
                                                               @if($value->getpro->first()->sale)
                                                             <span id="salefix1-{{ $value->id }}">
                                                        <span class="old-price">{{number_format($value->getpro->first()->price)}}<u> đ</u></span>
                                                        <span class="discount-percentage">-{{$value->getpro->first()->sale}}%</span>
                                                        </span>
                                                        @endif
                                                                </div>
                                                                <div class="rating-box">
                                                                        <ul class="rating">
                                                                        @for($i=1;$i<=$value->total_rated;$i++)
                                            <li><i class="fa fa-star-o"></i></li>
                                            @endfor
                                            @for($j=$value->total_rated+1;$j<=5;$j++)
                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            @endfor
                                                                        </ul>
                                                                    </div>
                                                            </div>
                                                            <div class="add-actions">
                                                                <ul class="add-actions-link">
                                                                <input class="cart-plus-minus-box " value="1" type="hidden" name="quaninput">
                                                               <li style="width:145px;"> <button class="add-cart active" type="submit" style="border:none;width:145px;background-color:#FFCB09;color:black;" > Thêm Vào Giỏ Hàng </button></li>
                                                                    
                                                                    </form> 
                                                                    
                                                                    <form action="{{route('wish_list',['id'=>$value->id])}}" class="wishlist_add" method="POST">
                                                                @csrf
                                                              <span id="wish1-{{$value->id}}">
                                                                
                                                              <input type="hidden" value=" <?php echo $value->getpro->first()->id;?>" name="productidwish"/>
                                                             </span>
                                                             
                                                                   <li > <button style="border:none;width:35px;"><i class="fa fa-heart-o"style="color:deeppink;" ></i></button> </li>
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
                        <!-- Li's Section Area End Here -->
                    </div>
                </div>
            </section>
            <!-- Li's Laptop Product Area End Here -->
            <!-- Begin Li's TV & Audio Product Area -->
            <section class="product-area li-laptop-product li-tv-audio-product pb-45">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Apple</span>
                                </h2>
                               
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                @foreach($apple as $value)
                               
                                    <div class="col-lg-12">
                                         <!-- single-product-wrap start -->
                                       <div class="single-product-wrap" id="updateDiv">
                                                        <div class="product-image">
                                                            <a href="{{route('chitiet_sanpham',['cateid'=>$value->category_id,'id'=>$value->id])}}">
                                                                <img src="{{url('website/product')}}/{{$value->image}}" alt="">
                                                            </a>
                                                            <span class="sticker">Mới</span>
                                                        </div>
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <div class="product-review">
                                                                <h5 class="manufacturer">

                                                              
                                                                    @foreach($value->getpro as $getpro)
                                                                        
                                                                        <div class="update-bienthe"  type="submit" data-type="{{$getpro->capacity}}" data-id="{{$value->id}}" tabindex="1" style="width:70px; padding-left:17px;padding-top:7px; margin-bottom:0px;" >{{$getpro->capacity}}GB</div>
                                                                        
                                                                  @endforeach
                                                                  <input type="hidden" value="<?php echo $value->id?>" id="produm-{{ $value->id }}" class="produm"/> 
                                                                    </h5>
                                                                    
                                                                   
                                                                </div>
                                                                
                                                                <h4><a class="product_name" href="{{route('chitiet_sanpham',['cateid'=>$value->category_id,'id'=>$value->id])}}">{{$value->model_name}} </a></h4>
                                                                
                                                            <form action="{{route('com_pare',['id'=>$value->id])}}" class="compare_add" method="POST" >
                                            @csrf
                                            <span id="compares2-{{$value->id}}">
                                            <input type="hidden" value=" <?php echo $value->getpro->first()->id;?>" name="productid"/>
                                            
                                            </span>
                                            <button class="compare-btn" type="submit" style="border:none; background-color:white; color:#05A7FF;margin-left:-10px;margin-top:10px;" ><img src=" {{asset('images/menu/logo/compare.png')}}" style="width:27px;"alt="" >So Sánh</button>

                                           </form>
                                                               <div class="price-box">
                                                                
                                                                <form action="{{route('add_cart',['id'=>$value->id])}}" class="cart-quantity" method="POST" enctype="multipart/form-data" style="margin-top:-4px;">
                                                                @php $exsale=$value->getpro->first()->sale*$value->getpro->first()->price/100; @endphp
                                                                @csrf
                                                               <span class="new-price new-price-2" id="price2-{{ $value->id }}">{{number_format($value->getpro->first()->price-$exsale)}} <u>đ</u>
                                                             <input type="hidden" value=" <?php echo $value->getpro->first()->id;?>" name="productid" />
                                                            </span>
                                                               @if($value->getpro->first()->sale)
                                                             <span id="salefix2-{{ $value->id }}">
                                                        <span class="old-price">{{number_format($value->getpro->first()->price)}}<u> đ</u></span>
                                                        <span class="discount-percentage">-{{$value->getpro->first()->sale}}%</span>
                                                        </span>
                                                        @endif
                                                                </div>
                                                                <div class="rating-box">
                                                                        <ul class="rating">
                                                                        @for($i=1;$i<=$value->total_rated;$i++)
                                            <li><i class="fa fa-star-o"></i></li>
                                            @endfor
                                            @for($j=$value->total_rated+1;$j<=5;$j++)
                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            @endfor
                                                                        </ul>
                                                                    </div>
                                                            </div>
                                                            <div class="add-actions">
                                                                <ul class="add-actions-link">
                                                                <input class="cart-plus-minus-box " value="1" type="hidden" name="quaninput">
                                                               <li style="width:145px;"> <button class="add-cart active" type="submit" style="border:none;width:145px;background-color:#FFCB09;color:black;" > Thêm Vào Giỏ Hàng </button></li>
                                                                    
                                                                    </form> 
                                                                
                                                                    <form action="{{route('wish_list',['id'=>$value->id])}}" class="wishlist_add" method="POST">
                                                                @csrf
                                                              <span id="wish2-{{$value->id}}">
                                                                
                                                              <input type="hidden" value=" <?php echo $value->getpro->first()->id;?>" name="productidwish"/>
                                                             </span>
                                                             
                                                                   <li > <button style="border:none;width:35px;"><i class="fa fa-heart-o"style="color:deeppink;" ></i></button> </li>
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
                        <!-- Li's Section Area End Here -->
                    </div>
                </div>
            </section>
            <!-- Li's TV & Audio Product Area End Here -->
            <!-- Begin Li's Static Home Area -->
            <div class="li-static-home">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Begin Li's Static Home Image Area -->
                            <div class="li-static-home-image"></div>
                            <!-- Li's Static Home Image Area End Here -->
                            <!-- Begin Li's Static Home Content Area -->
                            <div class="li-static-home-content">
                                <p>Giám Giá<span> 20% </span> Tuần Này</p>
                                <h2>Motorola Đổ Bộ Đến TvT Shop</h2>
                                </br>
                               <div class="default-btn">
                                    <a href="{{route('hienthi_danhmuc',['id'=>4])}}" class="links">Mua Ngay</a>
                                </div>
                            </div>
                            <!-- Li's Static Home Content Area End Here -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Li's Static Home Area End Here -->
            <!-- Begin Group Featured Product Area -->
            <div class="group-featured-product pt-60 pb-40 pb-xs-25">
                <div class="container">
                    <div class="row">
                        <!-- Begin Featured Product Area -->
                        <div class="li-section-title">
                                    <h2>
                                        <span>Sản Phẩm Được Đánh Giá Cao</span>
                                    </h2>
                                </div>
                                @foreach($toprate as $tr)
                               
                        <div class="col-lg-4">
                    
                            <div class="featured-product">
                             <div class="featured-product-active-2 owl-carousel">
                                    <div class="featured-product-bundle">
                                        <div class="row">
                                            <div class="group-featured-pro-wrapper">
                                                <div class="product-img">
                                                    <a href="{{route('chitiet_sanpham',['cateid'=>$tr->category_id,'id'=>$tr->id])}}">
                                                        <img alt="" src="{{url('website/product')}}/{{$tr->image}}">
                                                    </a>
                                                </div>
                                                <div class="featured-pro-content">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                        <div class="rating-box">
                                                        <ul class="rating">
                                                        @for($i=1;$i<=$tr->total_rated;$i++)
                                            <li><i class="fa fa-star-o"></i></li>
                                            @endfor
                                            @for($j=$tr->total_rated+1;$j<=5;$j++)
                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            @endfor
                                                        </ul>
                                                    </div>
                                                        </h5>
                                                    </div>
                                                   
                                                    <h4><a class="featured-product-name" href="{{route('chitiet_sanpham',['cateid'=>$tr->category_id,'id'=>$tr->id])}}">{{$tr->model_name}}</a></h4>
                                                    <div class="featured-price-box">
                                                    @php $exsale=$tr->getpro->first()->sale*$tr->getpro->first()->price/100; @endphp
                                                                @csrf
                                                               <span class="new-price new-price-2" id="">{{number_format($tr->getpro->first()->price-$exsale)}} <u>đ</u>
                                                           </span>
                                                               @if($tr->getpro->first()->sale)
                                                             <span id="">
                                                        <span class="old-price">{{number_format($tr->getpro->first()->price)}}<u> đ</u></span>
                                                        <span class="discount-percentage">-{{$tr->getpro->first()->sale}}%</span>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                      
                        <!-- Featured Product Area End Here -->
                       
                        @endforeach

                    </div>
                    
                </div>
            </div>
            <!-- Group Featured Product Area End Here -->
@stop()