<nav class="navbar navbar-static-top navbar-no-margin">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="/img/logo.png" alt="Dark Star Mountain Bike Tours"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        {!! $menu or '' !!}
                    </ul>
                    @if(isset($admin_menu))
                        <ul class="nav navbar-nav">
                            {!! $admin_menu or '' !!}
                        </ul>
                    @endif
                    <ul class="nav navbar-nav navbar-right">
                        {{--Authentication Links--}}
                        @if (!Auth::guest())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->getFullName() }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>
</nav>