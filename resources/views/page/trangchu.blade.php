@extends('master')
@section('content')
<!-- Start slider  -->
  <section id="mu-slider">
    <div class="container">
    <div class="mu-slider-are"> 

      <!-- Top slider -->
      <div class="mu-top-slider"   style="margin-top: 50px">
        <!-- Top slider single slide -->
        @foreach($slide as $sl)
        <div class="mu-top-slider-single">
          <img style="border-radius: 10px" src="upload/slide/{{ $sl->image }}" alt="img" width="2200px" height="400px">
          <!-- Top slider content -->
          <div class="mu-top-slider-content">
            <div class="title">               
              <h1 class="mt2 mb1 center" style="color: orange">Ăn gì hôm nay? Nấu ngay món ngon</h1>
            </div>
            <div class="search-container">
              <span>
                <i class="fas fa-search"></i>
              </span>
              <input type="text" name="" value="" class="form-control" placeholder="Ví dụ: kim chi, cupcake, soup, sinh tố..">
            </div>
            <p></p>           
            {{-- <a href="#mu-reservation" class="mu-readmore-btn mu-reservation-btn">BOOK A TABLE</a> --}}
          </div>
          <!-- / Top slider content -->
        </div>
        @endforeach
      </div>
    </div>
    </div>
  </section>
  <!-- End slider  -->

  <!-- Start About us -->
  @include('about')
  <!-- End About us -->

  <!-- Start Counter Section -->
  @include('couter')
  <!-- End Counter Section --> 
   <!--product area start-->
    <div class="product_area deals_product mb-50">
      <section id="mu-gallery">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mu-title" style="height: 40px">
                       <h2>Công thức bởi MonNgon365</h2>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="product_carousel product_column4 owl-carousel">
                  @foreach($recipes as $re)
                  <div class="col-lg-3" style="height: 400px">
                        <article class="single_product">
                            <figure>
                               <div class="product_name" style="height: 40px">
                                   <h4><a href="{{ route('recipes', $re->id) }}"><strong>{{ $re->name }}</strong></a></h4>
                               </div>

                                <div class="product_thumb">
                                    <a class="primary_img" href="{{route('recipes', $re->id)}}"><img style="border-radius: 10px" src="upload/dish/{{ $re->dish->image }}" alt=""></a>
                                    <div>
                                        <span class="label_sale"><strong>Độ khó: </strong>
                                          @if($re->level == 1) {{ "Dễ" }}
                                          @elseif($re->level == 2) {{ "Trung bình" }}
                                          @else {{ "Khó" }}</span>
                                          @endif
                                    </div>
                                    <div>
                                        <span class="label_sale"><strong>Phần: </strong>{{ $re->eater }} người</span>                                         
                                    </div>
                                    <div class="quick_button">
                                        <a href="{{route('recipes', $re->id)}}" title="quick view">>>><strong>Học nấu ngay</strong><<<</a>
                                    </div>
                                </div>
                                <div class="price_box"> 
                                    <span><strong>Mô tả: </strong>{{ $re->dish->note }}</span>
                                </div>
                                <div class="price_box">
                                    <span><strong>Người đăng: </strong>{{$re->user->name}}</span>
                                </div>
                            </figure>
                        </article>
                  </div> 
                  @endforeach
                </div>
            </div>
            <div class="row">{{ $recipes->links() }}</div>
        </div>
      </section>
    </div>
    <!--product area end-->
  {{-- @include('public') --}}
  <!-- Start Restaurant Menu -->
  @include('menu')
  <!-- End Restaurant Menu -->

<hr>
  <!-- Start Gallery -->
  @include('gallery')
  <!-- End Gallery -->
  
  <!-- Start Client Testimonial section -->
  @include('client')
  <!-- End Client Testimonial section -->
  
  <!-- Start Chef Section -->
  @include('chefs')
  <!-- End Chef Section -->

 
  <!-- Start Contact section -->
  @include('contact')
  <!-- End Contact section -->

  <!-- Start Map section -->
  @include('map')
  <!-- End Map section -->

@endsection

@section('script')
  <script type="text/javascript" src="sources/assets/js/simple-animated-counter.js"></script>
@endsection