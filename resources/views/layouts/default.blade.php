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
            {{ $siteSettings['site.name'] or 'Dark Star Mountain Tours' }} - Admin
        @show
    </title>
{{ $metadata or '' }}

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
@include('partials.frontend-navbar')

<div style="position: relative">
    <div class="section">
        <div style="position: absolute; bottom: 20%; left:50%; width: 50%; margin-left:-25%; text-align: center;">
            <a href="#" class="btn btn-danger btn-lg">Book Now</a> &nbsp;&nbsp;
            <a href="#" class="btn btn-default btn-lg">Video Tour</a>
        </div>
    </div>
</div>
<br>
<br>
<div class="container">

    <div class="row">
        <div class="col-md-6">
            <p>Apparently we had reached a great height in the atmosphere, for the sky was a dead black, and the stars had ceased to twinkle. By the same
                illusion which lifts the horizon of the sea to the level of the spectator on a hillside, the sable cloud beneath was dished out, and the car
                seemed to float in the middle of an immense dark sphere, whose upper half was strewn with silver. Looking down into the dark gulf below, I could
                see a ruddy light streaming through a rift in the clouds.</p>
        </div>
    </div>
    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
        <h1>Navbar example</h1>
        <p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it
            also adapts to your viewport and device.</p>
        <p>To see the difference between static and fixed top navbars, just scroll.</p>
        <p>
            <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs &raquo;</a>
        </p>
    </div>

</div> <!-- /container -->

    @yield('content')

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
