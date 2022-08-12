@extends('layout/header_footer')
@section('main')
<!-- Begin Li's Main Blog Page Area -->
<div class="li-main-blog-page li-main-blog-details-page pt-60 pb-60 pb-sm-45 pb-xs-45">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Blog Sidebar Area -->
                        <div class="col-lg-3 order-lg-1 order-2">
                            <div class="li-blog-sidebar-wrapper">
                                <div class="li-blog-sidebar">
                                   
                                </div>
                                <div class="li-blog-sidebar pt-25">
                                    <h4 class="li-blog-sidebar-title">Danh Mục Sản Phẩm</h4>
                                    <ul class="li-blog-archive">
                                        @foreach($category as $cg)
                                        <li ><a href="{{route('hienthi_danhmuc',['id'=>$cg->id])}}" >{{$cg->category_name}}</a></li>
                                        @endforeach
                                   </ul>
                                
                                </div>
                             
                                <div class="li-blog-sidebar">
                               
                                    <h4 class="li-blog-sidebar-title" >Các bài viết mới nhất</h4>
                                    @foreach($cacbaiviet as $cb)
                                   <div class="li-recent-post pb-30">
                                    
                                        <div class="li-recent-post-thumb">
                                            <a href="{{route('blog_details',['id'=>$cb->id])}}">
                                                <img class="" style="width:60px;height:50px;"src="{{url('website/news')}}/{{$cb->image}}" alt="Li's Product Image" >
                                            </a>
                                        </div>
                                        <div class="li-recent-post-des">
                                            <span><a href="{{route('blog_details',['id'=>$cb->id])}}" style="color:#393434;">{{$cb->title}}</a></span>
                                            <span class="li-post-date">{{$cb->created_at}}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                    
                               
                            </div>
                        </div>
                        <!-- Li's Blog Sidebar Area End Here -->
                        <!-- Begin Li's Main Content Area -->
                        <div class="col-lg-9 order-lg-2 order-1">
                            <div class="row li-main-content">
                                <div class="col-lg-12">
                                    <div class="li-blog-single-item pb-30">
                                        <div class="li-blog-banner">
                                            <a href="blog-details.html"><img class="img-full" src="images/blog-banner/bg-banner.jpg" alt=""></a>
                                        </div>
                                        <div class="li-blog-content">
                                            <div class="li-blog-details">
                                                <h3 class="li-blog-heading pt-25"><a href="#" style="color:#393434;">{{$tinchitiet->title}}</a></h3>
                                                <!-- Begin Blog Blockquote Area -->
                                          
                                            <img class="img-full" src="{{url('website/news')}}/{{$tinchitiet->image}}" alt="">
                                      
                                                <div class="li-blog-blockquote">
                                                    <blockquote>
                                                        <p style="font-size:16px;color:#393434;">{{$tinchitiet->content}}</p>
                                                    </blockquote>
                                                </div>
                                                <!-- Blog Blockquote Area End Here -->
                                               
                                                <div class="li-blog-sharing text-center pt-30">
                                                    <h4>Chia sẽ bài viết này</h4>
                                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 
                                </div>
                            </div>
                        </div>
                        <!-- Li's Main Content Area End Here -->
                        </div>
                </div>
            </div>
            <!-- Li's Main Blog Page Area End Here -->
@stop()