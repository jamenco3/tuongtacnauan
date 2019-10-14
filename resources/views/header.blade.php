<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<header id="mu-header">  
  <div style="width: 100%; height: 19px; background-color: orange; font-size: 15px">
        <div class="row">
          <div class="col-md-6">
            <a style="margin-left: 50px" href="">Thông tin liên hệ: +84 382788384</a>
          </div>
          @if(Auth::check())
          <div class="col-md-6">
            <a style="margin-left: 350px" href="{{ route('logout') }}">Đăng xuất</a>
          </div>
          @else
          <div class="col-md-6">
            <a style="margin-left: 350px" href="{{ route('login') }}">Đăng nhập</a>/<a href="">Đăng ký</a>
          </div>
          @endif
        </div>
  </div>
  <div class="row" style="height: 45px">
    <div id="navbar" class="navbar-collapse collapse">
      <ul id="top-menu" class="nav navbar-nav navbar-right mu-main-nav fz">
        <li><a href="{{ route('trang-chu') }}"><img style="margin-top: -10px" width="39px" height="39px" src="upload/icon/home.png" alt=""></a></li>
        <li><a href="{{ route('about') }}">GIỚI THIỆU</a></li>                       
        <li><a href="{{ route('menu') }}">THỰC ĐƠN</a></li>                       
        {{-- <li><a href="#mu-reservation">RESERVATION</a></li>                        --}}
        @if(Auth::check())
        <li><a href="admin/category/list">QUẢN TRỊ</a></li>
        @endif
        <li><a href="{{ route('gallery') }}">BỘ SƯU TẬP</a></li>
        <li><a href="#mu-chef">CHUYÊN GIA</a></li> 
        <li><a href="{{ route('contact') }}">LIÊN HỆ</a></li> 
      </ul>                            
    </div><!--/.nav-collapse -->         
  </div>
  <nav class="navbar navbar-default mu-main-navbar" role="navigation">  
    <div class="container">
      <div class="navbar-header">
        <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <!-- LOGO -->       

         <!--  Text based logo  -->
        {{-- <a class="navbar-brand" href="{{ route('trang-chu') }}">MonNgon<span>365</span></a>  --}}
        <a class="navbar-brand" href="{{ route('trang-chu') }}"><img src="upload/logo/logo.png"></a> 
            <!--  Image based logo  -->
        <!-- <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt="Logo img"></a>  -->      
      </div>
      <form method="get" action="{{ route('search') }}">
          <div class="header-search col-lg-4">           
              <input  placeholder="Tìm kiếm công thức" type="text" name="key"  >
              <button type="submit" class="btn-header--search">
                <i class="fas fa-search"></i>
              </button>
           </div>
      </form>
      @if(Auth::check())
      <div class="iconAccount">
          <a href=""><img style="border-radius:50%; margin-top: 18px;" width="38px"; height="38px" src="upload/avatar/{{ Auth::user()->avatar }}" alt="">
          </a>
      </div>
      @else
      <div class="iconAccount">
          <a href="{{ route('login') }}"><img style="border-radius:50%; margin-top: 18px;" width="38px"; height="38px" src="upload/icon/account.png" alt="">
          </a>
      </div>
      @endif
      <div class="message">
          <a href=""><img width="30px"; height="30px" src="upload/logo/tb.png" alt=""></a>
      </div>
      <div class="postRecipe">
          <a href=""><div>
            <img width="30px"; height="30px" src="upload/logo/post.png" alt=""> Đăng công thức
          </div></a>
      </div>
  </nav> 
</header>