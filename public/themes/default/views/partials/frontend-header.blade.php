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
<div id="app">
    <div class="top-header">
        <div class="container cstm-container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="element">
                        <a href="http://staging.marshian.com.au/index.html"><img src="{{ asset('frontend/img/main-logo.png') }}" alt="" class="img-fluid d-lg-block d-none"></a>
                        <a href="http://staging.marshian.com.au/index.html"><img src="{{ asset('frontend/img/footer-logo.png') }}" alt="" class="img-fluid d-block d-lg-none"></a>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <a href="http://staging.marshian.com.au/promo-future-home-living.html"><img src="{{ asset('frontend/img/future.png') }}" alt="" class="img-fluid"></a>
                </div>
                <div class="col-md-3 col-6">
                    <a href="http://staging.marshian.com.au/sponsors-marshian.html"><img src="{{ asset('frontend/img/marshian.png') }}" alt="" class="img-fluid"></a>
                </div>
            </div>
        </div>
    </div>
    @include('partials.frontend-navbar')