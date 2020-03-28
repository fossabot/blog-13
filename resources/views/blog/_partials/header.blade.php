<header class="navigation">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="{{ url('/') }}"><img class="img-fluid" src="{{ asset('/assets/images/logo.png') }}" alt="{{ config('blog.name') }}"></a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="navigation">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark" href="{{ url('/') }}">@lang('home')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark" href="{{ url('about') }}">@lang('about')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark" href="{{ url('categories') }}">@lang('categories')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark" href="{{ url('contact') }}">@lang('contact')</a>
                </li>
            </ul>
            <form class="form-inline position-relative ml-lg-4" action="{{ url('/') }}" method="GET">
                @csrf
                <label for="search-box" class="sr-only">@lang('posts.search')</label>
                <input class="form-control px-0 w-100" type="search" id="search-box" name="query" placeholder="Search">
                <button class="search-icon" type="submit"><i class="ti-search text-dark"></i></button>
            </form>
        </div>
    </nav>
</header>
