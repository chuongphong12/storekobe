@extends('master')

@section('style')
<style>
.bl-widget.post {
    margin-top: -15px !important;
    margin-bottom: 30px;
}
.shop-widget {
    margin-left: -30px;
}
</style>
@endsection

@section('content')

<!-- Breadcrumb area Start -->

<section class="page-title-area bg-image ptb--80" data-bg-image="assets/img/bg/page_title_bg.jpg">

  <div class="container">

    <div class="row">

      <div class="col-12 text-center">

        <h1 class="page-title">Tin tức </h1>

        <ul class="breadcrumb">

          <li><a href="{{route('trang-chu')}}">Trang chủ</a></li>

          <li class="current"><span>Trang tin tức</span></li>

        </ul>

      </div>

    </div>

  </div>

</section>

<!-- Breadcrumb area End -->



<!-- Main Content Wrapper Start -->

<main class="main-content-wrapper">

  <div class="inner-page-content ptb--80 ptb-md--60">

    <div class="container">

      <div class="row">

        <div class="col-lg-9 mb-md--50">

          <div class="row">

            <!--Post-->

            @foreach($posts as $post)

            <div class="col-lg-6 mb--50">

              <article class="blog format-standard">

                <div class="blog__inner">

                  <div class="blog__media">

                    <figure class="image">

                      <img src="{{Voyager::image($post->image)}}" alt="Blog Image" class="w-100">

                      <a href="{{route('bai-viet',$post->slug)}}" class="item-overlay"></a>

                    </figure>

                  </div>

                  <!--<div class="blog__info">-->

                    <h2 class="blog__title"><a href="{{route('bai-viet',$post->slug)}}">{{$post->title}}</a></h2>

                    <!--<div class="blog__meta">-->

                    <!--  <span class="posted-on">{{$post->created_at}}</span>-->

                    <!--  <span class="posted-by"><span>SEO title: </span><a-->
                    <!--      href="{{route('bai-viet',$post->slug)}}">{{$post->seo_title}}</a></span>-->

                    <!--</div>-->
                        <!--<span class="posted-on">{!! $post->short_des !!}</span>-->
                    <div class="blog__desc">

                      <p>{{Str::limit($post->short_des, 150, '...')}}</p>

                    </div>

                    <a href="{{route('bai-viet',$post->slug)}}" class="read-more-btn">Xem thêm</a>

                  <!--</div>-->

                </div>

              </article>

            </div>

            @endforeach

            <!--/Post-->



          </div>

          <div class="row">

            <div class="col-12 text-center">{{$posts->links()}}

            </div>

          </div>

        </div>

        <div class="col-lg-3">
          <div class="blog-sidebar pl--15 pl-lg--0">

            <div class="bl-widget post">
              <div class="inner">
                <h5 class="title" style="color: #000">Tin tức nổi bật</h5>
                <ul class="post-list">
                  @foreach($new_post as $item)
                    <figure class="image">

                      <img src="{{Voyager::image($item->image)}}" alt="Blog Image" class="w-100">

                    </figure>
                  <li>
                    <a href="{{route('bai-viet',$item->slug)}}">{{$item->title}}</a>
                    <span><i class="fa fa-clock-o"></i> {{$item->created_at}}</span>
                  </li>
                  @endforeach
                </ul>
              </div>
              
            </div>
            <div class="shop-widget">
            <h3 class="widget-title mb--25">Tag liên quan:</h3>
            <div class="tagcloud">
                @foreach($tag as $item)
                <a href="{{route('tag',$item->slug)}}">{{$item->name}}</a>
                @endforeach
            </div>
        </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</main>

<!-- Main Content Wrapper End -->

@endsection