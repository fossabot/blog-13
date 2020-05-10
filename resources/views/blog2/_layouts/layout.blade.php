<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <title>{{ isset($title) ? $title . ' | ' .config('blog.title') : config('blog.name', 'Turahe.id') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="robots" content="index, follow">
    {{--    <meta name="author" content="{{ $author ?? config('blog.author') }}" />--}}
    <meta name="description" content="{{ $description ?? config('blog.description') }}" />
    <meta property="og:site_name" content="turahe.id">
    <meta property="og:locale" content="{{ config('app.locale') }}">
    <meta name="og:title" property="og:title" content="{{ $title ?? config('blog.title') }}" />
    <meta property="og:type" content="video.movie" />
    <meta property="og:url" content="{{ $link ?? request()->fullUrl() }}" />

    <meta property="og:image" content="{{ $image ?? config('blog.image') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/slick/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/themify-icons/themify-icons.css') }}" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    @stack('styles')
    <script type='application/ld+json'>
    {
        "@context":"http:\/\/schema.org",
        "@type":"WebSite",
        "@id":"#website",
        "url":"https:\/\/turahe.id\/",
        "name":"turahe.id",
        "alternateName":"A blog on modern PHP and Laravel"
    }
</script>
    <script type='application/ld+json'>
    {
        "@context":"http:\/\/schema.org",
        "@type":"Person",
        "sameAs":["https:\/\/twitter.com\/wach_1"],
        "@id":"#person",
        "name":"Nur Wachid"
    }
</script>
</head>
<body>
<!-- preloader -->
<div class="preloader">
    <div class="loader">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- /preloader -->
@include('blog._partials.header')
@yield('content')
@include('blog._partials.footer')
@if(App::environment('production'))
    <script>
        {{--        google analitics--}}
    </script>
@endif
<script src="/assets/plugins/jQuery/jquery.min.js"></script>
<script src="/assets/plugins/bootstrap/bootstrap.min.js"></script>
<script src="/assets/plugins/slick/slick.min.js"></script>
<script src="/assets/plugins/masonry/masonry.js"></script>
<script src="/assets/plugins/smooth-scroll/smooth-scroll.js"></script>
<script src="/assets/plugins/headroom/headroom.js"></script>
@stack('scripts')
<script>
    $(window).on('load', function () {
        $('.preloader').fadeOut(700);
    });

    // $('[data-toggle="tooltip"]').tooltip();

    // headroom js
    $('.navigation').headroom();

    // Background-images
    $('[data-background]').each(function () {
        $(this).css({
            'background-image': 'url(' + $(this).data('background') + ')'
        });
    });
    $('.featured-post-slider').slick({
        dots: false,
        speed: 300,
        autoplay: true,
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 4
            }
        },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2
                }
            }
        ]
    });
    // Masonry
    $(document).ready(function () {
        $('.masonry-container').masonry({
            itemSelector: '.masonry-container > div',
            columnWidth: 1
        });
    });
</script>
</body>

</html>
<?php
