<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">{{ $siteSettings['site.name'] or 'HumboldtWeb' }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#app-navbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="app-navbar">
        <ul class="navbar-nav mr-auto">
            {!! $admin_menu or '' !!}
        </ul>
        <ul class="nav navbar-nav navbar-right">
            {{--Authentication Links--}}
            @if (Auth::guest())
                <li class="nav-item"><a href="{{ route('get.login') }}" class="nav-link">Login</a></li>
            @else
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->getFullName() }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <a href="{{ route('get.admin') }}" class="dropdown-item">Admin</a>
                        <div class="dropdown-divider hide-for-small"></div>
                        <a href="{{ route('get.logout') }}" class="dropdown-item">
                            Logout
                        </a>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</nav>