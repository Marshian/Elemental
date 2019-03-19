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
            {{ $siteSettings['site.name'] or 'Acme co.' }} - Admin
        @show
    </title>
    {!! $metadata or '' !!}

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    @yield('styles')
    @yield('header_scripts')
</head>

<body>
@include('partials.admin-navbar')
@include('partials.admin-subbar')

<br>
<div class="container">
    @include('notifications')
    @yield('content')
</div>

<div class="modal fade" id="globalModal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">&nbsp;</h4></div>
            <div class="modal-body">
                <iframe frameborder="0" src="" height="300" width="100%"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@include('partials.admin-footer')
<script src="{{ asset('js/app.js') }}"></script>
@yield('footer_scripts')
</body>
</html>
