<div class="slider-section">
    <div class="container cstm-container">
        <div class="main-section">
            <nav class="navbar navbar-expand-lg cstm_navbar">
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                </button>
                <div class="collapse navbar-collapse" id="navbarsExample05">
                    <ul class="navbar-nav cstm_cls_nav new">
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('get.login') }}">Login</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="social-icon">
                    <a href="https://twitter.com/Elemental_Org" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.facebook.com/TeamElem/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.twitch.tv/elemental_crew" target="_blank"><i class="fab fa-twitch"></i></a>
                    <a href="https://www.youtube.com/channel/UCfV8VvXkXTXLYNqxL98XKUw" target="_blank"><i class="fab fa-youtube"></i></a>
                </div>

            </nav>
            <div class="banner">
                <div id="demo1" class="carousel slide" data-ride="carousel">
                    <ul class="carousel-indicators">
                        <li data-target="#demo1" data-slide-to="0" class="active"></li>
                        <li data-target="#demo1" data-slide-to="1" class=""></li>
                        <li data-target="#demo1" data-slide-to="2" class=""></li>
                    </ul>
                    <div class="carousel-inner">
                        <div class="carousel-item cst_banner active">
                            <div class="carousel-caption cst_carousel">
                                <h1>R6 RECRUITING<br><span>JOIN TODAY!</span></h1>
                            </div>
                        </div>
                        <div class="carousel-item cst_banner">
                            <div class="carousel-caption cst_carousel">
                                <h1>R6 RECRUITING<br><span>JOIN TODAY!</span></h1>
                            </div>
                        </div>
                        <div class="carousel-item cst_banner">
                            <div class="carousel-caption cst_carousel">
                                <h1>R6 RECRUITING<br><span>JOIN TODAY!</span></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
