@extends('master')
@section('content')
<section id="mu-slider">
    <div class="container">
    <div class="mu-slider-are"> 

      <!-- Top slider -->
      <div class="mu-top-slider"   style="margin-top: 10px">
        <!-- Top slider single slide -->
        @foreach($slide as $sl)
        <div class="mu-top-slider-single">
          <img style="border-radius: 2%" src="upload/slide/{{ $sl->image }}" alt="img" width="2200px" height="550px">
          <!-- Top slider content -->
          <div class="mu-top-slider-content">
            <div class="title">
              <h1 class="mt2 mb1 center" style="color: orange">Ăn gì hôm nay? Nấu ngay món ngon</h1>
            </div>
            <form method="get" action="{{ route('search') }}">
              <div class="search-container">
                <span>
                  <i class="fas fa-search"></i>
                </span>
                <input type="text" name="key" value="{{ $result }}" class="form-control" placeholder="Ví dụ: kim chi, cupcake, soup, sinh tố..">
              </div>
            </form>
            {{-- <span class="mu-slider-small-title">Chào mừng bạn đến</span> --}}
            {{-- <h2 class="mu-slider-title">Món ngon 365</h2> --}}
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
{{-- <section id="mu-gallery"> --}}
  <div class="product_area deals_product mb-50">
        <section id="mu-gallery">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                      <div class="mu-title" style="height: 40px">
                         <h2>{{ count($recipes2) }} công thức làm "{{ $result }}" ngon </h2>
                      </div>
                  </div>
              </div> 
              <div class="row">
                  <div class="product_carousel product_column4 owl-carousel">
                    @foreach($recipes2 as $re)
                    <div class="col-lg-3" style="height: 380px; background-color: #ecf0f1">
                          <article class="single_product">
                              <figure>
                                 <div class="product_name" style="height: 40px">
                                     <h4><a href="#"><strong>{{ $re->name }}</strong></a></h4>
                                 </div>
                                 {{-- <div class="product_rating">
                                     <ul>
                                         <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                         <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                         <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                         <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                         <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                     </ul>
                                 </div> --}}

                                  <div class="product_thumb">
                                      <a class="primary_img" href="#"><img style="border-radius: 10px" src="upload/dish/{{ $re->dish->image }}" alt=""></a>
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
                                          <a href="#" title="quick view">>>><strong>Học nấu ngay</strong><<<</a>
                                      </div>
                                  </div>
                                  <div class="price_box"> 
                                      <span><strong>Mô tả: </strong>{{ $re->dish->note }}</span> 
                                      
                                  </div>
                              </figure>
                          </article>
                    </div> 
                    @endforeach
                  </div>
              </div>
              {{-- <div class="row">{{ $recipes->links() }}</div> --}}
          </div>
        </section>
  </div>
{{-- </section> --}}
  <div class="product_area deals_product mb-50">
      <section id="mu-gallery">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mu-title" style="height: 40px">
                       <h2>Các công thức khác của MonNgon365</h2>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="product_carousel product_column4 owl-carousel">
                  @foreach($recipes1 as $re)
                  <div class="col-lg-3" style="height: 380px">
                        <article class="single_product">
                            <figure>
                               <div class="product_name" style="height: 40px">
                                   <h4><a href="#"><strong>{{ $re->name }}</strong></a></h4>
                               </div>
                               {{-- <div class="product_rating">
                                   <ul>
                                       <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                       <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                       <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                       <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                       <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                   </ul>
                               </div> --}}

                                <div class="product_thumb">
                                    <a class="primary_img" href="#"><img style="border-radius: 10px" src="upload/dish/{{ $re->dish->image }}" alt=""></a>
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
                                        <a href="#" title="quick view">>>><strong>Học nấu ngay</strong><<<</a>
                                    </div>
                                </div>
                                <div class="price_box"> 
                                    <span><strong>Mô tả: </strong>{{ $re->dish->note }}</span> 
                                    
                                </div>
                            </figure>
                        </article>
                  </div> 
                  @endforeach
                </div>
            </div>
            {{-- <div class="row">{{ $recipes->links() }}</div> --}}
        </div>
      </section>
    </div>

  <!-- Start Map section -->
  @include('map')
  <!-- End Map section -->

@endsection