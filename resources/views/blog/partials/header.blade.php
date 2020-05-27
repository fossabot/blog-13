<!-- Header Area Start Here -->
<header class="has-mobile-menu">
{{--    @include('blog.partials.header.topbar')--}}
    <div id="header-middlebar" class="box-layout-child bg--light border-bootom border-color-accent2">
        <div class="pt--25 pb--25">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <div class="logo-area">
                            <a href="{{ url('/') }}" class="temp-logo" id="temp-logo">

                                {!! svg('turahe-dark') !!}

{{--                                <img src="{{ Storage::url('turahe.png') }}" alt="logo" class="img-fluid">--}}
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div id="rt-sticky-placeholder"></div>
    <div id="header-menu" class="header-menu menu-layout1 box-layout-child bg--light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav id="dropdown" class="template-main-menu">
                        <ul>
                            <li>
                                <a href="{{ url('/') }}">@lang('blog.home')</a>
                            </li>
                            <li>
                                <a href="#">@lang('blog.topics')</a>
                                <ul class="dropdown-menu-col-1">
                                    <li>
                                        <a href="{{ url('category/blog') }}">Blog</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ url('contact') }}">CONTACT</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Area End Here -->
