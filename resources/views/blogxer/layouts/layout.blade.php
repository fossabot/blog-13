<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{ mix('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="/themes/blogxer/style.css">
    @stack('styles')
</head>

<body class="bg-pearl box-layout sticky-header">
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
<!-- ScrollUp Start Here -->
<a href="#wrapper" data-type="section-switch" class="scrollup">
    <i class="fas fa-angle-double-up"></i>
</a>
<!-- ScrollUp End Here -->
<!-- Preloader Start Here -->
<div id="preloader"></div>
<!-- Preloader End Here -->
<div id="wrapper" class="wrapper">
    <!-- Add your site or application content here -->
    @include('blogxer.partials.header')

    <div class="box-layout-child bg-white">

    <!-- Blog Area Start Here -->
        @yield('content')
        <!-- Blog Area End Here -->

    </div>
@include('blogxer.partials.footer')
    <!-- Search Box Start Here -->
    <div id="header-search" class="header-search">
        <button type="button" class="close">×</button>
        <form class="header-search-form">
            <input type="search" value="" placeholder="Type here........" />
            <button type="submit" class="search-btn">
                <i class="flaticon-magnifying-glass"></i>
            </button>
        </form>
    </div>
    <!-- Search Box End Here -->
    <!-- Offcanvas Menu Start -->
    <div class="offcanvas-menu-wrap" id="offcanvas-wrap" data-position="left">
        <div class="offcanvas-content">
            <div class="offcanvas-logo">
                <a href="index.html"><img src="/themes/blogxer/img/logo-dark2.png" alt="logo"></a>
            </div>
            <ul class="offcanvas-menu">
                <li class="nav-item">
                    <a href="index.html">HOME</a>
                </li>
                <li class="nav-item">
                    <a href="about.html">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a href="blog-category1.html">CATEGORIES</a>
                </li>
                <li class="nav-item">
                    <a href="authors.html">AUTHORS</a>
                </li>
                <li class="nav-item">
                    <a href="archives1.html">ARCHIVE</a>
                </li>
                <li class="nav-item">
                    <a href="contact.html">CONTACT</a>
                </li>
            </ul>
            <div class="offcanvas-footer">
                <div class="item-title">Follow Me</div>
                <ul class="offcanvas-social">
                    @foreach(config('blog.socials') as $name => $url)
                        <li><a href="{{ $url }}"><i class="fab fa-{{ $name }}"></i></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- Offcanvas Menu End -->
</div>
<!-- jquery-->
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
@stack('scripts')
<script src="{{ mix('js/script.js') }}"></script>


</body>


</html>
