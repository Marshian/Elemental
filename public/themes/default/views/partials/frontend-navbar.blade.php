<nav class="col-lg-8  navbar navbar-expand-xl">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample06">
        <ul class="navbar-nav cstm_cls_nav new ml-auto">
                        {!! $menu or '' !!}
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if (auth()->check())

                            <li class="nav-item dropdown">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->getFullName() }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" role="menu">
                                    <a href="{{ route('get.admin') }}" class="dropdown-item">Admin</a>
                                    <div class="divider hide-for-small"></div>
                                    <a href="{{ route('get.logout') }}" class="dropdown-item">Logout</a>
                                </div>
                            </li>
                        @else
                            <li class="nav-item cstm_login">
                                <a class="nav-link" href="{{ route('get.login') }}">Login</a>
                            </li>
                        @endif
                    </ul>
                    </ul>
      </div>
    </nav>