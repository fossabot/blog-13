@extends('blog.layouts.layout')
@section('content')
    @includeIf('blog.partials.slider')
    <!-- Blog Area Start Here -->
    <section class="blog-wrap-layout1">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="blog-box-layout1">
                        <div class="item-img">
                            <a href="single-blog.html"><img src="/themes/blogxer/img/blog/blog.jpg" alt="blog"></a>
                        </div>
                        <div class="item-content">
                            <ul class="entry-meta meta-color-dark">
                                <li><i class="fas fa-tag"></i>Coffe</li>
                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                <li><i class="far fa-clock"></i>5 Mins Read</li>
                            </ul>
                            <h3 class="item-title"><a href="single-blog.html">7 Dreamy Places You will Never
                                    Get to Visit Dreamy Places.</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-box-layout1">
                        <div class="item-img">
                            <a href="single-blog.html"><img src="/themes/blogxer/img/blog/blog1.jpg" alt="blog"></a>
                        </div>
                        <div class="item-content">
                            <ul class="entry-meta meta-color-dark">
                                <li class="svg-icon">{!! svg('icons/tag') !!} Food</li>
                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                <li><i class="far fa-clock"></i>5 Mins Read</li>
                            </ul>
                            <h3 class="item-title"><a href="single-blog.html">This Is How Fashion Will Look
                                    Like In 10 Years Time.</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-box-layout1">
                        <div class="item-img">
                            <a href="single-blog.html"><img src="/themes/blogxer/img/blog/blog2.jpg" alt="blog"></a>
                        </div>
                        <div class="item-content">
                            <ul class="entry-meta meta-color-dark">
                                <li><i class="fas fa-tag"></i>Travel</li>
                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                <li><i class="far fa-clock"></i>5 Mins Read</li>
                            </ul>
                            <h3 class="item-title"><a href="single-blog.html">To travel is worth any cost or
                                    sacrifice.</a></h3>
                        </div>
                    </div>
                </div>
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
                            <a href="single-blog.html"><img src="/themes/blogxer/img/blog/blog3.jpg" alt="blog"></a>
                        </div>
                        <div class="item-content">
                            <ul class="entry-meta meta-color-dark">
                                <li><i class="fas fa-tag"></i>Fashion</li>
                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                <li><i class="fas fa-user"></i>BY <a href="#">Mark Willy</a></li>
                                <li><i class="far fa-clock"></i>5 Mins Read</li>
                            </ul>
                            <h2 class="item-title"> <a href="single-blog.html">What Your Holiday Capsule
                                    Wardrobe Contain</a></h2>
                            <p>Aliquam erat volutpat. Curabitur venenatis massa sed lacus tristique, non auctor
                                nisl sodales Sed ultricies lacus ut libero faucibus fringilla. In risus magna
                                vel.
                                Aliquam erat volutpat Curabitur venenatis massa tiquenon auctor nisl sodales.
                                nisl sodales Sed ultricies lacus ut libero faucibus fringilla.</p>
                            <a href="single-blog.html" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="row gutters-40">
                        @foreach($blogs as $blog)
                            <div class="col-sm-6 col-12">
                                <div class="blog-box-layout1">
                                    <div class="item-img">
                                        <a href="{{ $blog->url }}"><img src="{{ $blog->image->url }}" alt="{{ $blog->title }}"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>{{ $blog->category->title }}</li>
                                            <li><i class="fas fa-calendar-alt"></i>{{ $blog->publish }}</li>
                                            <li><i class="far fa-clock"></i>5 Mins Read</li>
                                        </ul>
                                        <h3 class="item-title"> <a href="{{ $blog->url }}">{{ $blog->title }}</a></h3>
                                        <p>{{ $blog->subtitle }}</p>
                                        <a href="{{ $blog->url }}" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
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
                            <h3 class="item-heading">ABOUT ME</h3>
                        </div>
                        <div class="widget-about">
                            <figure class="author-figure"><img src="/themes/blogxer/img/figure/figure.jpg" alt="about"></figure>
                            <figure class="author-signature"><img src="/themes/blogxer/img/figure/signature.png" alt="about"></figure>
                            <p>Fusce mauris auctor ollicituder teary iner hendrerit risusey aeenean rauctor
                                pibus
                                doloer.</p>
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
                                            {!! svg("icons/{$social['name']}") !!}
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
                                            <a href="#"><img src="/themes/blogxer/img/blog/blog12.jpg" alt="Post"></a>
                                            <div class="count-number">1</div>
                                        </div>
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-calendar-alt"></i>{{ $post->publish }}</li>
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
                            <a href="#"><img src="/themes/blogxer/img/figure/figure1.jpg" alt="Ad" class="img-fluid"></a>
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
                                        <img src="/themes/blogxer/img/social-figure/social-figure1.jpg" alt="Social Figure"
                                             class="img-fluid">
                                        <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-box">
                                        <img src="/themes/blogxer/img/social-figure/social-figure2.jpg" alt="Social Figure"
                                             class="img-fluid">
                                        <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-box">
                                        <img src="/themes/blogxer/img/social-figure/social-figure3.jpg" alt="Social Figure"
                                             class="img-fluid">
                                        <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-box">
                                        <img src="/themes/blogxer/img/social-figure/social-figure4.jpg" alt="Social Figure"
                                             class="img-fluid">
                                        <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-box">
                                        <img src="/themes/blogxer/img/social-figure/social-figure5.jpg" alt="Social Figure"
                                             class="img-fluid">
                                        <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-box">
                                        <img src="/themes/blogxer/img/social-figure/social-figure6.jpg" alt="Social Figure"
                                             class="img-fluid">
                                        <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-box">
                                        <img src="/themes/blogxer/img/social-figure/social-figure7.jpg" alt="Social Figure"
                                             class="img-fluid">
                                        <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-box">
                                        <img src="/themes/blogxer/img/social-figure/social-figure8.jpg" alt="Social Figure"
                                             class="img-fluid">
                                        <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-box">
                                        <img src="/themes/blogxer/img/social-figure/social-figure9.jpg" alt="Social Figure"
                                             class="img-fluid">
                                        <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
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
    @include('blogxer.partials.instagram')
@endsection
