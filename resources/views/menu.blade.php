<section id="mu-restaurant-menu">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-restaurant-menu-area">

            <div class="mu-title">
              {{-- <span class="mu-subtitle">Thực đơn của chúng tôi</span> --}}
              <h2>Thực đơn</h2>
            </div>
            
            <div class="mu-restaurant-menu-content">
                <ul class="nav nav-tabs mu-restaurant-menu">
                    <li class="active"><a href="#ansang" data-toggle="tab">Ăn sáng</a></li>
                    <li><a href="#khaivi" data-toggle="tab">Khai vị</a></li>
                    <li><a href="#monchinh" data-toggle="tab">Món chính</a></li>
                    <li><a href="#anvat" data-toggle="tab">Ăn vặt</a></li>
                    <li><a href="#thucuong" data-toggle="tab">Thức uống</a></li>
                    <li><a href="#salad" data-toggle="tab">Salad</a></li>
                </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="ansang">
                  <div class="mu-tab-content-area">
                    <div class="row">

                      <div class="col-md-12">
                        <div class="mu-tab-content-left">
                          <ul class="mu-menu-item-nav">
                            @foreach($dish_breakfast as $dsb)
                            <li>
                              <div class="media">
                                <div class="media-left">
                                  <a href="#">
                                    <img style="border-radius: 10%" class="media-object" src="upload/dish/{{ $dsb->image}}" alt="img" width="110px" height="110px">
                                  </a>
                                </div>
                                <div class="media-body">
                                  <h4 class="media-heading"><a href="#">{{ $dsb->name }}</a></h4>
                                  <span class="mu-menu-price">{{ $dsb->note }}</span>
                                  <p>{{ $dsb->category->name }}
                                </div>
                              </div>
                            </li>      
                            @endforeach                     
                          </ul>   
                        </div>
                      </div>                   

                   </div>
                 </div>
                </div>

                <div class="tab-pane fade" id="khaivi">
                  <div class="mu-tab-content-area">
                    <div class="row">

                      <div class="col-md-12">
                        <div class="mu-tab-content-left">
                          <ul class="mu-menu-item-nav">
                            @foreach($dish_appetizer as $dsa)
                            <li>
                              <div class="media">
                                <div class="media-left">
                                  <a href="#">
                                    <img style="border-radius: 10%" class="media-object" src="upload/dish/{{ $dsa->image}}" alt="img" width="110px" height="110px">
                                  </a>
                                </div>
                                <div class="media-body">
                                  <h4 class="media-heading"><a href="#">{{ $dsa->name }}</a></h4>
                                  <span class="mu-menu-price">{{ $dsa->note }}</span>
                                  <p>{{ $dsa->category->name }}
                                </div>
                              </div>
                            </li>      
                            @endforeach   
                          </ul>   
                        </div>
                      </div>
                   
                   </div>
                 </div>
                </div>

                <div class="tab-pane fade" id="monchinh">
                    <div class="mu-tab-content-area">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="mu-tab-content-left">
                                  <ul class="mu-menu-item-nav">
                                    @foreach($dish_main as $dsm)
                                    <li>
                                      <div class="media">
                                        <div class="media-left">
                                          <a href="#">
                                            <img style="border-radius: 10%" class="media-object" src="upload/dish/{{ $dsm->image}}" alt="img" width="110px" height="110px">
                                          </a>
                                        </div>
                                        <div class="media-body">
                                          <h4 class="media-heading"><a href="#">{{ $dsm->name }}</a></h4>
                                          <span class="mu-menu-price">{{ $dsm->note }}</span>
                                          <p>{{ $dsm->category->name }}
                                        </div>
                                      </div>
                                    </li>      
                                    @endforeach   
                                  </ul>   
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="anvat">
                    <div class="mu-tab-content-area">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="mu-tab-content-left">
                                  <ul class="mu-menu-item-nav">
                                    @foreach($dish_snack as $dsn)
                                    <li>
                                      <div class="media">
                                        <div class="media-left">
                                          <a href="#">
                                            <img style="border-radius: 10%" class="media-object" src="upload/dish/{{ $dsn->image}}" alt="img" width="110px" height="110px">
                                          </a>
                                        </div>
                                        <div class="media-body">
                                          <h4 class="media-heading"><a href="#">{{ $dsn->name }}</a></h4>
                                          <span class="mu-menu-price">{{ $dsn->note }}</span>
                                          <p>{{ $dsn->category->name }}
                                        </div>
                                      </div>
                                    </li>      
                                    @endforeach   
                                  </ul>   
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="thucuong">
                  <div class="mu-tab-content-area">
                    <div class="row">

                      <div class="col-md-12">
                        <div class="mu-tab-content-left">
                          <ul class="mu-menu-item-nav">
                            @foreach($dish_drink as $dsd)
                            <li>
                              <div class="media">
                                <div class="media-left">
                                  <a href="#">
                                    <img style="border-radius: 10%" class="media-object" src="upload/dish/{{ $dsd->image}}" alt="img" width="110px" height="110px">
                                  </a>
                                </div>
                                <div class="media-body">
                                  <h4 class="media-heading"><a href="#">{{ $dsd->name }}</a></h4>
                                  <span class="mu-menu-price">{{ $dsd->note }}</span>
                                  <p>{{ $dsd->category->name }}
                                </div>
                              </div>
                            </li>      
                            @endforeach   
                          </ul>   
                        </div>
                      </div>
                    
                   </div>
                 </div>
                </div>
                <div class="tab-pane fade" id="salad">
                  <div class="mu-tab-content-area">
                    <div class="row">

                      <div class="col-md-12">
                        <div class="mu-tab-content-left">
                                                      
                            <ul class="mu-menu-item-nav">

                                @foreach($dish_salad as $dss)
                                @if(count($dish_salad) == 0)    
                                    <strong>Không có món nào</strong> 
                                @else                            
                                <li>
                                  <div class="media">
                                    <div class="media-left">
                                      <a href="#">
                                        <img style="border-radius: 10%" class="media-object" src="upload/dish/{{ $dss->image}}" alt="img" width="110px" height="110px">
                                      </a>
                                    </div>
                                    <div class="media-body">
                                      <h4 class="media-heading"><a href="#">{{ $dss->name }}</a></h4>
                                      <span class="mu-menu-price">{{ $dss->note }}</span>
                                      <p>{{ $dss->category->name }}
                                    </div>
                                  </div>
                                </li>    
                                @endif 
                                @endforeach   
                            </ul>                              
                        </div>
                      </div>
                    
                   </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>