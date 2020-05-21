@extends('blog.layouts.layout')
@section('content')

    @include('blog.categories.breadcrumbs')

    <!-- Blog Area Start Here -->
    <section class="blog-wrap-layout21">
        <div class="container">
            <div class="row gutters-40">

                @foreach($posts->random(4) as $post)
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="blog-box-layout9">
                        <div class="item-img">
                            <a href="{{ $post->url }}"><img src="{{ $post->image }}" alt="blog"></a>
                        </div>
                        <div class="item-content">
                            <ul class="entry-meta meta-color-dark">
                                <li><i class="fas fa-tag"></i>Bridal</li>
                                <li><i class="fas fa-calendar-alt"></i>October 19, 2019</li>
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
    <section class="blog-wrap-layout22">
        <div class="container">
            <div class="row gutters-50">
                <div class="col-xl-9 col-lg-8">

                    @foreach($posts as $post)
                    <div class="blog-box-layout4">
                        <div class="item-img">
                            <a href="{{ $post->url }}"><img src="{{ $post->image }}" alt="blog"></a>
                        </div>
                        <div class="item-content">
                            <ul class="entry-meta meta-color-dark">
                                <li><i class="fas fa-tag"></i>Business</li>
                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                <li><i class="far fa-clock"></i>5 Mins Read</li>
                            </ul>
                            <h3 class="item-title"><a href="single-blog.html">{{ $post->title }}</a></h3>
                            {{ $post->subtitle }}
                            <div class="action-area">
                                <a href="{{ $post->url }}" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                <ul class="response-area">
                                    <li><a href="#"><i class="far fa-heart"></i>12</a></li>
                                    <li><a href="#"><i class="far fa-comment"></i>02</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="pagination-layout1">
                        <ul>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 sidebar-widget-area sidebar-break-md">
                    <div class="widget">
                        <div class="section-heading heading-dark">
                            <h3 class="item-heading">SUBSCRIBE &amp; FOLLOW</h3>
                        </div>
                        <div class="widget-follow-us">
                            <ul>
                                <li class="single-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-github-alt"></i></a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-kickstarter-k"></i></a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-behance"></i></a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div>



                    <x-newsletter></x-newsletter>

                    @include('blog.partials.widget.latest')


                    <x-categories></x-categories>

                </div>
            </div>
        </div>
    </section>
    <!-- Blog Area End Here -->
@endsection
