@extends('master')

@section('style')
<style>
  .nice-select .current {
    width: 233px;
  }
</style>
@endsection

@section('content')
<!-- Breadcrumb area Start -->
<section class="page-title-area bg-image ptb--80" data-bg-image="assets/img/bg/page_title_bg.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="wow tada page-title">My account</h1>
        <ul class="breadcrumb">
          <li><a href="{{route('trang-chu')}}">Homepage</a></li>
          <li class="current"><span>Account</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- Breadcrumb area End -->

<!-- Main Content Wrapper Start -->
<div class="main-content-wrapper">
  <div class="page-content-inner ptb--80 ptb-md--60 pb-sm--55">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="user-dashboard-tab flex-column flex-md-row">
            @if (Auth::user()->role_id == 1)
            <div class="user-dashboard-tab__head nav flex-md-column" role="tablist" aria-orientation="vertical">
              <a class="nav-link active" data-toggle="pill" role="tab" href="#dashboard" aria-controls="dashboard"
                aria-selected="true">Main page</a>
              <!--<a class="nav-link" href="{{route('logout')}}" onclick="alert('Xác nhận đăng xuất khỏi hệ thống?')">Đăng xuất</a>-->
              <a class="nav-link logout">Logout</a>

            </div>
            <div class=" user-dashboard-tab__content tab-content">
              <div class="tab-pane fade show active" id="dashboard">
                <p>Hello <strong>{{Auth::user()->name}}</strong> (not
                  <strong>{{Auth::user()->name}}</strong>?
                  <a href="{{ route('logout') }}">Log out</a>)
                </p>
                <p>From your account dashboard. you can easily check &amp; view your <a
                    href="{{route('voyager.dashboard')}}">Admin Dashboard</a>.
                </p>
              </div>
            </div>
            @else
            <div class="user-dashboard-tab__head nav flex-md-column" role="tablist" aria-orientation="vertical">
              <a class="nav-link" data-toggle="pill" role="tab" href="#orders" aria-controls="orders"
                aria-selected="true">Order</a>
              <a class="nav-link" data-toggle="pill" role="tab" href="#addresses" aria-controls="addresses"
                aria-selected="true">Address</a>
              <a class="nav-link active" data-toggle="pill" role="tab" href="#accountdetails"
                aria-controls="accountdetails" aria-selected="true">Account Detail</a>
              <!--<a class="nav-link" href="{{route('logout')}}"-->
              <!--  onclick="alert('Xác nhận đăng xuất khỏi hệ thống?')">Đăng xuất</a>-->
              <a class="nav-link logout"">Logout</a>
            </div>
            <div class=" user-dashboard-tab__content tab-content">
                <div class="tab-pane fade" id="orders">
                  <div class="message-box mb--30 d-none">
                    <p><i class="fa fa-check-circle"></i>No order has been made</p>
                    <a href="{{route('shop')}}">Start Shoping Now</a>
                  </div>
                  <div class="table-content table-responsive">
                    <table class="table text-center">
                      <thead>
                        <tr>
                          <th>Order</th>
                          <th>Date</th>
                          <th>Status</th>
                          <th>Total</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($order as $item)
                        <tr>
                          <td>{{$item->name}}</td>
                          <td class="wide-column">{{$item->created_at}}</td>
                          <?php $status = DB::table('statuses')->where('id', $item->status)->first(); ?>
                          <td>{{$status->name}}</td>
                          <td class="wide-column">{{number_format($item->total,0)}}đ</td>
                          <td><a href="{{route('order.detail', $item->id)}}" class="btn btn-size-md">Detail</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="addresses">
                  <p class="mb--20">The address below will be used as the default address at checkout.</p>
                  <div class="row">
                    <div class="col-md-8 mb-sm--20">
                      <div class="text-block">
                        <h4 class="mb--20">Shipping Address</h4>
                        <br>
                        @if (!empty($cus['address']))
                        <?php 
                        $prov = DB::table('province')->where('provinceid', $cus['province'])->first();
                        $dis = DB::table('district')->where('districtid', $cus['district'])->first();
                      ?>
                        <h4>{{$cus['address']}}, {{$dis->name}}, {{$prov->name}}</h4>
                        @else
                        <p>You have not added your shipping address.</p>
                        @endif
                        <div class="shipping-calculator-wrap">
                          <a href="#edit_address" class="expand-btn">Edit</a>
                          <form id="edit_address" class="form shipping-calculator-form hide-in-default"
                            action="{{route('cus.address', $cus['id'])}}" method="POST">
                            @csrf
                            <div class="form-row mb--20">
                              <div class="form__group mb--10">
                                <select id="billing_provinces" name="province" class="form__input">
                                  @if(empty($cus['province']))
                                  <option value="0" selected disable>Choose City.....</option>
                                  @else
                                  <option value="{{$cus['province']}}" selected>{{$prov->name}}</option>
                                  @endif

                                  @foreach ($province as $item)
                                  <option value="{{$item->provinceid}}">{{$item->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form__group mb--10" id="billing_districts">

                                <select name="district" class="form__input">
                                  @if(empty($cus['district']))
                                  <option value="0" selected disabled>Choose District.....</option>
                                  @else
                                  <option value="{{$cus['district']}}" selected>{{$dis->name}}</option>
                                  @endif
                                </select>
                              </div>
                              <input type="text" name="address" id="calc_shipping_city" class="form__input"
                                placeholder="Address and street name" value="{{ $cus['address'] }}">
                            </div>
                            <div class="form__group">
                              <input type="submit" value="Update" class="btn btn-size-sm">
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade active" id="accountdetails">
                  @include('error.flash-message')
                  <form id="cus-infor" action="{{route('cus.edit', $cus['id'])}}" method="POST"
                    class="form form--account">
                    @csrf
                    <div class="row mb--20">
                      <div class="col-md-6 mb-sm--20">
                        <div class="form__group">
                          <label class="form__label" for="f_name">Fullname <span class="required">*</span></label>
                          <input type="text" name="fullname" id="f_name" class="form__input" value="{{ $cus['name'] }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form__group">
                          <label class="form__label" for="l_name">Phone number <span class="required">*</span></label>
                          <input type="text" name="phone" id="l_name" class="form__input" value="{{ $cus['phone'] }}">
                        </div>
                      </div>
                    </div>
                    <div class="row mb--20">
                      <div class="col-12">
                        <div class="form__group">
                          <label class="form__label" for="email">Email address: <span class="required">*</span></label>
                          <input type="email" name="email" id="email" class="form__input" value="{{ $cus['email'] }}"
                            readonly>
                        </div>
                      </div>
                    </div>
                  </form>
                  @if (empty(Auth::user()->provider_id))
                  <form id="password" action="{{route('cus.password', Auth::id())}}" method="POST"
                    class="form form--account">
                    @csrf
                    <fieldset class="form__fieldset mb--20">
                      <legend class="form__legend">Change password</legend>
                      <div class="row mb--20">
                        <div class="col-12">
                          <div class="form__group">
                            <label class="form__label" for="cur_pass">Current Password
                              (Leave empty if unchange)</label>
                            <input type="password" name="cur_pass" id="cur_pass" class="form__input">
                          </div>
                        </div>
                      </div>
                      <div class="row mb--20">
                        <div class="col-12">
                          <div class="form__group">
                            <label class="form__label" for="new_pass">New password
                              (Leave empty if unchange)</label>
                            <input type="password" name="new_pass" id="new_pass" class="form__input">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <div class="form__group">
                            <label class="form__label" for="conf_new_pass">Confirm new password</label>
                            <input type="password" name="conf_new_pass" id="conf_new_pass" class="form__input">
                          </div>
                        </div>
                      </div>
                    </fieldset>
                  </form>
                  @endif
                  <div class="row">
                    <div class="col-12 d-flex">
                      <div class="form__group">
                        <input id="edit-btn" type="submit" value="Save Information" class="btn btn-size-md">
                      </div>
                      @if (empty(Auth::user()->provider_id))
                      <div class="form__group ml--20">
                        <input id="password-btn" type="submit" value="Update Password" class="btn btn-size-md">
                      </div>
                      @endif
                    </div>
                  </div>
                </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Main Content Wrapper Start -->
@endsection

@section('script')

<script>
  $(document).ready(function(){
	$(".logout").click(function() {
		if(confirm('Do you want to logout?')) {
            location.href = '{{ route('logout') }}';
        }
    });
    
    $("#edit-btn").click(function() {
        $('#cus-infor').submit()
    });
    
    $("#password-btn").click(function() {
        $('#password').submit()
    });
    
    $('#billing_provinces').on('change', function() {
        var province_id = $(this).val();
        console.log(province_id);

        if(province_id) {
            $.get('districts/' + province_id, function(data) {
                console.log(data);

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