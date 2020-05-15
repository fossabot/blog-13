@extends('blog.layouts.layout', [
    'title' => $blog->title,
    'author' => $blog->user->name,
    'description' => $blog->meta_description
])

@section('content')
    <!-- Single Blog Banner Start Here -->
    <section class="single-blog-wrap-layout1">
        <div class="single-blog-banner-layout1">
            <div class="banner-img">
                <img src="{{ $blog->cover->url }}" alt="{{ $blog->title }}">
            </div>
            <div class="banner-content">
                <div class="container">
                    <ul class="entry-meta meta-color-light2">
                        <li>
                            <i class="fas fa-tag"></i>
                            {{ $blog->category->title }}
                        </li>
                        <li data-toggle="tooltip" title="{{ $blog->published_at->toIso8601String() }}">
                            <i class="fas fa-calendar-alt"></i>
                            {{ $blog->publish }}
                        </li>
                        <li>
                            <i class="fas fa-user"></i>
                            BY <a href="#">{{ $blog->user->name }}</a>
                        </li>
                        <li>
                            <i class="far fa-clock"></i>
                            5 Mins Read
                        </li>
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
                        </div>
                        <div class="blog-entry-meta">
                            <ul>
                                <li class="item-tag"><i class="fas fa-bookmark"></i>
                                    @foreach($blog->tags as $tag)
                                        <a href="{{ $tag->url }}">{{ $tag->tag }},</a>
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
                                <img src="/themes/blogxer/img/blog/blog212.jpg" alt="{{ $blog->user->name }}" class="media-img-auto">
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
                                            <a href="{{ $post->url }}">
                                                <img src="{{ $post->cover->url }}" alt="{{ $post->title }}">
                                            </a>
                                        </div>
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li>
                                                    <i class="fas fa-tag"></i>
                                                    {{ $post->category->title }}
                                                </li>
                                                <li data-toggle="tooltip" title="{{ $blog->published_at->toIso8601String() }}">
                                                    <i class="fas fa-calendar-alt"></i>
                                                    {{ $post->publish }}
                                                </li>
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
                                <h3 class="item-heading">{{ $blog->comments->count() }} COMMENTS</h3>
                            </div>
                            @foreach($blog->comments as $comment)
                            <div class="media media-none--xs">
                                <img src="/themes/blogxer/img/blog/blog216.jpg" alt="Blog Comments" class="img-fluid media-img-auto">
                                <div class="media-body">
                                    <h4 class="item-title">{{ $comment->user->name }}</h4>
                                    <div class="item-subtitle" data-toggle="tooltip" title="{{ $comment->published_at->toIso8601String() }}">
                                        {{ $comment->time_elapsed }}
                                    </div>
                                    {{ $comment->content }}
                                    <a href="#" class="item-btn">Reply</a>
                                </div>
                            </div>
                            @endforeach
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
                                @foreach($posts->take(10) as $post)
                                <li class="single-item">
                                    <div class="item-img">
                                        <a href="{{ $post->url }}">
                                            <img height="100px" src="/themes/blogxer/img/blog/blog86.jpg" alt="{{ $post->title }}">
                                        </a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>{{ $post->category->title }}</li>
                                            <li  data-toggle="tooltip" title="{{ $post->published_at->toIso8601String() }}">
                                                <i class="fas fa-calendar-alt"></i>
                                                {{ $post->publish }}
                                            </li>
                                        </ul>
                                        <h4 class="item-title"><a href="{{ $post->url }}">{{ $post->title }}</a></h4>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="section-heading heading-dark">
                            <h3 class="item-heading">FOLLOW ME ON</h3>
                        </div>
                        <div class="widget-follow-us-2">
                            <ul>
                                @foreach(config('blog.socials') as $social)
                                <li class="single-item">
                                    <a href="{{ $social['url'] }}">
                                        <i class="fab fa-{{ $social['name'] }}"></i>
                                        {{ $social['text'] }}
                                    </a>
                                </li>
                                @endforeach
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
                                            <a href="{{ $category->url }}">{{ $category->title }}
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
                            <a href="#"><img src="/themes/blogxer/img/figure/figure5.jpg" alt="Ad" class="img-fluid"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Single Blog Banner End Here -->
    <!-- Instagram Start Here -->
    <section class="instagram-feed-wrap-1">
        <div class="instagram-feed-title-1">
            <a href="#">
                <i class="fab fa-instagram"></i>
                FOLLOW US ON INSTAGRAM
            </a>
        </div>
        <ul class="instagram-feed-figure-1">
            <li>
                <a href="#">
                    <img src="/themes/blogxer/img/social-figure/social-figure22.jpg" alt="Social">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/themes/blogxer/img/social-figure/social-figure23.jpg" alt="Social"></a>
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
