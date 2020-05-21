<div class="widget">
    <div class="section-heading heading-dark">
        <h3 class="item-heading">SUBSCRIBE &amp; FOLLOW</h3>
    </div>
    <div class="widget-follow-us">
        <ul>
            @foreach(config('blog.socials') as $social)
                <li class="single-item">
                    <a href="{{ $social['url'] }}">
                        <i class="fab fa-{{ $social['name'] }}"></i>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
