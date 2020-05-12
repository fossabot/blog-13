<nav class="navbar navbar-dark bg-dark fixed-top navbar-expand-md">
    <div class="container">
        <!-- Branding Media -->
        <a href="{{ url('/') }}" class="navbar-brand">{{ config('blog.title') }}</a>

        <!-- Collapsed Hamburger -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            @admin
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link">{{ __('dashboard.dashboard') }}</a>
                    </li>
                </ul>
            @endadmin

            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">{{  __('auth.login') }}</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">{{ __('auth.register') }}</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a v-pre href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            {{ link_to_route('users.show', __('users.public_profile'), Auth::user(), ['class' => 'dropdown-item']) }}
                            {{ link_to_route('users.edit', __('users.settings'), [], ['class' => 'dropdown-item']) }}

                            <div class="dropdown-divider"></div>

                            <a href="{{ url('/logout') }}"
                                class="dropdown-item"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                @lang('auth.logout')
                            </a>

                            <form id="logout-form" class="d-none" action="{{ url('/logout') }}" method="POST">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

