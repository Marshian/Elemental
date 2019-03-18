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
            {{ $siteSettings['site.name'] or 'Dark Star Mountain Tours' }} - Admin
        @show
    </title>
    <title>
        @section('title')
            {{ $siteSettings['site.name'] or 'Dark Star Mountain Tours' }} - Admin
        @show
    </title>
{{ $metadata or '' }}

<!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    @yield('header_scripts')
</head>

<body style="padding: 5% 0;">

<!-- Container -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="text-center">
                <img src="/img/logo.svg" alt="Dark Star Mountain Tours" style="width: 66%;height: auto;margin-bottom: 20px;">
            </div>
            @include('notifications')
            @yield('content')
        </div>
    </div>
</div>
@include('partials.footer')
<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>
