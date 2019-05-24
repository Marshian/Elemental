<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        {{ $siteSettings['site.name'] or 'Acme co.' }}
        @yield('title')
    </title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! $metadata or '' !!}

    <!-- Styles -->
    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,400i,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.css') }}">
    @yield('styles')
    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
    </script>
    @yield('header_scripts')
</head>
<body>
<div id="app">
		<div class="top-header">
		<div class="container cstm_nav">
                <div class="row nav_rw">
            <div class="col-lg-4 float-left">
                <img src="frontend/img/logo.png" alt="">
            </div>
             @include('partials.frontend-navbar')
	</div>
</div>

    <div class="bd-example">
 <!---<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="frontend/img/bg.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption cstm_caption d-none d-md-block">
          <div class="container">
      <div class="inner_logo">
        <img src="frontend/img/header_logo.png" alt="">
    </div>
	<div class="lenonvo_announce">
                        <h1>Lenovo™ Announces North America Partnership with TSM</h1>
                        <h2>MORRISVILLE, NC – May 15, 20...</h2>
                        <a href="#">READ MORE</a>
                    </div>
					</div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="frontend/img/slide2.png" class="d-block w-100" alt="...">
        <div class="carousel-caption cstm_caption d-none d-md-block">
          <div class="container">
      <div class="inner_logo">
        <img src="frontend/img/header_logo.png" alt="">
    </div>
	<div class="lenonvo_announce">
                        <h1>Lenovo™ Announces North America Partnership with TSM</h1>
                        <h2>MORRISVILLE, NC – May 15, 20...</h2>
                        <a href="#">READ MORE</a>
                    </div>
					</div>
        </div>
      </div>
       <div class="carousel-item">
        <img src="frontend/img/bg.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption cstm_caption d-none d-md-block">
          <div class="container">
      <div class="inner_logo">
        <img src="frontend/img/header_logo.png" alt="">
    </div>
	<div class="lenonvo_announce">
                        <h1>Lenovo™ Announces North America Partnership with TSM</h1>
                        <h2>MORRISVILLE, NC – May 15, 20...</h2>
                        <a href="#">READ MORE</a>
                    </div>
					</div>
        </div>
      </div>
    </div>
    <!--<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>-->
</div>
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active bg_a">
      <div class="container">
      <div class="inner_logo">
        <img src="frontend/img/header_logo.png" alt="">
    </div>
	<div class="lenonvo_announce">
                        <h1>Lenovo™ Announces North America Partnership with TSM</h1>
                        <h2>MORRISVILLE, NC – May 15, 20...</h2>
                        <a href="#">READ MORE</a>
                    </div>
					</div>
    </div>
    <div class="carousel-item bg_b">
	   <div class="container">
		<div class="inner_logo">
        <img src="frontend/img/header_logo.png" alt="">
    </div>
	<div class="lenonvo_announce">
                        <h1>Lenovo™ Announces North America Partnership with TSM</h1>
                        <h2>MORRISVILLE, NC – May 15, 20...</h2>
                        <a href="#">READ MORE</a>
                    </div>
					</div>
    </div>
    <div class="carousel-item bg_c">
     <div class="container">
      <div class="inner_logo">
        <img src="frontend/img/header_logo.png" alt="">
    </div>
	<div class="lenonvo_announce">
                        <h1>Lenovo™ Announces North America Partnership with TSM</h1>
                        <h2>MORRISVILLE, NC – May 15, 20...</h2>
                        <a href="#">READ MORE</a>
                    </div>
					</div>
    </div>
  </div>
  <!--<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>-->
            <!---<div class="container">
                <div class="row nav_rw">
            <div class="col-lg-4 float-left">
                <img src="frontend/img/logo.png" alt="">
            </div>
             @include('partials.frontend-navbar')
 </div>
    <div class="inner_logo">
        <img src="frontend/img/header_logo.png" alt="">
    </div>
	<div class="lenonvo_announce">
                        <h1>Lenovo™ Announces North America Partnership with TSM</h1>
                        <h2>MORRISVILLE, NC – May 15, 20...</h2>
                        <a href="#">READ MORE</a>
                    </div>-->
</div>
</div>
  
   