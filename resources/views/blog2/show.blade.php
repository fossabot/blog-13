@extends('blog._layouts.layout', [
    'title' => $blog->title
])

@section('content')
<!-- page-title -->
<section class="section bg-secondary">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4>{{ $blog->title }}</h4>
            </div>
        </div>
    </div>
</section>
<!-- /page-title -->

<!-- blog single -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <ul class="list-inline d-flex justify-content-between py-3">
                    <li class="list-inline-item"><i class="ti-user mr-2"></i>Post by {{ $blog->user->name }}</li>
                    <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="{{ $blog->published_at }}">
                        <i class="ti-calendar mr-2"></i>
                        {{ $blog->time_elapsed }}
                    </li>
                </ul>
{{--                <img src="" alt="" class="w-100 img-fluid mb-4">--}}
                <div class="content">
                    {!! $blog->content_html !!}
                </div>

                <p class="mt-3">
                    <like
                        :likes-count="{{ $blog->likes_count }}"
                        :liked="{{ json_encode($blog->isLiked()) }}"
                        :item-id="{{ $blog->id }}"
                        item-type="posts"
                        :logged-in="{{ json_encode(Auth::check()) }}"></like>
                </p>

            </div>
            @include('blog._partials._sidebar')
        </div>
    </div>
</section>
<!-- /blog single -->
@endsection

@push('styles')
    <link rel="stylesheet"
          href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.18.1/build/styles/github.min.css">
    @endpush
@push('scripts')
    <script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.18.1/build/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@endpush
