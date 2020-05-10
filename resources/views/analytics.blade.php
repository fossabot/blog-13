@if (App::environment('production'))
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('analytics.view_id') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{ config('analytics.view_id') }}');
    </script>
@endif
