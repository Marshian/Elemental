@include('partials.frontend-header')
@include('partials.frontend-navbar')
<br>
<br>
<div class="container">
    @include('notifications')
    @yield('content')
</div>
@include('partials.footer')
<script src="/js/frontend.js"></script>
</body>
</html>
