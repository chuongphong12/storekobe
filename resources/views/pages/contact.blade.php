@extends('master')
@section('content')
<!-- Breadcrumb area Start -->
<section class="page-title-area bg-image ptb--80" data-bg-image="assets/img/bg/page_title_bg.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="page-title">Contact with us</h1>
        <ul class="breadcrumb">
          <li><a href="{{route('trang-chu')}}">Homepage</a></li>
          <li class="current"><span>Contact </span></li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- Breadcrumb area End -->

<!-- Main Content Wrapper Start -->
<main class="main-content-wrapper">
  <div class="inner-page-content pt--75 pt-md--55">
    <!-- Contact Area Start -->
    <section class="contact-area mb--75 mb-md--55">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-5 mb-sm--30">
            <div class="heading mb--32">
              <h2>Contact Information</h2>
              <hr class="delimeter">
            </div>
            <div class="contact-info mb--20">
              <p><b>Headquater Address: </b><a href="https://goo.gl/maps/LwrF3uqX1PkzEMh3A">G25, đường
                  3A, khu Him Lam, P. Tân Hưng, Q7</a></p>
              <p><b>Hotline: </b><a href="tel:0988 09 65 29">0988 09 65 29</a> - <a href="tel:0985 09 65 29">0985 09 65
                  29</a></p>
            </div>
            <div class="social">
              <a href="{{setting('site.facebook')}}" class="social__link">
                <img src="assets/img/icons/ic-facebook.svg" width="10">
              </a>
              <a href="{{setting('site.youtube')}}" class="social__link">
                <img src="assets/img/icons/ic-youtube.svg" width="30">
              </a>
              <a href="tel:{{setting('site.zalo')}}" class="social__link">
                <img src="assets/img/icons/ic-zalo.svg" width="30">
              </a>
            </div>
          </div>
          <div class="col-md-7 offset-lg-1">
            <div class="heading mb--40">
              <h2>Leave us a message</h2>
              <hr class="delimeter">
            </div>
            <form action="{{route('contact')}}" method="POST" class="form">
              @csrf
              <div class="row">
                <div class="form-group col-md-6" {{ $errors->has('cusname') ? 'has-error' : '' }}>
                  <input type="text" class="form__input mb--20" id="inputHoten" name="cusname" placeholder="Your name*"
                    value="{{ old('cusname') }}" required>
                  @if ($errors->has('cusname'))
                  <span class="text-danger">{{ $errors->first('cusname') }}</span>
                  @endif
                </div>
                <div class="form-group col-md-6" {{ $errors->has('email') ? 'has-error' : '' }}>
                  <input type="email" class="form__input mb--20" name="email" id="inputEmail" placeholder="Email*"
                    value="{{ old('email') }}">
                  @if ($errors->has('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <input type="text" name="subject" class="form__input mb--20" id="inputTieude" placeholder="Subject*">
                </div>
                <div class="form-group col-md-6" {{ $errors->has('email') ? 'has-error' : '' }}>
                  <input type="tel" class="form__input mb--20" name="phone" id="inputDienthoai"
                    placeholder="Phone number*">
                  @if ($errors->has('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
                </div>
              </div>
              <textarea class="form__input form__input--textarea mb--20" placeholder="Message..." id="con_message"
                name="content"></textarea>
              <div class="d-flex justify-content-center">
                <input type="submit" class="btn btn-shape-round form__submit">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact Area End -->

    <!-- Google Map Area Start -->
    <div class="google-map-area">
      <div><iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.87698672504!2d106.69820931465502!3d10.743962992343606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f1dad87dd69%3A0xa3afa329db0cda82!2zQ-G7rWEgSMOgbmcgVGjhu4t0IELDsiBLb2JlIFZpZXRuYW0!5e0!3m2!1svi!2s!4v1566554534685!5m2!1svi!2s"
          width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
    </div>
  </div>
</main>
<!-- Main Content Wrapper End -->
@endsection