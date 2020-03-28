<footer class="bg-secondary">
    <div class="section">
        <div class="container">
            <div class="row">

                <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                    <a href="{{ url('/') }}"><img src="{{ asset('/assets/images/logo.png') }}" alt="{{ config('blog.title') }}" class="img-fluid"></a>
                </div>


                <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                    <h6>Address</h6>
                    <ul class="list-unstyled">
                        <li class="font-secondary text-dark">Sydney</li>
                        <li class="font-secondary text-dark">6 rip carl Avenue CA 90733</li>
                    </ul>
                </div>


                <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                    <h6>Contact Info</h6>
                    <ul class="list-unstyled">
                        <li class="font-secondary text-dark">Tel: +90 000 333 22</li>
                        <li class="font-secondary text-dark">Mail: example@ymail.com</li>
                    </ul>
                </div>


                <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                    <h6>Follow</h6>
                    <ul class="list-inline d-inline-block">
                        @foreach(config('blog.socials') as $icon => $link )
                        <li class="list-inline-item"><a href="{{ $link }}" class="text-dark"><i class="ti-{{ $icon }}"></i></a></li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="text-center pb-3">
        <p class="mb-0">Copyright &copy; {{ date('Y') }}  <a href="{{ url('/') }}">{{ config('blog.name') }}</a></p>
    </div>
</footer>
