<div class="col-lg-4">
    <div class="widget search-box">
        <form action="{{ route('blog') }}" method="GET">
            @csrf
            <i class="ti-search"></i>
            <label  class="sr-only">@lang('posts.search')</label>
            <input type="search" class="form-control border-0 pl-5" name="query"
                   placeholder="{{ __('posts.search') }}">
        </form>
    </div>
    <div class="widget">
        <h6 class="mb-4 text-uppercase">@lang('latest_post')</h6>

        @foreach($posts as $post)
            @if($post->images->isNotEmpty())
                <div class="media mb-4">
                    <div class="post-thumb-sm mr-3">
                        <img class="img-fluid" src="{{ $post->images[0]->url }}" alt="{{ $post->title }}">
                    </div>
                    <div class="media-body">
                        <ul class="list-inline d-flex justify-content-between mb-2">
                            <li class="list-inline-item">@lang('post_by') {{ $post->user->name }}</li>
                            {{--                    <li class="list-inline-item">{{ $post->published_at }}</li>--}}
                        </ul>
                        <h6><a class="text-dark" href="{{ $post->url }}">{{ $post->title }}</a></h6>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
