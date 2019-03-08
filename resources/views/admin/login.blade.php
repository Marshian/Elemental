<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('font-awesome/css/font-awesome.css') !!}" rel="stylesheet">

    <link href="{!! asset('css/animate.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/style.css') !!}" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">IN+</h1>

        </div>
        <h3>Welcome to IN+</h3>
        <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
            <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
        </p>
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
<script src="{!! asset('js/jquery-2.1.1.js"') !!}"></script>
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>

</body>

</html>