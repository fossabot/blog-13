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
                @foreach(config('blog.socials') as $name => $url)
                    <li class="single-item"><a href="{{ $url }}"><i class="fab fa-{{ $name }}"></i></a></li>
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

</div>
