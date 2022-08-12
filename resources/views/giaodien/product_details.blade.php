@extends('layout/header_footer')
@section('main')
<script>
  $(document).ready(function(){
$('.update-bienthe').click(function(){
    console.log(this);
 var bienthes=$(this).data("type");
 var produm=$('#produm').val(); 
var produmsamecate = $('#produm-' + $(this).data('id') ).change().val();
 const price=$(this).data('id');
 $.ajax({
    
type:'get',
dataType:'html',
url:'<?php echo url('/selectbienthe');?>',
data: "bienthes="+ bienthes +"&produm="+produm,
success:function (response){
    console.log(response);
    $('#price').html(response); 
  
}
}); 
$.ajax({
    
    type:'get',
    dataType:'html',
    url:'<?php echo url('/selectwish');?>',
    data: "bienthes="+ bienthes +"&produm="+produm,
    success:function (response){
        console.log(response);
        $('#wish').html(response); 
      
    }
    }); 
    $.ajax({
    
    type:'get',
    dataType:'html',
    url:'<?php echo url('/changeinfo');?>',
    data: "bienthes="+ bienthes +"&produm="+produm,
    success:function (response){
        console.log(response);
        $('.capachange').html(response); 
      
    }
    }); 
    $.ajax({
    
    type:'get',
    dataType:'html',
    url:'<?php echo url('/selectcompare');?>',
    data: "bienthes="+ bienthes +"&produm="+produm,
    success:function (response){
        console.log(response);
        $('#compares').html(response); 
      
    }
    }); 
    $.ajax({
    
    type:'get',
    dataType:'html',
    url:'<?php echo url('/selectsale');?>',
    data: "bienthes="+ bienthes +"&produm="+produm,
    success:function (response){
        console.log(response);
        $('#salefix').html(response); 
      
    }
    }); 
//bien the cung san pham
$.ajax({
    
    type:'get',
    dataType:'html',
    url:'<?php echo url('/selectbienthe');?>',
    data: "bienthes="+ bienthes +"&produm="+produmsamecate,
    success:function (response){
        console.log(response);
        $('#price1-'+price).html(response);
    }
    }); 
    $.ajax({
        
        type:'get',
        dataType:'html',
        url:'<?php echo url('/selectwish');?>',
        data: "bienthes="+ bienthes +"&produm="+produmsamecate,
        success:function (response){
            console.log(response);
            $('#wish1-'+price).html(response); 
        }
        }); 
    $.ajax({
        
        type:'get',
        dataType:'html',
        url:'<?php echo url('/selectsalecate');?>',
        data: "bienthes="+ bienthes +"&produm="+produmsamecate,
        success:function (response){
            console.log(response);
            $('#salefix1-'+price).html(response); 
        }
        }); 
        $.ajax({
        
        type:'get',
        dataType:'html',
        url:'<?php echo url('/selectcompare');?>',
        data: "bienthes="+ bienthes +"&produm="+produmsamecate,
        success:function (response){
            console.log(response);
            $('#compares1-'+price).html(response);
        }
        }); 
        


});

  });
    </script>
     @if(Session::has('wishlisttontai'))
 <script>
    swal("Sản phẩm đã tồn tại trong wishlist","","info");
    </script>
    @endif	
    @if(Session::has('binhluantontai'))
 <script>
    swal("Đánh giá sản phẩm không thành công","chỉ có thể đánh gía môt lần mỗi lần mua sản phẩm","info");
    </script>
    @endif	
    @if(Session::has('binhluanthanhcong'))
 <script>
    swal("Đánh giá sản phẩm thành công","cảm ơn bạn vì đánh giá","success");
    </script>
    @endif	
    @if(Session::has('chuamua'))
 <script>
    swal(" Đánh giá sản phẩm không thành công","Không thể đánh giá khi chưa mua sản phẩm","info");
    </script>
    @endif	

            <!-- content-wraper start -->
           <div class="content-wraper">
                <div class="container">
                    <div class="row single-product-area">
                   
                        <div class="col-lg-5 col-md-6">
                           <!-- Product Details Left -->
                           @php
                                    $dahethang=0;
                                    @endphp
                                    @foreach($hethang as $hh)
                                    @if($hh->mid==$ctmodel->id)
                                    @php 
                                    $dahethang+=$hh->stock;
                                    @endphp
                                    @endif
                                    @endforeach
                                    @if($dahethang>0)
                            <div class="product-details-left">
                            
                                <div class="product-details-images slider-navigation-1">
                                @foreach($modelimage as $modelimg)
                            <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="{{url('website/product')}}/{{$modelimg->file_name}}"data-gall="myGallery">
                                            <img src="{{url('website/product')}}/{{$modelimg->file_name}}" alt="product image">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                              
                                <div class="product-details-thumbs slider-thumbs-1">  
                                @foreach($modelimage as $modelimg)                                      
                                    <div class="sm-image"><img src="{{url('website/product')}}/{{$modelimg->file_name}}" alt="product image thumb"></div>
                                    @endforeach
                                </div>
                               
                            </div>

                           
                            <!--// Product Details Left -->
                        </div>

                        <div class="col-lg-7 col-md-6">
                            <div class="product-details-view-content pt-60">
                                <div class="product-info" style="margin-top:-25px;">
                                  
                                    <h2 style="font-size:25px;">{{$ctmodel->model_name}} <span class="capachange" > {{$ctmodel->getpro->first()->capacity}} GB</span></h2>  
                                
                                   <div class="rating-box pt-20">
                                    @php $ratenum=number_format($commentvalue)
                                    
                                    @endphp
                                   
                                    
                                        <ul class="rating rating-with-review-item">
                                            @for($i=1;$i<=$ratenum;$i++)
                                            <li><i class="fa fa-star-o"></i></li>
                                            @endfor
                                            @for($j=$ratenum+1;$j<=5;$j++)
                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            @endfor
                                          <li class="review-item"><a href="#" style="font-size:15px;">{{$commentcount->count()}} Đánh Giá</a></li>
                                         <form action="{{route('com_pare',['id'=>$ctmodel->id])}}" class="compare_add" method="POST" >
                                            @csrf
                                            <span id="compares">
                                            <input type="hidden" value=" <?php echo $ctmodel->getpro->first()->id;?>" name="productid"/>
                                            
                                            </span>
                                            <button class="compare-btn" type="submit" style="border:none; background-color:white; color:#05A7FF; font-size:17px; margin-top:10px;" ><img src=" {{asset('images/menu/logo/compare.png')}}" style="width:27px;"alt="" > So Sánh</button>

                                           </form>
                                        
                                        </ul>
                                    </div>

                                
                                      
                                    <form action="{{route('add_cart',['id'=>$ctmodel->id])}}" class="cart-quantity" method="POST" >
                                        @csrf

                                     
                                      

                                    <div class="price-box pt-20" style="margin-top:-20px;">
                                    @php $exsale=$ctmodel->getpro->first()->sale*$ctmodel->getpro->first()->price/100; @endphp
                                        <span class="new-price new-price-2" id="price">{{number_format($ctmodel->getpro->first()->price-$exsale)}} <u>đ </u>
                                        <input type="hidden" value="<?php echo $ctmodel->getpro->first()->price-$exsale;?>" name="newprice"/>
                                 <input type="hidden" value=" <?php echo $ctmodel->getpro->first()->id;?>" name="productid"/>
                                        
                                    </span>
                                    @if($ctmodel->getpro->first()->sale)
                                    <span id="salefix">
                                   <span class="old-price" style="text-decoration:line-through; margin-left:10px;font-size:22px;">{{number_format($ctmodel->getpro->first()->price)}}<u>đ </u></span>
                                <span class="discount-percentage" style="margin-left:10px;font-size:22px;color:#E80F0F;">-{{$ctmodel->getpro->first()->sale}}%</span>
                                    </span>
                                    @endif
                                    </div>
                                   

                                    <div class="product-variants">
                                        <div class="produt-variants-size">
                                            <label>Chọn Mẫu Khác Của {{$ctmodel->model_name}} </label>
                                            <ul>
                                            @foreach ($bienthe as $bt)
                                            <div class="update-bienthe" type="submit" data-type="{{$bt->capacity}}" tabindex="1"  >{{$bt->capacity}}GB</div>
                                            @endforeach
                                         </ul>
                                        
                                           <div class="single-add-to-cart">
                                        
                                            <div class="quantity">
                                                <label>Số Lượng</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box " value="1" type="text" name="quaninput">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </div>
                                           <button class="add-to-cart" type="submit">Thêm Vào Giỏ Hàng</button>
                                           <input type="hidden" value="<?php echo $ctmodel->id?>" id="produm" />
                                        </div>
                                        </div>
                                        </form>
                                       
                                        </div>
                                        </div>
                                        </div>
                                     
                                    <div class="product-additional-info pt-25">
                                    <form action="{{route('wish_list',['id'=>$ctmodel->id])}}" class="wishlist_add" method="POST" >
                                    @csrf
                                    <span id="wish">
                                    <input type="hidden" value=" <?php echo $ctmodel->getpro->first()->id;?>" name="productidwish"/>
