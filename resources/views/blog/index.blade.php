@extends('blog.layouts.layout')
@section('content')
    {{--    @includeIf('blog.partials.slider')--}}
    {{--@include('blog.featured.triple')--}}
    <!-- Blog Area Start Here -->
    <section class="blog-wrap-layout2">
        <div class="container">
            <div class="row gutters-40">
                <div class="col-xl-9 col-lg-8">

                    {{--                    @include('blog.featured.single')--}}

                    <div class="row gutters-40">
                        @foreach($blogs as $index =>  $blog)
                            <div class="col-sm-6 col-12 blogBox moreBox" @if($loop->index >= 10) style="display: none;" @endif>
                                <div class="blog-box-layout1">
                                    <div class="item-img">
                                        <a href="{{ $blog->url }}">
                                            {{ $blog->getFirstMedia('images') }}
{{--                                            <img class="lazy" src="{{ $blog->image }}" alt="{{ $blog->title }}">--}}
                                        </a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li>
                                                <i class="fas fa-tag"></i>
                                                {{ $blog->category->title }}
                                            </li>
                                            <li>
                                                <i class="fas fa-calendar-alt"></i>
                                                <time datetime="{{ $blog->published_at->toIso8601String() }}" title="{{ $blog->published_at->format('M d, Y g:i:s a') }}">
                                                    {{ $blog->published_at->format('M d, Y') }}
                                                </time>
                                            </li>
                                            <li>
                                                <i class="far fa-clock"></i>
                                                {{ $blog->read_time }}
                                            </li>
                                        </ul>
                                        <h3 class="item-title">
                                            <a href="{{ $blog->url }}">
                                                {{ $blog->title }}
                                            </a>
                                        </h3>
                                        <p>{{ $blog->subtitle }}</p>
                                        <a href="{{ $blog->url }}" class="item-btn">
                                            READ MORE
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="d-flex justify-content-center pb-5">
                        <button id="loadMore" class="btn btn-outline-danger" type="button">
                            LOAD MORE
                        </button>
                    </div>

                    {{--                    {{ $blogs->links('blog.vendor.pagination') }}--}}

                </div>
                <div class="col-xl-3 col-lg-4 sidebar-widget-area sidebar-break-md">

                    {{--                    @include('blog.partials.widget.about')--}}


                    @include('blog.partials.widget.subscribe')

                    @include('blog.partials.widget.latest')

                    {{--                    @include('blog.partials.widget.adsense')--}}

                    {{--                    <x-instagram-widget></x-instagram-widget>--}}

                    <x-categories></x-categories>

                    {{--                    @include('blog.components.newsletter')--}}

                    {{--                    @include('blog.partials.widget.feature-feed')--}}
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Area End Here -->
    <!-- Instagram Start Here -->
    {{--    <x-instagram-feed></x-instagram-feed>--}}
@endsection
@push('scripts')

    <script type="text/javascript">



        $( document ).ready(function () {
            $(".moreBox").slice(0, 10).show();
            if ($(".blogBox:hidden").length != 0) {
                $("#loadMore").show();
            }
            $("#loadMore").on('click', function (e) {
                e.preventDefault();
                $(".moreBox:hidden").slice(0, 6).slideDown();
                if ($(".moreBox:hidden").length == 0) {
                    $("#loadMore").fadeOut('slow');
                }
            });
        });
    </script>
@endpush
