@extends('layout/header_footer')
@section('main')
 <!-- about wrapper start -->
 <div class="about-us-wrapper pt-60 pb-40">
                <div class="container">
                    <div class="row">
                        <!-- About Text Start -->
                        <div class="col-lg-6 order-last order-lg-first">
                            <div class="about-text-wrap">
                                <h2><span>TVT Shop</span>Đồ Án Tốt Nghiệp</h2>
                                <p>TvT Shop là đồ án website bán điện thoại trực tuyến, được Trần Thanh Toàn và Phạm Khắc Trung triển khai, sử dụng ngôn ngữ là PHP, Laravel framework, về đề tài bán điện thoại di động.</p>
                                
                            </div>
                        </div>
                        <!-- About Text End -->
                        <!-- About Image Start -->
                        <div class="col-lg-5 col-md-10">
                            <div class="about-image-wrap">
                                <img class="img-full" src="{{asset('images/slider/galaxy-s20-ultra-lo-phien-ban-mau-trang-truoc-khi-ca-ngay-ra-mat-tai-trung-quoc-xtmobile-banner.jpg')}}" alt="About Us" />
                            </div>
                        </div>
                        <!-- About Image End -->
                    </div>
                </div>
            </div>
            <!-- about wrapper end -->

@stop()