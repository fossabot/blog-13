<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <atom:link href="{{ url()->current() }}" rel="self" type="application/rss+xml" />
        <title>{{ config('app.name', 'Turahe') }}</title>
        <link>{{ url()->current() }}</link>
        <description>{{ config('blog.description') }}</description>
        @yield('content')
    </channel>
</rss>

