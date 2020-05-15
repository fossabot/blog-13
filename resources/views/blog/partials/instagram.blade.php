<!-- Instagram Start Here -->
<section class="instagram-feed-wrap">
    <div class="container">
        <div class="instagram-feed-title"><a href="#">{{ config('blog.name') }} &#64; INSTAGRAM</a></div>
        <div class="row gutters-10">

            @foreach($instagram->medias as $image)
            <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                <div class="instagram-feed-figure">
                    <a href="{{ $image->link }}">
                        <img src="{{ $image->displaySrc }}" alt="{{ $image->caption }}">
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Instagram End Here -->
