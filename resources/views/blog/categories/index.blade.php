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
                                            <img src="/themes/blogxer/img/blog/blog79.jpg" alt="blog">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12 d-flex align-items-center">
                                    <div class="blog-box-layout10">
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-tag"></i>{{ $post->tags->implode('tag', ', ') }}</li>
                                                <li><i class="fas fa-calendar-alt"></i>{{ $post->publish }}</li>
                                                <li><i class="far fa-clock"></i>5 Mins Read</li>
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

                    {!! $posts->links('blog.vendor.pagination') !!}

                </div>
                <div class="col-lg-4 sidebar-widget-area sidebar-break-md">
                    <div class="widget">
                        <div class="section-heading heading-dark">
                            <h3 class="item-heading">ABOUT ME</h3>
                        </div>
                        <div class="widget-about-3">
                            <div class="item-img">
                                <img src="/themes/blogxer/img/about/about1.jpg" alt="Brand" class="img-fluid">
                            </div>
                            <div class="item-content">
                                <span class="item-sign"><img src="/themes/blogxer/img/figure/signature.png" alt="sign"></span>
                                <p>Fusce mauris auctor ollicituderty
                                    iner hendrerit risus aeenean
                                    rauctor pibus doloer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="section-heading heading-dark">
                            <h3 class="item-heading">FOLLOW ME ON</h3>
                        </div>
                        <div class="widget-follow-us-2">
                            <ul>
                                <li class="single-item"><a href="#"><i class="fab fa-facebook-f"></i>LIKE ME ON</a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-twitter"></i>52K FOLLOWERS</a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-instagram"></i>FOLLOW ME</a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-linkedin-in"></i>FOLLOW ME</a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-pinterest-p"></i>FOLLOW ME</a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-youtube"></i>SUBSCRIBE</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="widget-newsletter-subscribe-dark">
                            <h3>GET LATEST UPDATES</h3>
                            <p>NEWSLETTER SUBSCRIBE</p>
                            <form class="newsletter-subscribe-form">
                                <div class="form-group">
                                    <input type="text" placeholder="your e-mail address" class="form-control" name="email"
                                           data-error="E-mail field is required" required>
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
                            <h3 class="item-heading">LATEST POSTS</h3>
                        </div>
                        <div class="widget-latest">
                            <ul class="block-list">
                                @foreach($populars as $post)
                                <li class="single-item">
                                    <div class="item-img">
                                        <a href="#"><img src="/themes/blogxer/img/blog/blog85.jpg" alt="Post"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Weeding</li>
                                            <li><i class="fas fa-calendar-alt"></i>{{ $post->publish }}</li>
                                        </ul>
                                        <h4 class="item-title">
                                            <a href="{{ $post->url }}">
                                                {{ $post->title }}
                                            </a>
                                        </h4>
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="section-heading heading-dark">
                            <h3 class="item-heading">INSTAGRAM</h3>
                        </div>
                        <div class="widget-instagram">
                            <ul>
                                <li>
                                    <div class="item-box">
                                        <img src="/themes/blogxer/img/social-figure/social-figure47.jpg" alt="Social Figure" class="img-fluid">
                                        <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-box">
                                        <img src="/themes/blogxer/img/social-figure/social-figure48.jpg" alt="Social Figure" class="img-fluid">
                                        <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-box">
                                        <img src="/themes/blogxer/img/social-figure/social-figure49.jpg" alt="Social Figure" class="img-fluid">
                                        <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-box">
                                        <img src="/themes/blogxer/img/social-figure/social-figure50.jpg" alt="Social Figure" class="img-fluid">
                                        <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-box">
                                        <img src="/themes/blogxer/img/social-figure/social-figure51.jpg" alt="Social Figure" class="img-fluid">
                                        <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-box">
                                        <img src="/themes/blogxer/img/social-figure/social-figure52.jpg" alt="Social Figure" class="img-fluid">
                                        <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-box">
                                        <img src="/themes/blogxer/img/social-figure/social-figure53.jpg" alt="Social Figure" class="img-fluid">
                                        <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-box">
                                        <img src="/themes/blogxer/img/social-figure/social-figure54.jpg" alt="Social Figure" class="img-fluid">
                                        <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-box">
                                        <img src="/themes/blogxer/img/social-figure/social-figure55.jpg" alt="Social Figure" class="img-fluid">
                                        <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Area End Here -->
@endsection
