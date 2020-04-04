<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <title>{{ isset($title) ? $title . ' | ' .config('blog.title') : config('blog.name', 'Turahe.id') }}</title>
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="robots" content="index, follow">
    <meta name="description" content="{{ $description ?? config('blog.description') }}">
    <meta name="og:title" property="og:title" content="{{ $title ?? config('blog.title') }}">
    <meta property="og:type" content="video.movie" />
    <meta property="og:url" content="{{ $link ?? url()->current() }}" />
    <meta property="og:image" content="{{ $image ?? config('blog.image') }}" />

    <link rel="stylesheet" href="{{ asset('/assets/plugins/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/plugins/themify-icons/themify-icons.css') }}">
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



@include('blog._partials.footer')
<!-- jQuery -->
<script src="/assets/plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="/assets/plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="/assets/plugins/slick/slick.min.js"></script>
<!-- masonry -->
<script src="/assets/plugins/masonry/masonry.js"></script>
<!-- instafeed -->
<script src="/assets/plugins/instafeed/instafeed.min.js"></script>
<!-- smooth scroll -->
<script src="/assets/plugins/smooth-scroll/smooth-scroll.js"></script>
<!-- headroom -->
<script src="/assets/plugins/headroom/headroom.js"></script>
<!-- reading time -->
<script src="/assets/plugins/reading-time/readingTime.min.js"></script>
<!-- lunr.js -->
<script src="/assets/plugins/search/lunr.min.js"></script>
<!-- search -->
<script src="/assets/plugins/search/search.js"></script>

<!-- Main Script -->
<script src="/assets/js/script.js"></script>
</body>

</html>
<?php
