<footer class="bg-secondary">
    <div class="section">
        <div class="container">
            <div class="row">

                @if(config('blog.logo'))
                    <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                        <a href="{{ url('/') }}/"><img src="{{ '' }}" alt="{{ config('blog.title') }}" class="img-fluid"></a>
                    </div>
                @endif
                @if(config('blog.contact.address'))
                    <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                        <h6>Address</h6>
                        <ul class="list-unstyled">
                            <li class="font-secondary text-dark">{{ config('blog.contact.address.city') }}</li>
                            <li class="font-secondary text-dark">{{ config('blog.contact.address.address') }}</li>
                        </ul>
                    </div>
                @endif
                @if(config('blog.contact'))
                    <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                        <h6>Contact Info</h6>
                        <ul class="list-unstyled">
                            <li class="font-secondary text-dark">Tel: {{ config('blog.contact.phone') }}</li>
                            <li class="font-secondary text-dark">Mail: {{ config('blog.contact.mail') }}</li>
                        </ul>
                    </div>
                @endif
                @if(config('blog.social'))
                    <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                        <h6>Follow</h6>
                        <ul class="list-inline d-inline-block">
                            @foreach(config('blog.socials') as $social)
                                <li class="list-inline-item"><a href="{{ $social->link }}" class="text-dark"><i class="{{ $social->icon }}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="text-center pb-3">
        <p class="mb-0">Copyright &copy; {{ date('Y') }}  <a href="{{ url('/') }}">{{ config('blog.title') }}</a></p>
    </div>
</footer>
