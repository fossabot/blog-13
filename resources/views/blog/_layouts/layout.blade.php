<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <title>{{ isset($title) ? $title . ' | ' .config('blog.title') : config('blog.name', 'Turahe.id') }}</title>
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('/assets/plugins/bootstrap/bootstrap.min.css') }}">
    <!-- slick slider -->
    <link rel="stylesheet" href="{{ asset('/assets/plugins/slick/slick.css') }}">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="{{ asset('/assets/plugins/themify-icons/themify-icons.css') }}">

    <!-- Main Stylesheet -->
    <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">

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


<!-- instagram -->
{{--<section>--}}
{{--    <div class="container-fluid px-0">--}}
{{--        <div class="row no-gutters instagram-slider" id="instafeed" data-userId="4044026246"--}}
{{--             data-accessToken="4044026246.1677ed0.8896752506ed4402a0519d23b8f50a17"></div>--}}
{{--    </div>--}}
{{--</section>--}}
<!-- /instagram -->

@include('blog._partials.footer')
<!-- jQuery -->
<script src="{{ asset('/assets/plugins/jQuery/jquery.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('/assets/plugins/bootstrap/bootstrap.min.js') }}"></script>
<!-- slick slider -->
<script src="{{ asset('/assets/plugins/slick/slick.min.js') }}"></script>
<!-- masonry -->
<script src="{{ asset('/assets/plugins/masonry/masonry.js') }}"></script>
<!-- instafeed -->
<script src="{{ asset('/assets/plugins/instafeed/instafeed.min.js') }}"></script>
<!-- smooth scroll -->
<script src="{{ asset('/assets/plugins/smooth-scroll/smooth-scroll.js') }}"></script>
<!-- headroom -->
<script src="{{ asset('/assets/plugins/headroom/headroom.js') }}"></script>
<!-- reading time -->
<script src="{{ asset('/assets/plugins/reading-time/readingTime.min.js') }}"></script>
<!-- lunr.js -->
<script src="{{ asset('/assets/plugins/search/lunr.min.js') }}"></script>
<!-- search -->
<script src="{{ asset('/assets/plugins/search/search.js') }}"></script>

<!-- Main Script -->
<script src="{{ asset('/assets/js/script.js') }}"></script>
</body>

</html>
<?php
