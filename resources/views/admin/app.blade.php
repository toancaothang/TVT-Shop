<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Quản Lý TVT Shop </title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/menu/logo/admin.png')}}">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('adminss/style.css') }}">
    
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    
  </head>
  <body>
    <input type="checkbox" id="sidebar-toggle">
    <div class="sidebar">
      <div class="sidebar-header">
      <div class="logo pb-sm-30 pb-xs-30">
                                    <a href="{{route('htsp_trangchu')}}">
                                        <img src=" {{asset('images/menu/logo/logo.png')}}" alt="" style="margin-top:30px; margin-left:" >
                                        
                                        </a>
                                        
                                    </div>
      </div>
      <div style="margin-top:20px;"class="sidebar-menu">
        <ul id="accordion" class="accordion">
          <li>
            <a href= {{route('admin.dashboard')}}>
              <span class="ti-home"></span>
              <span>Trang chủ</span>
            </a>
          </li>
          <li>
            <a href= {{route('hoadonnhap')}}>
              <span class="ti-home"></span>
              <span>Nhập hàng</span>
            </a>
          </li>
          {{-- <li>
            <a href="#">
              <span class="ti-wallet"></span>
              <span>Nhập hàng</span>
            </a>
          </li> --}}
          <li>
            <a><div class="link"><a>
              <span class="ti-face-smile"></span>
              <span style="margin-left: 12px">Quản lí sản phẩm<i style="top: 3px" class="fa fa-chevron-down"></i></span>
              
            </a></div>
          </a>
            <ul class="submenu">
              <li>
                <a style="margin-top: 15px" href= {{route('modelsanpham')}}>
                  <span class="ti-agenda"></span>
                  <span>Mẫu sản phẩm</span>
                </a>
              </li>
              <li>
                <li>
                  <a style="margin-top: 15px" href= {{route('sanpham')}}>
                    <span class="ti-video-clapper"></span>
                    <span>Sản phẩm</span>
                  </a>
                </li>
                <li>
                <a style="margin-top: 5px" href= {{route('anhmodelsanpham')}}>
                  <span class="ti-briefcase"></span>
                  <span>Ảnh mẫu sản phẩm</span>
                </a>
              </li>
              <li>
                <a href={{route('loaisanpham')}}>
                  <span class="ti-wallet"></span>
                  <span>Loại sản phẩm</span>
                </a>
              </li>
            </ul>
          </li>
          
          <li>
            <a href= {{route('hoadon')}}>
              <span class="ti-package"></span>
              <span>Hoá đơn</span>
            </a>
          </li>
          <li>
            <a href= {{route('baiviet')}}>
              <span class="ti-book"></span>
              <span>Bài viết</span>
            </a>
          </li>
          <li>
            <a href= {{route('magiamgia')}}>
              <span class="ti-book"></span>
              <span>Mã giảm giá</span>
            </a>
          </li>
          <li>
            <a href= {{route('nhasanxuat')}}>
              <span class="ti-clipboard"></span>
              <span>Nhà sản xuất</span>
            </a>
          </li>
          <li>
            <a href= {{route('khachhang')}}>
              <span class="ti-time"></span>
              <span> Khách hàng</span>
            </a>
          </li>
          <li>
            <a href= {{route('nhanvien')}}>
              <span class="ti-user"></span>
              <span>Nhân viên</span>
            </a>
          </li>
          <li>
            <a href= {{route('binhluankhachhang')}}>
              <span class="ti-thumb-up"></span>
              <span>Bình luận khách hàng</span>
            </a>
          </li>
          <li>
            <a href= {{route('thongke')}}>
              <span class="ti-money"></span>
              <span>Thống kê</span>
            </a>
          </li>
          <li>
            <div class="link"><a>
              <span class="ti-settings"></span>
              <span style="margin-left: 12px">Giao Diện<i style="top: 3px" class="fa fa-chevron-down"></i></span>
              
            </a></div>
            <ul class="submenu">
              <li>
                <a style="margin-top: 15px" href= {{route('setting')}}>
                  <span class="ti-desktop"></span>
                  <span>Banner</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        
      </div>
    </div>
   
    <div class="main-content">
     
      <header style="display: flex;">
        <div class="search-wrapper">
          <span ></span>
          <input type="search" style="display:none;"  readonly/>
        </div>
        <div class="social-icons">
          <span class="ti-bell"></span>
          <span class="ti-comment"></span>
          <span>Xin chào {{auth()->guard('admin')->user()->full_name}}</span>
          <a style="background-image: url({{url('adminavatar')}}/{{auth()->guard('admin')->user()->avatar}});" href="{{route('suaprofile',['profile'=>auth()->guard('admin')->user()->id])}}">
          </a>
        </div>
      </header>
      <main style="margin-top: 30px;padding-left:20px">
        @yield('content')
      </main>
    </div>
  </body>
  <style>

.accordion .link {
  cursor: pointer;
  display: block;
  position: relative;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  transition: all 0.4s ease;
}

.accordion li:last-child .link { border-bottom: 0; }

.accordion li i {
  position: absolute;
  top: 16px;
  left: 12px;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  transition: all 0.4s ease;
}

.accordion li i.fa-chevron-down {
  right: 12px;
  left: auto;
  font-size: 16px;
}

.accordion li.open i.fa-chevron-down {
  -webkit-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  -o-transform: rotate(180deg);
  transform: rotate(180deg);
}
    .submenu {
  display: none;
  font-size: 14px;
}

.submenu a {
  display: block;
  text-decoration: none;
  color: #d9d9d9;
  -webkit-transition: all 0.25s ease;
  -o-transition: all 0.25s ease;
  transition: all 0.25s ease;
}
  </style>
  <script>
    $(function() {
  var Accordion = function(el, multiple) {
    this.el = el || {};
    this.multiple = multiple || false;

    // Variables privadas
    var links = this.el.find('.link');
    // Evento
    links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
  }

  Accordion.prototype.dropdown = function(e) {
    var $el = e.data.el;
      $this = $(this),
      $next = $this.next();

    $next.slideToggle();
    $this.parent().toggleClass('open');

    if (!e.data.multiple) {
      $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
    };
  } 
  var accordion = new Accordion($('#accordion'), false);
});
  </script>
  
  <!-- Chart library -->
<script src="{{ asset('adminss/plugins/chart.min.js') }}"></script>
<script src="{{ asset('adminss/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('adminss/popup/js/popper.min.js') }}"></script>
<script src="{{ asset('adminss/popup/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('adminss/popup/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('adminss/popup/js/main.js') }}"></script>
</html>
