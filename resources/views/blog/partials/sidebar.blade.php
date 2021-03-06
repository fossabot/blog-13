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
                    <li>
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
                            <a href="#"><img src="/themes/blogxer/img/blog/blog12.jpg" alt="Post"></a>
                            <div class="count-number">1</div>
                        </div>
                        <div class="item-content">
                            <ul class="entry-meta meta-color-dark">
                                <li><i class="fas fa-calendar-alt"></i>
                                    <time datetime="{{ $post->published_at->toIso8601String() }}" title="{{ $post->published_at->format('M d, Y g:i:s a') }}">
                                        {{ $post->publish }}
                                    </time>
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

</div>
