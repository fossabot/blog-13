<div class="blog-author">
    <div class="media media-none--xs">
        <img src="{{ $blog->user->avatar }}" alt="{{ $blog->user->name }}" class="media-img-auto">
        @if($blog->user->profile)
            <div class="media-body">
                <h4 class="item-title">{{ $blog->user->profile->full_name }}</h4>
                <div class="item-subtitle">Author</div>
                <p>{{ $blog->user->profile->biography }}</p>
                <ul class="item-social">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                </ul>
            </div>
        @endif
    </div>
</div>
