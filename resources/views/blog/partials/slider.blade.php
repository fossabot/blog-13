<!-- Slider Area Start Here -->
<section class="slider-wrap-layout1">
    <div class="container">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">
                @foreach($featured as $post)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                @endforeach
            </ol>

            <div class="carousel-inner" role="listbox">
                @foreach($featured as $post)
                    <div class="carousel-item slider-box-layout1 {{ $loop->first ? 'active' : '' }}">
                        <img class="d-block img-fluid" src="{{ $post->getMedia('images')[0]->getUrl('slider') }}" alt="{{ $post->title }}">
                        <div class="item-content">
                            <ul class="entry-meta meta-color-dark">
                                <li><i class="fas fa-tag"></i>{{ $post->category->title }}</li>
                                <li><i class="fas fa-calendar-alt"></i>{{ $post->published }}</li>
                                <li><i class="fas fa-user"></i>BY <a href="#">{{ $post->user->name }}</a></li>
                                <li><i class="far fa-clock"></i>{{ $post->read_time }}</li>
                            </ul>
                            <h2 class="item-title"><a href="{{ $post->url }}">{{ $post->title }}</a></h2>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>
<!-- Slider Area End Here -->
