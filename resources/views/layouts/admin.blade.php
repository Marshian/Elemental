<!DOCTYPE html>
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="en">
<![endif]-->

<!--[if gt IE 8]>
<html class="no-js" lang="en">
<![endif]-->

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @section('title')
            {{ $siteSettings['site.name'] or 'Acme Co.' }} - Admin
        @show
    </title>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400' rel='stylesheet' type='text/css'>
{{ $metadata or '' }}

    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    @yield('styles')

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
    @yield('header_scripts')
</head>

<body>
<!-- Navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#admin-navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                {{ $siteSettings['site.name'] or 'HumboldtWeb' }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="admin-navbar">
            <ul class="nav navbar-nav">
                {!! $admin_menu or '' !!}
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
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
        </div>
    </div>
</nav>
@if (isset($title) || isset($breadcrumbs))
    <div class="subheader">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    @if (isset($title))
                        <h2>{{ $title or '' }}</h2>
                    @endif
                </div>
                <div class="col-md-6 text-right">
                    @if (isset($breadcrumbs))
                        {!! $breadcrumbs->render() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif
<!-- Sub Navbar -->

<!-- Container -->

<div class="container">
    @include('notifications')
    @yield('content')
</div>

<!-- Modal -->

<div class="modal fade" id="globalModal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">&nbsp;</h4></div>
            <div class="modal-body">
                <iframe frameborder="0" src="" height="300" width="100%"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- ./ container -->

<div class="container">
    <hr/>
    <div class="row container-footer">
        <div class="col-sm-8">
            Copyright © {{ date('Y') }} Dark Star Mountain Bike Tours. All rights reserved.
        </div>
        <div class="col-sm-4 hidden-print text-right">
            <a href="#/privacy" target="_blank">Privacy Policy</a> |
            <a href="#/terms" target="_blank">Terms of Use</a>
        </div>
    </div>
</div>
<script src="{{ asset('js/all.js') }}"></script>
@yield('footer_scripts')
</body>
</html>
