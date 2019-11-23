@extends('master')

@section('content')

<!-- Breadcrumb area Start -->

<section class="page-title-area bg-image ptb--80" data-bg-image="assets/img/bg/page_title_bg.jpg">

  <div class="container">

    <div class="row">

      <div class="col-12 text-center">

        <h1 class="page-title">Trang </h1>

        <ul class="breadcrumb">

          <li><a href="{{route('trang-chu')}}">Trang chủ</a></li>

          <li class="current"><span>Danh mục trang</span></li>

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

            @foreach($pages as $post)

            <div class="col-lg-6 mb--50">

              <article class="blog format-standard">

                <div class="blog__inner">

                  <div class="blog__media">

                    <figure class="image">

                      <img src="{{Voyager::image($post->image)}}" alt="Blog Image" class="w-100">

                      <a href="{{route('pages.show',$post->slug)}}" class="item-overlay"></a>

                    </figure>

                  </div>

                  <!--<div class="blog__info">-->

                    <h2 class="blog__title"><a href="{{route('pages.show',$post->slug)}}">{{$post->title}}</a></h2>

                    
                    <div class="blog__desc">

                      <p>{{$post->meta_description}}</p>

                    </div>

                    <a href="{{route('pages.show',$post->slug)}}" class="read-more-btn">Xem thêm</a>

                  <!--</div>-->

                </div>

              </article>

            </div>

            @endforeach

            <!--/Post-->



          </div>

          <div class="row">

            <div class="col-12 text-center">{{$pages->links()}}

            </div>

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