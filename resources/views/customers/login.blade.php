@extends('master')

<style>
  .alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
  }

  .closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
  }

  .closebtn:hover {
    color: black;
  }
</style>

@section('content')
<!-- Main Content Wrapper Start -->
<div class="main-content-wrapper">
  <div class="page-content-inner pt--105 pb--75">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb-sm--50 ml-auto mr-auto">
          <div class="login-box">
            <h3 class="wow tada heading__tertiary mb--30 text-center">
              Login
            </h3>
            <form class="wow fadeInLeft form form--login mb--70" action="{{route('Plogin')}}" method="post">
              @csrf
              <div class="form__group mb--20" {{ $errors->has('email') ? 'has-error' : '' }}>
                <label class="form__label" for="email">Email or phone number:
                  <span class="required">*</span></label>
                <input type="text" class="form__input" id="username_email" name="email" value="{{ old('email') }}" />
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
              </div>
              <div class="form__group mb--20" {{ $errors->has('password') ? 'has-error' : '' }}>
                <label class="form__label" for="password">Password <span class="required">*</span></label>
                <input type="password" class="form__input" id="login_password" name="password" />
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
              </div>
              <div class="d-flex align-items-center mb--20">
                <div class="form__group mr--30">
                  <input type="submit" value="Login" class="btn btn-size-sm" />
                </div>
                <div class="form__group">
                  <label class="form__label checkbox-label" for="store_session">
                    <input type="checkbox" name="remember_me" id="store_session" />
                    <span>Remmember me!</span>
                  </label>
                </div>
              </div>
              <a class="forgot-pass" href="{{route('register')}}">Don't hava a account? Register</a>
              <a class="forgot-pass float-right" href="{{route('password.request')}}">Forgot your password?</a>
            </form>
            <div class="social-login ptb--40 border-top">
              <p>Or you can use:</p>
              <ul>
                <li class="wow zoomInDown">
                  <a class="btn btn-size-sm btn-fullwidth mb--20" href="{{ route('fbredirect')}}"
                    style="background-color: rgb(59, 89, 152);">
                    <span class="logo__social">
                      <i class="fa fa-facebook fa-lg"></i>
                    </span>
                    Login in with Facebook</a>
                </li>
                <li class="wow zoomInDown">
                  <a class="btn btn-size-sm btn-fullwidth mb--20" href="{{ route('ggredirect')}}"
                    style="background-color: rgb(223, 74, 50)">
                    <span class="logo__social">
                      <i class="fa fa-google-plus fa-lg"></i>
                    </span>
                    Login in with Google</a>
                </li>
              </ul>
            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>

<!-- Main Content Wrapper Start -->

@endsection