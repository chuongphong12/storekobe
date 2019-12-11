@extends('master')

@section('style')
<style>
  .kobe-popup .btn-close {
    position: absolute;
    border: none;
    background: #ffffff;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    width: 60px;
    height: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    z-index: 5;
    top: 15%;
    right: 9%;
  }
</style>
@endsection

@section('content')
<!-- Grid Line Start-->
<div class="container d-none d-md-block">
  <div class="strip-bgr">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
  </div>
</div>
<!-- Grid Line End  -->

<!-- Main Content Wrapper Start -->
<main class="main-content-wrapper">
  <h1 class="d-none">About Kobe</h1>
  <!-- Slider Kobe Start -->
  <div class="wow slideInUp container">
    <section class="intro-slider-wrapper section-break">
      <div class="kobe-slider kobe-slider--style-half">
        <div class="kobe-slider__list">
          <div class="kobe-slider__image-list">
            @foreach($slide as $sl)
            <div class="kobe-slider__image">
              <a href="#">
                <img src="{{Voyager::image($sl->image)}}" alt="img" />
              </a>
            </div>
            @endforeach
            <!-- Slide 5 Img -->
          </div>
          <!-- End of Imgs wrapper -->
          <div class="kobe-slider__content-list">
            <!-- Slide 1 Content -->
          </div>
          <!-- End of Content wrapper -->
        </div>
      </div>
    </section>
  </div>
  <!-- Slider Kobe End -->

  <!--  Our Story Start-->
  <div class="container">
    <section class="intro-story-wrapper section-break">
      <div class="row">
        <div class="wow slideInUp col-md-6">
          <div class="kobe-title kobe-title--style-1">
            <div class="kobe-title__title">Story</div>
            <h2 class="kobe-title__sub-title">Brand Story</h2>
          </div>
          <!--<img class="direct-line first" src="./assets/img/icons/direct-1.png" alt="line">-->
        </div>
      </div>
      <div class="row">
        <div class="wow slideInLeft col-md-6 order-2 order-sm-2 order-lg-1">
          <h3>"10 YEARS FOR THE BLOOD AND PASSION ABOUT KOBE CULTURE IN VIETNAM"</h3>
          <p>The whole world seems to know the story of Japanese Kobe Beef with the strict farming process as well as
            the world's best quality and price.</p>
          <p>The farm was built in 2009 with the mission "Kobe Vietnam - Create a unique culinary culture for Vietnamese
            people with high quality products from Japanese Kobe beef". Within 10 years, we have successfully researched
            and developed the breeding of Wagyu breed, which are reproduced and raised in Bao Loc, Lam Dong Province.
            The farm is currently the distributor of Wagyu beef with Kobe Vietnam brand in famous supermarket chains,
            hotels and restaurants nationwide.
          </p>
        </div>
        <div class="wow slideInRight col-md-6 order-1 order-sm-1 order-lg-2 kobe-image" style="margin-bottom: 5vh">
          <img src="./assets/img/home/story.jpg" alt="about-us">
        </div>
      </div>
  </div>
  </section>
  </div>
  <!-- Our Story End -->

  <!-- Quality Kobe Start -->
  <div class="container">
    <section class="intro-quality-wrapper section-break">
      <div class="row">
        <div class="col-md-6 order-2 order-sm-2 order-lg-1">
          <div class="kobe-title kobe-title--style-1">
            <div class="kobe-title__title">Quality</div>
            <h2 class="kobe-title__sub-title">Japanese certification</h2>
          </div>
          <img class="wow fadeInLeft img-text" src="./assets/img/home/3-khong.png"
            alt="Bò Kobe chất lượng nói không với thức ăn công nghiệp, hormone tăng trưởng, tồn dư kháng sinh" />
        </div>
        <div class="wow fadeInRight col-md-6 order-1 order-sm-1 order-lg-2">
          <img class="img-qua" src="./assets/img/home/chung-nhan.png" alt="Chứng nhận 100% tiêu chuẩn Nhật Bản" />
        </div>
      </div>
    </section>
  </div>
  <!-- Quaily Kobe End -->

  <!-- Cut of Beef Begin -->
  <div class="container">
    <section class="intro-beef-wrapper section-break"
      style="background: url('./assets/img/home/background-bokobe.png') no-repeat;">
      <h2 class="d-none">Meat parts of Kobe Beef</h2>
      <div class="row container">
        <div class="col-lg-6 left-wrapper">
          <div class="wow rollIn kobe-title kobe-title--style-1 kobe-title--grey">
            <div class="kobe-title__title">KOBE</div>
          </div>
          <div class="wow jackInTheBox iframe-wrapper-pt56">
            <iframe class="svg-kobe-cow-wrapper" type="image/svg+xml" src="./assets/img/home/Conbo.svg  "></iframe>
          </div>
        </div>
        <div class="wow rotateInDownRight col-lg-6 right-wrapper">
          <div class="kobe-slider kobe-slider--style-1 kobe-slider--with-slider">
            <div class="kobe-slider__list">
              <div class="kobe-slider__item-wrapper">
                <div class="kobe-slider__item">
                  <div class="item__image">
                    <img src="./assets/img/home/co.jpg" alt="" />
                  </div>
                  <div class="item__content">
                    <h3 class="item__content__title">Phần cổ</h3>
                    <div class="item__content__text">Trang trại đầu tiên và duy nhất tại Việt Nam nuôi thành công giống
                      Bò lông đen Nhật Bản thế hệ F1 này với phương thức...</div>
                    <a href="{{url('/search?search=phần cổ')}}" class="item__content__button">Explore now</a>
                  </div>
                </div>
              </div>
              <!-- End of Item -->
              <div class="kobe-slider__item-wrapper">
                <div class="kobe-slider__item">
                  <div class="item__image">
                    <img src="./assets/img/home/than-vai.jpg" alt="" />
                  </div>
                  <div class="item__content">
                    <h3 class="item__content__title">Phần thăn vai</h3>
                    <div class="item__content__text">Là phần thịt nằm trên vai bò, giòn, ngọt, lượng mỡ vừa phải, vân mỡ
                      bố trí đều, ít gân có thể dùng làm bít tết, nướng, xào, lẩu. (Độ mềm 3+*, vân mỡ 4*)</div>
                    <a href="{{url('/search?search=thăn vai')}}" class="item__content__button">Explore now</a>
                  </div>
                </div>
              </div>
              <!-- End of Item -->
              <div class="kobe-slider__item-wrapper">
                <div class="kobe-slider__item">
                  <div class="item__image">
                    <img src="./assets/img/home/than-lung-lat.jpg" alt="" />
                  </div>
                  <div class="item__content">
                    <h3 class="item__content__title">Phần thăn lưng</h3>
                    <div class="item__content__text">Trải nghiệm món bít tết có vân mỡ vô cùng đẹp kết hợp với một ít
                      gân giòn tan. Ngoài ra phần thịt này cũng có thể thưởng thức để nướng và nhúng lẩu. (Độ mềm 4*,
                      vân mỡ 4*)</div>
                    <a href="{{url('/search?search=thăn lưng')}}" class="item__content__button">Explore now</a>
                  </div>
                </div>
              </div>
              <!-- End of Item -->
              <div class="kobe-slider__item-wrapper">
                <div class="kobe-slider__item">
                  <div class="item__image">
                    <img src="./assets/img/home/than-ngoai-lat.jpg" alt="" />
                  </div>
                  <div class="item__content">
                    <h3 class="item__content__title">Phần thăn ngoại</h3>
                    <div class="item__content__text">Phần thịt mềm, được đánh giá ngon chỉ sau thăn nội. Vân mỡ đều như
                      hoa tay trên những ngón tay. Dùng ngon nhất khi làm món bít tết, nướng hoặc nhúng lẩu. (Độ mềm 4*,
                      vân mỡ 4*)</div>
                    <a href="{{url('/search?search=thăn ngoại')}}" class="item__content__button">Explore now</a>
                  </div>
                </div>
              </div>
              <!-- End of Item -->
              <div class="kobe-slider__item-wrapper">
                <div class="kobe-slider__item">
                  <div class="item__image">
                    <img src="./assets/img/home/than-noi-lat.jpg" alt="" />
                  </div>
                  <div class="item__content">
                    <h3 class="item__content__title">Phần thăn nội</h3>
                    <div class="item__content__text">Còn được gọi là Phile, phần thịt ngon, mềm nhất với hàm lượng mỡ
                      cực ít. Thích hợp cho món bít tết cao cấp đem tới một trải nghiệm ẩm thực bậc nhất. (Độ mềm 5*,
                      Vân mỡ 1*)</div>
                    <a href="{{url('/search?search=thăn nội')}}" class="item__content__button">Explore now</a>
                  </div>
                </div>
              </div>
              <!-- End of Item -->
              <div class="kobe-slider__item-wrapper">
                <div class="kobe-slider__item">
                  <div class="item__image">
                    <img src="./assets/img/home/mong.jpg" alt="" />
                  </div>
                  <div class="item__content">
                    <h3 class="item__content__title">Phần mông</h3>
                    <div class="item__content__text">Là bộ phận mềm nhất của phần mông. Thịt rất mềm và ngọt nên có thể
                      chế biến được món bít-tết mông đặc trưng và các món như thịt băm, nướng. (Độ mềm 3*, vân mỡ 3*)
                    </div>
                    <a href="{{url('/search?search=mông')}}" class="item__content__button">Explore now</a>
                  </div>
                </div>
              </div>
              <!-- End of Item -->
              <div class="kobe-slider__item-wrapper">
                <div class="kobe-slider__item">
                  <div class="item__image">
                    <img src="./assets/img/home/bap-chan.jpg" alt="" />
                  </div>
                  <div class="item__content">
                    <h3 class="item__content__title">Phần bắp chân</h3>
                    <div class="item__content__text">Trang trại đầu tiên và duy nhất tại Việt Nam nuôi thành công
                      giống
                      Bò lông đen Nhật Bản thế hệ F1 này với phương thức...</div>
                    <a href="{{url('/search?search=bắp chân')}}" class="item__content__button">Explore now</a>
                  </div>
                </div>
              </div>
              <!-- End of Item -->
              <div class="kobe-slider__item-wrapper">
                <div class="kobe-slider__item">
                  <div class="item__image">
                    <img src="./assets/img/home/bung.jpg" alt="" />
                  </div>
                  <div class="item__content">
                    <h3 class="item__content__title">Phần bụng</h3>
                    <div class="item__content__text">Có 2 thớ thịt khác nhau gồm phần vừa có mỡ vừa có chút gân nên rất
                      đậm đà mà không bị sạm khô, phần còn lại thớ thịt rõ ràng nên lại giòn và mềm thích hợp cho các
                      món nướng. (Độ mềm 3*, vân mỡ 3*)</div>
                    <a href="{{url('/search?search=bụng')}}" class="item__content__button">Explore now</a>
                  </div>
                </div>
              </div>
              <!-- End of Item -->
              <div class="kobe-slider__item-wrapper">
                <div class="kobe-slider__item">
                  <div class="item__image">
                    <img src="./assets/img/home/nam.jpg" alt="" />
                  </div>
                  <div class="item__content">
                    <h3 class="item__content__title">Phần nạm</h3>
                    <div class="item__content__text">Trang trại đầu tiên và duy nhất tại Việt Nam nuôi thành công
                      giống
                      Bò lông đen Nhật Bản thế hệ F1 này với phương thức...</div>
                    <a href="{{url('/search?search=nạm')}}" class="item__content__button">Explore now</a>
                  </div>
                </div>
              </div>
              <!-- End of Item -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- Cut of Beef End -->

  <!-- Quality Kobe Start -->
  <div class="container">
    <section class="intro-quality-wrapper section-break">
      <div class="row">
        <div class="col-md-12">
          <div class="kobe-title kobe-title--style-1">
            <div class="kobe-title__title">Numbers</div>
            <h2 class="kobe-title__sub-title">Talking numbers</h2>
          </div>
        </div>
        <div class="wow fadeInDown col-md-3 d-flex flex-column align-items-center mb--20">
          <h3><span class="count">100</span>+</h3>
          <span>Employee</span>
        </div>
        <div class="wow fadeInDown col-md-3 d-flex flex-column align-items-center mb--20">
          <h3><span class="count">{{count($products)}}</span>+</h3>
          <span>Product</span>
        </div>
        <div class="wow fadeInDown col-md-3 d-flex flex-column align-items-center mb--20">
          <h3><span class="count">100</span>+</h3>
          <span>Supplier</span>
        </div>
        <div class="wow fadeInDown col-md-3 d-flex flex-column align-items-center mb--20">
          <h3><span class="count">1000</span>+</h3>
          <span>Customer</span>
        </div>
      </div>
    </section>
  </div>
  <!-- Quaily Kobe End -->

  <!-- Brand Logo Area Start -->
  <div class="brand-logo-area section-break">
    <div class="container">
      <div class="row mb--28 mb-md--18 mb-sm--33">
        <div class="col-md-12">
          <div class="kobe-title kobe-title--style-1 mb--80">
            <div class="kobe-title__title">Partner</div>
            <h2 class="kobe-title__sub-title">Partner companion</h2>
          </div>
        </div>
      </div>
      <div class="wow fadeInDown row justify-content-center">
        <div class="col-xl-12">
          <div class="brand-log-wrapper">
            <div class="element-carousel" data-slick-options='{
                                    "slidesToShow": 4,
                                    "autoplay": true,
                                    "autoplaySpeed": 1500
                                }' data-slick-responsive='[
                                    {"breakpoint": 1200, "settings": {"slidesToShow": 4}},
                                    {"breakpoint": 992, "settings": {"slidesToShow": 3}},
                                    {"breakpoint": 768, "settings": {"slidesToShow": 2}},
                                    {"breakpoint": 480, "settings": {"slidesToShow": 1}}
                                ]'>
              <div class="item">
                <figure class="d-flex flex-column align-items-center">
                  <img src="assets/img/brand/eximbank.jpg" alt="Brand" class="mx-auto">
                  <a class="pt--20 plr--20 text-center" tabindex="0" href="#">Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit.</a>
                </figure>
              </div>
              <div class="item">
                <figure class="d-flex flex-column align-items-center">
                  <img src="assets/img/brand/sabeco.jpg" alt="Brand" class="mx-auto">
                  <a class="pt--20 plr--20 text-center" tabindex="0" href="#">Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit.</a>
                </figure>
              </div>
              <div class="item">
                <figure class="d-flex flex-column align-items-center">
                  <img src="assets/img/brand/bidv.jpg" alt="Brand" class="mx-auto">
                  <a class="pt--20 plr--20 text-center" tabindex="0" href="#">Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit.</a>
                </figure>
              </div>
              <div class="item">
                <figure class="d-flex flex-column align-items-center">
                  <img src="assets/img/brand/vinamilk.jpg" alt="Brand" class="mx-auto">
                  <a class="pt--20 plr--20 text-center" tabindex="0" href="#">Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit.</a>
                </figure>
              </div>
              <div class="item">
                <figure class="d-flex flex-column align-items-center">
                  <img src="assets/img/brand/bidv.jpg" alt="Brand" class="mx-auto">
                  <a class="pt--20 plr--20 text-center" tabindex="0" href="#">Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit.</a>
                </figure>
              </div>
              <div class="item">
                <figure class="d-flex flex-column align-items-center">
                  <img src="assets/img/brand/vinamilk.jpg" alt="Brand" class="mx-auto">
                  <a class="pt--20 plr--20 text-center" tabindex="0" href="#">Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit.</a>
                </figure>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Brand Logo Area End -->
</main>
@endsection

@section('script')
<script>
  window.onscroll = function() {myFunction()};

  var header = document.getElementById("title");
  var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

window.onload  = function() {
    $('#close-conbo').on('click', function (e) {
		e.preventDefault();
		$('.kobe-popup-wrapper').removeClass('open-pop');;
    });
};
</script>
@endsection