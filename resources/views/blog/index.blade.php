@extends('blog.layouts.layout')
@section('content')
    @includeIf('blog.partials.slider')
    <!-- Blog Area Start Here -->
    <section class="blog-wrap-layout1">
        <div class="container">
            <div class="row">
                @foreach($posts->take(3) as $post)
                <div class="col-lg-4">
                    <div class="blog-box-layout1">
                        <div class="item-img">
                            <a href="{{ $post->url }}">
                                <img src="{{ $post->getMedia('images')[0]->getUrl('medium') }}" alt="{{ $post->title }}">
                            </a>
                        </div>
                        <div class="item-content">
                            <ul class="entry-meta meta-color-dark">
                                <li><i class="fas fa-tag"></i>{{ $post->category->title }}</li>
                                <li><i class="fas fa-calendar-alt"></i>{{ $post->publish }}</li>
                                <li><i class="far fa-clock"></i>{{ $post->read_time }}</li>
                            </ul>
                            <h3 class="item-title"><a href="{{ $post->url }}">{{ $post->title }}</a></h3>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Blog Area End Here -->
    <!-- Blog Area Start Here -->
    <section class="blog-wrap-layout2">
        <div class="container">
            <div class="row gutters-40">
                <div class="col-xl-9 col-lg-8">

                    @if(! is_null($getPost))
                    <div class="blog-box-layout1">
                        <div class="item-img">
                            <a href="{{ $getPost->url }}">
                                <img src="{{ $getPost->getMedia('images')[0]->getUrl('large') }}" alt="{{ $getPost->title }}">
                            </a>
                        </div>
                        <div class="item-content">
                            <ul class="entry-meta meta-color-dark">
                                <li>
                                    <i class="fas fa-tag"></i>
                                    {{ $getPost->category->title }}
                                </li>
                                <li>
                                    <i class="fas fa-calendar-alt"></i>
                                    {{ $getPost->publish }}
                                </li>
                                <li>
                                    <i class="fas fa-user"></i>BY
                                    <a href="#">{{ $getPost->user->name }}
                                    </a>
                                </li>
                                <li>
                                    <i class="far fa-clock"></i>{{ $getPost->read_time }}</li>
                            </ul>
                            <h2 class="item-title">
                                <a href="{{ $getPost->url }}">
                                    {{ $getPost->title }}
                                </a>
                            </h2>
                            {{ $getPost->subtitle }}
                            <a href="{{ $getPost->url }}" class="item-btn">
                                READ MORE
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    @endif

                    <div class="row gutters-40">
                        @foreach($blogs as $blog)
                            <div class="col-sm-6 col-12">
                                <div class="blog-box-layout1">
                                    <div class="item-img">
                                        <a href="{{ $blog->url }}">
                                            <img src="{{ $blog->getMedia('images')[0]->getUrl('medium') }}" alt="{{ $blog->title }}">
                                        </a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li>
                                                <i class="fas fa-tag"></i>
                                                {{ $blog->category->title }}
                                            </li>
                                            <li>
                                                <i class="fas fa-calendar-alt"></i
                                                >
                                                {{ $blog->publish }}
                                            </li>
                                            <li>
                                                <i class="far fa-clock"></i>
                                                {{ $blog->read_time }}
                                            </li>
                                        </ul>
                                        <h3 class="item-title">
                                            <a href="{{ $blog->url }}">
                                                {{ $blog->title }}
                                            </a>
                                        </h3>
                                        <p>{{ $blog->subtitle }}</p>
                                        <a href="{{ $blog->url }}" class="item-btn">
                                            READ MORE
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

{{--                    {{ $blogs->links('blog.vendor.pagination') }}--}}

                </div>
                <div class="col-xl-3 col-lg-4 sidebar-widget-area sidebar-break-md">

                    @include('blog.partials.widget.about')


                    @include('blog.partials.widget.subscribe')

                    @include('blog.partials.widget.latest')

                    @include('blog.partials.widget.adsense')

                    @include('blog.partials.widget.instagram')

                    @include('blog.partials.widget.categories')

                    @include('blog.partials.widget.newsletter')

                    @include('blog.partials.widget.feature-feed')
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Area End Here -->
    <!-- Instagram Start Here -->
    @include('blog.partials.instagram')
@endsection
