@extends('blog._layouts.layout', [
    'title' => __('categories')
])

@section('content')
    <!-- page-title -->
    <section class="section bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4>@lang('categories')</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- /page-title -->

    <!-- category post -->
    <section>
        <div class="container">
            <div class="row masonry-container pt-5">
                @foreach($categories as $category)

                    <div class="col-lg-4 col-sm-6 mb-5">
                        <article class="text-center">
                            <img class="img-fluid mb-4" src="{{ is_null($category->image) ? Storage::url('images/posts/post-1.jpg') : $category->image->url }}" alt="{{ $category->title }}">
                            <h4 class="title-border"><a class="text-dark" href="{{ $category->url }}">{{ $category->title }}</a></h4>
                            {{ $category->description }}
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /category post -->
@endsection
