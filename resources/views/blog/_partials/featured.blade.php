<!-- featured post -->
<section>
    <div class="container-fluid p-sm-0">
        <div class="row featured-post-slider">

            @foreach($featured as $slide)
                <div class="col-lg-3 col-sm-6 mb-2 mb-lg-0 px-1">
                    <article class="card bg-dark text-center text-white border-0 rounded-0">
                        <img class="card-img rounded-0 img-fluid w-100" src="{{ $slide->images[0]->url }}" alt="{{ $slide->title }}">
                        <div class="card-img-overlay">
                            <div class="card-content">


                                <p class="text-uppercase">{{ $slide->category->title }}</p>

                                <h4 class="card-title mb-4"><a class="text-white" href="{{ $slide->images[0]->url }}">{{ $slide->title }}</a></h4>
                                <a class="btn btn-outline-light" href="{{ $slide->url }}">read more</a>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- /featured post -->

