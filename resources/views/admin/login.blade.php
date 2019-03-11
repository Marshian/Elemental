<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Elemental | Login</title>

    <link href="{!! asset('backend/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('backend/font-awesome/css/font-awesome.css') !!}" rel="stylesheet">

    <link href="{!! asset('backend/css/animate.css') !!}" rel="stylesheet">
    <link href="{!! asset('backend/css/style.css') !!}" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name"></h1>

        </div>
        <h3>Welcome</h3>

        <p>Login in. To see it in action.</p>
        <form class="m-t" role="form" action="login" method="post" >
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Username" required="" name="email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" required="" name="password">
            </div>
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
        </form>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{!! asset('backend/js/jquery-2.1.1.js"') !!}"></script>
<script src="{!! asset('backend/js/bootstrap.min.js') !!}"></script>

</body>

</html>
