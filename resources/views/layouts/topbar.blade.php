<div class="header__top-wrapper d-none d-sm-none d-md-none d-lg-block">

    <div class="container header__top">

        <div class="header__top__left">

            <div><i class="fa fa-phone"></i>
                <a href="tel:0988 09 65 29">0988 09 65 29</a> - <a href="tel:0985 09 65 29">0985 09 65 29</a>
            </div>

        </div>
        <div class="header__top__right">
            <ul class="header__top__nav">
                @if (Auth::check())
                <div class="header__top__right">
                    @if (Auth::user()->role_id == 1)
                    <ul class="header__top__login" style="margin-right: 30px;">
                        <li><a href="{{ route('report') }}">Report</a></li>
                    </ul>
                    @endif
                    @if (Auth::user()->role_id != 2)
                    <ul class="header__top__login">
                        <li><a href="#">Hello!
                                {{ Auth::user()->name }}</a></li>
                    </ul>
                    <ul class="header__top__signup">
                        <li><a href="{{ route('voyager.dashboard') }}">Go to Admin</a></li>
                    </ul>
                    @else
                    <ul class="header__top__signup">
                        <li><a href="{{ route('cus.detail', Auth::user()->id) }}">Hello!
                                {{ Auth::user()->name }}</a></li>
                    </ul>
                    @endif
                </div>
                @else
                <div class="header__top__right">
                    <ul class="header__top__login">
                        <li><a href="{{ route('login') }}"><i class="fa fa-user"></i>Login</a></li>
                    </ul>
                    <ul class="header__top__signup">
                        <li><a href="{{route('register')}}"><i class="fa fa-sign-in"></i>Register</a></li>
                    </ul>
                </div>
                @endif
            </ul>
        </div>

    </div>

</div>