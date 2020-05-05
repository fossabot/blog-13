<!-- Slider Area Start Here -->
<section class="slider-wrap-layout1">
    <div class="container">
        <div class="rc-carousel nav-control-layout1" data-loop="true" data-items="30" data-margin="30"
             data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false"
             data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true"
             data-r-x-small-dots="false" data-r-x-medium="1" data-r-x-medium-nav="true" data-r-x-medium-dots="false"
             data-r-small="1" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="1"
             data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="1" data-r-large-nav="true"
             data-r-large-dots="false" data-r-extra-large="1" data-r-extra-large-nav="true"
             data-r-extra-large-dots="false">
            @foreach($featured as $post)
                <div class="slider-box-layout1">
                    <div class="item-img">
                        <img src="/themes/blogxer/img/slider/slide1-1.jpg" alt="slider">
                    </div>
                    <div class="item-content">
                        <ul class="entry-meta meta-color-dark">
                            <li><i class="fas fa-tag"></i>{{ $post->category->title }}</li>
                            <li><i class="fas fa-calendar-alt"></i>{{ $post->published }}</li>
                            <li><i class="fas fa-user"></i>BY <a href="#">{{ $post->user->name }}</a></li>
                            <li><i class="far fa-clock"></i>5 Mins Read</li>
                        </ul>
                        <h2 class="item-title"><a href="{{ $post->url }}">{{ $post->title }}</a></h2>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Slider Area End Here -->

@push('scripts')
    <script src="{{ mix('js/carousel.js') }}"></script>
@endpush
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ mix('css/carousel.css') }}">
@endpush
