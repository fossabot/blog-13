<div class="widget">
    <div class="section-heading heading-dark">
        <h3 class="item-heading">ABOUT ME</h3>
    </div>
    <div class="widget-about">
        <figure class="author-figure">
            <img src="{{ $instagram->profilePicture }}" alt="{{ $instagram->fullName }}">
        </figure>
        {{--                            <figure class="author-signature">--}}
        {{--                                <img src="/themes/blogxer/img/figure/signature.png" alt="about">--}}
        {{--                            </figure>--}}
        <p>{{ $instagram->biography }}</p>
    </div>
</div>
