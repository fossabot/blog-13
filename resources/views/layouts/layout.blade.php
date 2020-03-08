<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Playfair+Display:400,700" rel="stylesheet">

    <!-- Styles -->
    <link href="//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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


@include('partials._header')

@yield('content')

@include('partials._footer')
<!-- Scripts -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="//unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/reading-time/2.0.0/readingTime.min.js"></script>
<script>
    (function ($) {
        'use strict';

        // Preloader js
        $(window).on('load', function () {
            $('.preloader').fadeOut(700);
        });

        // headroom js
        // $('.navigation').headroom();

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




        setTimeout(function () {
            $('.instagram-slider').slick({
                dots: false,
                speed: 300,
                autoplay: true,
                arrows: false,
                slidesToShow: 6,
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
        }, 2000);

        // article reading time
        $('article').each(function () {

            let _this = $(this);

            _this.readingTime({
                readingTimeTarget: _this.find('.eta'),
                remotePath: _this.attr('data-file'),
                remoteTarget: _this.attr('data-target')
            });
        });


    })(jQuery);
</script>

</body>
</html>
