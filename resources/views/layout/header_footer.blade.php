<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- index-431:41-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>TvT Shop - Website bán điện thoại chính hãng</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/menu/logo/logo.png')}}">
   
        <link rel="stylesheet" href="{{asset('css/material-design-iconic-font.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/profile.css')}}">
        
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    
        <link rel="stylesheet" href="{{asset('css/fontawesome-stars.css')}}">
    
        <link rel="stylesheet" href="{{asset('css/meanmenu.css')}}">
   
        <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    
        <link rel="stylesheet" href="{{asset('css/slick.css')}}">

        <link rel="stylesheet" href="{{asset('css/animate.css')}}">

        <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">

        <link rel="stylesheet" href="{{asset('css/venobox.css')}}">
      
        <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
     
        <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

        <link rel="stylesheet" href="{{asset('css/helper.css')}}">

        <link rel="stylesheet" href="{{asset('style.css')}}">

        <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
    </head>
    <body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Header Area -->
            <header class="li-header-4">
                <!-- Begin Header Top Area -->
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Top Left Area -->
                            <div class="col-lg-3 col-md-4">
                                <div class="header-top-left">
                                    <ul class="phone-wrap">
                                        <li><span>Gọi Tư Vấn: </span><a href="#"> +0703413165</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Left Area End Here -->
                            <!-- Begin Header Top Right Area -->
                            <div class="col-lg-9 col-md-8">
                                <div class="header-top-right">
                                    <ul class="ht-menu">
                                        <!-- Begin Setting Area -->
                                        <li> 
                                        @if(Auth::check()) 
                                        @if(Auth::user()->avatar) 
                                        <img src="{{url('users/')}}/{{Auth::user()->avatar}}" class="img-radius" alt="User-Profile-Image" style="width:26px;height:24px;margin-right:7px;">
                                        @endif
                                        <div class="ht-setting-trigger"><span>{{Auth::user()->full_name}}</span></div>
                                        <div class="setting ht-setting">
                                                <ul class="ht-setting-list" style="width:150px;">
                                                <li><a href="{{route('hienthi_profile')}}" style="color:black;">Tài Khoản Của Tôi</a></li>
                                                <li><a href="{{route('purchase_list')}}" style="color:black;">Thông Tin Mua Hàng</a></li>
                                                   <form action="{{route('xuly_dangxuat')}}" method="POST"> 
                                                        @csrf
                                                        <button type="submit" style="border:none;background-color:white; font-size:12px; color:black;" >Đăng Xuất </button>
                                                    </form>
                                                 </ul>
                                                
                                            </div>
                                        </li>
                                            @endif
                                        <li>
                                       
                                            <div class="ht-setting-trigger"><span>Cài Đặt</span></div>
                                            <div class="setting ht-setting">
                                                <ul class="ht-setting-list">
                                                @if(Auth::check()) 
                                                  <li><a style="width: 120px;" href="{{route('hienthi_dangky')}}" style="color:black;">Chuyển Tài Khoản</a></li>
                                                  @else
                                                  <li><a href="{{route('hienthi_dangky')}}" style="color:black;">Đăng Nhập</a></li>
                                                  @endif
                                                </ul>
            
                                            </div>
                                           
                                        </li>
                                  
                                        <!-- Setting Area End Here -->
                                        <!-- Begin Currency Area -->
                                    
                                        <!-- Currency Area End Here -->
                                        <!-- Begin Language Area -->
                                        <li>
                                            <span class="language-selector-wrapper">Ngôn Ngữ:</span>
                                            <div class="ht-language-trigger"><span>Tiếng Việt</span></div>
                                            <div class="language ht-language">
                                                <ul class="ht-setting-list">
                                                    <li class="active"><a href="#"><img src="{{asset('images/menu/flag-icon/1.jpg')}}" alt="">English</a></li>
                      
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- Language Area End Here -->
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Top Area End Here -->
                <!-- Begin Header Middle Area -->
                <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Logo Area -->
                            <div class="col-lg-3">
                                <div class="logo pb-sm-30 pb-xs-30">
                                    <a href="{{route('htsp_trangchu')}}">
                                        <img src=" {{asset('images/menu/logo/logo.png')}}" alt="" style="margin-top: -20px; margin-left:-30px;" >
                                        <h2 style="margin-left:150px;margin-top:-70px; color:#FFFFFF; font-weight:500"> Shop</h2>
                                        </a>
                                        
                                    </div>
                                
                            </div>
                            <!-- Header Logo Area End Here -->
                            <!-- Begin Header Middle Right Area -->
                            <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                                <!-- Begin Header Middle Searchbox Area -->
                                <form action="{{route('search_product')}}" class="hm-searchbox" method="GET">
                                @csrf
                                    <select class="nice-select select-search-category" name="searchdm">
                                  
                                        <option value="0">Tất Cả</option>  
                                        @foreach($category as $value)
                                        <option value="{{ $value->id}}"> {{ $value->category_name}}</option>  
                                        @endforeach                        
                                        
                                    </select>
                                    <input type="text" class="input-search-ajax" placeholder="Bạn tìm gì..." name="searchrs">

                                    <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                                    <div class="search-ajax-result" style="background-color:white;position:absolute; width:517px;margin-left:75px;margin-top:45px;z-index: 10;max-height:300px;overflow: scroll;display:none;" >

