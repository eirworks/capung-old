<nav class="navbar navbar-expand-sm navbar-light bg-light mb-3">
    <div class="container">

        <a class="navbar-brand" href="{{ route('dashboard') }}">{{ env('APP_NAME') }}</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item"><a href="{{ route('projects.index') }}" class="nav-link">{{ __('projects.projects') }}</a></li>
            </ul>
            <ul class="navbar-nav mt-2 mt-lg-0">
                @guest
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">{{ __('auth.login') }}</a></li>
                    <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">{{ __('auth.register') }}</a></li>
                @endguest
                @auth
                    <li class="nav-item"><button form="logout" class="nav-link btn btn-link">{{ __('auth.logout') }}</button></li>
                @endauth
            </ul>
        </div>

    </div>
</nav>
@auth
    <form id="logout" action="{{ route('logout') }}" method="post" class="d-none">
        @csrf
    </form>
@endauth
