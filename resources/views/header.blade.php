<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<header id="mu-header">
  <div class="header_top" style="height: 30px">
    <div class="container">  
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-4">
                <div class="header_account">
                   KTPM1-K11 - Nhóm 21
                </div>
            </div>
            <div class="col-lg-8 col-md-9">
                <div class="top_right text-right">
                    <div class="header_support" style="margin-top: -7px">
                        <p><i class="icon ion-android-alarm-clock"></i> 24/7 - Hỗ trợ: 0382788384 </p>
                    </div>
                    <div class="header_account" style="margin-top: -15px">
                        <ul>
                            <li class="wishlist">
                              <a href="wishlist.html"><i class="icon ion-clipboard"></i> Wishlist </a>
                            </li>  
                            @if(Auth::check())                          
                            <li class="top_links"><a href="#"><i class="ion-gear-a"></i> Trang quản lý<i class="ion-chevron-down"></i></a>                        
                                <ul class="dropdown_links">
                                    @if(Auth::user()->role == 1)
                                    <li>
                                      <a href="{{ route('dashboard') }}">Quản trị</a>
                                    </li>   
                                    <li><a href="{{ route('get-thong-tin-ca-nhan',Auth::user()->id) }}">Thông tin cá nhân </a></li>
                                    <li><a href="{{ route('getchangepass',Auth::user()->id) }}">Đổi mật khẩu</a></li>
                                    @else                              
                                    {{-- <li><a href="checkout.html">Checkout </a></li> --}}
                                    <li><a href="{{ route('get-thong-tin-ca-nhan',Auth::user()->id) }}">Thông tin cá nhân </a></li>
                                    <li><a href="{{ route('getchangepass',Auth::user()->id) }}">Đổi mật khẩu</a></li>
                                    {{-- <li><a href="wishlist.html">Wishlist</a></li> --}}
                                    @endif
                                </ul>
                            </li>
                            @endif
                          @if(Auth::check())
                            <li>
                              <a href="{{ route('logout') }}">Đăng xuất</a>
                            </li>
                            @else
                              <a href="{{ route('login') }}">Đăng nhập</a>/<a href="{{ route('register') }}">Đăng ký
                            @endif
                        </ul>
                    </div>
                </div>   
            </div>
        </div>
    </div>
  </div>  
  <div class="row" style="height: 50;">
    <div id="navbar" class="navbar-collapse collapse">
      <ul id="top-menu" class="nav navbar-nav navbar-right mu-main-nav fz">
        {{-- <li><a href="{{ route('trang-chu') }}"><img style="margin-top: -10px" width="39px" height="39px" src="upload/icon/home.png" alt=""></a></li> --}}
        <li><a href="{{ route('trang-chu') }}"><strong>TRANG CHỦ</strong></a></li>
        <li><a href="{{ route('about') }}"><strong>GIỚI THIỆU</strong></a></li>                       
        <li><a href="{{ route('menu') }}"><strong>THỰC ĐƠN</strong></a></li>                       
        <li><a href="{{ route('gallery') }}"><strong>BỘ SƯU TẬP</strong></a></li>
        @if(Auth::check())
        <li><a href="{{ route('tuongtac') }}"><strong>HỖ TRỢ NẤU ĂN</strong></a></li> 
        @endif
        <li><a href="{{ route('contact') }}"><strong>LIÊN HỆ</strong></a></li> 
      </ul>                            
    </div><!--/.nav-collapse -->         
  </div>
  <nav class="navbar navbar-default mu-main-navbar" role="navigation">  
    <div class="container">
      <div class="row">
        <div class="navbar-header col-md-2">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <!-- LOGO -->       

           <!--  Text based logo  -->
          <a class="navbar-brand" href="{{ route('trang-chu') }}"><img src="upload/logo/logo.png"></a> 
              <!--  Image based logo  -->      
        </div>
        <div class="col-md-5">
            <form method="get" action="{{ route('search') }}">
              <div class="header-search">           
                  <input  placeholder="Tìm kiếm công thức" type="text" name="key"  >
                  <button type="submit" class="btn-header--search">
                    <i class="fas fa-search"></i>
                  </button>
               </div>
          </form>
        </div>
        <div class="col-md-5 login-box" >       
          <div class="row col-md-10">
            <div class="postRecipe col-md-6">
              <a href="{{route('post')}}">
                <div style="margin-top: 5px;">
                  <img width="30px"; height="30px" src="upload/logo/post.png" alt=""> Đăng công thức
                </div>
              </a>
            </div>
            {{-- <div class="message col-md-3">
                <a href=""><img width="30px"; height="30px" src="upload/logo/tb.png" alt=""></a>
            </div> --}}
            @if(Auth::check())
            <div class="iconAccount col-md-3">
              @if(Auth::user()->avatar <> null)
                <a href="{{ route('get-thong-tin-ca-nhan',Auth::user()->id) }}"><img style="border-radius:50%; margin-left: 180px; " width="38px"; height="38px" src="upload/avatar/{{ Auth::user()->avatar }}" alt="">
                </a>
              @else
                <a href="{{ route('get-thong-tin-ca-nhan',Auth::user()->id) }}"><img style="border-radius:50%; margin-left: 180px; " width="38px"; height="38px" src="upload/icon/account.png" alt="">
                </a>
              @endif
            </div>
            @else
            <div class="iconAccount col-md-3">
                <a href="{{ route('login') }}"><img style="border-radius:50%; margin-left: 180px;" width="38px"; height="38px" src="upload/icon/account.png" alt="">
                </a>
            </div>
            @endif
            <div class="message col-md-3">
                <a style="margin-left: 146px;" href=""><img width="35px"; height="35px" src="upload/logo/tb.png" alt=""></a>
            </div>
          </div>
          </div>
      </div>
     
  </nav> 
</header>