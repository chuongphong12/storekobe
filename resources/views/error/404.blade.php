@extends('master')
@section('content')
<!-- Main Wrapper Start -->
<main class="main-content-wrapper">
    <div class="error-area pt--90 pt-xl--70 pb--120 pb-xl--100 pb-lg--95 pb-sm--90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 text-center">
                    <div class="error">
                        <h1>404</h1>
                        <h2>Sorry! Page not found</h2>
                        <p>The page you are trying to access does not exist, deleted, renamed, or temporarily
                            unavailable.</p>
                        <a href="{{route('trang-chu')}}" class="btn">Return to Homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main Wrapper End -->
@endsection