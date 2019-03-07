<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Team Elemental') }}</title>

    <!-- Styles -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">

</head>
<body>
    <div id="app">
        <div class="top-header">
            <div class="container cstm-container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="element">
                            <a href="http://staging.marshian.com.au/index.html"><img src="{{ asset('main-logo.png') }}" alt="" class="img-fluid d-lg-block d-none"></a>
                            <a href="http://staging.marshian.com.au/index.html"><img src="{{ asset('footer-logo.png') }}" alt="" class="img-fluid d-block d-lg-none"></a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <a href="http://staging.marshian.com.au/promo-future-home-living.html"><img src="{{ asset('future.png') }}" alt="" class="img-fluid"></a>
                    </div>
                    <div class="col-md-3 col-6">
                        <a href="http://staging.marshian.com.au/sponsors-marshian.html"><img src="{{ asset('marshian.png') }}" alt="" class="img-fluid"></a>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')

        <footer id="footer">
            <div class="container cstm-container">
                <div class="footer-section">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="element">
                                <img src="{{asset('img/footer-logo.png')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="about">
                                <h4>ABOUT US</h4>
                                <p class="praesent">Praesent finibus diam sem, et aliquam velit sodales a. Sed congue
                                    nunc laoreet lacus placerat malesuada. In et quam leo. Quisque molestie efficitur
                                    interdum. Cras nisi tellus, blandit sit amet ligula vitae, tempus accumsan libero.
                                    In tempus lacus nisi, quis suscipit lacus blandit sit amet.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="footer-icon">
                                <a href="https://twitter.com/Elemental_Org" target="_blank"><i class="fab fa-twitter"></i>
                                    <p>TWITTER</p></a>
                            </div>
                            <div class="footer-icon">
                                <a href="https://www.facebook.com/TeamElem/" target="_blank"><i class="fab fa-facebook-f"></i>
                                    <p>FACEBOOK</p></a>
                            </div>
                            <div class="footer-icon">
                                <a href="https://www.twitch.tv/elemental_crew" target="_blank"><i class="fab fa-twitch"></i>
                                    <p>TWITCH</p></a>
                            </div>
                            <div class="footer-icon">
                                <a href="https://www.youtube.com/channel/UCfV8VvXkXTXLYNqxL98XKUw" target="_blank"><i class="fab fa-youtube"></i>
                                    <p>YOUTUBE</p></a>
                            </div>
                            <div class="footer-icon">
                                <a href="https://discord.gg/pfVjQaC" target="_blank"><i class="fab fa-discord"></i>
                                    <p>DISCORD</p></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copy-right">
                    <p class="copy">Copyright 2018-2019 (c) Team Elemental | All Rights Reserved</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    @yield('footer_js')
</body>
</html>
