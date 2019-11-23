@extends('master')

@section('style')
<style>
    .single-post__info * {
        color: white!important;
    }
</style>
@endsection

@section('content')
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0&appId=404677563279345&autoLogAppEvents=1"></script>
<!-- Main Content Wrapper Start -->
<main class="main-content-wrapper">
            <div class="inner-page-content">
                <!-- Single Post Area Start -->
                <div class="single-post-area mb--75 mb-md--55">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <!-- Single Post Start -->
                                <article class="single-post pt--70 mb--75 mb-md--55 pb--75 pb-md--55">
                                    <header class="single-post__header">
                                        <h1 class="single-post__title">{{$page->title}}</h1>
                                        <div class="single-post__media">
                                            <figure class="image">
                                                <img src="{{Voyager::image($page->image)}}" alt="Single Post Title" class="w-100">
                                            </figure>
                                        </div>
                                        <div class="single-post__header-meta">
                                            <span class="posted-on">Ngày đăng: {{$page->created_at}}</span>
                                            <div class="col-lg-2 col-md-6 pl--15 pl-sm--15">
                                                <div class="single-post__meta">
                                                    <div class="social">
                                                        <a href="{{setting('site.facebook')}}" class="social__link" style="padding-right: 10px">
                                                          <img src="/assets/img/icons/ic-facebook.svg" width="10">
                                                        </a>
                                                        <a href="{{setting('site.youtube')}}" class="social__link" style="padding-right: 10px">
                                                            <img src="/assets/img/icons/ic-youtube.svg" width="30">
                                                        </a>
                                                        <a href="tel:{{setting('site.zalo')}}" class="social__link">
                                                            <img src="/assets/img/icons/ic-zalo.svg" width="30">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="single-post__info">
                                        <div class="row mb--43 mb-md-33">
                                            
                                            <div class="col-lg-12 col-md-12">
                                               <p> {{$page->meta_description}}</p>
                                            </div>
                                        </div>
                                        <!-- <div class="row mb--80">
                                            <div class="col-md-6 mb-sm--40">
                                                <figure>
                                                    <img src="assets/img/blog/blog-01.jpg" alt="blog details" class="w-100">
                                                </figure>
                                            </div>
                                            <div class="col-md-6">
                                                <figure>
                                                    <img src="assets/img/blog/blog-02.jpg" alt="blog details" class="w-100">
                                                </figure>
                                            </div>
                                        </div> -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                {!!$page->body!!}
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <!-- Single Post End -->

                                <!-- Comment Area Start -->
                                <section class="comment">
                                    @if(Route::current()->getName() == 'pages.about')
                                        <div class="fb-comments" data-href="{{route('pages.about')}}" data-width="" data-numposts="5"></div>
                                    @elseif(Route::current()->getName() == 'pages.meat')
                                        <div class="fb-comments" data-href="{{route('pages.meat')}}" data-width="" data-numposts="5"></div>
                                    @elseif(Route::current()->getName() == 'pages.milk')
                                        <div class="fb-comments" data-href="{{route('pages.milk')}}" data-width="" data-numposts="5"></div>
                                    @elseif(Route::current()->getName() == 'pages.term')
                                        <div class="fb-comments" data-href="{{route('pages.term')}}" data-width="" data-numposts="5"></div>
                                    @else
                                        <div class="fb-comments" data-href="{{route('pages.company')}}" data-width="" data-numposts="5"></div>
                                    @endif
                                </section>
                                <!-- Comment Area End -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Post Area End -->

                <!-- Related Post Area Start -->
                <section class="related-post-area mb--80 mb-md--60">
                    <div class="container">
                        <div class="row mb--50">
                            <div class="col-12 text-center">
                                <h2>Có thể bạn muốn biết</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="element-carousel slick-dot-mt-40 related-post-carousel" data-slick-options='{
                                    "spaceBetween": 30,
                                    "slidesToShow": 2,
                                    "slidesToScroll": 1,
                                    "dots": true,
                                    "infinite": true, 
                                    "centerMode": true
                                }' data-slick-responsive='[
                                    {"breakpoint": 768, "settings": {"slidesToShow": 1}}
                                ]'>
                                <?php 
                                $pages=DB::table('pages')->where('type',$page->type)->take(3)->get();
                                ?>

                                @foreach($pages as $page)
                                    <div class="item">
                                        <div class="related-post">
                                            <div class="related-post__inner">
                                                <div class="related-post__media">
                                                    <figure class="image">
                                                        <a href="{{route('bai-viet',$page->slug)}}">
                                                            <img src="{{voyager::image($page->image)}}" alt="Blog Image">
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="related-post__info">
                                                    <h3 class="related-post__title"><a href="{{route('pages.show',$page->slug)}}">{{$page->title}}</a></h3>
                                                    <span class="related-post__date">{{$page->created_at}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Related Post Area End -->
            </div>
        </main>
        <!-- Main Content Wrapper End -->
@endsection