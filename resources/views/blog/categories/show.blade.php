@extends('blog._layouts.layout', [
    'title' => $category->title
])

@section('content')
    <!-- page-title -->
    <section class="section bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4>{{ $category->title }}</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- /page-title -->

    <!-- category post -->
    <section>
        <div class="container">
            <div class="row masonry-container pt-5">
                @foreach($category->posts as $post)
                    <div class="col-lg-4 col-sm-6 mb-5">
                        <article class="text-center">
                            <img class="img-fluid mb-4" src="{{ $post->images[0]->url }}" alt="{{ $post->title }}">
                            <h4 class="title-border"><a class="text-dark" href="{{ $post->url }}">{{ $post->title }}</a></h4>
                            {!! $post->excerpt !!}
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /category post -->
@endsection
