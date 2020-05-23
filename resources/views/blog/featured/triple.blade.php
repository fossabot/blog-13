<!-- Blog Area Start Here -->
<section class="blog-wrap-layout1">
    <div class="container">
        <div class="row">
            @foreach($posts->take(3) as $post)
                <div class="col-lg-4">
                    <div class="blog-box-layout1">
                        <div class="item-img">
                            <a href="{{ $post->url }}">
                                <img src="{{ $post->image }}" alt="{{ $post->title }}">
                            </a>
                        </div>
                        <div class="item-content">
                            <ul class="entry-meta meta-color-dark">
                                <li>
                                    <i class="fas fa-tag"></i>
                                    {{ $post->category->title }}
                                </li>
                                <li>
                                    <i class="fas fa-calendar-alt"></i>
                                    <time datetime="{{ $post->published_at->toIso8601String() }}" title="{{ $post->published_at->format('M d, Y g:i:s a') }}">
                                        {{ $post->publish }}
                                    </time>
                                </li>
                                <li>
                                    <i class="far fa-clock"></i>
                                    {{ $post->read_time }}
                                </li>
                            </ul>
                            <h3 class="item-title">
                                <a href="{{ $post->url }}">
                                    {{ $post->title }}
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Blog Area End Here -->
