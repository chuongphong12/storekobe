@extends('master')

@section('style')
<style>
  .btn {
    display: flex;
    justify-content: center;
  }

  .loading {
    font-size: 0;
    border: 3px solid #ffffff;
    border-radius: 50%;
    border-left-color: transparent;
    width: 25px;
    height: 25px;
    -webkit-animation: spin 2s linear infinite;
    /* Safari */
    animation: spin 2s linear infinite;
  }

  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
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
        <h1 class="page-title">Checkout Page</h1>
        <ul class="breadcrumb">
          <li><a href="{{route('trang-chu')}}">Homepage</a></li>
          <li class="current"><span>Checkout</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- Breadcrumb area End -->

<!-- Main Content Wrapper Start -->
<div class="main-content-wrapper">
  <div class="page-content-inner pt--80 pt-md--60 pb--72 pb-md--60">
    <div class="container">
      <div class="row">
        <!-- Checkout Area Start -->
        <div class="col-lg-6">
          <div class="checkout-title mt--10">
            <h2>Your order detail</h2>
          </div>
          <div class="checkout-form">
            @if (Auth::check())
            <form action="{{route('Pcheckout')}}" id="cus_infor" method="post" class="form form--checkout">
              @csrf
              <div class="form-row mb--20">
                <div class="form__group col-12">
                  <label for="billing_fname" class="form__label">Họ Tên <span class="required">*</span></label>
                  <input type="text" name="name" id="billing_fname" value="{{$cus->name}}" class="form__input">
                </div>
              </div>
              <div class="form-row mb--20">
                <div class="form__group col-12">
                  <?php 
                    $prov = DB::table('province')->where('provinceid', $cus->province)->first(); 
                  ?>
                  <label for="billing_provinces" class="form__label">Province <span class="required">*</span></label>
                  <select id="billing_provinces" name="billing_provinces" class="form__input">
                    @if(empty($cus->province))
                    <option value="0" selected disable>Your City...</option>
                    @else
                    <option value="{{$cus->province}}" selected>{{$prov->name}}</option>
                    @endif
                    @foreach ($provinces as $province)
                    <option value="{{$province->provinceid}}">{{$province->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-row mb--20">
                <div class="form__group col-12" id="billing_districts">
                  <?php 
                    $dis = DB::table('district')->where('districtid', $cus->district)->first();
                  ?>
                  <label for="billing_districts" class="form__label">District <span class="required">*</span></label>
                  <select name="billing_districts" id="billing_districts" class="form__input">
                    @if(empty($cus->district))
                    <option value="0" selected disabled>Your District...</option>
                    @else
                    <option value="{{$cus->district}}" selected>{{$dis->name}}</option>
                    @endif
                  </select>
                </div>
              </div>
              <div class="form-row mb--20">
                <div class="form__group col-12">
                  <label for="billing_streetAddress" class="form__label">Address <span class="required">*</span></label>
                  <input type="text" name="address" id="billing_streetAddress" class="form__input mb--30"
                    placeholder="Your full path address..." value="{{$cus->address}}">
                </div>
              </div>
              <div class="form-row mb--20">
                <div class="form__group col-12">
                  <label for="billing_phone" class="form__label">Phone number <span class="required">*</span></label>
                  <input type="text" name="phone" id="billing_phone" class="form__input" value="{{$cus->phone}}">
                </div>
              </div>
              <div class="form-row mb--20">
                <div class="form__group col-12">
                  <label for="billing_email" class="form__label">Email <span class="required">*</span></label>
                  <input type="email" name="email" id="billing_email" class="form__input" value="{{$user->email}}">
                </div>
              </div>
            </form>
            @else
            <form action="{{route('Pcheckout')}}" id="cus_infor" method="post" class="form form--checkout">
              @csrf
              <div class="form-row mb--20">
                <div class="form__group col-12">
                  <label for="billing_fname" class="form__label">Fullname <span class="required">*</span></label>
                  <input type="text" name="name" id="billing_fname" class="form__input">
                </div>
              </div>
              <div class="form-row mb--20">
                <div class="form__group col-12">
                  <label for="billing_provinces" class="form__label">Province <span class="required">*</span></label>
                  <select id="billing_provinces" name="billing_provinces" class="form__input">
                    <option value="" selected disabled>Your City...</option>
                    @foreach ($provinces as $province)
                    <option value="{{$province->provinceid}}">{{$province->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-row mb--20">
                <div class="form__group col-12" id="billing_districts">
                  <label for="billing_districts" class="form__label">District <span class="required">*</span></label>
                  <select name="billing_districts" id="billing_districts" class="form__input">
                    <option value="" selected disabled>Your District...</option>
                  </select>
                </div>
              </div>
              <div class="form-row mb--20">
                <div class="form__group col-12">
                  <label for="billing_streetAddress" class="form__label">Address <span class="required">*</span></label>
                  <input type="text" name="address" id="billing_streetAddress" class="form__input mb--30"
                    placeholder="Your full path address">
                </div>
              </div>
              <div class="form-row mb--20">
                <div class="form__group col-12">
                  <label for="billing_email" class="form__label">Email <span class="required">*</span></label>
                  <input type="email" name="email" id="billing_email" class="form__input" value="{{ old('email') }}">
                </div>
              </div>
              <div class="form-row mb--20">
                <div class="form__group col-12">
                  <label for="billing_phone" class="form__label">Phone number <span class="required">*</span></label>
                  <input type="text" name="phone" id="billing_phone" class="form__input" value="{{ old('phone') }}">
                </div>
              </div>
            </form>
            @endif
          </div>
        </div>
        <div class="col-xl-5 offset-xl-1 col-lg-6 mt-md--40">
          <div class="order-details">
            <div class="checkout-title mt--10">
              <h2>Your Order</h2>
            </div>
            <div class="table-content table-responsive mb--30">
              <table class="table order-table order-table-2">
                <thead>
                  <tr>
                    <th>Product</th>
                    <th class="text-right">Total</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($cart as $item)
                  <tr>
                    <th>{{$item->name}}
                      <strong><span>&#10005;</span>{{$item->qty}}</strong>
                      @if($item->model->type == 4)
                      @if($item->options->size == 2)
                      <strong><span>-</span>500ml</strong>
                      @else
                      <strong><span>-</span>1000ml</strong>
                      @endif
                      @else
                      @if($item->options->size == 1)
                      <strong><span>-</span>250gr</strong>
                      @elseif($item->options->size == 2)
                      <strong><span>-</span>500gr</strong>
                      @else
                      <strong><span>-</span>1kg</strong>
                      @endif
                      @endif
                    </th>
                    <td class="text-right">{{number_format($item->qty * $item->price,0)}}₫</td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr class="cart-subtotal">
                    <th>Subtotal:</th>
                    <td class="text-right">{{Cart::subtotal(0)}}₫</td>
                  </tr>
                  <tr class="shipping">
                    <th>Shipping:</th>
                    <td class="text-right">
                      <span>There is a fee when completing the order</span>
                    </td>
                  </tr>
                  <tr class="order-total">
                    <th>Total:</th>
                    <td class="text-right"><span class="order-total-ammount">{{Cart::total(0)}}₫</span></td>
                    <input type="text" value="{{Cart::total()}}" name="total" hidden>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="checkout-payment">
              <form action="{{route('Pcheckout')}}" id="payment" method="post" class="payment-form">
                <div class="payment-group mb--10">
                  <div class="payment-radio">
                    <input type="radio" value="bank" name="payment_method" id="bank" checked>
                    <label class="payment-label" for="bank">Bank Tranfer</label>
                  </div>
                  <div class="payment-info">
                    <p>Account name: CONG TY CO PHAN BO KOBE VN</p>
                    <p>Account number: <strong>05000744xxx</strong></p>
                    <p>Bank: SACOMBANK</p>
                  </div>
                </div>
                <div class="payment-group mb--10">
                  <div class="payment-radio">
                    <input type="radio" value="cash" name="payment_method" id="cash">
                    <label class="payment-label" for="cash">
                      Cash on delivery
                    </label>
                  </div>
                </div>
              </form>
              <div class="payment-group mt--20">
                <button type="button" id="submit" class="btn btn-size-md btn-fullwidth">
                  <div class="none">Order</div>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- Checkout Area End -->
      </div>
    </div>
  </div>
</div>
<!-- Main Content Wrapper Start -->

@endsection

@section('script')
<script>
  $(document).ready(function() {

    $("#submit").click(function() {
        $('#submit').prop('disabled', true);
        $('.none').addClass('loading');

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        
    $.post($("#payment").attr("action"), $("#cus_infor,#payment").serialize(),
        function() {
        })
        .done(function() {
            window.location.href = "{{route('success')}}";
        })
        .fail(function(xhr, status, error) {
            var err = JSON.parse(xhr.responseText);
            if(err.errors){
                alert("Vui lòng điền đầy đủ thông tin trước khi tiến hành đặt hàng!!!");
            }
            $('.none').removeClass('loading');
            $('#submit').prop('disabled', false);
        })
    });

    $('#billing_provinces').on('change', function() {
        var province = $(this).val();
        // console.log(province);

        if(province) {
            $.get('districts/' + province, function(data) {
                // console.log(data);

                $('#billing_districts select').empty();

                $.each(data, function(index, item) {
                    $('#billing_districts select').append('<option value="' + item.districtid + '">' + item.name + '</option>');
                });
            });
        } else {
            $('#billing_districts select').empty();
        }
    });
});
</script>

@endsection