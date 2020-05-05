@extends('blogxer.layouts.layout')
@section('content')
    <!-- Single Blog Banner Start Here -->
    <section class="single-blog-wrap-layout1">
        <div class="single-blog-banner-layout1">
            <div class="banner-img">
                <img src="{{ $blog->image->url }}" alt="blog">
            </div>
            <div class="banner-content">
                <div class="container">
                    <ul class="entry-meta meta-color-light2">
                        <li><i class="fas fa-tag"></i>{{ $blog->category->title }}</li>
                        <li><i class="fas fa-calendar-alt"></i>{{ $blog->published }}</li>
                        <li><i class="fas fa-user"></i>BY <a href="#">{{ $blog->user->name }}</a></li>
                        <li><i class="far fa-clock"></i>5 Mins Read</li>
                    </ul>
                    <h2 class="item-title">{{ $blog->title }}</h2>
                    <ul class="item-social">
                        <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i>SHARE</a></li>
                        <li><a href="#" class="twitter"><i class="fab fa-twitter"></i>SHARE</a></li>
                        <li><a href="#" class="g-plus"><i class="fab fa-google-plus-g"></i>SHARE</a></li>
                        <li><a href="#" class="pinterst"><i class="fab fa-pinterest"></i>PIN IT</a></li>
                        <li><a href="#" class="load-more"><i class="fas fa-plus"></i>MORE</a></li>
                    </ul>
                    <ul class="response-area">
                        <li><a href="#"><i class="far fa-comment"></i>02</a></li>
                        <li><a href="#"><i class="far fa-eye"></i>105</a></li>
                        <li><a href="#"><i class="far fa-heart"></i>{{ $blog->likes->count() }}</a></li>
                        <li><a href="#"><i class="fas fa-share"></i>302</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row gutters-50">
                <div class="col-lg-8">
                    <div class="single-blog-box-layout1">
                        <div class="blog-details">
                            {!! $blog->content_html !!}
                            <div class="single-slider">
                                <div class="rc-carousel nav-control-layout9" data-loop="true" data-items="30"
                                     data-margin="20" data-autoplay="false" data-autoplay-timeout="5000"
                                     data-smart-speed="700" data-dots="false" data-nav="true" data-nav-speed="false"
                                     data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false"
                                     data-r-x-medium="1" data-r-x-medium-nav="true" data-r-x-medium-dots="false"
                                     data-r-small="1" data-r-small-nav="true" data-r-small-dots="false"
                                     data-r-medium="1" data-r-medium-nav="true" data-r-medium-dots="false"
                                     data-r-large="1" data-r-large-nav="true" data-r-large-dots="false"
                                     data-r-extra-large="1" data-r-extra-large-nav="true" data-r-extra-large-dots="false">
                                    <div class="single-slider-box">
                                        <div class="item-img">
                                            <img src="img/blog/blog211.jpg" alt="slider">
                                        </div>
                                    </div>
                                    <div class="single-slider-box">
                                        <div class="item-img">
                                            <img src="img/blog/blog211.jpg" alt="slider">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="more-info">
                                <h2 class="item-title">Discover Travel Innovation 2019</h2>
                                <p>Equidem impedit officiis quo te. Illud partem sententiae mel eu,
                                    euripidis urbanitas et sit. Mediocrem reprimique an vim, veniam
                                    tibique omittantur duo ut, agam graeci in vim. Quot appetere
                                    patrioque te mea, animal aliquip te pri. Ad vis animal ceteros
                                    percipitur, eos tollit civibus percipitur noLorem ipsum proin
                                    gravida nibh vel velit auctor aliquet. Aenean sollicitudin,
                                    lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis
                                    sem nibh id elit.Duis sed odio sit amet nibh vulputate cursus a
                                    sit amet mauris.</p>
                            </div>
                        </div>
                        <div class="blog-entry-meta">
                            <ul>
                                <li class="item-tag"><i class="fas fa-bookmark"></i>
                                    @foreach($blog->tags as $tag)
                                        <a href="#">{{ $tag->tag }},</a>
                                    @endforeach
                                </li>
                                <li class="item-social">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $blog->url }}"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://twitter.com/share?url={{ $blog->url }}&text={{ $blog->title }}via=<USERNAME>"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.linkedin.com/shareArticle?url={{ $blog->url }}&title={{ $blog->title }}&summary={{ $blog->subtitle }}&source={{ $blog->url }}"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                    <a href="#"><i class="fab fa-pinterest"></i></a>
                                </li>
                                <li class="item-respons"><i class="fas fa-heart"></i>{{ $blog->likes->count() }}</li>
                            </ul>
                        </div>
                        <div class="blog-author">
                            <div class="media media-none--xs">
                                <img src="img/blog/blog212.jpg" alt="Author" class="media-img-auto">
                                <div class="media-body">
                                    <h4 class="item-title">{{ $blog->user->name }}</h4>
                                    <div class="item-subtitle">Author</div>
                                    <p>Dorem ipsum dolor sit amet, consectetuer adipiscing
                                        elit,sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna.</p>
                                    <ul class="item-social">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="related-item">
                            <div class="section-heading-4 heading-dark">
                                <h3 class="item-heading">YOU MAY ALSO LIKE</h3>
                            </div>
                            <div class="row">
                                @foreach($posts->take(3) as $post)
                                <div class="col-sm-4 col-12">
                                    <div class="blog-box-layout1 text-left">
                                        <div class="item-img">
                                            <a href="{{ $post->url }}"><img src="{{ $post->image->url }}" alt="{{ $post->title }}"></a>
                                        </div>
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-tag"></i>{{ $post->category->title }}</li>
                                                <li><i class="fas fa-calendar-alt"></i>{{ $post->published }}</li>
                                            </ul>
                                            <h5 class="item-title"><a href="{{ $post->url }}">{{ $post->title }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="blog-comment">
                            <div class="section-heading-4 heading-dark">
                                <h3 class="item-heading">02 COMMENTS</h3>
                            </div>
                            <div class="media media-none--xs">
                                <img src="img/blog/blog216.jpg" alt="Blog Comments" class="img-fluid media-img-auto">
                                <div class="media-body">
                                    <h4 class="item-title">Jack Sparrow</h4>
                                    <div class="item-subtitle">2 Mins Ago</div>
                                    <p>Bmmy text of the printing and typesetting industryorem Ipsum
                                        has been the industry's standard dummy text ever since the</p>
                                    <a href="#" class="item-btn">Reply</a>
                                </div>
                            </div>
                            <div class="media media-none--xs">
                                <img src="img/blog/blog217.jpg" alt="Blog Comments" class="img-fluid media-img-auto">
                                <div class="media-body">
                                    <h4 class="item-title">Dakcon Nitiya</h4>
                                    <div class="item-subtitle">2 Mins Ago</div>
                                    <p>Bmmy text of the printing and typesetting industryorem Ipsum has
                                        been the industry's standard dummy text ever since the</p>
                                    <a href="#" class="item-btn">Reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-form">
                            <div class="section-heading-4 heading-dark">
                                <h3 class="item-heading">WRITE A COMMENT</h3>
                            </div>
                            <form class="contact-form-box">
                                <div class="row gutters-15">
                                    <div class="col-md-4 form-group">
                                        <input type="text" placeholder="Name*" class="form-control" name="first_name"
                                               data-error="Name field is required" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="email" placeholder="E-mail*" class="form-control" name="email"
                                               data-error="E-mail field is required" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" placeholder="Website*" class="form-control" name="website"
                                               data-error="website field is required" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-12 form-group">
                                            <textarea placeholder="Write your comments ..." class="textarea form-control"
                                                      name="message" rows="8" cols="20" data-error="Message field is required"
                                                      required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-12 form-group">
                                        <button class="item-btn">POST COMMENT</button>
                                    </div>
                                </div>
                                <div class="form-response"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 sidebar-widget-area sidebar-break-md">
                    <div class="widget">
                        <div class="section-heading heading-dark">
                            <h3 class="item-heading">POPULAR POSTS</h3>
                        </div>
                        <div class="widget-latest">
                            <ul class="block-list">
                                @foreach($posts as $post)
                                <li class="single-item">
                                    <div class="item-img">
                                        <a href="#"><img height="100px" src="{{ $post->image->url }}" alt="{{ $post->title }}"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>{{ $post->category->title }}</li>
                                            <li><i class="fas fa-calendar-alt"></i>{{ $post->published }}</li>
                                        </ul>
                                        <h4 class="item-title"><a href="{{ $post->url }}">{{ $post->title }}</a></h4>
                                    </div>
                                </li>
                                @endforeach

                                <li class="single-item">
                                    <div class="item-img">
                                        <a href="#"><img src="img/blog/blog86.jpg" alt="Post"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Flower</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                        </ul>
                                        <h4 class="item-title"><a href="#">Type designer Jeremy Tanka rdoverhauls
                                                online</a></h4>
                                    </div>
                                </li>
                                <li class="single-item">
                                    <div class="item-img">
                                        <a href="#"><img src="img/blog/blog87.jpg" alt="Post"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Stage</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                        </ul>
                                        <h4 class="item-title"><a href="#">5 design things to look out for in June
                                                2019</a></h4>
                                    </div>
                                </li>
                                <li class="single-item">
                                    <div class="item-img">
                                        <a href="#"><img src="img/blog/blog88.jpg" alt="Post"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Life Style</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                        </ul>
                                        <h4 class="item-title"><a href="#">Marc Falzone opens £2 million UK Expo
                                                Pavilion</a></h4>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="section-heading heading-dark">
                            <h3 class="item-heading">FOLLOW ME ON</h3>
                        </div>
                        <div class="widget-follow-us-2">
                            <ul>
                                <li class="single-item"><a href="#"><i class="fab fa-facebook-f"></i>LIKE ME ON</a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-twitter"></i>FOLLOWE ME</a></li>
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
                        <div class="widget-ad">
                            <a href="#"><img src="img/figure/figure5.jpg" alt="Ad" class="img-fluid"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Single Blog Banner End Here -->
    <!-- Instagram Start Here -->
    <section class="instagram-feed-wrap-1">
        <div class="instagram-feed-title-1"><a href="#"><i class="fab fa-instagram"></i>FOLLOW US ON INSTAGRAM</a></div>
        <ul class="instagram-feed-figure-1">
            <li>
                <a href="#"><img src="/themes/blogxer/img/social-figure/social-figure22.jpg" alt="Social"></a>
            </li>
            <li>
                <a href="#"><img src="/themes/blogxer/img/social-figure/social-figure23.jpg" alt="Social"></a>
            </li>
            <li>
                <a href="#"><img src="/themes/blogxer/img/social-figure/social-figure24.jpg" alt="Social"></a>
            </li>
            <li>
                <a href="#"><img src="/themes/blogxer/img/social-figure/social-figure25.jpg" alt="Social"></a>
            </li>
            <li>
                <a href="#"><img src="/themes/blogxer/img/social-figure/social-figure26.jpg" alt="Social"></a>
            </li>
            <li>
                <a href="#"><img src="/themes/blogxer/img/social-figure/social-figure27.jpg" alt="Social"></a>
            </li>
            <li>
                <a href="#"><img src="/themes/blogxer/img/social-figure/social-figure28.jpg" alt="Social"></a>
            </li>
            <li>
                <a href="#"><img src="/themes/blogxer/img/social-figure/social-figure29.jpg" alt="Social"></a>
            </li>
        </ul>
    </section>
    <!-- Instagram End Here -->
@endsection
