@extends('master')

@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/css/star-rating.min.css" media="all"
  rel="stylesheet" type="text/css" />

<style>
  .main-content-wrapper {
    background-color: #fff;
  }

  button.btn.btn-shape-square.btn-size-sm {
    margin-top: -150px;
  }

  .product-title,
  .product-short-description,
  .money,
  .variation-form .variation-label,
  a.product-size-variation-btn,
  .product-footer-meta span,
  .product-footer-meta a,
  .tab-style-2 .nav-link,
  .product-description,
  .product-description p,
  tbody,
  th,
  .product-reviews p,
  .review__published-date,
  .review-form-wrapper label,
  .review__title {
    color: #3c4043 !important;
  }

  .product-reviews ul h3 {
    color: #3c4043 !important;
  }

  .product-reviews li {
    color: #3c4043 !important;
  }

  a.product-size-variation-btn:hover,
  a.product-size-variation-btn.selected,
  .product-footer-meta a:hover,
  .review__author {
    color: #ec4043 !important;
  }

  .variation-form .product-size-variations .product-size-variation-btn,
  .quantity-input,
  .form__input {
    border: 1px solid #e5e5e5 !important;
  }

  .review__item {
    padding-bottom: 0px !important;
    padding-top: 0px !important;
    border-top: none !important;
  }

  .review__list {
    text-align: center;
  }

  .rating-container.rating-lg.rating-animate {
    margin-top: 3%;
  }

  button.btn.btn-primary {
    margin-top: 2%;
    margin-bottom: 2%;
  }

  .footer {
    background-color: #100d0d;
  }
</style>
@endsection

@section('content')
<!-- Breadcrumb area Start -->
<section class="page-title-area bg-image ptb--80" data-bg-image="assets/img/bg/page_title_bg.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="page-title">Milk</h1>
        <ul class="breadcrumb">
          <li><a href="/">Homepage</a></li>
          <li class="current"><span>Milk </span></li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- Breadcrumb area End -->

<!-- Main Content Wrapper Start -->
<div class="main-content-wrapper">
  <div class="page-content-inner pt--80 pt-md--60 pb--70">
    <div class="container">
      <div class="row no-gutters mb--80 mb-md--57">
        <div class="col-lg-7 product-main-image">
          <div class="product-image">
            <div class="product-gallery">
              <div class="product-gallery__large-image mb--30">
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
                      <span class="product-badge sale">Sale</span>
                      <div class="product-gallery__actions">
                        <button class="action-btn btn-zoom-popup"><i class="fa fa-eye"></i></button>
                      </div>
                    </figure>
                  </div>
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
            <h3 class="product-title mb--15">{{$product->name}}</h3>
            <p class="product-short-description mb--40">
              {!!$product->description!!}</p>
            <h4 class="unit-price mb--15">Unit Price: {{number_format($product->price,0)}}đ/1000ml</h4>
            @if ($product->store > 0)
            <p class="product--in-stock mb--30">In Stock</p>
            @else
            <p class="product--out-stock mb--30">Out of stock</p>
            @endif
            <form action="{{route('cart.add', $product->id)}}" method="POST" class="variation-form mb--30">
              @csrf
              <div class="product-size-variations d-flex align-items-center mb--30">
                <p class="variation-label">Size:</p>
                <div class="product-size-variation variation-wrapper">
                  <div style="color: black">1000ml</div>
                  <input value="3" name="weight" hidden>
                </div>
              </div>
              <!-- <a href="" class="reset_variations">Clear</a> -->
              <div class="product-action d-flex flex-sm-row align-items-sm-center align-items-start mb--30">
                <div class="quantity-wrapper d-flex align-items-center mr--30 mr-xs--0 mb-xs--30">
                  <div class="quantity" for="qty">
                    <input type="number" class="quantity-input" name="qty" id="qty" value="1" min="1">
                  </div>
                </div>
              </div>
              <div class="product-price-wrapper mb--40">
                <span class="money_key" style="font-size: 32px">Total:
                  {{number_format($product->cost,0)}}₫</span>
              </div>
              @if ($product->store > 0)
              <button type="submit" class="btn btn-shape-square btn-size-sm">
                + Add to cart <i class="fa fa-shopping-cart"></i>
              </button>
              @else
              <button type="submit" class="btn btn-shape-square btn-size-sm" disabled>
                + Add to cart <i class="fa fa-shopping-cart"></i>
              </button>
              @endif
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
                <span>Product Specification</span>
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
                  {!!$product->description!!}
                </div>
              </div>
              <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                <div class="table-content table-responsive">
                  <table class="table shop_attributes">
                    <tbody>
                      <tr>
                        <th>Storage instructions</th>
                        <td>03 ngày trong ngăn mát tủ lạnh, 0 - 5 °C</td>
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
                        <td>Nhật Bản</td>
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
                      <div>{{$product->name}} has {{count($product->ratings)}} review from many customer</div>
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

                        <span class="money">{{number_format($item->price,0)}}₫</span>

                      </div>

                      <a href="{{route('cart.add', $item->id)}}" class="add-to-cart pr--15">

                        <i class="fa fa-plus"></i>

                        <span><i class="fa fa-shopping-cart"></i></span>

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
<input type="hidden" name="unit-price" id="unit-price" value="{{$item->price}}">
<!-- Main Content Wrapper End -->
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
    
    $('.weight').change(function(){
      var weight = $(this).val()
      var unit_price = $('#unit-price').val()
      $.ajax({
        method: "get",
        data: {
          weight:weight,
          unit_price:unit_price,
          "_token": "{{ csrf_token() }}"
          },
        url: "{{route('product-ajax')}}",
        dataType: "html",
        
          success: function(data){
            // do something with the data
            // console.log(data)
            
            document.getElementById("money_key").innerHTML = data;
            
        }
        })
    })
    
  });
</script>
@endsection