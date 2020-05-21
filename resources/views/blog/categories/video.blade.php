
@extends('blog.layouts.layout')
@section('content')

    @include('blog.categories.breadcrumbs')

    <!-- Blog Area Start Here -->
    <section class="blog-wrap-layout23">
        <div class="container">
            <div class="row gutters-50">
                <div class="col-lg-8">
                    <div class="blog-box-layout3">
                        <div class="item-img">
                            <img src="img/blog/blog159.jpg" alt="blog">
                            <a class="play-btn popup-youtube" href="http://www.youtube.com/watch?v=1iIZeIy7TqM">
                                <i class="flaticon-play-arrow"></i>
                            </a>
                        </div>
                        <div class="item-content">
                            <ul class="entry-meta meta-color-dark">
                                <li><i class="fas fa-tag"></i>Racing</li>
                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                <li><i class="fas fa-user"></i>BY <a href="#">Mark Willy</a></li>
                                <li><i class="far fa-clock"></i>5 Mins Read</li>
                            </ul>
                            <h2 class="item-title"><a href="single-blog.html">Car racing design things to look out for in June 2019</a></h2>
                            <p>Aimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                industry's standard dummy text ever since thetioned it, you probably perfectly understand
                                why it is important for the payment process to go as smoothly as possi to go through a million
                                or email campaigns each. </p>
                            <div class="action-area">
                                <a href="single-blog.html" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                <ul class="response-area">
                                    <li><a href="#"><i class="far fa-heart"></i>12</a></li>
                                    <li><a href="#"><i class="far fa-comment"></i>02</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters-40" id="no-equal-gallery">

                        @foreach($posts as $post)
                        <div class="col-sm-6 no-equal-item">
                            <div class="blog-box-layout3">
                                <div class="item-img">
                                    <a href="{{ $post->url }}"><img src="{{ $post->image }}" alt="{{ $post->title }}"></a>
                                </div>
                                <div class="item-content">
                                    <ul class="entry-meta meta-color-dark">
                                        <li><i class="fas fa-tag"></i>Clinic</li>
                                        <li><i class="fas fa-calendar-alt"></i>{{ $post->publish }}</li>
                                        <li><i class="far fa-clock"></i>{{ $post->read_time }}</li>
                                    </ul>
                                    <h3 class="item-title"><a href="{{ $post->url }}">{{ $post->title }}</a></h3>
                                    {{ $post->subtitle }}
                                    <div class="action-area">
                                        <a href="{{ $post->url }}" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                        <ul class="response-area">
                                            <li><a href="#"><i class="far fa-heart"></i>{{ $post->likes->count() }}</a></li>
                                            <li><a href="#"><i class="far fa-comment"></i>{{ $post->comments->count() }}</a></li>
                                        </ul>
                                    </div>
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
                <div class="col-lg-4 sidebar-widget-area sidebar-break-md">
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
                    <div class="widget">
                        <div class="section-heading heading-dark">
                            <h3 class="item-heading">ABOUT ME</h3>
                        </div>
                        <div class="widget-about">
                            <figure class="author-figure"><img src="img/figure/figure9.jpg" alt="about"></figure>
                            <figure class="author-signature"><img src="img/figure/signature.png" alt="about"></figure>
                            <p>Fusce mauris auctor ollicituder teary iner hendrerit risusey aeenean rauctor pibus
                                doloer.</p>
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
                            <h3 class="item-heading">POPULAR POSTS</h3>
                        </div>
                        <div class="widget-popular">
                            <div class="post-box">
                                <div class="item-img">
                                    <a href="single-blog.html"><img src="img/blog/blog156.jpg" alt="blog"></a>
                                </div>
                                <div class="item-content">
                                    <ul class="entry-meta meta-color-dark">
                                        <li><i class="fas fa-tag"></i>Finance</li>
                                        <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                    </ul>
                                    <h3 class="item-title"><a href="single-blog.html">Thought Living area tecnology with aert aos Angeles</a></h3>
                                </div>
                            </div>
                            <div class="post-box">
                                <div class="item-content">
                                    <ul class="entry-meta meta-color-dark">
                                        <li><i class="fas fa-tag"></i>Business</li>
                                        <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                    </ul>
                                    <h3 class="item-title"><a href="single-blog.html">Thought Living area tecnology with aert aos Angeles</a></h3>
                                </div>
                            </div>
                            <div class="post-box">
                                <div class="item-content">
                                    <ul class="entry-meta meta-color-dark">
                                        <li><i class="fas fa-tag"></i>It</li>
                                        <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                    </ul>
                                    <h3 class="item-title"><a href="single-blog.html">Thought Living area tecnology with aert aos Angeles</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>


                    <x-categories></x-categories>


                </div>
            </div>
        </div>
    </section>
    <!-- Blog Area End Here -->
@endsection
