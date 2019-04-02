<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        {{ $siteSettings['site.name'] or 'Acme co.' }}
        @yield('title')
    </title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
{!! $metadata or '' !!}

<!-- Styles -->
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700,800" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.css') }}">
    @yield('styles')
    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
    </script>
    @yield('header_scripts')
</head>
<body>
<!-- Container -->
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-7">
            <h1 class="text-center mt-5">
                {{ $siteSettings['site.name'] or 'Acme co.' }}
            </h1><br><br>
            @include('notifications')
            @yield('content')
        </div>
    </div>
</div>
<br>
<br>
<hr>
<p class="text-center text-muted">Copyright 2018-2019 (c) Team Elemental | All Rights Reserved</p>
@yield('footer_scripts')
</body>
</html>
