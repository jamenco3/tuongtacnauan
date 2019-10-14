@extends('master')
@section('content')
<!-- Start slider  -->
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
            <div class="search-container">
              <span>
                <i class="fas fa-search"></i>
              </span>
              <input type="text" name="" value="" class="form-control" placeholder="Ví dụ: kim chi, cupcake, soup, sinh tố..">
            </div>
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
                  <div class="col-lg-3" style="height: 380px">
                        <article class="single_product">
                            <figure>
                               <div class="product_name" style="height: 40px">
                                   <h4><a href="{{ route('recipes', $re->id) }}"><strong>{{ $re->name }}</strong></a></h4>
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

  <!-- Start Reservation section -->
  {{-- <section id="mu-reservation">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-reservation-area">

            <div class="mu-title">
              <span class="mu-subtitle">Make A</span>
              <h2>Reservation</h2>
            </div>

            <div class="mu-reservation-content">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione quidem autem iusto, perspiciatis, amet, quaerat blanditiis ducimus eius recusandae nisi aut totam alias consectetur et.</p>

              <div class="col-md-6">
                <div class="mu-reservation-left">
                  <form class="mu-reservation-form">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">                       
                          <input type="text" class="form-control" placeholder="Full Name">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">                        
                          <input type="email" class="form-control" placeholder="Email">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">                        
                          <input type="text" class="form-control" placeholder="Phone Number">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <select class="form-control">
                            <option value="0">How Many?</option>
                            <option value="1 Person">1 Person</option>
                            <option value="2 People">2 People</option>
                            <option value="3 People">3 People</option>
                            <option value="4 People">4 People</option>
                            <option value="5 People">5 People</option>
                            <option value="6 People">6 People</option>
                            <option value="7 People">7 People</option>
                            <option value="8 People">8 People</option>
                            <option value="9 People">9 People</option>
                            <option value="10 People">10 People</option>
                          </select>                      
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="text" class="form-control" id="datepicker" placeholder="Date">              
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <textarea class="form-control" cols="30" rows="10" placeholder="Your Message"></textarea>
                        </div>
                      </div>
                      <button type="submit" class="mu-readmore-btn">Make Reservation</button>
                    </div>
                  </form>    
                </div>
              </div>

              <div class="col-md-5 col-md-offset-1">
                <div class="mu-reservation-right">
                  <div class="mu-opening-hour">
                    <h2>Opening Hours</h2>
                      <ul class="list-unstyled">
                        <li>
                            <p>Monday &amp; Tuesday</p>
                            <p>9:00 AM - 4:00 PM</p>
                        </li>
                        <li>
                            <p>Wednesday &amp; Thursday</p>
                            <p>9:00 AM - Midnight</p>
                        </li>
                        <li>
                            <p>Friday &amp; Saturday</p>
                            <p>9:00 AM - Midnight</p>
                        </li>
                        <li>
                            <p>Sunday</p>
                            <p>9:00 AM - 11:00 PM</p>
                        </li>
                      </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  --}} 
  <!-- End Reservation section -->
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