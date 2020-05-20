<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @if(Auth::check())
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @endif
    <title>{{ isset($title) ? $title . ' | ' .config('blog.title') : config('blog.name', 'Turahe.id') }}</title>
    <link rel="alternate" type="application/rss+xml" href="{{ url('rss') }}" title="RSS Feed {{ config('blog.title') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="robots" content="index, follow">
    <meta name="author" content="{{ $author ?? config('blog.author.name') }}" />
    <meta name="description" content="{{ $description ?? config('blog.description') }}" />
    <meta property="og:site_name" content="turahe.id">
    <meta property="og:locale" content="{{ config('app.locale') }}">
    <meta name="og:title" property="og:title" content="{{ $title ?? config('blog.title') }}" />
    <meta property="og:type" content="video.movie" />
    <meta property="og:url" content="{{ $link ?? request()->fullUrl() }}" />
    <!-- Web Application Manifest -->
    <link rel="manifest" href="{{ url('manifest.json') }}">
    <!-- Chrome for Android theme color -->
    <meta name="theme-color" content="{{ config('pwa.theme_color') }}">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="{{ config('pwa.display') == 'standalone' ? 'yes' : 'no' }}">
    <meta name="application-name" content="{{ config('pwa.short_name') }}">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="{{ config('pwa.display') == 'standalone' ? 'yes' : 'no' }}">
    <meta name="apple-mobile-web-app-status-bar-style" content="{{  config('pwa.status_bar') }}">
    <meta name="apple-mobile-web-app-title" content="{{ config('pwa.short_name') }}">


    <link href="{{ config('pwa.manifest.splash.640x1136') }}" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="{{ config('pwa.manifest.splash.750x1334') }}" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="{{ config('pwa.manifest.splash.1242x2208') }}" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="{{ config('pwa.manifest.splash.1125x2436') }}" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="{{ config('pwa.manifest.splash.828x1792') }}" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="{{ config('pwa.manifest.splash.1242x2688') }}" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="{{ config('pwa.manifest.splash.1536x2048') }}" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="{{ config('pwa.manifest.splash.1668x2224') }}" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="{{ config('pwa.manifest.splash.1668x2388') }}" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="{{ config('pwa.manifest.splash.2048x2732') }}" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />

    <!-- Tile for Win8 -->
    <meta name="msapplication-TileColor" content="{{ config('pwa.background_color') }}">

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
                <a href="{{ url('/') }}"><img src="/themes/blog/img/logo-dark2.png" alt="logo"></a>
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
                            <a class="svg-icon" href="{{ $social['url'] }}" rel="me" title="{{ $social['name'] }}">
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
