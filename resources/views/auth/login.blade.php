<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Elemental Esports | Login</title>

    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('backend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">Elemental</h1>
            </div>
            <h3>Welcome to Elemental</h3>

            <p>Login</p>
            <form class="m-t" role="form" method="POST" action="{{ url('login') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="" value="{{ old('email') }}">
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="#">Create an account</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="{{ asset('backend/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
</body>

</html>
