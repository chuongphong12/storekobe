@extends('master')

@section('content')
<!-- Main Content Wrapper Start -->

<div class="main-content-wrapper">

  <div class="page-content-inner pt--105 pb--75">

    <div class="container">

      <div class="row">

        <div class="col-md-6 mb-sm--50 ml-auto mr-auto">

          <div class="login-box">

            <h3 class="heading__tertiary mb--30 text-center">

              {{ __('Đặt lại mật khẩu') }}

            </h3>
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

            <form class="form form--login mb--70" method="POST" action="{{ route('password.email') }}">

              @csrf

              <div class="form__group mb--20">

                <label class="form__label" for="email">Số điện thoại hoặc địa chỉ email

                  <span class="required">*</span></label>

                <input id="email" type="email" class="form__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              </div>

              <div class="d-flex align-items-center mb--20">

                <div class="form__group mr--30">

                    <button type="submit" class="btn btn-size-sm">
                                    {{ __('Gửi yêu cầu thay đổi mật khẩu') }}
                    </button>

                </div>


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
