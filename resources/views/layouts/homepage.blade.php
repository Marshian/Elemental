<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @section('title')
            {{ $siteSettings['site.name'] or 'Acme Co.' }} - Admin
        @show
    </title>
    {{ $metadata or '' }}
    <link href="/css/app.css" rel="stylesheet">
    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
    </script>
</head>
<body>
@include('partials.frontend-navbar')
<h1>DUDE!!</h1>
@yield('content')
@include('partials.footer')
<script src="/js/app.js"></script>
<script src="https://fareharbor.com/embeds/api/v1/"></script>
<script>
    $(function () {
        $('.fh-book-button').click(function (e) {
            e.stopPropagation();
            e.preventDefault();
            FH.open({shortname: 'darkstarmountaintours', view: 'all-availability', fullItems: 'yes'});
        });
        $('.fh-book-morning').click(function (e) {
            e.stopPropagation();
            e.preventDefault();
            FH.open({shortname: 'darkstarmountaintours', fallback: 'simple', fullItems: 'yes', view: {item: 37345}});
        });
        $('.fh-book-afternoon').click(function (e) {
            e.stopPropagation();
            e.preventDefault();
            FH.open({shortname: 'darkstarmountaintours', fallback: 'simple', fullItems: 'yes', view: {item: 37351}});
        });
    });
</script>
</body>
</html>
