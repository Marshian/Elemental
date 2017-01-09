<!DOCTYPE html>
<!--[if IE 8]>
    <html class="no-js lt-ie9" lang="en">
<![endif]-->

<!--[if gt IE 8]>
        <html class="no-js" lang="en">
<![endif]-->
        
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />
        <title>
		@section('title')
            Login - {{ $siteSettings['site.name'] }}
		@show
        </title>

        @yield('metadata')
        
        <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/foundation.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
        <!--[if IE 7]>
            <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-ie7.min.css') }}">
        <![endif]-->
        @yield('styles')
        <script src="{{ asset('assets/js/vendor/custom.modernizr.js') }}"> </script>
        <script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>
		@yield('script_header')
    </head>
        
    <body class="pat-3 bg-gray1" style="padding: 10% 0;">
	
		<!-- Container -->
		<div class="row">
			<div class="large-6 large-centered columns">
				<div class="bg-white padd sshadow shadow">
					@include('...notifications')
					@yield('content')
				</div>
			</div>
		</div>

		<!-- ./ container -->

		<!-- Javascripts
		================================================== -->
<script src="{{ asset('assets/js/foundation/foundation.js') }}"></script>
<script src="{{ asset('assets/js/foundation/foundation.alerts.js') }}"></script>
<script src="{{ asset('assets/js/foundation/foundation.placeholder.js') }}"></script>
<script src="{{ asset('assets/js/foundation/foundation.cookie.js') }}"></script>

	</body>
</html>
