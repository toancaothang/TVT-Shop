<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elegant Dashboard | Sign Up</title>
  <!-- Favicon -->
  <link rel="stylesheet" type="text/css" href="{{ asset('adminss/img/svg/logo.svg')}}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('adminss/css/style.min.css')}}" />
  <!-- Font-icon css-->

  <title>Login - {{ config('app.name') }}</title>
</head>

<body>
  <div class="layer"></div>
<main class="page-center">
  <article class="sign-up">
    <h1 class="sign-up__title">Get started</h1>
    <p class="sign-up__subtitle">Start creating the best possible user experience for you customers</p>
    <form class="sign-up-form form" action="{{ route('admin.register.post') }}" method="POST" role="form">
        @csrf
        <label class="form-label-wrapper">
            <p class="form-label">Tên tài khoản</p>
            <input class="form-input" id="ten_tk" name="ten_tk" type="text" placeholder="Enter your email" required>
          </label>
      <label class="form-label-wrapper">
        <p class="form-label">Email</p>
        <input class="form-input" id="email" name="email" type="email" placeholder="Enter your email" required>
      </label>
      <label class="form-label-wrapper">
        <p class="form-label">Password</p>
        <input class="form-input" type="password" id="mat_khau" name="mat_khau" placeholder="Enter your password" required>
      </label>
      <label class="form-checkbox-wrapper">
        <input class="form-checkbox" type="checkbox" >
        <span class="form-checkbox-label">Remember me next time</span>
      </label>
      <button class="form-btn primary-default-btn transparent-btn">Sign in</button>
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