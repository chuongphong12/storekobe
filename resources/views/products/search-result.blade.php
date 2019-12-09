@extends('master')

@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/css/star-rating.min.css" media="all"
  rel="stylesheet" type="text/css" />
@endsection

@section('content')
<!-- Breadcrumb area Start -->
<section class="page-title-area bg-image ptb--80" data-bg-image="assets/img/bg/page_title_bg.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="page-title">Search Result</h1>
        <ul class="breadcrumb">
          <li><a href="{{route('trang-chu')}}">Homepage</a></li>
          <li class="current"><span>Search</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- Breadcrumb area End -->

<!-- Main Content Wrapper Start -->
<div class="main-content-wrapper">
  <div class="shop-page-wrapper ptb--80">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 col-lg-8 order-lg-2 mb-md--50">
          <div class="shop-toolbar mb--50">
            <div class="row align-items-center">
              <div class="col-md-5 mb-sm--30 mb-xs--10">
              </div>
              <div class="col-md-7">
                <div
                  class="shop-toolbar__right d-flex justify-content-md-end justify-content-start flex-sm-row flex-column">
                  <p class="product-pages">Found {{count($products)}} has the keyword of
                    "{{request()->input('search')}}"</p>
                </div>
              </div>
            </div>
          </div>
          <div class="shop-products">
            <div class="row">
              <!--Product-->
              @foreach($products as $product)
              <div class="col-xl-4 col-sm-6 mb--50">
                <div class="ft-product">
                  <div class="product-inner">
                    <div class="product-image">
                      <figure class="product-image--holder">
                        <img src="{{Voyager::image($product->image)}}" alt="Product" />
                      </figure>
                      <figure class="product-image--replace">
                        <img src="{{Voyager::image($product->image)}}" alt="Product" />
                      </figure>
                      @if ($product->product_type == 4)
                      <a href="{{route('sua')}}" class="product-overlay"></a>
                      @else
                      <a href="{{route('product',$product->slug)}}" class="product-overlay"></a>
                      <div class="product-action">
                        <a data-toggle="modal" data-target="#{{$product->slug}}"
                          class="action-btn d-none d-sm-none d-md-block">
                          <i class="fa fa-eye"></i>
                        </a>
                      </div>
                      @endif
                    </div>
                    <div class="product-info">
                      <h3 class="product-title">
                        <a href="{{route('product',$product->slug)}}">{{$product->name}}</a>
                      </h3>
                      <div class="product-info-bottom">
                        <div class="product-price-wrapper">
                          <span class="money">{{number_format($product->price,0)}}₫/kg</span>
                        </div>
                        <a href="{{route('cart.add', $product->id)}}" class="add-to-cart pr--15">
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
          <nav class="pagination-wrap">{{$products->links()}}
          </nav>
        </div>
        @include('layouts.sidemenu')
      </div>
    </div>
  </div>
</div>
<!-- Main Content Wrapper Start -->

<!-- Quick View Modal Start -->
@include('layouts.quickviewmodel')
<!-- Quick View Modal End -->
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/js/star-rating.min.js"
  type="text/javascript"></script>
@endsection