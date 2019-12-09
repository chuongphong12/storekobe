<!-- Footer Start-->
<footer class="footer">
  <div class="footer-top">
    <div class="container-fluid">
      <div class="row pt--70 pb--70">
        <div class="col-lg-2 col-sm-12 offset-lg-0 mb-md--45">
          <div class="footer-widget">
            <div class="textwidget">
              <figure class="footer-logo mb--30">
                <img src="assets/img/logo/logo-bokobe.png" alt="Logo">
              </figure>
              <p> Kobe Vietnam confidently asserts that the quality of its products and services also aims to improve
                brand recognition to customers more easily.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-12 offset-lg-1 mb-md--45">
          <div class="footer-widget">
            <h3 class="widget-title mb--35 mb-sm--20">Introduction</h3>
            <div class="footer-widget">
              <ul class="footer-menu">
                <li><a href="{{route('trang-chu')}}">About KobeVietnam</a></li>
                <li><a href="http://kobenews.globalmindtech.vn/">News</a></li>
                <li><a href="{{route('pages.contact')}}">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-12 offset-lg-0 mb-md--45">
          <div class="footer-widget">
            <h3 class="widget-title mb--35 mb-sm--20">Contact information</h3>
            <div class="footer-widget">
              <ul class="footer-menu">
                <li><b>Headquater address: </b><a href="https://goo.gl/maps/LwrF3uqX1PkzEMh3A">G25, đường 3A, khu Him
                    Lam, P. Tân Hưng, Q7</a></li>
                <li><b>Hotline: </b><a href="tel:0988 09 65 29">0988 09 65 29</a> - <a href="tel:0985 09 65 29">0985 09
                    65 29</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-12 mb-xs--45">
          <div class="footer-widget">
            <h3 class="widget-title mb--35 mb-sm--20">Connect with us</h3>
            <div class="social">
              <a href="{{setting('site.facebook')}}" class="social__link">
                <img src="/assets/img/icons/ic-facebook.svg" width="10">
              </a>
              <a href="{{setting('site.youtube')}}" class="social__link">
                <img src="/assets/img/icons/ic-youtube.svg" width="30">
              </a>
              <a href="tel:{{setting('site.zalo')}}" class="social__link">
                <img src="/assets/img/icons/ic-zalo.svg" width="30">
              </a>
            </div>
            <p style="font-size:14px;">Sign up to receive news about products and promotions</p>
            <form action="{{route('newletter')}}" method="POST" class="form">
              @csrf
              <input type="email" class="form__input-newsletter mb--20" id="inputEmail" name="email"
                placeholder="Your email address...." required>
              <button class="btn btn-size-sm" type="submit">
                <span>Register</span>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container-fluid">
      <div class="row ptb--20">
        <div class="col-12 text-center">
          <p class="copyright-text">© 2019 - Copyright of Kobe Company of Vietnam</p>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- Footer End-->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-L0K8VLLWQQ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-L0K8VLLWQQ');
</script>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v4.0'
          });
        };
        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Your customer chat code -->
<div class="fb-customerchat" attribution=setup_tool page_id="655527234920042" theme_color="#EB1B21"
  logged_in_greeting="Kobe Vietnam xin chào quý khách" logged_out_greeting="Kobe Vietnam xin chào quý khách">
</div>