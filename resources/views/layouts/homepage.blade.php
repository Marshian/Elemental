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

@yield('content')

<!-- Scripts -->
<script src="/js/app.js"></script>
<script src="https://fareharbor.com/embeds/api/v1/"></script>
<script>
    $(function() {
        $('.fh-book-button').click(function(e){
            e.stopPropagation();
            e.preventDefault();
            FH.open({ shortname: 'darkstarmountaintours', view: 'all-availability', fullItems: 'yes' });
        });
    });
</script>
</body>
</html>
