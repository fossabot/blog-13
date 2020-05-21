

@extends('blog.layouts.layout')
@section('content')
    @include('blog.categories.breadcrumbs')
    <!-- Blog Area Start Here -->
    <section class="blog-wrap-layout24">
        <div class="container">
            <div class="row gutters-40" id="no-equal-gallery">
                @foreach($posts as $post)
                <div class="col-lg-4 col-sm-6 col-12 no-equal-item">
                    <div class="blog-box-layout1">
                        <div class="item-img">
                            <a href="{{ $post->url }}"><img src="{{ $post->image }}" alt="blog"></a>
                        </div>
                        <div class="item-content">
                            <ul class="entry-meta meta-color-dark">
                                <li><i class="fas fa-tag"></i>Fashion</li>
                                <li><i class="fas fa-calendar-alt"></i>{{ $post->publish }}</li>
                                <li><i class="far fa-clock"></i>{{ $post->read_time }}</li>
                            </ul>
                            <h3 class="item-title regular-size"> <a href="{{ $post->url }}">{{ $post->title }}</a></h3>
                            {{ $post->subtitle }}
                            <a href="{{ $post->url }}" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="loadmore-btn-layout2">
                <a href="#" class="item-btn">LOAD MORE</a>
            </div>
        </div>
    </section>
    <!-- Blog Area End Here -->

@endsection
