@include('partials.frontend-header')
<br>
<div class="container cstm-container">
    <div class="content-body">
    @include('notifications')
    @yield('content')
    </div>
</div>

@include('partials.footer')
<script src="/js/frontend.js"></script>
</body>
</html>
