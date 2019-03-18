@include('partials.frontend-header')
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
@include('partials.footer')
@yield('footer_scripts')
</body>
</html>
