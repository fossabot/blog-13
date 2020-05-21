<div class="blog-tag">
    <ul>
        <li class="item-tag"><i class="fas fa-bookmark"></i>
            @foreach($blog->tags as $tag)
                <a href="{{ $tag->url }}">{{ $tag->tag }},</a>
            @endforeach
        </li>
        <li class="item-social">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
            <a href="#"><i class="fab fa-google-plus-g"></i></a>
            <a href="#"><i class="fab fa-pinterest"></i></a>
        </li>
{{--        <li class="item-respons">--}}
{{--            <i class="fas fa-heart"></i>--}}
{{--            {{ $blog->likes->count() }}--}}
{{--        </li>--}}
    </ul>
</div>
