<!-- Header Area Start Here -->
<header class="has-mobile-menu">
{{--    @include('blog.partials.header.topbar')--}}
    <div id="header-middlebar" class="box-layout-child bg--light border-bootom border-color-accent2">
        <div class="pt--25 pb--25">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-4">
                        <div class="header-action-items">
                            <ul>
                                <li class="offcanvas-menu-trigger-wrap">
                                    <button type="button" class="offcanvas-menu-btn menu-status-open">
                                                <span class="btn-icon-wrap">
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                </span>
                                    </button>
                                </li>
                                <li class="user-icon"><a href="#"><i class="fa fa-user"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex justify-content-center">
                        <div class="logo-area">
                            <a href="{{ url('/') }}" class="temp-logo" id="temp-logo">
                                <img src="/themes/blogxer/img/logo-dark.png" alt="logo" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    {{--<div class="col-lg-4 d-flex justify-content-end">
                        <div class="header-action-items">
                            <ul>
                                <li class="header-search-box divider-style-border">
                                    <a href="#header-search" title="Search">
                                        <i class="fa fa-glass"></i>
                                    </a>
                                </li>
                                <li class="cart-wrap divider-style-border">
                                    <div class="cart-info">
                                        <i class="fa fa-shopping-cart"></i>
                                        <div class="cart-amount">0</div>
                                    </div>
                                    <div class="cart-items">
                                        <div class="cart-item">
                                            <div class="cart-img">
                                                <a href="#">
                                                    <img src="/themes/blogxer/img/product/top-product1.jpg" alt="product" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="cart-title">
                                                <a href="#">Pressure</a>
                                                <span>Code: STPT601</span>
                                            </div>
                                            <div class="cart-quantity">X 1</div>
                                            <div class="cart-price">$249</div>
                                            <div class="cart-trash">
                                                <a href="#">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="cart-item">
                                            <div class="cart-img">
                                                <a href="#">
                                                    <img src="/themes/blogxer/img/product/top-product2.jpg" alt="product" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="cart-title">
                                                <a href="#">Stethoscope</a>
                                                <span>Code: STPT602</span>
                                            </div>
                                            <div class="cart-quantity">X 1</div>
                                            <div class="cart-price">$189</div>
                                            <div class="cart-trash">
                                                <a href="#">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="cart-item">
                                            <div class="cart-img">
                                                <a href="#">
                                                    <img src="/themes/blogxer/img/product/top-product3.jpg" alt="product" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="cart-title">
                                                <a href="#">Microscope</a>
                                                <span>Code: STPT603</span>
                                            </div>
                                            <div class="cart-quantity">X 2</div>
                                            <div class="cart-price">$379</div>
                                            <div class="cart-trash">
                                                <a href="#">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="cart-item">
                                            <div class="cart-btn">
                                                <a href="#" class="item-btn">View Cart</a>
                                                <a href="#" class="item-btn">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>--}}

                </div>
            </div>
        </div>
    </div>
    <div id="rt-sticky-placeholder"></div>
    <div id="header-menu" class="header-menu menu-layout1 box-layout-child bg--light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav id="dropdown" class="template-main-menu">
                        <ul>
                            <li>
                                <a href="{{ url('/') }}">@lang('blog.home')</a>
                            </li>
                            <li>
                                <a href="{{ url('categories') }}">@lang('blog.topics')</a>
                                <ul class="dropdown-menu-col-1">
                                    <li>
                                        <a href="{{ url('category/blog') }}">Blog</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">BLOG</a>
                                <ul class="dropdown-menu-col-1">
                                    <li>
                                        <a href="single-blog.html">Blog Details 1</a>
                                    </li>
                                    <li>
                                        <a href="single-blog2.html">Blog Details 2</a>
                                    </li>
                                    <li>
                                        <a href="single-blog3.html">Blog Details 3</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="possition-static hide-on-mobile-menu">
                                <a href="#">PAGES</a>
                                <div class="template-mega-menu">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="menu-ctg-title">Home</div>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="{{ url('/') }}">
                                                            <i class="fas fa-home"></i>Home 1</a>
                                                    </li>
                                                    <li>
                                                        <a href="index2.html">
                                                            <i class="fas fa-home"></i>Home 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="index3.html">
                                                            <i class="fas fa-home"></i>Home 3</a>
                                                    </li>
                                                    <li>
                                                        <a href="index4.html">
                                                            <i class="fas fa-home"></i>Home 4</a>
                                                    </li>
                                                    <li>
                                                        <a href="index5.html">
                                                            <i class="fas fa-home"></i>Home 5</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-3">
                                                <div class="menu-ctg-title">Home</div>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="index6.html">
                                                            <i class="fas fa-home"></i>Home 6</a>
                                                    </li>
                                                    <li>
                                                        <a href="index7.html">
                                                            <i class="fas fa-home"></i>Home 7</a>
                                                    </li>
                                                    <li>
                                                        <a href="index8.html">
                                                            <i class="fas fa-home"></i>Home 8</a>
                                                    </li>
                                                    <li>
                                                        <a href="index9.html">
                                                            <i class="fas fa-home"></i>Home 9</a>
                                                    </li>
                                                    <li>
                                                        <a href="index10.html">
                                                            <i class="fas fa-home"></i>Home 10</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-3">
                                                <div class="menu-ctg-title">Home</div>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="index11.html">
                                                            <i class="fas fa-home"></i>Home 11</a>
                                                    </li>
                                                    <li>
                                                        <a href="index12.html">
                                                            <i class="fas fa-home"></i>Home 12</a>
                                                    </li>
                                                    <li>
                                                        <a href="index13.html">
                                                            <i class="fas fa-home"></i>Home 13</a>
                                                    </li>
                                                </ul>
                                                <div class="menu-ctg-title">ARCHIVES</div>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="archives1.html">
                                                            <i class="fab fa-cloudversify"></i>Archive 1</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-3">
                                                <div class="menu-ctg-title">ARCHIVES</div>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="archives2.html">
                                                            <i class="fab fa-cloudversify"></i>Archive 2</a>
                                                    </li>
                                                </ul>
                                                <div class="menu-ctg-title">AUTHORS</div>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="authors.html">
                                                            <i class="fas fa-users"></i>Authors</a>
                                                    </li>
                                                </ul>
                                                <div class="menu-ctg-title">PAGES</div>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="404.html">
                                                            <i class="fas fa-user-secret"></i>404 Error</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="hide-on-desktop-menu">
                                <a href="#">Pages</a>
                                <ul>
                                    <li>
                                        <a href="{{ url('/') }}">About 1</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/') }}">Blog Category 1</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/') }}">Blog Details 1</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/') }}">Archives 1</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/') }}">404 Error</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/') }}">Contact</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ url('contact') }}">CONTACT</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Area End Here -->
