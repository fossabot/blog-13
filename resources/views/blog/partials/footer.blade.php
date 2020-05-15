<!-- Footer Area Start Here -->
<footer class="footer-wrap-layout1">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-4">
                <div class="footer-box-layout1">
                    <div class="copyright">&copy; {{ date('Y') }} {{ config('blog.name') }}. All Rights Reserved.</div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="footer-box-layout1">
                    <div class="footer-logo">
                        <a href="index.html"><img src="/themes/blogxer/img/logo-light.png" alt="logo"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="footer-box-layout1">
                    <ul class="footer-social">
                        @foreach(config('blog.socials') as $social)
                            <li><a class="svg-icon" href="{{ $social['url'] }}">
                                    <i class="fab fa-{{ $social['name'] }}"></i>
                                </a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End Here -->
