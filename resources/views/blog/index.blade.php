@extends('blog._layouts.layout')

@section('content')
    @include('blog._partials.featured')
    <!-- blog post -->
    <section class="section">
        <div class="container">
            <div class="row masonry-container">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-sm-6 mb-5">
                        <article class="text-center">
                            <img class="img-fluid mb-4" src="{{ $blog->images[0]->url }}" alt="{{ $blog->title }}">
                            <p class="text-uppercase mb-2">{{ $blog->category->title }}</p>
                            <h4 class="title-border"><a class="text-dark" href="{{ $blog->url }}">{{ $blog->title }}</a></h4>
                            {!! $blog->excerpt !!}
                            <a href="{{ $blog->url }}" class="btn btn-transparent">read more</a>
                        </article>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-12">
{{--                    {{ $blogs->links('vendor.pagination.blog') }}--}}
                </div>
            </div>

        </div>
    </section>
    <!-- /blog post -->
@endsection
