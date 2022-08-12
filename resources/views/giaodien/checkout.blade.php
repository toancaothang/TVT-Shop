@extends('layout/header_footer')
@section('main')
 
            <!--Checkout Area Strat-->
            <div class="checkout-area pt-60 pb-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                        <form action="{{route('dat_hang')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                <div class="checkbox-form">
                                    <h3 style="text-align:center;">Thông Tin Vận Chuyển</h3>
                                    <div class="row">
                                     
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Họ Và Tên Người Nhận: <span class="required"></span></label>
                                                <p style="font-size:15px; color:black;">{{Auth::user()->full_name}} </p>
                                                
                                            </div>
                                        </div>
                                     
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Địa Chỉ Email: <span class="required"></span></label>
                                                <p style="font-size:15px; color:black;">{{Auth::user()->email}} </p>
                                              
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Số Điện Thoại: <span class="required"></span></label>
                                                <p style="font-size:15px; color:black;">0{{Auth::user()->phone_number}} </p>
                                               
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="checkout-form-list">
                                                <label>Địa Chỉ Giao Hàng: <span class="required"></span></label>
                                                <p  style="font-size:15px; color:black;">{{Auth::user()->address}} </p>
                                              
                                            </div>
                                        </div>
                                        
                                       
                                    </div>
                                    <div class="different-address">
                                        <div class="ship-different-title">
                                            <h3>
                                                <label>Vận Chuyển Đến Nơi Khác?</label>
                                                <input id="ship-box" type="checkbox" >
                                            </h3>
                                        </div>
                                        <div id="ship-box-info" class="row">
                                      
                                            
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Họ Và Tên Người Nhận: <span class="required"></span></label>
                                                <input placeholder="" type="text" value="{{Auth::user()->full_name}}" name="fname">
                                            </div>
                                        </div>
                                     
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Địa Chỉ Email: <span class="required"></span></label>
                                                <input placeholder="" type="email" value="{{Auth::user()->email}}"name="email">
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="">
                                            <div class="checkout-form-list">
                                                <label>Số Điện Thoại: <span class="required"></span></label>
                                                <input type="text" value="{{Auth::user()->phone_number}}"name="phonenum">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list checkout-form-list">
                                                <label>Địa Chỉ Giao Hàng: <span class="required"></span></label>
                                                <input type="text" name="addr" value="{{Auth::user()->address}}">
                                               
                                            </div>
                                        </div>
                                            
                                            
                                          
                                        </div>
                                        <div class="order-notes">
                                            <div class="checkout-form-list">
                                                <label>Các Yêu Cầu Khác ( Không bắt buộc):</label>
                                                <textarea id="checkout-mess" cols="30" rows="10" name="notes"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                            
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="your-order">
                                <h3 style="text-align:center;">Thông Tin Hóa Đơn</h3>
                                <div class="your-order-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-name">Sản Phẩm</th>
                                                <th class="cart-product-total">Tổng Cộng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($takecart as $tc)
                                            @if($tc->stock>0)
                                            <tr class="cart_item">
                                              <td class="cart-product-name">{{$tc->model_name}} {{$tc->capacity}}GB<strong class="product-quantity"> × {{$tc->pro_quantity}}</strong></td>
                                              @php $exsale=$tc->sale*$tc->price/100;
                                                $trueprice=$tc->price-$exsale;
                                                 @endphp
                                              @php $subtotal=$trueprice * $tc->pro_quantity; @endphp
                                              <td class="cart-product-total"><span class="amount"> {{number_format($subtotal)}}  <u>đ</u></span></td>  
                                            </tr>
                                            @endif
                                            @endforeach
                                       </tbody>
                                        <tfoot>
                                           
                                            <tr class="order-total">
                                                <th>Tổng Tiền</th>
                                                <td><strong><span class="amount">{{number_format(Session::get('totalafter'))}} <u>đ</u></span></strong></td>
                                                <input type="hidden" value="{{Session::get('totalafter')}}"name="total_after">
                                            </tr>
                                           
                                        </tfoot>
                                        
                                    </table>
                                    @if(Session::get('coupon'))
                                            @foreach(Session::get('coupon') as $key => $cou)
                                            <p style="font-size:15px;color:white; width:360px; background-color:#EF1E24; text-align:center;height:30px;margin-bottom:3px;margin-top:5px;border:dotted white 2px;font-weight:bold;"> Đã Áp Dụng Mã Giảm Giá "{{$cou['coupon_code']}}" Giảm {{$cou['coupon_number']}} %</p>
                                            @endforeach
                                            @endif
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                       
                                        <div class="order-button-payment">
                                            <input value="Thanh Toán" type="submit">
                                        </div>
                                        </form>
                                    </div>
                                  
                                </div>
                                <form action="{{route('checkout_vnpay')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                              <button style="border-radius:3px;background-color:white;color:#434343;border:none; height:40px; margin-top:10px; padding-bottom:48px;font-weight:bold;" type="submit" name="redirect">Thanh Toán  <img src=" {{asset('images/payment/vnpay.png')}}" alt="" style="height:50px;"> </button>
                                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Checkout Area End-->
@stop()