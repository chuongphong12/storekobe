@extends('master')

@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/css/star-rating.min.css" media="all"
  rel="stylesheet" type="text/css" />
  
<style>
  .product-description * {
    color: white !important;
  }

  .review__item {
    padding-bottom: 0px !important;
    padding-top: 0px !important;
    border-top: none !important;
  }

  .review__list {
    text-align: center
  }

  .rating-container.rating-lg.rating-animate {
    margin-top: 3%;
  }

  button.btn.btn-primary {
    margin-top: 2%;
    margin-bottom: 2%;
  }

  @media (max-width: 768px) {
    .review__list>h3 {
      margin-left: 0;
      text-align: center;
    }

    .rating-container.rating-lg.rating-animate {
      margin-top: 5%;
    }

    button.btn.btn-primary {
      margin-top: 4%;
      margin-bottom: 3%;
    }
  }
</style>
@endsection

@section('content')

<!-- Breadcrumb area Start -->
<section class="page-title-area bg-image ptb--80" data-bg-image="assets/img/bg/page_title_bg.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="page-title">Product Detail</h1>
        <ul class="breadcrumb">
          <li><a href="{{route('trang-chu')}}">Homepage</a></li>
          <li class="current"><span>{{$type->name}}</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- Breadcrumb area End -->

