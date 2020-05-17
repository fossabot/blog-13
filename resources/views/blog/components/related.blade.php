<div class="related-item">
    <div class="section-heading-4 heading-dark">
        <h3 class="item-heading">YOU MAY ALSO LIKE</h3>
    </div>
    <div class="row">
        @foreach($related->take(3) as $post)
            <div class="col-sm-4 col-12">
                <div class="blog-box-layout1 text-left">
                    <div class="item-img">
                        <a href="{{ $post->url }}">
                            <img src="{{ $post->getMedia('images')[0]->getUrl('medium') }}" alt="{{ $post->title }}">
                        </a>
                    </div>
                    <div class="item-content">
                        <ul class="entry-meta meta-color-dark">
                            <li>
                                <i class="fas fa-tag"></i>
                                {{ $post->category->title }}
                            </li>
                            <li data-toggle="tooltip" title="{{ $blog->published_at->toIso8601String() }}">
                                <i class="fas fa-calendar-alt"></i>
                                <time datetime="{{ $post->published_at->toIso8601String() }}" title="{{ $post->published_at->format('M d, Y g:i:s a') }}">
                                    {{ $post->publish }}
                                </time>
                            </li>
                        </ul>
                        <h5 class="item-title">
                            <a href="{{ $post->url }}">
                                {{ $post->title }}
                            </a>
                        </h5>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