</div>
                                       


                                </form>
                                <!-- Header Middle Searchbox Area End Here -->
                             
                                <!-- Begin Header Middle Right Area -->
                                <div class="header-middle-right">
                                    <ul class="hm-menu">
                                        <!-- Begin Header Middle Wishlist Area -->
                                        <li class="hm-wishlist"  >
                                            <a href="{{route('hienthi_wishlist')}}" >
                                            @if(Auth::check())
                                            
                                            @php 
                                        $wishcount=(App\Models\WishList::join('product_model','wishlist.pro_model_id','=','product_model.id')->join('product','wishlist.product_id','=','product.id')->where('user_id',Auth::user()->id)->where('product_model.status',1)->where('product.status',1)->count());
                                        @endphp
                                                <span class="cart-item-count wishlist-item-count" style="color:white;background-color:deeppink;"> {{$wishcount}} </span>
                                                @endif
                                                <i class="fa fa-heart-o" ></i>
                                            </a>
                                        </li>
                                        <!-- Header Middle Wishlist Area End Here -->
                                        <!-- Begin Header Mini Cart Area -->
                                        
                                        <li class="hm-minicart">
                                        <div class="hm-minicart-trigger">
                                                <span class="item-icon"></span>
                                                @if(Auth::check()==null)
                                               
                                                <span class="item-text">0<u> đ</u>
                                                
                                                </span>
                                                @else
                                                @php 
                                        $cartcount=(App\Models\Cart::join('product_model','cart.pro_model_id','=','product_model.id')->join('product','cart.product_id','=','product.id')->where('user_id',Auth::user()->id)->where('product_model.status',1)->where('product.status',1)->sum('pro_quantity'));
                                        @endphp
                                                <span class="item-text">{{number_format(Session::get('totalafter'))}}<u> đ</u>
                                                       <span class="cart-item-count"> {{$cartcount}}</span>
                                                </span>
                                            </div>
                                           
                                          <div class="minicart">
                                      
                                                <ul class="minicart-product-list">
                                                    
                                                @foreach($quickcart as $qc)
                                                <li>
                                                        <a href="{{route('chitiet_sanpham',['cateid'=>$qc->category_id,'id'=>$qc->id])}}" class="minicart-product-image">
                                                            <img src="{{url('website/product')}}/{{$qc->image}}" alt="cart products">
                                                        </a>
                                                        <div class="minicart-product-details">
                                                            <h6><a href="single-product.html">{{$qc->model_name}} {{$qc->capacity}}GB</a></h6>
                                                            @php $exsale=$qc->sale*$qc->price/100;
                                                $trueprice=$qc->price-$exsale;
                                                 @endphp
                                                            @if($qc->stock>0)
                                                            <span>{{number_format($trueprice)}} <u> đ</u> x {{$qc->pro_quantity}}</span>
                                                            @else
                                                            <span style="color:red;">Hết Hàng x {{$qc->pro_quantity}}</span>
                                                            @endif
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                              
                                                
                                                <div class="minicart-button">
                                                    <a href="{{route('hienthi_cart')}}" class="li-button li-button-dark li-button-fullwidth li-button-sm">
                                                        <span>Xem Giỏ Hàng</span>
                                                    </a>
                                                    @php 
                                        $cartcountqc=(App\Models\Cart::join('product_model','cart.pro_model_id','=','product_model.id')->join('product','cart.product_id','=','product.id')->where('user_id',Auth::user()->id)->where('product_model.status',1)->where('product.status',1)->where('product.stock','>',0)->sum('pro_quantity'));
                                        @endphp
                                        @if($cartcountqc)
                                                    <a href="{{route('checkout_qc')}}" class="li-button li-button-dark li-button-fullwidth li-button-sm">
                                                        <span>Thanh Toán</span>
                                                    </a>
                                                    @endif
                                                </div>
                                            </div>
                                          
                                        </li>
                                        @endif
                                        <!-- Header Mini Cart Area End Here -->
                                    </ul>
                                </div>
                                <!-- Header Middle Right Area End Here -->
                            </div>
                            <!-- Header Middle Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Middle Area End Here -->
                <!-- Begin Header Bottom Area -->
                <div class="header-bottom header-sticky stick d-none d-lg-block d-xl-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                               <!-- Begin Header Bottom Menu Area -->
                               <div class="hb-menu">
                                   <nav style="margin-left:145px;">
                                       <ul>
                                           <li class=""><a href="{{route('htsp_trangchu')}}">Trang Chủ</a>
                                               
                                           </li>
                                           <li class=""><a href="{{route('all_product')}}">Tất Cả Sản Phẩm</a>
                                               
                                           </li>
                                           
                                           <li class=""><a href="#">Các Dòng Sản Phẩm</a>
                                               <ul class="hb-dropdown">
                                                     @foreach($category as $value)
                                                   <li class="sub-dropdown-holder"><a href="{{route('hienthi_danhmuc',['id'=>$value->id])}}"> {{$value->category_name}}</a>
                                                       
                                                   </li>
                                                   @endforeach
                                                  
                                                 
                                               </ul>
                                           </li>
                                           <li class="" style="margin-right:9px;"><a href="{{route('hienthi_baiviet')}}">Công Nghệ 24h</a>
                                               
                                           </li>
                                           <li><a href="{{route('about_us')}}">Về Chúng Tôi</a></li>
                                           <li><a href="{{route('con_tact')}}">Thông Tin Liên Hệ</a></li>
                                          
                                       </ul>
                                   </nav>
                               </div>
                               <!-- Header Bottom Menu Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header Bottom Area End Here -->
                <!-- Begin Mobile Menu Area -->
                <div class="mobile-menu-area mobile-menu-area-4 d-lg-none d-xl-none col-12">
                    <div class="container"> 
                        <div class="row">
                            <div class="mobile-menu">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu Area End Here -->
            </header>
            <!-- Header Area End Here -->
             @yield('main')

         
            <!-- Begin Footer Area -->
            <div class="footer">
                <!-- Begin Footer Static Top Area -->
                <div class="footer-static-top">
                    <div class="container">
                        <!-- Begin Footer Shipping Area -->
                        <div class="footer-shipping pt-60 pb-25">
                            <div class="row">
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{asset('images/shipping-icon/1.png')}}" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Miễn Phí Vận Chuyển</h2>
                                            <p>Đổi Trả Miễn Phí</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{asset('images/shipping-icon/2.png')}}" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Thanh Toán An Toàn</h2>
                                            <p>Thanh Toán Với Các Hình Thức An Toàn Nhất.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{asset('images/shipping-icon/3.png')}}" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Cam Kết Chính Hãng</h2>
                                            <p>Sản Phẩm được cam kết chính hãng từ các nhà sản xuất </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{asset('images/shipping-icon/4.png')}}" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Tư Vấn Tận Tình</h2>
                                            <p>Tận tình tư vấn các mẫu sản phẩm và giải đáp các thắc mắc</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                            </div>
                        </div>
                        <!-- Footer Shipping Area End Here -->
                    </div>
                </div>
                <!-- Footer Static Top Area End Here -->
                <!-- Begin Footer Static Middle Area -->
                <div class="footer-static-middle" style="background-color:white;">
                    <div class="container" >
                        <div class="footer-logo-wrap pt-50 pb-35">
                            <div class="row">
                                <!-- Begin Footer Logo Area -->
                                <div class="col-lg-4 col-md-6">
                                    <div class="footer-logo">
                                        <img src="{{asset('images/menu/logo/logo.png')}}" alt="Footer Logo">
                                        <p class="info">
                                            TvT Shop là đồ án website bán điện thoại trực tuyến, được Trần Thanh Toàn và Phạm Khắc Trung triển khai, sử dụng ngôn ngữ là PHP, Laravel framework.
                                        </p>
                                    </div>
                                    <ul class="des">
                                        <li>
                                            <span>Địa Chỉ: </span>
                                            83A, Trần Hưng Đạo, Thành Phố Hồ Chí Minh
                                        </li>
                                        <li>
                                            <span>Số Điện Thoại: </span>
                                            <a href="#">0703413165</a>
                                        </li>
                                        <li>
                                            <span>Email: </span>
                                            <a href="zipdaryl@gmail.com">zipdaryl@gmail.com</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Footer Logo Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-2 col-md-3 col-sm-6" style="flex: 6 7 16.666667%;
 max-width: 23.666667%;">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Các Dòng Sán Phẩm</h3>
                                        <ul>
                                            @foreach($category as $value)
                                            <li><a href="#">{{$value->category_name}}</a></li>
                                            @endforeach
                                            
                                        </ul>
                                    </div>
                                </div>
                                <!-- Footer Block Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-2 col-md-3 col-sm-6" style="flex: 6 7 16.666667%;
