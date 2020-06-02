<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
        <meta name="api-token" content="{{ auth()->user()->api_token }}">
    @endauth
    <title>{{ isset($title) ? $title . ' | ' .config('blog.title') : config('blog.name', 'Turahe.id') }}</title>
    <link rel="alternate" type="application/rss+xml" href="{{ url('rss') }}" title="RSS Feed {{ config('blog.title') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="robots" content="index, follow">
    <meta name="author" content="{{ config('blog.author.name') }}" />
    <meta name="description" content="{{ isset($description) ? $description : config('blog.description')  }}" />
    <meta name="keywords" content="{{ isset($keyword) ? $keyword : config('blog.keyword')  }}">
    <meta property="og:site_name" content="turahe.id">
    <meta property="og:locale" content="{{ config('app.locale') }}">
    <meta name="og:title" property="og:title" content="{{ $title ?? config('blog.title') }}" />
    <meta property="og:type" content="video.movie" />
    <meta property="og:url" content="{{ $link ?? request()->fullUrl() }}" />
    <!-- Web Application Manifest -->
    <link rel="manifest" href="{{ url('manifest.json') }}">

    <link rel="stylesheet" type="text/css" href="{{ mix('css/style.css') }}">
    @stack('styles')
</head>

<body class="bg-pearl box-layout sticky-header">
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="{{ url('/') }}">upgrade your browser</a> to improve your experience and security.</p>
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
    @include('blog.partials.header')

    <div class="box-layout-child bg-white">

        <!-- Blog Area Start Here -->
    @yield('content')
    <!-- Blog Area End Here -->

    </div>
@include('blog.partials.footer')
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
                <a href="{{ url('/') }}">
                    <img src="/themes/blog/img/logo-dark2.png" alt="logo">
                </a>
            </div>
            <ul class="offcanvas-menu">
                <li class="nav-item">
                    <a href="{{ url('/') }}">HOME</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('about') }}">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/') }}">CATEGORIES</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/') }}">AUTHORS</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/') }}">ARCHIVE</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('contact') }}">CONTACT</a>
                </li>
            </ul>
            <div class="offcanvas-footer">
                <div class="item-title">Follow Me</div>
                <ul class="offcanvas-social">
                    @foreach(config('blog.socials') as $social)
                        <li>
                            <a href="{{ $social['url'] }}" rel="me" title="{{ $social['name'] }}">
                                <i class="fab fa-{{ $social['name'] }}"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- Offcanvas Menu End -->
</div>

@include('analytics')
<!-- jquery-->
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/script.js') }}"></script>
@stack('scripts')

</body>


</html>
