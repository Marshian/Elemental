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
            {{ $siteSettings['site.name'] or 'Dark Star Mountain Tours' }} - Admin
        @show
    </title>
{{ $metadata or '' }}

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app-framework.css') }}" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">

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

    <body style="padding: 10% 0;">
	
		<!-- Container -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                        @include('notifications')
                        @yield('content')
                </div>
            </div>
        </div>

	</body>
</html>
