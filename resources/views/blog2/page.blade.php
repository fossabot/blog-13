@extends('blog._layouts.layout', [
    'title' => $post->title
])

@section('content')
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="mb-4">{{ $post->title  }}</h2>

                @if($post->media)
                <img src="" alt="{{ $post->title }}" class="img-fluid w-100 mb-4">
                @endif

                {!! $post->content_html !!}

            </div>
        </div>
    </div>
</section>
    @endsection
