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
                                <img src="/themes/blogxer/img/blog/blog.jpg" alt="{{ $post->title }}">
                            </a>
                        </div>
                        <div class="item-content">
                            <ul class="entry-meta meta-color-dark">
                                <li><i class="fas fa-tag"></i>{{ $post->category->title }}</li>
                                <li><i class="fas fa-calendar-alt"></i>{{ $post->publish }}</li>
                                <li><i class="far fa-clock"></i>5 Mins Read</li>
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
                    <div class="blog-box-layout1">
                        <div class="item-img">
                            <a href="{{ $getPost->url }}">
                                <img src="/themes/blogxer/img/blog/blog3.jpg" alt="{{ $getPost->title }}">
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
                                    <i class="far fa-clock"></i>5 Mins Read</li>
                            </ul>
                            <h2 class="item-title"> <a href="{{ $getPost->url }}">{{ $getPost->title }}</a></h2>
                            {{ $getPost->subtitle }}
                            <a href="{{ $getPost->url }}" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="row gutters-40">
                        @foreach($blogs as $blog)
                            <div class="col-sm-6 col-12">
                                <div class="blog-box-layout1">
                                    <div class="item-img">
                                        <a href="{{ $blog->url }}">
                                            <img src="/themes/blogxer/img/blog/blog7.jpg" alt="{{ $blog->title }}">
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
                                                5 Mins Read
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

                    {{ $blogs->links('blog.vendor.pagination') }}

                </div>
                <div class="col-xl-3 col-lg-4 sidebar-widget-area sidebar-break-md">
                    <div class="widget">
                        <div class="section-heading heading-dark">
                            <h3 class="item-heading">ABOUT ME</h3>
                        </div>
                        <div class="widget-about">
                            <figure class="author-figure">
                                <img src="{{ $instagram->profilePicture }}" alt="{{ $instagram->fullName }}">
                            </figure>
{{--                            <figure class="author-signature">--}}
{{--                                <img src="/themes/blogxer/img/figure/signature.png" alt="about">--}}
{{--                            </figure>--}}
                            <p>{{ $instagram->biography }}</p>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="section-heading heading-dark">
                            <h3 class="item-heading">SUBSCRIBE &amp; FOLLOW</h3>
                        </div>
                        <div class="widget-follow-us">
                            <ul>
                                @foreach(config('blog.socials') as $social)
                                    <li class="single-item">
                                        <a class="svg-icon" href="{{ $social['url'] }}">
                                            <i class="fab fa-{{ $social['name'] }}"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="section-heading heading-dark">
                            <h3 class="item-heading">POPULAR POSTS</h3>
                        </div>
                        <div class="widget-latest">
                            <ul class="block-list">
                                @foreach($latest as $post)
                                    <li class="single-item">
                                        <div class="item-img">
                                            <a href="#">
                                                <img src="/themes/blogxer/img/blog/blog12.jpg" alt="Post">
                                            </a>
                                            <div class="count-number">{{ $post->likes->count() }}</div>
                                        </div>
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li>
                                                    <i class="fas fa-calendar-alt"></i>
                                                    {{ $post->publish }}
                                                </li>
                                            </ul>
                                            <h4 class="item-title"><a href="#">{{ $post->title }}</a></h4>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="widget-ad">
                            <a href="#">
                                <img src="/themes/blogxer/img/figure/figure1.jpg" alt="Ad" class="img-fluid">
                            </a>
                        </div>
                    </div>
{{--                    @include('blog.partials.widget.instagram')--}}
                    <div class="widget">
                        <div class="section-heading heading-dark">
                            <h3 class="item-heading">CATEGORIES</h3>
                        </div>
                        <div class="widget-categories">
                            <ul>
                                @foreach($categories as $category)
                                    @if(!empty($category->posts->count()))
                                        <li>
                                            <a href="#">{{ $category->title }}
                                                <span>({{ $category->posts->count() }})</span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="widget-newsletter-subscribe">
                            <h3>Get Latest Updates</h3>
                            <p>Newsletter Subscribe</p>
                            <form class="newsletter-subscribe-form">
                                <div class="form-group">
                                    <input type="text" placeholder="your e-mail address" class="form-control"
                                           name="email" data-error="E-mail field is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group mb-none">
                                    <button type="submit" class="item-btn">SUBSCRIBE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="section-heading heading-dark">
                            <h3 class="item-heading">FEATURED ARTICLE</h3>
                        </div>
                        <div class="widget-featured-feed">
                            <div class="rc-carousel dot-control-layout1" data-loop="true" data-items="3"
                                 data-margin="5" data-autoplay="false" data-autoplay-timeout="5000"
                                 data-smart-speed="1000" data-dots="true" data-nav="false" data-nav-speed="false"
                                 data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="true"
                                 data-r-x-medium="1" data-r-x-medium-nav="false" data-r-x-medium-dots="true"
                                 data-r-small="1" data-r-small-nav="false" data-r-small-dots="true"
                                 data-r-medium="1" data-r-medium-nav="false" data-r-medium-dots="true"
                                 data-r-large="1" data-r-large-nav="false" data-r-large-dots="true"
                                 data-r-extra-large="1" data-r-extra-large-nav="false" data-r-extra-large-dots="true">
                                <div class="featured-box-layout1">
                                    <div class="item-img">
                                        <img src="/themes/blogxer/img/blog/blog16.jpg" alt="Brand" class="img-fluid">
                                    </div>
                                    <div class="item-content">
                                        <span class="post-date">OCTOBER 19, 2018</span>
                                        <h5 class="item-title"><a href="single-blog.html">Dreamy Places will
                                                Never Get to Visit</a></h5>
                                    </div>
                                </div>
                                <div class="featured-box-layout1">
                                    <div class="item-img">
                                        <img src="/themes/blogxer/img/blog/blog17.jpg" alt="Brand" class="img-fluid">
                                    </div>
                                    <div class="item-content">
                                        <span class="post-date">OCTOBER 19, 2018</span>
                                        <h5 class="item-title"><a href="single-blog.html">Dreamy Places will
                                                Never Get to Visit</a></h5>
                                    </div>
                                </div>
                                <div class="featured-box-layout1">
                                    <div class="item-img">
                                        <img src="/themes/blogxer/img/blog/blog16.jpg" alt="Brand" class="img-fluid">
                                    </div>
                                    <div class="item-content">
                                        <span class="post-date">OCTOBER 19, 2018</span>
                                        <h5 class="item-title"><a href="single-blog.html">Dreamy Places will
                                                Never Get to Visit</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Area End Here -->
    <!-- Instagram Start Here -->
    @include('blog.partials.instagram')
@endsection
