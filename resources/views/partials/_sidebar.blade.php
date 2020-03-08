<div class="col-lg-4">
    <div class="widget search-box">
        <form action="/search.html" method="get">
            <i class="ti-search"></i>
            <input type="search" id="search-box" class="form-control border-0 pl-5" name="query"
                   placeholder="Search">
        </form>
    </div>
    <div class="widget">
        <h6 class="mb-4">LATEST POST</h6>

        @foreach($posts as $post)
        <div class="media mb-4">
            <div class="post-thumb-sm mr-3">
                <img class="img-fluid" src="" alt="{{ $post->title }}">
            </div>
            <div class="media-body">
                <ul class="list-inline d-flex justify-content-between mb-2">
                    <li class="list-inline-item">Post By {{ $post->user->name }}</li>
{{--                    <li class="list-inline-item">{{ $post->published_at }}</li>--}}
                </ul>
                <h6><a class="text-dark" href="{{ $post->url }}">{{ $post->title }}</a></h6>
            </div>
        </div>
        @endforeach
    </div>
</div>
