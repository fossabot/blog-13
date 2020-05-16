<div class="widget">
    <div class="section-heading heading-dark">
        <h3 class="item-heading">FOLLOW ME ON</h3>
    </div>
    <div class="widget-follow-us-2">
        <ul>
            @foreach(config('blog.socials') as $social)
                <li class="single-item">
                    <a href="{{ $social['url'] }}">
                        <i class="fab fa-{{ $social['name'] }}"></i>
                        {{ $social['text'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
