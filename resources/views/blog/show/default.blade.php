@extends('blog.layouts.layout', [
    'title' => $blog->title,
    'author' => $blog->user->name,
    'description' => $blog->meta_description
])

@section('content')
    <!-- Header Area End Here -->
    <!-- Single Blog Banner Start Here -->
    <section class="single-blog-wrap-layout3">
        <div class="container">
            <div class="row gutters-50">
                <div class="col-lg-8">
                    <div class="single-blog-box-layout3">
                        @if($blog->getMedia('images')->count())
                            <div class="blog-banner">
                                <img src="{{ $blog->image }}" alt="{{ $blog->title }}">
                            </div>
                        @endif
                        <div class="single-blog-content">
                            <div class="blog-entry-content">
                                <ul class="entry-meta meta-color-dark">
                                    <li><i class="fas fa-tag"></i>{{ $blog->category->title }}</li>
                                    <li><i class="fas fa-calendar-alt"></i>{{ $blog->category->title }}</li>
                                    <li><i class="fas fa-user"></i>BY <a href="#">{{ $blog->user->name }}</a></li>
                                    <li><i class="far fa-clock"></i>{{ $blog->read_time }}</li>
                                </ul>
                                <h2 class="item-title">{{ $blog->title }}</h2>
                                <ul class="item-social">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i>SHARE</a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i>SHARE</a></li>
                                    <li><a href="#" class="g-plus"><i class="fab fa-google-plus-g"></i>SHARE</a></li>
                                    <li><a href="#" class="pinterest"><i class="fab fa-pinterest"></i>PIN IT</a></li>
                                    <li><a href="#" class="load-more"><i class="fas fa-plus"></i>MORE</a></li>
                                </ul>
                                <ul class="response-area">
                                    <li><a href="#"><i class="far fa-comment"></i>02</a></li>
                                    <li><a href="#"><i class="far fa-eye"></i>105</a></li>
                                    <li><a href="#"><i class="far fa-heart"></i>225</a></li>
                                    <li><a href="#"><i class="fas fa-share"></i>302</a></li>
                                </ul>
                            </div>
                            <div class="blog-details">
                                {!! $blog->content_html !!}
                            </div>

                            @include('blog.partials.blog.tag')
                            @include('blog.partials.blog.author')

                            @include('blog.components.related')

                            @include('blog.comment.comment')
                            @include('blog.comment.form')
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 sidebar-widget-area sidebar-break-md">
                    <div class="widget">
                        <div class="section-heading heading-dark">
                            <h3 class="item-heading">SUBSCRIBE &amp; FOLLOW</h3>
                        </div>
                        <div class="widget-follow-us">
                            <ul>
                                <li class="single-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-github-alt"></i></a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-kickstarter-k"></i></a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-behance"></i></a></li>
                                <li class="single-item"><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    {{--                    @include('blog.partials.widget.about')--}}

                    {{--                    <x-newsletter></x-newsletter>--}}

                    @include('blog.partials.widget.latest')

                    {{--                    @include('blog.partials.widget.adsense')--}}

                    <x-categories></x-categories>

                </div>
            </div>
        </div>
    </section>
    <!-- Single Blog Banner End Here -->
    <!-- Footer Area Start Here -->
@endsection


@push('scripts')
    <script src="{{ mix('js/show.js') }}"></script>
@endpush
