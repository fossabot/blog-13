<div class="widget">
    <div class="section-heading heading-dark">
        <h3 class="item-heading">POPULAR POSTS</h3>
    </div>
    <div class="widget-latest">
        <ul class="block-list">
            @foreach($latest as $post)
                <li class="single-item">
                    <div class="item-img">
                        <a href="{{ $post->url }}">

                            <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}">
                        </a>
{{--                        <div class="count-number">{{ $post->likes->count() }}</div>--}}
                    </div>
                    <div class="item-content">
                        <ul class="entry-meta meta-color-dark">
                            <li data-toggle="tooltip" data-placeholder="top" title="{{ $post->published_at->toIso8601String() }}">
                                <i class="fas fa-calendar-alt"></i>
                                <time datetime="{{ $post->published_at->toIso8601String() }}" title="{{ $post->published_at->format('M d, Y g:i:s a') }}">
                                    {{ $post->publish }}
                                </time>
                            </li>
                        </ul>
                        <h4 class="item-title" itemprop="name headline">
                            <a itemprop="mainEntityOfPage url" href="{{ $post->url }}">
                                {{ $post->title }}
                            </a>
                        </h4>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
