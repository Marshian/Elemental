<!DOCTYPE html>
<!--[if IE 8]>
    <html class="no-js lt-ie9" lang="en">
<![endif]-->

<!--[if gt IE 8]>
    <html class="no-js" lang="en">
<![endif]-->
        
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
    		@section('title')
                {{ $siteSettings['site.name'] }}
    		@show
        </title>
        
        {{ $metadata or '' }}

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
        
        @yield('styles')
        
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
          <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
        <![endif]-->

        @yield('header_scripts')
    </head>
        
    <body class="pat-3 bg-gray1">
	<!-- Navbar -->

    <div class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">{{ $siteSettings['site.name'] }}</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            {{ $menu or '' }}
            </ul>

            <ul class="nav navbar-nav pull-right">
                <li class="divider hide-for-small"></li>
                @if (Auth::check())
                    <li>{{ link_to_route('get.logout', 'Logout') }}</li>
                    @if (Auth::user()->hasAccess('admin'))
                    <li><a href="{{ URL::to('/admin') }}">Admin</a></li>
                    @endif
                @else
                    <li {{ (Route::currentRouteName() == 'get.login') ? 'class="active"' : '' }}>
                        {{ link_to_route('get.login', 'Login') }}
                    </li>
                    <li {{ (Route::currentRouteName() == 'get.register') ? 'class="active"' : '' }}>
                        {{ link_to_route('get.register', 'Register') }}
                    </li>
                @endif

            </ul>
          </ul>
        </div>
      </div>
    </div>
    <!-- End Navbar -->


		<!-- Container -->
        <div class="container">
            @include('...notifications')
        </div>

		@yield('content')

		<!-- ./ container -->


	</body>
</html>