max-width: 26.666667%;">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Về Website Của Chúng Tôi</h3>
                                        <ul>
                                            <li><a href="#">Chính Sách Vận Chuyển</a></li>
                                            <li><a href="#">Chính Sách Đổi Trả</a></li>
                                            <li><a href="#">Về Chúng Tôi</a></li>
                                            <li><a href="#">Liên Lạc Với Chúng Tôi</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-6">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Về Website Của Chúng Tôi</h3>
                                        <ul>
                                            <li><a href="#">Chính Sách Vận Chuyển</a></li>
                                            <li><a href="#">Chính Sách Đổi Trả</a></li>
                                            <li><a href="#">Về Chúng Tôi</a></li>
                                            <li><a href="#">Liên Lạc Với Chúng Tôi</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Footer Block Area End Here -->
                                <!-- Begin Footer Block Area -->
                               
                                    <!-- Begin Footer Newsletter Area -->
                                    
                                    <!-- Footer Newsletter Area End Here -->
                                </div>
                                <!-- Footer Block Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Static Middle Area End Here -->
                <!-- Begin Footer Static Bottom Area -->
                <div class="footer-static-bottom pt-55 pb-55" style="background-color:#1256A1; ">
                    <div class="container" >
                        <div class="row" >
                            <div class="col-lg-12" >
                                <!-- Begin Footer Links Area -->
                               
                                <!-- Footer Payment Area End Here -->
                                <!-- Begin Copyright Area -->
                                <div class="copyright text-center pt-25" style="height:5px;">
                                    <span><a target="_blank" href="" style="color:white; font-weight:bold;" >TvT Shop</a></span>
                                </div>
                                <!-- Copyright Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Static Bottom Area End Here -->
            </div>
            <!-- Footer Area End Here -->
        
        </div>
        <!-- Body Wrapper End Here -->
        <!-- jQuery-V1.12.4 -->
        <script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{asset('js/vendor/popper.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/ajax-mail.js')}}"></script>
        <script src="{{asset('js/jquery.meanmenu.min.js')}}"></script>
        <script src="{{asset('js/wow.min.js')}}"></script>
        <script src="{{asset('js/slick.min.js')}}"></script>
        <script src="{{asset('js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('js/jquery.mixitup.min.js')}}"></script>
        <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
        <script src="{{asset('js/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('js/waypoints.min.js')}}"></script>
        <script src="{{asset('js/jquery.barrating.min.js')}}"></script>
        <script src="{{asset('js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('js/venobox.min.js')}}"></script>
        <script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
        <script src="{{asset('js/scrollUp.min.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>
      <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/62d8429654f06e12d88a7e69/1g8ec871m';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

       <script>
$('.input-search-result').hide();
$('.input-search-ajax').keyup(function(){
var _text=$(this).val();    
var _imgurl="{{url('website/product')}}"
if(_text !=''){
    $.ajax({
url:"{{route('ajax_search')}}?key="+_text,
type: 'GET',
success:function(res){
   
    $('.search-ajax-result').show();
   $('.search-ajax-result').html(res)
}

});
    

}else{
    $('.search-ajax-result').html('');
    $('.search-ajax-result').hide();
}


});


        </script> 
    </body>


</html>
