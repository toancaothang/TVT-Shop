<div> 
<div>


<h1 style="text-align:center;color:#009ADE;"> Xin Chào {{$user->full_name}}</h1>
<p style="text-align:center;font-size:20px;" > Email này giúp bạn lấy lại mật khẩu đã quên</p>
<p style="text-align:center;font-size:20px;" > Vui lòng nhấn xác nhận để lấy lại mật khẩu </p>
<p style="text-align:center;font-size:20px;color:red;" > Lưu ý : Mã xác minh chỉ có hiệu lực trong vòng 72 giờ! </p>
<p style="text-align:center;font-size:20px;" ><a style="text-align:center;color:#E80F0F;font-size:20px;text-decoration:none;" href="{{route('get_fpassword',['id'=>$user->id,'token'=>$user->remember_token])}}"> Xác Nhận Lấy Lại Mật Khẩu</a> </p>

</div>


</div>