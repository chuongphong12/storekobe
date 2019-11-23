@extends('master')

@section('style')
<style>
  .cart {
    margin: 0 150px;
  }

  @media (max-width: 768px) {
    .cart {
      margin: 0 20px !important;
    }
  }
</style>
@endsecion

@section('content')
<div class="page-content-inner ptb--80 pt-md--40 pb-md--60">
  <div class="container-fuild cart">
    <div class="row">
      <div class="col-lg-8 mb-md--50">
        <div class="row no-gutters">
          <div class="col-12">
            <div class="table-content table-responsive">
              <table class="table text-center">
                <thead>
                  <tr>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th class="text-left">Product</th>
                    <th>Weight</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Style</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $count = 1; ?>
                  @foreach (Cart::content() as $item)
                  <tr>
                    <td class="product-remove text-left"><a href="{{route('cart.remove', $item->rowId)}}"><i
                          class="fa fa-remove"></i></a></td>
                    <td class="product-thumbnail text-left">
                      <img src="{{Voyager::image($item->model->image)}}" alt="Product Thumnail">
                    </td>
                    <td class="product-name text-left">
                      <h3>
                        <a href="{{route('product', $item->model->slug)}}">{{$item->name}}.</a>
                      </h3>
                    </td>
                    <td class="product-size">
                      <span class="product-price-wrapper">
                        @if($item->model->type == 4)
                        @if($item->options->size == 2)
                        <span class="money">500ml</span>
                        @else
                        <span class="money">1000ml</span>
                        @endif
                        @else
                        @if($item->options->size == 1)
                        <span class="money">250gr</span>
                        @elseif($item->options->size == 2)
                        <span class="money">500gr</span>
                        @else
                        <span class="money">1kg</span>
                        @endif
                        @endif
                      </span>
                    </td>
                    <td class="product-price">
                      <span class="product-price-wrapper">
                        <span class="money">{{number_format($item->price,0)}}₫</span>
                      </span>
                    </td>
                    <td class="product-quantity">
                      <div class="cart_quantity">
                        <input type="number" class="quantity-input" name="qty" id="upCart<?php echo $count; ?>"
                          value="{{$item->qty}}" min="1">
                      </div>
                      <input type="hidden" name="rowId" id="rowId<?php echo $count; ?>" value="{{$item->rowId}}">
                      <input type="hidden" name="proId" id="proId<?php echo $count; ?>" value="{{$item->id}}">
                      <input type="hidden" name="amount" id="amount<?php echo $count; ?>"
                        value="{{$item->model->store}}">
                    </td>
                    <td class="product-style">
                      @if($item->model->type == 4)

                      @else
                      <span class="product-price-wrapper">
                        <form action="{{route('cart.upStyle', $item->rowId)}}" method="POST"
                          id="upStyle<?php echo $count; ?>">
                          @csrf
                          @if ($item->weight == 1)
                          <input type="radio" id="style<?php echo $count; ?>" name="style" value="1" checked>Whole</br>
                          <input type="radio" id="style<?php echo $count; ?>" name="style" value="2">Slice
                          @else
                          <input type="radio" id="style<?php echo $count; ?>" name="style" value="1">Whole</br>
                          <input type="radio" id="style<?php echo $count; ?>" name="style" value="2" checked>Slice
                          @endif
                        </form>
                      </span>
                      @endif
                    </td>
                    <td class="product-total-price">
                      <span class="product-price-wrapper">
                        <span class="money">{{number_format($item->qty * $item->price, 0)}}₫</span>
                      </span>
                    </td>
                  </tr>
                  <?php $count++; ?>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="row no-gutters border-top pt--20 mt--20">
          {{-- <div class="col-sm-6">
            <div class="coupon">
              <input type="text" id="coupon" name="coupon" class="cart-form__input" placeholder="Mã khuyến mãi">
              <button type="submit" class="cart-form__btn">Apply</button>
            </div>
          </div> --}}
          <div class="col-sm-12 text-sm-right">
            <a type="text" href="{{route('cart.index')}}" class="cart-form__btn">Update Price</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="cart-collaterals">
          <div class="cart-totals">
            <h5 class="font-size-14 font-bold mb--15">Total of your cart</h5>
            <div class="cart-calculator">
              <div class="cart-calculator__item">
                <div class="cart-calculator__item--head">
                  <span>Subtotal</span>
                </div>
                <div class="cart-calculator__item--value">
                  <span>{{Cart::subtotal(0,'.',',')}}₫</span>
                </div>
              </div>
              <div class="cart-calculator__item">
                <div class="cart-calculator__item--head">
                  <span>Shipping</span>
                </div>
                <div class="cart-calculator__item--value">
                  <span>There is a fee when completing the order</span>
                </div>
              </div>
              <div class="cart-calculator__item order-total">
                <div class="cart-calculator__item--head">
                  <span>Total</span>
                </div>
                <div class="cart-calculator__item--value">
                  <span class="product-price-wrapper">
                    <span class="money">{{Cart::total(0,'.',',')}}₫</span>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <a href="{{Session::get('url.intended')}}" class="btn btn-size-md btn-shape-square btn-fullwidth">
            Keep Shopping
          </a>
          <hr>
          <a id="checkout" href="{{route('checkout')}}" class="btn btn-size-md btn-shape-square btn-fullwidth">
            Process Checkout
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  $(document).ready(function() {
        <?php for ($i = 1; $i < 100; $i++) { ?>
        $('#upCart<?php echo $i ?>').on('click change keyup', function() {
            var newqty = $('#upCart<?php echo $i ?>').val();
            var rowId = $('#rowId<?php echo $i ?>').val();
            var proId = $('#proId<?php echo $i ?>').val();
            var amount = $('#amount<?php echo $i ?>').val();
            var checkout = document.getElementById("checkout");

            if (newqty <= 0) {
                checkout.hidden = true;
                alert('Please choose quantity!');
            } else if(newqty > amount) {
                checkout.hidden = true;
                alert('Max quantity reach!');
            } else {
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '<?php echo url('/cart/update'); ?>/' + proId,
                    data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
                    success: function(response) {
                        // console.log(response);
                        // $('#updateDiv').html(response);
                    }
                });
            }
        });
        <?php  } ?>

    <?php for ($i = 1; $i < 100; $i++) { ?>
        $("input[id='style<?php echo $i ?>']").change(function() {
            $.post($("#upStyle<?php echo $i ?>").attr("action"), $("#upStyle<?php echo $i ?>").serialize(),
                function() {
                alert('Update style success!!');
            });
        });
    <?php  } ?>
    });
</script>

@endsection