</span>
                                    <button class="wishlist-btn" type="submit" style="border:none; background-color:white; color:deeppink; font-size:15px;" > <i class="fa fa-heart-o"></i>Thêm Vào WishList</button>
                                    </form>
                                       
                                    </div>
                           
                                    <div class="block-reassurance">
                                        <ul>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        
            <!-- content-wraper end -->
            <!-- Begin Product Area -->
            <div class="product-area pt-35">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#description"><span>Thông Tin</span></a></li>
                                   <li><a data-toggle="tab" href="#product-details"><span>Thông Số  </span></a></li>
                                   <li><a data-toggle="tab" href="#reviews">Đánh Giá {{$ctmodel->model_name}}<span class="capachange">{{$ctmodel->getpro->first()->capacity}}GB</span></a></li>
                                </ul>               
                            </div>
                            <!-- Begin Li's Tab Menu Content Area -->
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="description" class="tab-pane active show" role="tabpanel">
                            <div class="product-description">
                            <div class="show-description">
                                <span class="show-info">{{$ctmodel->description}}</span>
                                 </div>
                                 <p class="morebutp"> </p>
                            </div>
                            
                        </div>
                        <script>
                            let more=document.querySelectorAll(".morebutp");
                            for(let i=0;i<more.length;i++){
                                more[i].addEventListener('click',function(){
                                    more[i].parentNode.classList.toggle('active')
                                });
                            }
                            </script>
                        <div id="product-details" class="tab-pane" role="tabpanel">
                            <div class="product-details-manufacturer">
                                <a href="#">
                                    <!--<img src="..." alt="Product Manufacturer Image"> -->
                                </a>
                                <p class="show-thongso"><span class="show-thongso-tittle">Màn hình: </span>{{$ctmodel->screen}}</p>
                                <p class="show-thongso"><span class="show-thongso-tittle">Hệ điều hành: </span> {{$ctmodel->opera_sys}}</p>
                                <p class="show-thongso"><span class="show-thongso-tittle">Camera sau: </span> {{$ctmodel->back_camera}} MP</p>
                                <p class="show-thongso"><span class="show-thongso-tittle">Camera trước: </span> {{$ctmodel->front_camera}} MP</p>
                                <p class="show-thongso"><span class="show-thongso-tittle" >Dung Lượng Bộ Nhớ Trong: </span> <span class="capachange" style="font-weight:normal; color:gray;"> {{$ctmodel->getpro->first()->capacity}} GB</span></p>
                                <p class="show-thongso"><span class="show-thongso-tittle">CPU: </span> {{$ctmodel->cpu}}</p>
                                <p class="show-thongso"><span class="show-thongso-tittle">GPU: </span> {{$ctmodel->gpu}}</p>
                                <p class="show-thongso"><span class="show-thongso-tittle">RAM: </span> {{$ctmodel->ram}} GB</p>
                                <p class="show-thongso"><span class="show-thongso-tittle">SIM: </span> {{$ctmodel->sim}}</p>
                                <p class="show-thongso"><span class="show-thongso-tittle">Pin: </span> {{$ctmodel->pin}}</p>
                            </div>
                        </div>
                        <div id="reviews" class="tab-pane" role="tabpanel">
                          
                            <div class="product-reviews">
                                <div class="product-details-comment-block">
                                @foreach($commentshow as $cs)
                                    <div class="comment-review">
                                       <span>{{$cs->comment_name}} </span>
                                       <ul class="rating">
                                       @for ($i = 0; $i < 5; $i++)
          @if ($i < $cs->stars)
          <li><i class="fa fa-star-o"></i></li>
          @else
          <li class="no-star"><i class="fa fa-star-o"></i></li>
          @endif
        @endfor
        </ul>
                                    </div>
                                   <div class="comment-details">
                                   <p>{{$cs->content}}</p>
                                        <p>{{date_format($cs->created_at,"d/m/y H:i:s")}}</p>
                                    </div>
                                    @endforeach
                                    <div class="review-btn">
                                        <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Viết Bình Luận</a>
                                    </div>
                                     <!-- Begin Quick View | Modal Area -->
                                    <div class="modal fade modal-wrapper" id="mymodal" >
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                         
                                                    <div class="modal-inner-area row">
                                                        <div class="col-lg-6">
                                                           <div class="li-review-product">
                                                               <img src="{{url('website/product')}}/{{$ctmodel->image}}" alt="Li's Product" width="300px;">
                                                               <div class="li-review-product-desc">
                                                                   <p class="li-product-name"style="font-size:20px;">{{$ctmodel->model_name}}</p>
                                                                   
                                                               </div>
                                                           </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="li-review-content">
                                                                <!-- Begin Feedback Area -->
                                                                <div class="feedback-area">
                                                                    <div class="feedback">
                                                                        <h3 class="feedback-title">Đánh Giá Của Bạn</h3>
                                                                        <form action="{{route('binh_luan',['id'=>$ctmodel->id])}}" method="POST">
                                                                        @csrf
                                                                            <p class="your-opinion">
                                                                              
                                                                                <span>
                                                                                    <select class="star-rating" name="stars">
                                                                                      <option value="1">1</option>
                                                                                      <option value="2">2</option>
                                                                                      <option value="3">3</option>
                                                                                      <option value="4">4</option>
                                                                                      <option value="5">5</option>
                                                                                    </select>
                                                                                </span>
                                                                            </p>
                                                                            <p class="feedback-form">
                                                                                <label for="feedback">Nội Dung</label>
                                                                                <textarea id="feedback" name="content" cols="45" rows="8" aria-required="true"></textarea>
                                                                            </p>
                                                                            <div class="feedback-input">
                                                                               <div class="feedback-btn pb-15">
                                                                               <button type="submit"  value="Submit" style="border: none;height: 30px;color: white;background-color: #242424;font-weight: 500;">Gửi Bình Luận</button>
                                                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">Đóng</a>
                                                                             
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- Feedback Area End Here -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    <!-- Quick View | Modal Area End Here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- NEU SAN PHAM HET HANG-->
            @else
            <div class="product-details-left">
                            
                            <div class="product-details-images slider-navigation-1">
                            @foreach($modelimage as $modelimg)
                        <div class="lg-image">
                                    <a class="popup-img venobox vbox-item" href="{{url('website/product')}}/{{$modelimg->file_name}}"data-gall="myGallery">
                                        <img src="{{url('website/product')}}/{{$modelimg->file_name}}" alt="product image">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                          
                            <div class="product-details-thumbs slider-thumbs-1">  
                            @foreach($modelimage as $modelimg)                                      
                                <div class="sm-image"><img src="{{url('website/product')}}/{{$modelimg->file_name}}" alt="product image thumb"></div>
                                @endforeach
                            </div>
                           
                        </div>

                       
                        <!--// Product Details Left -->
                    </div>

                    <div class="col-lg-7 col-md-6">
                        <div class="product-details-view-content pt-60">
                            <div class="product-info" style="margin-top:-25px;">
                              
                                <h2 style="font-size:25px;">{{$ctmodel->model_name}} <span class="capachange" > </span></h2>  
                            
                               <div class="rating-box pt-20">
                                @php $ratenum=number_format($commentvalue)
                                
                                @endphp
                               
                                
                                    <ul class="rating rating-with-review-item">
                                        @for($i=1;$i<=$ratenum;$i++)
                                        <li><i class="fa fa-star-o"></i></li>
                                        @endfor
                                        @for($j=$ratenum+1;$j<=5;$j++)
                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                        @endfor
                                      <li class="review-item"><a href="#" style="font-size:15px;">{{$commentcount->count()}} Đánh Giá</a></li>
                                    
                                    
                                    </ul>
                                </div>

                             <div class="price-box pt-20" style="margin-top:-20px;">
                                    <span class="new-price new-price-2" id="price">Hết hàng
                              </span>
                                </div>
                               
                                <div class="price-box pt-20" style="margin-top:-20px;">
                               
                            <span style="font-size:16px;" id="price">
                              Sản phẩm sẽ được mở bán lại trong thời gian sớm nhất.
                         </span>
                         
                           </div>
                               </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    
        <!-- content-wraper end -->
        <!-- Begin Product Area -->
        <div class="product-area pt-35">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="li-product-tab">
                            <ul class="nav li-product-menu">
                               <li><a class="active" data-toggle="tab" href="#description"><span>Thông Tin</span></a></li>
                               <li><a data-toggle="tab" href="#product-details"><span>Thông Số  </span></a></li>
                               <li><a data-toggle="tab" href="#reviews">Đánh Giá {{$ctmodel->model_name}}</a></li>
                            </ul>               
                        </div>
                        <!-- Begin Li's Tab Menu Content Area -->
                    </div>
                </div>
                <div class="tab-content">
                    <div id="description" class="tab-pane active show" role="tabpanel">
                        <div class="product-description">
                            <span class="show-info">{{$ctmodel->description}}</span>
                         
                        </div>
                        <p class="morebutp"><a class="morebut" href="">Đọc Thêm </a> </p>
                    </div>
                    
                    <div id="product-details" class="tab-pane" role="tabpanel">
                        <div class="product-details-manufacturer">
                            <a href="#">
                                <!--<img src="..." alt="Product Manufacturer Image"> -->
                            </a>
                            <p class="show-thongso"><span class="show-thongso-tittle">Màn hình: </span>{{$ctmodel->screen}}</p>
                            <p class="show-thongso"><span class="show-thongso-tittle">Hệ điều hành: </span> {{$ctmodel->opera_sys}}</p>
                            <p class="show-thongso"><span class="show-thongso-tittle">Camera sau: </span> {{$ctmodel->back_camera}} MP</p>
                            <p class="show-thongso"><span class="show-thongso-tittle">Camera trước: </span> {{$ctmodel->front_camera}} MP</p>
                            <p class="show-thongso"><span class="show-thongso-tittle" >Dung Lượng Bộ Nhớ Trong: </span> <span class="capachange" style="font-weight:normal; color:red;">Hết Hàng</span></p>
                            <p class="show-thongso"><span class="show-thongso-tittle">CPU: </span> {{$ctmodel->cpu}}</p>
                            <p class="show-thongso"><span class="show-thongso-tittle">GPU: </span> {{$ctmodel->gpu}}</p>
                            <p class="show-thongso"><span class="show-thongso-tittle">RAM: </span> {{$ctmodel->ram}} GB</p>
                            <p class="show-thongso"><span class="show-thongso-tittle">SIM: </span> {{$ctmodel->sim}}</p>
                            <p class="show-thongso"><span class="show-thongso-tittle">Pin: </span> {{$ctmodel->pin}}</p>
                        </div>
                    </div>
                    <div id="reviews" class="tab-pane" role="tabpanel">
                      
                        <div class="product-reviews">
                            <div class="product-details-comment-block">
                            @foreach($commentshow as $cs)
                                <div class="comment-review">
                                   <span>{{$cs->comment_name}} </span>
                                   <ul class="rating">
                                   @for ($i = 0; $i < 5; $i++)
      @if ($i < $cs->stars)
      <li><i class="fa fa-star-o"></i></li>
      @else
      <li class="no-star"><i class="fa fa-star-o"></i></li>
      @endif
    @endfor
    </ul>
                                </div>
                               <div class="comment-details">
                               <p>{{$cs->content}}</p>
                                    <p>{{date_format($cs->created_at,"d/m/y H:i:s")}}</p>
                                </div>
                                @endforeach
                                
                                <div class="review-btn">
                                    <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Viết Bình Luận</a>
                                </div>
                                <!-- Begin Quick View | Modal Area -->
                                <div class="modal fade modal-wrapper" id="mymodal" >
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                     
                                                <div class="modal-inner-area row">
                                                    <div class="col-lg-6">
                                                       <div class="li-review-product">
                                                           <img src="{{url('website/product')}}/{{$ctmodel->image}}" alt="Li's Product" width="300px;">
                                                           <div class="li-review-product-desc">
                                                               <p class="li-product-name"style="font-size:20px;">{{$ctmodel->model_name}}</p>
                                                               
                                                           </div>
                                                       </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="li-review-content">
                                                            <!-- Begin Feedback Area -->
                                                            <div class="feedback-area">
                                                                <div class="feedback">
                                                                    <h3 class="feedback-title">Đánh Giá Của Bạn</h3>
                                                                    <form action="{{route('binh_luan',['id'=>$ctmodel->id])}}" method="POST">
                                                                    @csrf
                                                                        <p class="your-opinion">
                                                                          
                                                                            <span>
                                                                                <select class="star-rating" name="stars">
                                                                                  <option value="1">1</option>
                                                                                  <option value="2">2</option>
                                                                                  <option value="3">3</option>
                                                                                  <option value="4">4</option>
                                                                                  <option value="5">5</option>
                                                                                </select>
                                                                            </span>
                                                                        </p>
                                                                        <p class="feedback-form">
                                                                            <label for="feedback">Nội Dung</label>
                                                                            <textarea id="feedback" name="content" cols="45" rows="8" aria-required="true"></textarea>
                                                                        </p>
                                                                        <div class="feedback-input">
                                                                           <div class="feedback-btn pb-15">
                                                                           <button type="submit"  value="Submit" style="border: none;height: 30px;color: white;background-color: #242424;font-weight: 500;">Gửi Bình Luận</button>
                                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">Đóng</a>
                                                                         
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!-- Feedback Area End Here -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                                <!-- Quick View | Modal Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


            <!-- Product Area End Here -->
            @endif
             <!-- KET THUC NEU SAN PHAM HET HANG -->
  <!-- Begin Li's Laptop Product Area -->
            <section class="product-area li-laptop-product pt-30 pb-50">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Các Sản Phẩm Khác Cùng Danh Mục</span>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    @foreach($samemodel as $value)
                                  
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
                   
                        </div>
                </div>
            </section>


@stop()
