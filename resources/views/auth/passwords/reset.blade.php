@extends('master')

@section('content')
<!-- Main Content Wrapper Start -->
<div class="main-content-wrapper">
  <div class="page-content-inner pt--105 pb--120">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <div class="register-box">
            <h4 class="heading__tertiary mb--30 text-center">Đặt lại mật khẩu</h4>
            <form class="form form--login" method="POST" action="{{ route('password.update') }}">
              @csrf
              <input type="hidden" name="token" value="{{ $token }}">
              <div class="form__group{{ $errors->has('email') ? ' has-error' : '' }} mb--20">
                    @if ($errors->has('email'))
                    <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span><br>
                    @endif
                    <label class="form__label" for="email">Địa chỉ email <span class="required">*</span></label>
                    <input id="email" type="email" class="form__input @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
              </div>
             

              <div class="form__group mb--20 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                @if ($errors->has('password'))
                                <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span><br>
                                @endif
                                <label class="form__label" for="register_password">Mật khẩu <span class="required">*</span></label>
                                <input id="password" type="password" class="form__input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
               </div>

               <div class="form__group mb--20 form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                @if ($errors->has('password_confirmation'))
                                <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span><br>
                                @endif
                                <label class="form__label" for="re_password">Xác nhận mật khẩu
                                <span class="required">*</span></label>
                                <input id="password_confirmation" type="password" class="form__input @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
               </div>
                            


              <div class="form__group">
                <button type="submit" class="btn btn-size-sm mr-2">
                       {{ __('Cập nhật mật khẩu') }}
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Main Content Wrapper Start -->
@endsection
