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
                Admin - {{ $siteSettings['site.name'] }}
    		@show
        </title>
        
        {{ $metadata or '' }}

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('css/lgl-phpstaff.css') }}" rel="stylesheet">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.min.css" />
        <link href="{{ asset('css/dd.css') }}" rel="stylesheet">
        <link href="/css/jquery.nouislider.min.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="/css/daterangepicker.css">

        @yield('styles')
        
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>
        <script src="/js/jquery.nouislider.min.js"></script>
        <script src="/js/js-tmpl.min.js"></script>



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
            @foreach ($module_menu_array as $menu_section => $menus)
                    @if ( ! is_array($menus))
                        <li><a href="{{ $menus }}">{{ $menu_section }}</a></li>
                    @else

                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $menu_section }} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            @foreach ($menus as $menu_link)
                                @if (isset($menu_link['divider']))
                                    <li class="{{ $menu_link['divider'] }}"></li>
                                @elseif(isset($menu_link['label']))
                                    <li class="{{ isset($menu_link['children']) ? 'has-dropdown' : '' }}">
                                        <a href="{{ isset($menu_link['url'])?$menu_link['url']:'#' }}">{{ $menu_link['label'] }}</a>
                                        @if ( ! empty($menu_link['children']))
                                            <ul class="dropdown">
                                                @foreach ($menu_link['children'] as $child_link)
                                                    @if (isset($child_link['divider']))
                                                        <li class="{{ $child_link['divider'] }}"></li>
                                                    @else
                                                        <li><a href="{{ isset($child_link['url']) ?$child_link['url']:'#' }}">{{ $child_link['label'] }}</a></li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
            </ul>

            <ul class="nav navbar-nav pull-right">
                <li class="divider hide-for-small"></li>
                @if (isset($currentUser))
                    <li><a href="{{ route('get.logout') }}">Logout</a></li>
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

<br>
<br>
<br>
<br>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/jquery.slugify.js') }}"></script>
    <script src="/js/jquery.daterangepicker.js"></script>
    <script src="{{ asset('js/global.js') }}"></script>
    <script src="{{ asset('js/time-elements.js') }}"></script>

	</body>
</html>
