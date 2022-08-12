<div> 
<div>


<h1 style="text-align:center;color:#009ADE;"> Chào Mừng {{$kh->full_name}} Đến Với TVT Shop</h1>
<p style="text-align:center;font-size:20px;" > Bạn đã đăng ký tài khoản của TVT Shop</p>
<p style="text-align:center;font-size:20px;" > Để có thể truy cập vào tài khoản, vui lòng nhấn xác nhận ở phía dưới để kích hoạt tài khoản </p>
<p style="text-align:center;font-size:20px;" ><a style="text-align:center;color:#E80F0F;font-size:20px;text-decoration:none;" href="{{route('actived_mail',['id'=>$kh->id,'token'=>$kh->remember_token])}}"> Xác Nhận Kích Hoạt Tài Khoản</a> </p>

</div>


</div>