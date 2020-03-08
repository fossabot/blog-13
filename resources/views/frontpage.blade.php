@extends('layouts.layout')

@section('content')


    <!-- featured post -->

    <section>
        <div class="container-fluid p-sm-0">
            <div class="row featured-post-slider">

                @foreach($slides as $slide)
                <div class="col-lg-3 col-sm-6 mb-2 mb-lg-0 px-1">
                    <article class="card bg-dark text-center text-white border-0 rounded-0">
                        <img class="card-img rounded-0 img-fluid w-100" src="/storage/images/featured-post/post-{{ mt_rand(1,5) }}.jpg" alt="post-thumb">
                        <div class="card-img-overlay">
                            <div class="card-content">
                                <p class="text-uppercase">{{ $slide->category->title }}</p>
                                <h4 class="card-title mb-4">
                                    <a class="text-white" href="{{ $slide->slug }}">
                                        {{ $slide->title }}
                                    </a>
                                </h4>
                                <a class="btn btn-outline-light" href="{{ $slide->slug }}">read more</a>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- /featured post -->

    <!-- blog post -->
    <section class="section">
        <div class="container">
            <div class="row masonry-container" data-masonry-options='{ "itemSelector": ".masonry-container > div", "columnWidth": 1 }'>
                @foreach($blogs as $index => $blog)
                <div class="col-lg-4 col-sm-6 mb-5">
                    <article class="text-center">
                        <img class="img-fluid mb-4" src="{{ Storage::url('images/masonary-post/post-'. mt_rand(1,8).'.jpg') }}" alt="post-thumb">
                        <p class="text-uppercase mb-2">{{ $blog->category->title }}</p>
                        <h4 class="title-border"><a class="text-dark" href="{{ 'blog/' .$blog->slug }}">{{ $blog->title }}</a></h4>
                        <p>{{ $blog->subtitle }}</p>
                        <a href="{{  'blog/' .$blog->slug }}" class="btn btn-transparent">read more</a>
                    </article>
                </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ul class="pagination justify-content-center align-items-center">
                            <li class="page-item">
                                <span class="page-link">&laquo; Previous</span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">01</a></li>
                            <li class="page-item active">
                                <span class="page-link">02</span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">03</a></li>
                            <li class="page-item"><a class="page-link" href="#">04</a></li>
                            <li class="page-item"><a class="page-link" href="#">05</a></li>
                            <li class="page-item"><a class="page-link" href="#">06</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next &raquo;</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- /blog post -->

    <!-- instagram -->
    <section>
        <div class="container-fluid px-0">
            <div class="row no-gutters instagram-slider" id="instafeed" data-userId="4044026246"
                 data-accessToken="4044026246.1677ed0.8896752506ed4402a0519d23b8f50a17"></div>
        </div>
    </section>
    <!-- /instagram -->

@endsection
