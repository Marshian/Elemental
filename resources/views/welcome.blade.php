@extends('layouts.app')

@section('content')
    <div class="slider-section">
        <div class="container cstm-container">
            <div class="main-section">
                <nav class="navbar navbar-expand-lg cstm_navbar">
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                    </button>
                    <div class="collapse navbar-collapse" id="navbarsExample05">
                        <ul class="navbar-nav cstm_cls_nav new">
                            <li class="nav-item">
                                <a class="nav-link active" href="http://staging.marshian.com.au/index.html">HOME</a>
                                <div class="magic_line"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://staging.marshian.com.au/about.html">ABOUT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://staging.marshian.com.au/news.html">NEWS</a>
                                <div class="magic_line"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://staging.marshian.com.au/team.html">TEAM</a>
                                <div class="magic_line"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://staging.marshian.com.au/sponsors-affiliates-promotional.html">PARTNERS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://staging.marshian.com.au/matches.html">MATCHES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://staging.marshian.com.au/our-streamers.html">STREAMS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://staging.marshian.com.au/videos.html">VIDEOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://staging.marshian.com.au/contact.html">CONTACT</a>
                            </li>
                        </ul>
                    </div>
                    <div class="social-icon">
                        <a href="https://twitter.com/Elemental_Org" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.facebook.com/TeamElem/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.twitch.tv/elemental_crew" target="_blank"><i class="fab fa-twitch"></i></a>
                        <a href="https://www.youtube.com/channel/UCfV8VvXkXTXLYNqxL98XKUw" target="_blank"><i class="fab fa-youtube"></i></a>
                    </div>
                </nav>
                <div class="banner">
                    <div id="demo1" class="carousel slide" data-ride="carousel">
                        <ul class="carousel-indicators">
                            <li data-target="#demo1" data-slide-to="0" class="active"></li>
                            <li data-target="#demo1" data-slide-to="1" class=""></li>
                            <li data-target="#demo1" data-slide-to="2" class=""></li>
                        </ul>
                        <div class="carousel-inner">
                            <div class="carousel-item cst_banner active">
                                <div class="carousel-caption cst_carousel">
                                    <h1>R6 RECRUITING<br><span>JOIN TODAY!</span></h1>
                                </div>
                            </div>
                            <div class="carousel-item cst_banner">
                                <div class="carousel-caption cst_carousel">
                                    <h1>R6 RECRUITING<br><span>JOIN TODAY!</span></h1>
                                </div>
                            </div>
                            <div class="carousel-item cst_banner">
                                <div class="carousel-caption cst_carousel">
                                    <h1>R6 RECRUITING<br><span>JOIN TODAY!</span></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog">
        <div class="container cstm-container">
            <h2 class="news">NEWS HEADLINES</h2>
            <div class="row blog-img">
                <div class="col-md-4 col-12">
                    <a href="http://staging.marshian.com.au/#"><img src="{{ asset('img/news1.jpg') }}" class="img-fluid">
                        <div class="news-title">
                            <h3>NEWS TITLE HEADLINE</h3>
                            <h4>RAINBOW SIX</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-12">
                    <a href="http://staging.marshian.com.au/#"><img src="{{ asset('img/news2.jpg') }}" class="img-fluid">
                        <div class="news-title">
                            <h3>NEWS TITLE HEADLINE</h3>
                            <h4>BLACK OPS 4</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-12">
                    <a href="http://staging.marshian.com.au/#"><img src="{{ asset('img/news3.jpg') }}" class="img-fluid">
                        <div class="news-title">
                            <h3>NEWS TITLE HEADLINE</h3>
                            <h4>CSGO</h4>
                        </div>
                    </a>
                </div>
            </div>
            <section class="video">
                <div class="row">
                    <div class="col-md-6 col-lg-3 col-12">
                        <h2 class="news">RECENT MATCHES</h2>
                        <ul>
                            <li class="cstm-vs">
                                <div class="cstm-list">
                                    <a href="http://staging.marshian.com.au/#"><img src="{{ asset('img/game.png') }}" alt="" class="img-fluid">
                                        <img src="{{ asset('img/opposition.png') }}" alt="" class="img-fluid">
                                        <span>vs</span>
                                        <img src="{{ asset('img/selected.png') }}" alt="" class="img-fluid">
                                        <span class="timing">21:07</span></a>
                                </div>
                            </li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-4 col-12">
                        <h2 class="news">LIVESTREAMS</h2>
                        <ul>
                            <li class="sick">
                                <a href="http://staging.marshian.com.au/#"><img src="{{ asset('img/sick.png') }}" alt="" class="img-fluid">
                                    <p>sickferal</p>
                                    <p>offline</p></a></li>
                            <li class="sick">
                                <a href="http://staging.marshian.com.au/#"><img src="{{ asset('img/sick.png') }}" alt="" class="img-fluid">
                                    <p>sickferal</p>
                                    <p>offline</p></a></li>
                            <li class="sick">
                                <a href="http://staging.marshian.com.au/#"><img src="{{ asset('img/sick.png') }}" alt="" class="img-fluid">
                                    <p>sickferal</p>
                                    <p>offline</p></a></li>
                            <li class="sick">
                                <a href="http://staging.marshian.com.au/#"><img src="{{ asset('img/sick.png') }}" alt="" class="img-fluid">
                                    <p>sickferal</p>
                                    <p>offline</p></a></li>
                        </ul>
                    </div>
                    <div class="col-md-12 col-lg-5 col-12 cstm_video_col">
                        <h2 class="news">LATEST MEDIA</h2>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="seperate">
        <div class="row">
            <div class="col-md-6 col-6">
                <div class="line"></div>
            </div>
            <div class="col-md-6 col-6">
                <img src="{{ asset('img/line-logo.png') }}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
@endsection