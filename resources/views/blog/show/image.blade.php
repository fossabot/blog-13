@extends('blog.layouts.layout', [
    'title' => $blog->title,
    'author' => $blog->user->name,
    'description' => $blog->meta_description
])

@section('content')
    <!-- Single Blog Banner Start Here -->
    <section class="single-blog-wrap-layout1">
        <div class="single-blog-banner-layout1">
            <div class="banner-img">
                <figure itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                    <img itemprop="url contentUrl" src="{{ $blog->slide }}" alt="{{ $blog->title }}">
                    <figcaption itemprop="caption">{{ $blog->title }}</figcaption>
                </figure>
            </div>
            <div class="banner-content">
                <div class="container">
                    <ul class="entry-meta meta-color-light2">
                        <li>
                            <i class="fas fa-tag"></i>
                            {{ $blog->category->title }}
                        </li>
                        <li data-toggle="tooltip" title="{{ $blog->published_at->toIso8601String() }}">
                            <i class="fas fa-calendar-alt"></i>
                            <time datetime="{{ $blog->published_at->toIso8601String() }}" title="{{ $blog->published_at->format('M d, Y g:i:s a') }}" itemprop="datePublished">
                                {{ $blog->publish }}
                            </time>
                        </li>
                        <li>
                            <i class="fas fa-user"></i>
                            BY <a href="#">{{ $blog->user->name }}</a>
                        </li>
                        <li>
                            <i class="far fa-clock"></i>
                            <time itemprop="readTime">
                                {{ $blog->read_time }}
                            </time>
                        </li>
                    </ul>
                    <h1 class="item-title" itemprop="name headline">{{ $blog->title }}</h1>

                    <div class="item-social">
                        <button class="btn btn-default facebook social_share" data-type="fb">
                            <i class="fab fa-facebook-f"></i>
                            SHARE
                        </button>
                        <button class="btn btn-default twitter social_share" data-type="twitter">
                            <i class="fab fa-twitter"></i>
                            SHARE
                        </button>
                        <button class="btn btn-default g-plus social_share" data-type="gplus">
                            <i class="fab fa-google-plus-g"></i>
                            SHARE
                        </button>
                        <button class="btn btn-default pinterest social_share" data-type="pinterest">
                            <i class="fab fa-pinterest"></i>
                            PIN IT
                        </button>
                        <div class="dropdown">
                            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-plus"></i>
                                MORE
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <button class="btn btn-default vk social_share" data-type="vk">VK.com</button>
                                <button class="btn btn-default ok social_share" data-type="ok">OK.ru</button>
                                <button class="btn btn-default mailru social_share" data-type="mailru">Mail.Ru</button>
                                <button class="btn btn-default googlebookmarks social_share" data-type="googlebookmarks">Google Bookmarks</button>
                                <button class="btn btn-default livejournal social_share" data-type="livejournal">LiveJournal</button>
                                <button class="btn btn-default tumblr social_share" data-type="tumblr">Tumblr</button>
                                <button class="btn btn-default linkedin social_share" data-type="linkedin">LinkedIn</button>
                                <button class="btn btn-default redit social_share" data-type="reddit">Reddit</button>
                                <button class="btn btn-default mailru social_share" data-type="mailru">Mail.ru</button>
                                <button class="btn btn-default weibo social_share" data-type="weibo">Weibo</button>
                                <button class="btn btn-default line social_share" data-type="line">Line.me</button>
                                <button class="btn btn-default skype social_share" data-type="skype">Skype</button>
                                <button class="btn btn-default telegram social_share" data-type="telegram">Telegram</button>
                                <button class="btn btn-default whatsapp social_share" data-type="whatsapp">Whatsapp</button>
                                <button class="btn btn-default viber social_share" data-type="viber">Viber</button>
                                <button class="btn btn-default email social_share" data-type="email">Email</button>
                            </div>
                        </div>
                    </div>

                    <ul class="response-area">
                        <li><a href="#"><i class="far fa-comment"></i>{{ $blog->comments->count() }}</a></li>
                        <li><a href="#"><i class="far fa-eye"></i>105</a></li>
                        <li><a href="#"><i class="far fa-heart"></i>{{ $blog->likes->count() }}</a></li>
                        <li><a href="#"><i class="fas fa-share"></i>302</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row gutters-50">
                <div class="col-lg-8">
                    <div class="single-blog-box-layout1">
                        <div class="blog-details" id="articleBody" itemprop="articleBody">
                            {!! $blog->content_html !!}
                        </div>
                        <div class="blog-entry-meta">
                            <ul>
                                <li class="item-tag">
                                    <i class="fas fa-bookmark"></i>
                                    @foreach($blog->tags as $tag)
                                        <a href="{{ $tag->url }}">{{ $tag->tag }},</a>
                                    @endforeach
                                </li>
                                <li class="item-social">
                                    <button class="btn btn-sm btn-default facebook social_share" data-type="fb">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>
                                    <button class="btn btn-sm btn-default twitter social_share" data-type="twitter">
                                        <i class="fab fa-twitter"></i>
                                    </button>
                                    <button class="btn btn-sm btn-default g-plus social_share" data-type="gplus">
                                        <i class="fab fa-google-plus-g"></i>
                                    </button>
                                    <button class="btn btn-sm btn-default pinterest social_share" data-type="pinterest">
                                        <i class="fab fa-pinterest"></i>
                                    </button>
                                </li>
                                <li class="item-respons">
                                    <i class="fas fa-heart"></i>
                                    {{ $blog->likes->count() }}
                                </li>
                            </ul>
                        </div>
                        <div class="blog-author" itemscope itemtype="http://schema.org/Blog">
                            <div class="media media-none--xs">
                                <img src="{{ $blog->user->avatar }}" alt="{{ $blog->user->name }}" class="media-img-auto">
                                <div class="media-body">
                                    <h4 class="item-title" itemprop="name">{{ $blog->user->name }}</h4>
                                    <div class="item-subtitle">Author</div>
                                    <p>{{ config('blog.author.description') }}</p>
                                    <ul class="item-social">
                                        @foreach(config('blog.socials') as $social)
                                            <li><a href="{{ $social['url'] }}"><i class="fab fa-{{ $social['name'] }}"></i></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        @include('blog.components.related')

                        @include('blog.comment.comment')
                        @include('blog.comment.form')

                    </div>
                </div>
                <div class="col-lg-4 sidebar-widget-area sidebar-break-md">

                    @include('blog.partials.widget.latest')

                    @include('blog.partials.widget.follow')

{{--                    <x-newsletter></x-newsletter>--}}

                    <x-categories></x-categories>

                    {{--                    @include('blog.partials.widget.categories')--}}

                    @include('blog.partials.widget.adsense')
                </div>
            </div>
        </div>
    </section>
    <!-- Single Blog Banner End Here -->
{{--    <x-instagram-feed></x-instagram-feed>--}}
@endsection


@push('scripts')
    <script src="{{ mix('js/show.js') }}"></script>
@endpush
