@extends('blog.layouts.layout')
@section('content')
    <!-- Inne Page Banner Area Start Here -->
    <section class="inner-page-banner bg-common">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs-area">
                        <h1>{{ $category->title }}</h1>
                        <ul>
                            <li>
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li>{{ $category->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inne Page Banner Area End Here -->
    <!-- Blog Area Start Here -->
    <section class="blog-wrap-layout20">
        <div class="container">
            <div class="row gutters-50">
                <div class="col-lg-8">
                    <div class="row">
                        @foreach($posts as $post)
                        <div class="col-xl-12 col-lg-6 col-md-6 col-12">
                            <div class="row no-gutters {{ $loop->iteration % 2 == 0 ? 'flex-lg-row-reverse' : '' }}">
                                <div class="col-xl-6 col-lg-12">
                                    <div class="blog-box-layout10">
                                        <div class="item-img">
                                            <img src="{{ $post->getMedia('images')[0]->getUrl('medium') }}" alt="{{ $post->title }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12 d-flex align-items-center">
                                    <div class="blog-box-layout10">
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-tag"></i>{{ $post->tags->implode('tag', ', ') }}</li>
                                                <li><i class="fas fa-calendar-alt"></i>
                                                    <time datetime="{{ $post->published_at->toIso8601String() }}" title="{{ $post->published_at->format('M d, Y g:i:s a') }}">
                                                    {{ $post->publish }}
                                                    </time>
                                                </li>
                                                <li><i class="far fa-clock"></i>{{ $post->read_time }}</li>
                                            </ul>
                                            <h3 class="item-title">
                                                <a href="{{ $post->url }}">
                                                    {{ $post->title }}
                                                </a>
                                            </h3>
                                            <p>{{ $post->subtitle }}</p>
                                            <ul class="response-area">
                                                <li><a href="#"><i class="far fa-heart"></i>{{ $post->likes->count() }}</a></li>
                                                <li><a href="#"><i class="far fa-comment"></i>{{ $post->comments->count() }}</a></li>
                                            </ul>
                                            <a href="{{ $post->url }}" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

{{--                    {!! $posts->links('blog.vendor.pagination') !!}--}}

                </div>
                <div class="col-lg-4 sidebar-widget-area sidebar-break-md">

                    @include('blog.partials.widget.about')

                    @include('blog.partials.widget.follow')

                    @include('blog.components.newsletter')

                    @include('blog.partials.widget.latest')

                    @include('blog.components.instagram.widget')
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Area End Here -->
@endsection