<!-- Main Content Wrapper Start -->
<div class="main-content-wrapper">
  <div class="page-content-inner pt--80 pt-md--60">
    <div class="container">
      <div class="row no-gutters mb--80 mb-md--57">
        <div class="col-lg-7 product-main-image">
          <div class="product-image">
            <div class="product-gallery vertical-slide-nav">
              <div class="product-gallery__large-image mb-sm--30">
                <div class="product-gallery__wrapper">
                  <div class="element-carousel main-slider image-popup" data-slick-options='{
                                                "slidesToShow": 1,
                                                "slidesToScroll": 1,
                                                "infinite": true,
                                                "arrows": false, 
                                                "asNavFor": ".nav-slider"
                                            }'>
                    <figure class="product-gallery__image zoom">
                      <img src="{{Voyager::image($product->image)}}" alt="Product">
                      <!--<span class="product-badge sale">Sale</span>-->
                      <div class="product-gallery__actions">
                        <button class="action-btn btn-zoom-popup"><i class="fa fa-eye"></i></button>
                        <!--<a href="https://www.youtube.com/watch?v=Rp19QD2XIGM" class="action-btn video-popup"><i class="fa fa-play"></i></a>-->
                      </div>
                    </figure>
                    {{-- <figure class="product-gallery__image zoom">
                      <img src="{{Voyager::image($product->multi_image)}}" alt="Product">
                    <!--<span class="product-badge sale">Sale</span>-->
                    <div class="product-gallery__actions">
                      <button class="action-btn btn-zoom-popup"><i class="fa fa-eye"></i></button>
                    </div>
                    </figure> --}}
                    <?php  $images = json_decode($product->multi_image); ?>
                    @if($images != null)
                    @foreach($images as $image)
                    <figure class="product-gallery__image zoom">
                      <img src="{{Voyager::image($image)}}" alt="Product">
                      <div class="product-gallery__actions">
                        <button class="action-btn btn-zoom-popup"><i class="fa fa-eye"></i></button>
                      </div>
                    </figure>
                    @endforeach
                    @endif
                  </div>
                </div>
              </div>
              <div class="product-gallery__nav-image">
                <div class="element-carousel nav-slider product-slide-nav slick-center-bottom" data-slick-options='{
                                            "spaceBetween": 10,
                                            "slidesToShow": 3,
                                            "slidesToScroll": 1,
                                            "vertical": true,
                                            "swipe": true,
                                            "verticalSwiping": true,
                                            "infinite": true,
                                            "focusOnSelect": true,
                                            "asNavFor": ".main-slider",
                                            "arrows": false,
                                            "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-up" },
                                            "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-down" }
                                        }' data-slick-responsive='[
                                            {
                                                "breakpoint":1200, 
                                                "settings": {
                                                    "slidesToShow": 2
                                                } 
                                            },
                                            {
                                                "breakpoint":992, 
                                                "settings": {
                                                    "slidesToShow": 3
                                                } 
                                            },
                                            {
                                                "breakpoint":767, 
                                                "settings": {
                                                    "slidesToShow": 4,
                                                    "vertical": false
                                                } 
                                            },
                                            {
                                                "breakpoint":575, 
                                                "settings": {
                                                    "slidesToShow": 3,
                                                    "vertical": false
                                                } 
                                            },
                                            {
                                                "breakpoint":480, 
                                                "settings": {
                                                    "slidesToShow": 2,
                                                    "vertical": false
                                                } 
                                            }
                                        ]'>
                  <figure class="product-gallery__nav-image--single">
                    <img src="{{Voyager::image($product->image)}}" alt="Products">
                  </figure>
                  @if($images != null)
                  @foreach($images as $image)
                  <figure class="product-gallery__nav-image--single">
                    <img src="{{Voyager::image($image )}}" alt="Products">
                  </figure>
                  @endforeach
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 offset-xl-1 col-lg-5 product-main-details mt-md--50">
          <div class="product-summary pl-lg--30 pl-md--0">
            <div class="product-rating d-flex mb--20">
              <input id="input-id" class="rating" value="{{ $product->AverageRating }}" data-size="sm" readonly>
            </div>
            <h3 class="product-title mb--20">{{$product->name}}</h3>
            <p class="product-short-description mb--20">
              {!! $product->short_des !!}
              <p class="unit-price">Unit price: {{number_format($product->price,0)}}/kg</p>
              @if ($product->store > 0)
              <p class="product--in-stock mb--30">In Stock</p>
              @else
              <p class="product--out-stock mb--30">Out of stock</p>
              @endif
              <form action="{{route('cart.add', $product->id)}}" method="POST" class="variation-form mb--20">
                @csrf
                <div class="product-size-variations d-flex align-items-center mb--15">
                  <p class="variation-label">Weight:</p>
                  <select name="weight" id="weight-select" class="weight">
                    <option value="1">250gr</option>
                    <option value="2">500gr</option>
                    <option value="3" selected>1kg</option>
                  </select>
                </div>

                <!-- <a href="" class="reset_variations">Clear</a> -->

                <div
                  class="product-action d-flex flex-sm-row align-items-sm-center flex-column align-items-start mb--30">
                  <div class="quantity-wrapper d-flex align-items-center mr--30 mr-xs--0 mb-xs--30">
                    <label class="quantity-label" for="qty">Quantity:</label>
                    <select class="quantity-input weight" name="qty" id="qty" value="1" min="1">
                      <?php 
                        for($i = 1; $i < 101; $i++)
                        {
                          echo "<option value=".$i.">".$i."</option> ";
                        }
                      ?>
                    </select>
                  </div>
                  @if ($product->store > 0)
                  <button type="submit" class="btn btn-shape-square btn-size-sm">
                    Add to cart <i class="fa fa-shopping-cart"></i>
                  </button>
                  @else
                  <button type="submit" class="btn btn-shape-square btn-size-sm" disabled>
                    Add to cart <i class="fa fa-shopping-cart"></i>
                  </button>
                  @endif
                </div>
                <div class="product-price-wrapper mb--25">
                  <span class="money" id="money_key">Total : {{number_format($product->price,0)}}₫</span>
                </div>
              </form>
          </div>
        </div>
      </div>
      <div class="row justify-content-center mb--77 mb-md--57">
        <div class="col-12">
          <div class="tab-style-2">
            <div class="nav nav-tabs mb--35 mb-sm--25" id="product-tab" role="tablist">
              <a class="nav-link active" id="nav-description-tab" data-toggle="tab" href="#nav-description" role="tab"
                aria-selected="true">
                <span>Product Information</span>
              </a>
              <a class="nav-link" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-selected="true">
                <span>Product specifications</span>
              </a>
              <a class="nav-link" id="nav-reviews-tab" data-toggle="tab" href="#nav-reviews" role="tab"
                aria-selected="true">
                <span>Review</span>
              </a>
            </div>
            <div class="tab-content" id="product-tabContent">
              <div class="tab-pane fade show active" id="nav-description" role="tabpanel"
                aria-labelledby="nav-description-tab">
                <div class="product-description">
                  {!! $product->description !!}
                </div>
              </div>
              <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                <div class="table-content table-responsive">
                  <table class="table shop_attributes">
                    <tbody>
                      <tr>
                        <th>Storage instructions</th>
                        <td>{{$product->preservation}}</td>
                      </tr>
                      <tr>
                        <th>User manual</th>
                        <td>Phù hợp với các món hầm</td>
                      </tr>
                      <tr>
                        <th>Packing</th>
                        <td>Khay</td>
                      </tr>
                      <tr>
                        <th>Origin</th>
                        <td>{{$product->source}}</td>
                      </tr>
                      <tr>
                        <th>Weight</th>
                        <td>
                          250gr, 500gr, 1kg
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab">
                <div class="product-reviews">
                  <ul class="review__list mb--40">
                    @if(Auth::check())
                    <h3>Hello {{Auth::user()->username}} please leave a review of {{$product->name}}</h3>
                    @else
                    <h3>Logging in to make a review {{$product->name}}</h3>
                    @endif
                    <li class="review__item">
                      <form action="{{ route('rating') }}" method="POST">
                        @csrf
                        <input name="rate" required class="rating" data-size="lg">
                        <input type="hidden" name="id" required="" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-primary">Review</button>&nbsp;
                      </form>
                      <div>{{$product->name}} has {{count($product->ratings)}} review from many customer
                      </div>
                    </li>
                  </ul>
                  <!-- Comment Area Start -->
                  <section class="comment">
                    <div class="fb-comments" data-href="{{route('product',$product->slug)}}" data-width="100%"
                      data-numposts="15"></div>
                  </section>
                  <!-- Comment Area End -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb--75 mb-md--55">
        <div class="col-12">
          <div class="element-carousel slick-vertical-center" data-slick-options='{
                                    "spaceBetween": 30,
                                    "slidesToShow": 4,
                                    "slidesToScroll": 1,
                                    "arrows": true,
                                    "autoplay": true,
                                    "autoplaySpeed": 3000,
                                    "pauseOnHover": true,
                                    "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                    "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                }' data-slick-responsive='[
                                    {"breakpoint":1199, "settings": {
                                        "slidesToShow": 3
                                    }},
                                    {"breakpoint":991, "settings": {
                                        "slidesToShow": 2
                                    }},
                                    {"breakpoint":575, "settings": {
                                        "slidesToShow": 1
                                    }}
                                ]'>
            @foreach ($products as $item)
            <div class="item">
              <div class="ft-product">
                <div class="product-inner">
                  <div class="product-image">
                    <figure class="product-image--holder">
                      <img src="{{Voyager::image($item->image)}}" alt="Product" />
                    </figure>
                    <a href="{{route('product',$item->slug)}}" class="product-overlay"></a>
                    <div class="product-action">
                      <a data-toggle="modal" data-target="#{{$item->slug}}" class="action-btn quick-view">
                        <i class="fa fa-eye"></i>
                      </a>
                    </div>
                  </div>
                  <div class="product-info">
                    <h3 class="product-title"><a href="{{route('product',$item->slug)}}">{{$item->name}}</a>
                    </h3>
                    <div class="product-info-bottom">
                      <div class="product-price-wrapper">
                        <span class="money1">{{number_format($item->price,0)}}₫</span>
                      </div>
                      <a href="{{route('cart.add', $item->id)}}" class="add-to-cart pr--15">
                        <i class="fa fa-plus"></i>
                        <span>Add to cart</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Main Content Wrapper End -->

<input type="hidden" name="unit-price" id="unit-price" value="{{$product->price}}">
<!-- Quick View Modal Start -->
@include('layouts.quickviewmodel')
<!-- Quick View Modal End -->
@endsection

@section('script')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
  src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0&appId=361055761450242&autoLogAppEvents=1">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/js/star-rating.min.js"
  type="text/javascript"></script>

<script>
  $( document ).ready(function() {
    
    $('#input-id').rating({
        showClear: false
    });
    
    $('.weight').change(function(){
      var weight = $('#weight-select').val()
      var unit_price = $('#unit-price').val()
      var number = $('#qty').val()
      
      $.ajax({
        method: "get",
        data: {
          weight:weight,
          unit_price:unit_price,
          number:number,
          "_token": "{{ csrf_token() }}"
          },
        url: "{{route('product-ajax')}}",
        dataType: "html",
        
        success: function(data){
            document.getElementById("money_key").innerHTML = data;
            
        }
        })
    })
    
  });
</script>
@endsection