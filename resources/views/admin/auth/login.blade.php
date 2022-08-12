<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->
  <!-- Custom styles -->
  <link rel="stylesheet" type="text/css" href="{{ asset('adminss/img/svg/logo.svg')}}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('adminss/css/style.min.css')}}" />
  <!-- Font-icon css-->

  <title>Login - {{ config('app.name') }}</title>
</head>

<body>
  <div class="layer"></div>
  
    <main class="page-center">
    <h1 class="sign-up__title">Chào mừng đến với trang quản lý TVT Shop </h1>
    <article class="sign-up">
        <p class="sign-up__subtitle">Đăng nhập tài khoản admin của bạn để tiếp tục</p>
        <form class="sign-up-form form"  action="{{ route('admin.login.post') }}" method="POST" role="form">
            @csrf
        <label class="form-label-wrapper">
            <p class="form-label" for="email">Tên đăng nhập</p>
            <input class="form-input" type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" autofocus value="{{ old('username') }}" required >
        </label>
        <label class="form-label-wrapper">
            <p class="form-label">Mật khẩu</p>
            <input class="form-input" type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
        </label>
      
        <label class="form-checkbox-wrapper">
            <input class="form-checkbox" type="checkbox">
            <span class="form-checkbox-label">Nhớ tôi đăng nhập lần sau</span>
        </label>
        <button type="submit" class="form-btn primary-default-btn transparent-btn">Đăng Nhập</button>
        </form>
    </article>
    </main>
<!-- Chart library -->
<script src="{{ asset('adminss/plugins/chart.min.js') }}"></script>
<!-- Icons library -->
<script src="{{ asset('adminss/plugins/feather.min.js') }}"></script>
<!-- Custom scripts -->
<script src="{{ asset('adminss/js/script.js') }}"></script>
</body>

</html>