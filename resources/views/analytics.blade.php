@if (App::environment('production'))
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('blog.analytic_id') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{ config('blog.analytic_id') }}');
    </script>
@endif
