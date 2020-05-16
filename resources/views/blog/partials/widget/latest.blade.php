<div class="widget">
    <div class="section-heading heading-dark">
        <h3 class="item-heading">POPULAR POSTS</h3>
    </div>
    <div class="widget-latest">
        <ul class="block-list">
            @foreach($latest as $post)
                <li class="single-item">
                    <div class="item-img">
                        <a href="#">
                            <img src="{{ $post->getMedia('images')[0]->getUrl('small') }}" alt="Post">
                        </a>
                        <div class="count-number">{{ $post->likes->count() }}</div>
                    </div>
                    <div class="item-content">
                        <ul class="entry-meta meta-color-dark">
                            <li>
                                <i class="fas fa-calendar-alt"></i>
                                {{ $post->publish }}
                            </li>
                        </ul>
                        <h4 class="item-title"><a href="#">{{ $post->title }}</a></h4>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
