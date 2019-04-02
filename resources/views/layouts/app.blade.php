<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @section('title')
            {{ $siteSettings['site.name'] or 'Acme Co.' }} - Admin
        @show
    </title>
    {!! $metadata or '' !!}
    <link href="/css/app.css" rel="stylesheet">
    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
    </script>
</head>
<body>
@include('partials.frontend-navbar')
@yield('content')
@include('partials.footer')
<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>
