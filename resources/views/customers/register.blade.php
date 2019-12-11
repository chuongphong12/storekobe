@extends('master')
@section('content')
<!-- Main Content Wrapper Start -->
<div class="main-content-wrapper">
  <div class="page-content-inner pt--105 pb--120">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <div class="register-box">
            <h4 class="wow tada heading__tertiary mb--30 text-center">Register</h4>
            <form class="wow slideInUp form form--login" action="{{route('Pregister')}}" method="post">
              @csrf
              <!--@if(Session::has('thongbao'))-->
              <!--<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>-->
              <!--<div class="alert alert-success">{{Session::get('thongbao')}}</div>-->
              <!--@endif-->
              <div class="form__group mb--20" {{ $errors->has('cusname') ? 'has-error' : '' }}>
                <label class="form__label" for="register_name">Fullname: <span class="required">*</span></label>
                <input type="text" class="form__input" id="register_name" name="cusname" placeholder="Your fullname..."
                  value="{{ old('cusname') }}" />
                @if ($errors->has('cusname'))
                <span class="text-danger">{{ $errors->first('cusname') }}</span>
                @endif
              </div>
              <div class="form__group mb--20" {{ $errors->has('phone') ? 'has-error' : '' }}>
                <label class="form__label" for="register_tel">Phone <span class="required">*</span></label>
                <input type="number" class="form__input" id="register_tel" name="phone" placeholder="Your phone number"
                  value="'{{ old('phone') }}" />
                @if ($errors->has('phone'))
                <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
              </div>
              <div class="form__group mb--20" {{ $errors->has('email') ? 'has-error' : '' }}>
                <label class="form__label" for="email">Email <span class="required">*</span></label>
                <input type="email" class="form__input" id="email" name="email" placeholder="Your email"
                  value="{{ old('email') }}" />
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
              </div>
              <div class="form__group mb--20" {{ $errors->has('password') ? 'has-error' : '' }}>
                <label class="form__label" for="register_password">Password <span class="required">*</span></label>
                <input type="password" class="form__input" id="register_password" name="password"
                  placeholder="Your password" />
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
              </div>
              <div class="form__group mb--20" {{ $errors->has('re_password') ? 'has-error' : '' }}>
                <label class="form__label" for="re_password">Confirm password
                  <span class="required">*</span></label>
                <input type="password" class="form__input" id="re_password" name="re_password"
                  placeholder="Re-type your password" />
                @if ($errors->has('re_password'))
                <span class="text-danger">{{ $errors->first('re_password') }}</span>
                @endif
              </div>
              <p class="privacy-text mb--20">
                When you click Register, you agree to make all purchases under
                <a href="#" style="color:#EB1B21;">the terms of use and policies of Kobe Vietnam</a>
              </p>
              <div class="form__group">
                <input type="submit" value="Register" class="btn btn-size-sm mr-2" />
              </div>
              <br />
              <a class="forgot-pass" href="{{route('login')}}">You already have a account? Logging in</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Main Content Wrapper Start -->
@endsection