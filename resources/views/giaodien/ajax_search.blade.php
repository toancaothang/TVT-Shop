@foreach ($data as $dt)
<div class="media" style="margin-top:10px;"> 
<img class="media-object" style="width: 50px;" src="{{url('website/product')}}/{{$dt->image}}">  
<div class="media-body" >
<h6 class="media-heading">
    <a href="{{route('chitiet_sanpham',['cateid'=>$dt->category_id,'id'=>$dt->mid])}}">{{$dt->model_name}} {{$dt->capacity}}GB</a>
    @php $exsale=$dt->sale*$dt->price/100; @endphp
</h6>
<div class="rating-box">
            <ul class="rating">
            @for($i=1;$i<=$dt->total_rated;$i++)
            <li><i class="fa fa-star-o"></i></li>
        @endfor
            @for($j=$dt->total_rated+1;$j<=5;$j++)
            <li class="no-star"><i class="fa fa-star-o"></i></li>
                @endfor
</ul>
    </div>
    @php
    $stocked=0;
    $stocked+=$dt->stock;
    @endphp
    @if($stocked==0)
    <p style="color:#E80F0F;"> Đã Hết Hàng </p>
    @else
<p style="color:#E80F0F;">{{number_format($dt->price-$exsale)}} <u> đ</u> </p>
@if($dt->sale)
<span style="color:black;text-decoration:line-through;" > {{number_format($dt->price)}}  <u> đ</u></span> <span> -{{number_format($dt->sale)}}%</span></p> 
@endif
@endif
</div>
</div>

@endforeach