<header class="header">
  <div class="header__inner fixed-header">
    <div class="header__main">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="header__main-inner">
              <div class="header__main-left">
                <div class="logo">
                  <a href="{{route('trang-chu')}}/" class="logo--normal">
                    <img src="assets/img/logo/logo-bokobe.png" alt="Logo">
                  </a>
                </div>
              </div>
              {{menu('main','menu')}}
              <div class="header__main-right">
                <div class="header-toolbar-wrap">
                  <div class="header-toolbar">
                    <div class="header-toolbar__item header-toolbar--search-btn">
                      <a href="#searchForm" class="header-toolbar__btn toolbar-btn">
                        <i class="la la-search"></i>
                      </a>
                    </div>
                    <div class="header-toolbar__item header-toolbar--minicart-btn">
                      <a href="#miniCart" class="header-toolbar__btn toolbar-btn">
                        <i class="la la-shopping-cart"></i>
                        @if(Cart::instance('default')->count() > 0)
                        <span>{{Cart::instance('default')->count()}}</span>
                        @else
                        <span>0</span>
                        @endif
                      </a>
                    </div>
                    <div class="header-toolbar__item d-block d-lg-none">
                      <a href="#offcanvasMenu" class="header-toolbar__btn toolbar-btn menu-btn">
                        <div class="hamburger-icon">
                          <span></span>
                          <span></span>
                          <span></span>
                          <span></span>
                          <span></span>
                          <span></span>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>