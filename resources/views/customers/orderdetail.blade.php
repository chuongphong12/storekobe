@extends('master')
@section('content')
<!-- Breadcrumb area Start -->
<section class="page-title-area bg-image ptb--80" data-bg-image="assets/img/bg/page_title_bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title">Chi Tiết Đơn Hàng</h1>
                <ul class="breadcrumb">
                    <li><a href="{{ route('cus.detail', Auth::user()->id) }}">Đơn hàng</a></li>
                    <li class="current"><span>Chi tiết</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb area End -->

<div class="page-content-inner ptb--80 pt-md--40 pb-md--60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-md--50">
                <div class="row no-gutters">
                    <div class="col-12">
                        <div class="table-content table-responsive">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>Sản phẩm</th>
                                        <th>Khối lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Trạng thái</th>
                                        <th>Tổng cộng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detail as $item)
                                    <tr>
                                        <?php $product = DB::table('products')->where('id', $item->product_id)->get(); ?>
                                        <td class="product-thumbnail text-left">
                                            @foreach($product as $pro)
                                            <img src="{{Voyager::image($pro->image)}}" alt="Product Thumnail">
                                            @endforeach
                                        </td>
                                        <td class="product-name">
                                            <h3>
                                                @foreach($product as $pro)
                                                @if($pro->type == 4)
                                                <a href="{{route('sua')}}">{{$pro->name}}.</a>
                                                @else
                                                <a href="{{route('product', $pro->slug)}}">{{$pro->name}}.</a>
                                                @endif
                                                @endforeach
                                            </h3>
                                        </td>
                                        <td class="product-size">
                                            <span class="product-price-wrapper">
                                                @foreach($product as $pro)
                                                @if($pro->type == 4)
                                                @if($item->weight == 2)
                                                <span class="money">500ml</span>
                                                @else
                                                <span class="money">1000ml</span>
                                                @endif
                                                @else
                                                @if($item->weight == 1)
                                                <span class="money">250gr</span>
                                                @elseif($item->weight == 2)
                                                <span class="money">500gr</span>
                                                @else
                                                <span class="money">1kg</span>
                                                @endif
                                                @endif
                                                @endforeach
                                            </span>
                                        </td>
                                        <td class="product-price">
                                            <span class="product-price-wrapper">
                                                <span class="money">{{number_format($item->unit_price,0)}}₫</span>
                                            </span>
                                        </td>
                                        <td class="product-quantity">
                                            <span class="cart_quantity">
                                                <span class="money">{{$item->quantity}}</span>
                                            </span>
                                        </td>
                                        <td class="product-style">
                                            <span class="product-price-wrapper">
                                                @foreach($product as $pro)
                                                @if($pro->type == 4)

                                                @else
                                                @if($item->style == 1)
                                                <span class="money">Nguyên Khối</span>
                                                @else
                                                <span class="money">Thái Lát</span>
                                                @endif
                                                @endif
                                                @endforeach
                                            </span>
                                        </td>
                                        <td class="product-total-price">
                                            <span class="product-price-wrapper">
                                                <span
                                                    class="money">{{number_format($item->quantity * $item->unit_price, 0)}}₫</span>
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection