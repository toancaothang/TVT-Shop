@extends('layout/header_footer')
@section('main')
<script>
 $(document).ready(function(){
$(".total").click(function(e) {
    var total=$(this).val();
    e.preventDefault();
    $.ajax({
        type:'get',
        url:'cart',
        data: { total: total},
        success:function(response){
           alert(response);
        }
    });
});});
</script>

<!--<script>
$(document).ready(function()
{
$.ajaxSetup({
headers:{
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$('.qtybutton').click(function(e){
e.preventDefault();
var prod_id=$(this).closest('.prod-data').find('.prod_id').val();
var qty=$(this).closest('.prod-data').find('.qty-input').val();
data={
    'prod_id' : prod_id,
    'prod_qty' : qty,
}
$.ajax({
method: "POST",
url: "update-cart",
data: data,
success: function(response){

}
});

});
});


   </script> -->
   <!--
   <script>
   (function() {

 $('.li-product-remove').click(function (e) {
    
    var $removeBtn = $(this);
    var id = $removeBtn.data('id');

    $.ajax({
        type: "DELETE",
        url: "/delete_cart/". id,  // or whatever is the URL to the destroy action in the controller
        success: function (data) {
            $('.cart-data-details__total').remove(); // assumes that the wrapper for each line item is cart-data-details__total
        }               
    });

    return false;
});

})(); 
</script> -->
  
            <!--Shopping Cart Area Strat-->
            @if(count($procartshow))
             <div class="Shopping-cart-area pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                        @if (session('cart')) <div class="alert alert-success"> {{ session('cart') }} </div> @endif
                      <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr style="background-color: #0382C7;color: white;">
                                           
                                                <th class="li-product-thumbnail">???nh S???n Ph???m</th>
                                                <th class="cart-product-name">S???n Ph???m</th>
                                                <th class="li-product-price">????n Gi??</th>
                                                <th class="li-product-quantity">S??? L?????ng</th>
                                                <th class="li-product-subtotal">T???ng C???ng</th>
                                                <th class="li-product-remove">X??a</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $total=0 @endphp
                                            @foreach($procartshow as $pc)
                                            <tr class="prod-data">
                                                <td class="li-product-thumbnail"><a href="#"><img src="{{url('website/product')}}/{{$pc->image}}" alt="" style="width:100px;height:100px;"></a></td>
                                                <td class="li-product-name"><a href="{{route('chitiet_sanpham',['cateid'=>$pc->category_id,'id'=>$pc->pid])}}">{{$pc->model_name}} {{$pc->capacity}} GB</a></td>
                                                @if($pc->stock>0)
                                                @php $exsale=$pc->sale*$pc->price/100;
                                                $trueprice=$pc->price-$exsale;
                                                 @endphp
                                                <td class="li-product-price"><span class="amount">{{number_format($trueprice)}} <u> ??</u></span></td>
                                                <form action="{{route('update_cart')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                          <td class="quantity">
                                                <input type="hidden" class="prod_id" value="{{$pc->product_id}}" name="prodid"/>
                                                  <div class="cart-plus-minus">
                                                       <input class="cart-plus-minus-box qty-input" value="{{$pc->pro_quantity}}" type="text" name="cartquan">
                                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                       
                                                   </div>
                                                       
                                                </td>
                                                
                                             @php $subtotal=$trueprice * $pc->pro_quantity; @endphp
                                                <td class="product-subtotal"><span class="amount"></span>{{number_format($subtotal)}} <u> ??</u></td>
                                                @php $total+= $trueprice * $pc->pro_quantity; @endphp
                                                @else
                                                <td class="li-product-price" style="color:red;"><span class="amount">H???t H??ng</span></td>
                                                <td class="li-product-price" style="color:red;"><span class="amount">H???t H??ng</span></td>
                                                <td class="li-product-price" style="color:red;"><span class="amount">H???t H??ng</span></td>
                                                @endif
                                                <td class="li-product-remove"><a href="{{route('delete_cart',['id'=>$pc->cid])}}"><i class="fa fa-times"></i></a></td>
                                        </tr>
                                           
                                          
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                   
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="coupon-all">
                                        <div class="coupon2">
                                        <input id="total_after" class="total" name="total_after" value="{{$total}}"  type="hidden">
                                        <button type="submit" class="buttonupdate" style="border:none;background-color: #0382C7;margin-top: -5px;color: white;height: 42px;border-radius: 2px;font-weight:bold;"> <a style="color:#FFFFFF;"> C???p Nh???t Gi??? H??ng </a></button>
                                        </form>
                                        <button style="border:none;background-color:#0382C7;margin-bottom:5px;color:white;height:42px;border-radius:2px;font-weight:bold;"> <a href="{{route('delete_all_cart')}}" style="color:#FFFFFF;"> X??a T???t C??? S???n Ph???m </a></button>      
                                        </div>
                                                
                                                
                                        <form action="{{route('check_coupon')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <div class="coupon">
                                                <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="M?? Gi???m Gi??" type="text">
                                                <input class="button" name="apply_coupon" value="Nh???p V??o M?? Gi???m Gi??" type="submit">
                                            </div>
                                          <form>
</form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                    <form action="{{route('check_out')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                       <div class="cart-page-total">
                                            <h2>T???ng Thanh To??n</h2>
                                            @php
                                            $totaltosession=0;
                                            @endphp
                                            <ul>
                                                <li>T???m T??nh: <span>{{number_format($total)}} <u> ??</u></span></li>
                                                @if(Session::get('coupon'))
                                                @foreach(Session::get('coupon') as $key => $cou)
                                               
                                               @php $total_coupon =($total*$cou['coupon_number'])/100;
                                               @endphp
                                              
                                                <li>Gi???m Gi?? : <span>{{number_format($total_coupon)}} <u> ??</u></span></li>
                                                
                                              <li>T???ng Ti???n: <span>{{number_format($total-$total_coupon)}} <u> ??</u></span></li>
                                              <input id="total_after" class="total" name="total_after" value="{{$total-$total_coupon}}"  type="hidden">
                                              @php  $totaltosession=$total-$total_coupon;  @endphp
                                            </ul>
                                            <p style="font-size:15px;color:white; width:360px; background-color:#EF1E24; text-align:center;height:30px;margin-bottom:3px;margin-top:5px;border:dotted white 2px;font-weight:bold;display:inline-block;"> ???? ??p D???ng M?? Gi???m Gi?? "{{$cou['coupon_code']}}" Gi???m {{$cou['coupon_number']}} % </p> <span style="font-size:15px;color:white;width:30px; background-color:#EF1E24; text-align:center;height:30px;margin-bottom:3px;margin-top:5px;border:dotted white 2px;font-weight:bold;display:inline-block;"><a style="color:white;" href="{{route('delete_coupon')}}"> x </a></span>
                                           @endforeach
                                            @else
                                            <li>T???ng Ti???n: <span>{{number_format($total)}} <u> ??</u></span></li>
                                            <input id="total_after" class="total" name="total_after" value="{{$total}}"  type="hidden">
                                            @php $totaltosession=$total; @endphp
                                            </ul>
                                            @endif
                                            <?php
                                             session(['totalafter' => $totaltosession]);
                                                ?>
                                                     @php 
                                        $cartcountqc=(App\Models\Cart::join('product_model','cart.pro_model_id','=','product_model.id')->join('product','cart.product_id','=','product.id')->where('user_id',Auth::user()->id)->where('product_model.status',1)->where('product.status',1)->where('product.stock','>',0)->sum('pro_quantity'));
                                        @endphp
                                        @if($cartcountqc)
                                            <button style="border:none;background-color:#333333;color:white;margin-top:5px;height:42px;border-radius:2px;width:200px;font-weight:bold;" type="submit"> Thanh To??n    </button> 
                                            @endif
                                        </div>
                                        <form>
                                        @php
                                              
                                          @endphp
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
                                   <h2>B???n Ch??a Th??m S???n Ph???m V??o Gi??? H??ng</h2>
                                    <p>H??y Ch???n S???n Ph???m ????? Th??m V??o </p>
                                </div>
                                <div class="search-error">
                                <img src=" {{asset('images/menu/logo/cartpage.png')}}" alt="" style="width:100px;" >
                                </div>
                                <div class="error-button" >
                                    <a href="{{route('back_get')}}"style="color:black;">B???t ?????u Th??m S???n Ph???m</a>
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
            <!--Shopping Cart Area End-->


@stop()