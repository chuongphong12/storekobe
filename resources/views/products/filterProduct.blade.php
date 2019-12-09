@extends('master')

@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/css/star-rating.min.css" media="all"
  rel="stylesheet" type="text/css" />

<style>
  .page-title,
  .breadcrumb li span,
  .shop-page-wrapper * {
    color: #ffc775 !important;
  }

  .shop-page-wrapper {
    background-color: #231f20;
  }

  .pagination li .page-number {
    background-color: #151515 !important;
  }

  .nice-select.product-ordering__select * {
    color: #151515 !important;
  }

  .dot,
  .product-ordering__select.nice-select:after {
    background-color: #151515 !important;
  }
</style>
@endsection

@section('content')
<!-- Breadcrumb area Start -->

<section class="page-title-area bg-image ptb--80" data-bg-image="assets/img/bg/page_title_bg.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="page-title">Filter Product</h1>
        <ul class="breadcrumb">
          <li><a href="{{route('trang-chu')}}">Homepage</a></li>
          <li class="current"><span>Product</span></li>
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
                <div class="shop-toolbar__left">
                  {{-- <div class="product-ordering">
                    <select id="orderId" class="product-ordering__select nice-select">
                      <option value="0">Default</option>
                      <option value="1">From A - Z</option>
                      <option value="2">From Z - A</option>
                      <option value="3">Low -> High Price</option>
                      <option value="4">High -> Low Price</option>
                    </select>
                  </div> --}}
                </div>
              </div>
              <div class="col-md-7">
                <div
                  class="shop-toolbar__right d-flex justify-content-md-end justify-content-start flex-sm-row flex-column">
                  <div class="product-view-mode ml--50 ml-xs--0">
                    <a class="active" href="#" data-target="grid">
                      <i class="fa fa-th fa-lg"></i>
                    </a>
                    <a href="#" data-target="list" class="">
                      <i class="fa fa-th-list fa-lg"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="shop-products">
            <div id="getOrder" class="row">
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
                      <a href="{{route('product',$product->slug)}}" class="product-overlay"></a>
                      <div class="product-action">
                        <a data-toggle="modal" data-target="#{{$product->slug}}"
                          class="action-btn d-none d-sm-none d-md-block">
                          <i class="fa fa-eye"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-info">
                      <h3 class="product-title">
                        <a href="{{route('product',$product->slug)}}">{{$product->name}}</a>
                      </h3>
                      <div class="product-info-bottom">
                        <div class="product-price-wrapper">
                          <span class="money">{{number_format($product->price,0)}}₫/kg</span>
                        </div>
                        @if ($product->store > 0)
                        <a href="{{route('cart.Qadd', $product->id)}}" class="add-to-cart pr--15">
                          <i class="fa fa-plus"></i>
                          <span><i class="fa fa-shopping-cart"></i></span>
                        </a>
                        @else
                        <span>Out of stock</i></span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                <div class="ft-product-list">
                  <div class="product-inner">
                    <figure class="product-image">
                      <a href="product-details.html">
                        <img src="{{Voyager::image($product->image)}}" alt="Products" />
                      </a>
                      <div class="product-thumbnail-action">
                        <a data-toggle="modal" data-target="#{{$product->slug}}" class="action-btn quick-view">
                          <i class="fa fa-eye"></i>
                        </a>
                      </div>
                    </figure>
                    <div class="product-info">
                      <h3 class="product-title mb--25">
                        <a href="{{route('product',$product->slug)}}">{{$product->name}}</a>
                      </h3>
                      <p class="unit-price">{{number_format($product->price,0)}}₫/kg</p>
                      @if ($product->store > 0)
                      <p class="product--in-stock">In Stock</p>
                      <div class="ft-product-action-list d-flex align-items-center">
                        <a href="{{route('cart.Qadd', $product->id)}}" class="btn btn-size-md">Add to cart</a>
                      </div>
                      @else
                      <p class="product--in-stock">Out of stock</p>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <nav class="pagination-wrap">
            <ul class="pagination">
              {{$products->links()}}
            </ul>
          </nav>
        </div>
        @include('layouts.sidemenu')
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

    <script>
      $( document ).ready(function() {
    $('#input-id').rating({
        showClear: false
    });

    $('#orderId').on('change',function() {
      var order_id = parseInt($(this).children("option:selected").val());

      $.get('ajaxOrder/'+ order_id, function(data) {
        $('#getOrder').html(data);
      })
    });
  });
    </script>
    @endsection