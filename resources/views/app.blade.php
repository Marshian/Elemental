<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Darkstar Mountain Bike Tours</title>
    <link href="/css/app.css" rel="stylesheet">

    <style>
        .fa-folder, .fa-file, .fa-chevron-down, .fa-chevron-right {
            color: #7d888f;
        }
        .fa-file {
            margin-left: 19px;
        }
        .fa-chevron-down, .fa-chevron-right {
            color: #adadad;
        }

        .br {
            border-right: 1px solid rgba(120, 130, 140, .13);
        }

        .bb > div {
            border-bottom: 1px solid rgba(120, 130, 140, .13);
        }

        .pad {
            padding: 1rem;
        }

        html, body, .container-fluid {
            height: 100%;
        }

        .row-flex, .row-flex > div[class*='col-'] {
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            flex: 1 1 auto;
        }

        .row-flex-wrap {
            -webkit-flex-flow: row wrap;
            align-content: flex-start;
            flex: 0;
        }

        .row-flex > div[class*='col-'], .container-flex > div[class*='col-'] {
            margin: -.2px; /* hack adjust for wrapping */
        }

        .container-flex > div[class*='col-'] div, .row-flex > div[class*='col-'] div {
            width: 100%;
        }

        .flex-col {
            display: flex;
            display: -webkit-flex;
            flex: 1 100%;
            flex-flow: column nowrap;
        }

        .flex-grow {
            display: flex;
            -webkit-flex: 2;
            flex: 2;
        }

        #body{
            height: 80%;
        }
        #header, #footer {
            height: 10%;
            min-height: 50px;
        }
        #sidebar {
            overflow: scroll;
        }

        /*************************** layout ********/
        #sidebar ul.nav {
            margin-bottom: 2px;
            font-size: 12px; /* to change font-size, please change instead .lbl */
        }
        #sidebar ul.nav ul,
        #sidebar ul.nav ul li {
            list-style: none!important;
        }
        #sidebar ul.nav ul {
            padding-left: 15px;
            width: auto;
        }
        #sidebar ul.nav ul.children {
            padding-left: 15px;
            width: auto;
        }
        #sidebar ul.nav ul.children li{
            margin-left: 0px;
        }
        #sidebar a {
            text-decoration: none;
        }
        #sidebar .nav > li > a:hover, #sidebar .nav > li > a:focus  {
            text-decoration: none;
            background: transparent;
        }

        #sidebar ul.nav li a:hover .lbl {
            color: #999!important;
        }

        #sidebar ul.nav li.current>a .lbl {
            /*background-color: #999;*/
            /*color: #fff!important;*/
        }

        /* parent item */
        #sidebar ul.nav li.parent a {
            padding: 0;
            /*color: #ccc;*/
        }
        #sidebar ul.nav>li.parent>a {
            /*border: solid 1px #eee;*/
            /*text-transform: uppercase;*/
        }
        #sidebar ul.nav li.parent a:hover {
            /*background-color: #fff;*/
        }

        /* link tag (a)*/
        #sidebar ul.nav li.parent ul li a {
            color: #222;
            border: none;
            display:block;
            padding-left: 0px;
        }

        #sidebar ul.nav li.parent ul li a:hover {
            /*background-color: #fff;*/
            -webkit-box-shadow:none;
            -moz-box-shadow:none;
            box-shadow:none;
        }

        /* sign for parent item */
        #sidebar ul.nav li .sign {
            display: inline-block;
            /*font-size: 12px;*/
            /*width: 24px;*/
            /*line-height: 19px;*/
            /*padding: 5px 8px;*/
            background-color: transparent;
            /*color: #fff;*/
        }
        #sidebar ul.nav li.parent>a>.sign{
            /*background-color: #999;*/
        }

        /* label */
        #sidebar ul.nav li .lbl {
            padding: 5px 0px;
            display: inline-block;
        }
        #sidebar ul.nav li.current>a>.lbl {
            /*color: #fff;*/
        }
        #sidebar ul.nav  li a .lbl{
            /*font-size: 12px;*/
        }

        /* THEMATIQUE
        ------------------------- */
        /* theme 1 */
        #sidebar ul.nav>li.item-1.parent>a {
            /*border: solid 1px #ff6307;*/
        }
        #sidebar ul.nav>li.item-1.parent>a>.sign,
        #sidebar ul.nav>li.item-1 li.parent>a>.sign{
            margin-left: 0;
            /*background-color: #ff6307;*/
        }
        #sidebar ul.nav>li.item-1 .lbl {
            /*color: #ff6307;*/
        }
        #sidebar ul.nav>li.item-1 li.current>a .lbl {
            /*background-color: #ff6307;*/
            /*color: #fff!important;*/
        }

    </style>

    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div id="header" class="row row-flex bb">
        <div class="col-xs-2 flex-col flex-grow br pad">Editor</div>
        <div class="col-xs-10 flex-col flex-grow pad"> cool</div>
    </div>
    <div id="body" class="row row-flex bb">
        <div id="sidebar" class="col-xs-2 flex-col flex-grow br pad">
            <ul id="menu-group-1" class="nav menu">
                <li class="item-1 deeper parent active">
                    <a data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-1">
                        <span class="sign"><i class="fa fa-fw fa-chevron-right"></i></span>
                        <span class="lbl"><i class="fa fa-fw fa-folder"></i> Menu Group i</span>
                    </a>
                    <ul class="children nav-child unstyled collapse" id="sub-item-1">
                        <li class="item-2 deeper parent active">
                            <a data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-2">
                                <span  class="sign"><i class="fa fa-fw fa-chevron-right"></i></span>
                                <span class="lbl"><i class="fa fa-fw fa-folder"></i> Menu 1</span>
                            </a>
                            <ul class="children nav-child unstyled collapse" id="sub-item-2">
                                <li class="item-3 current active">
                                    <a class="" href="#">
                                        <span class="sign"><i class="fa fa-fw fa-file"></i></span>
                                        <span class="lbl">Menu 1.1</span> (current menu)
                                    </a>
                                </li>
                                <li class="item-4">
                                    <a class="" href="#">
                                        <span class="sign"><i class="fa fa-fw fa-file"></i></span>
                                        <span class="lbl">Menu 1.2</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="item-5 deeper parent">
                            <a data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-5">
                                <span class="sign"><i class="fa fa-fw fa-chevron-right"></i></span>
                                <span class="lbl"><i class="fa fa-fw fa-folder"></i> Menu 2</span>
                            </a>
                            <ul class="children nav-child unstyled collapse" id="sub-item-5">
                                <li class="item-6">
                                    <a class="" href="#">
                                        <span class="sign"><i class="fa fa-fw fa-file"></i></span>
                                        <span class="lbl">Menu 2.1</span>
                                    </a>
                                </li>
                                <li class="item-7">
                                    <a class="" href="#">
                                        <span class="sign"><i class="fa fa-fw fa-file"></i></span>
                                        <span class="lbl">Menu 2.2</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="item-8 deeper parent">
                    <a data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-8">
                        <span class="sign"><i class="fa fa-fw fa-chevron-right"></i></span>
                        <span class="lbl"><i class="fa fa-fw fa-folder"></i> Menu Group ii</span>
                    </a>
                    <ul class="children nav-child unstyled collapse" id="sub-item-8">
                        <li class="item-9 deeper parent">
                            <a data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-9">
                                <span class="sign"><i class="fa fa-fw fa-chevron-right"></i></span>
                                <span class="lbl"><i class="fa fa-fw fa-folder"></i> Menu 1</span>
                            </a>
                            <ul class="children nav-child unstyled collapse" id="sub-item-9">
                                <li class="item-10">
                                    <a class="" href="#">
                                        <span class="sign"><i class="fa fa-fw fa-file"></i></span>
                                        <span class="lbl">Menu 1.1</span>
                                    </a>
                                </li>
                                <li class="item-11">
                                    <a class="" href="#">
                                        <span class="sign"><i class="fa fa-fw fa-file"></i></span>
                                        <span class="lbl">Menu 1.2</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="item-12 deeper parent">
                            <a data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-12">
                                <span class="sign"><i class="fa fa-fw fa-chevron-right"></i></span>
                                <span class="lbl"><i class="fa fa-fw fa-folder"></i> Menu 2</span>
                            </a>
                            <ul class="children nav-child unstyled collapse" id="sub-item-12">
                                <li class="item-13">
                                    <a class="" href="#">
                                        <span class="sign"><i class="fa fa-fw fa-file"></i></span>
                                        <span class="lbl">Menu 2.1</span>
                                    </a>
                                </li>
                                <li class="item-14">
                                    <a class="" href="#">
                                        <span class="sign"><i class="fa fa-fw fa-file"></i></span>
                                        <span class="lbl">Menu 2.2</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="col-xs-10 flex-col flex-grow pad"> cool</div>
    </div>

    <div id="footer" class="row row-flex">
        <div class="col-xs-2 flex-col flex-grow br pad">Editor</div>
        <div class="col-xs-10 flex-col flex-grow pad"> cool</div>
    </div>
</div>
<script src="/js/app.js"></script>
<script src="/js/app.js"></script>

<script>
    $(function() {
            $(document).on("click","#sidebar ul.nav li.parent > a", function(){
                $(this).find('span.sign i:first').toggleClass("fa-chevron-down");
            });

            // Open Le current menu
            $("#sidebar ul.nav li.parent.active > a").find('span.sign i:first').addClass("fa-chevron-down");
            $("#sidebar ul.nav li.current").parents('ul.children').addClass("in");

    });
</script>
</body>
</html>
