@if(! is_null($getPost))
    <div class="blog-box-layout1">
        <div class="item-img">
            <a href="{{ $getPost->url }}">
                {{ $getPost->getFirstMedia('images') }}
                <img src="{{ $getPost->cover }}" alt="{{ $getPost->title }}">
            </a>
        </div>
        <div class="item-content">
            <ul class="entry-meta meta-color-dark">
                <li>
                    <i class="fas fa-tag"></i>
                    {{ $getPost->category->title }}
                </li>
                <li>
                    <i class="fas fa-calendar-alt"></i>
                    <time datetime="{{ $getPost->published_at->toIso8601String() }}" title="{{ $getPost->published_at->format('M d, Y g:i:s a') }}">
                        {{ $getPost->publish }}
                    </time>
                </li>
                {{--                                <li>--}}
                {{--                                    <i class="fas fa-user"></i>BY--}}
                {{--                                    <a href="#">--}}
                {{--                                        {{ $getPost->user->name }}--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                <li>
                    <i class="far fa-clock"></i>{{ $getPost->read_time }}</li>
            </ul>
            <h2 class="item-title">
                <a href="{{ $getPost->url }}">
                    {{ $getPost->title }}
                </a>
            </h2>
            {{ $getPost->subtitle }}
            <a href="{{ $getPost->url }}" class="item-btn">
                READ MORE
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
@endif
