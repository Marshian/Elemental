@include('partials.frontend-header')
@include('partials.frontend-navbar')
<div class="bg-dark text-light py-5">
    <div class="container px-5 py-7">
        <h1 class="display-4">Creativity <span class="circle circle-inverse">+</span> Science = Wonder</h1>
        <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <p><a class="btn btn-primary btn-lg" href="#">Learn more</a></p>
    </div>
</div>
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
