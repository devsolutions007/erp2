<!doctype html> <!--
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <!-- DNS prefetch -->
    <link rel=dns-prefetch href="//fonts.googleapis.com">
    <!-- Use the .htaccess and remove these lines to avoid edge case issues.
    More info: h5bp.com/b/378 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Hotbox</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile viewport optimized: j.mp/bplateviewport -->
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory:
    mathiasbynens.be/notes/touch-icons -->

    <!-- CSS -->
    <link rel="stylesheet" href="/mukesh/erp2-test/public/master-css/960gs/fluid.css"> <!-- 960.gs Grid System -->
    <!-- The HTML5-Boilerplate CSS styling -->
    <link rel="stylesheet" href="/mukesh/erp2-test/public/master-css/h5bp/normalize.css"> <!-- RECOMMENDED: H5BP reset styles -->
    <link rel="stylesheet" href="/mukesh/erp2-test/public/master-css/h5bp/non-semantic.helper.classes.css"> <!-- RECOMMENDED: H5BP helpers (e.g. .clear or .hidden) -->
    <link rel="stylesheet" href="/mukesh/erp2-test/public/master-css/h5bp/print.styles.css"> <!-- OPTIONAL: H5BP print styles -->
    <!-- The main styling -->
    <link rel="stylesheet" href="/mukesh/erp2-test/public/master-css/sprites.css"> <!-- STRONGLY RECOMMENDED: Basic sprites (e.g. buttons, jGrowl) -->
    <link rel="stylesheet" href="/mukesh/erp2-test/public/master-css/header.css"> <!-- REQUIRED: Header styling -->
    <link rel="stylesheet" href="/mukesh/erp2-test/public/master-css/navigation.css"> <!-- REQUIRED: Navigation styling -->
    <link rel="stylesheet" href="/mukesh/erp2-test/public/master-css/content.css"> <!-- REQUIRED: Content styling -->
    <link rel="stylesheet" href="/mukesh/erp2-test/public/master-css/footer.css"> <!-- REQUIRED: Footer styling -->
    <link rel="stylesheet" href="/mukesh/erp2-test/public/master-css/typographics.css"> <!-- REQUIRED: Typographics -->
    <link rel="stylesheet" href="/mukesh/erp2-test/public/master-css/ie.fixes.css"> <!-- OPTIONAL: Fixes for IE7 -->
    <!-- Sprite styling -->
    <link rel="stylesheet" href="/mukesh/erp2-test/public/master-css/sprite.tables.css"> <!-- SPRITE: Tables styling -->
    <link rel="stylesheet" href="/mukesh/erp2-test/public/master-css/sprite.forms.css"> <!-- SPRITE: Forms styling -->
    <!-- Styling of JS plugins -->
    <link rel="stylesheet" href="/mukesh/erp2-test/public/master-css/external/jquery-ui-1.8.16.custom.css">	<!-- PLUGIN: jQuery UI styling -->


    <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

    <!-- All JavaScript at the bottom, except this Modernizr build incl. Respond.js
    Respond is a polyfill for min/max-width media queries. Modernizr enables HTML5
    elements & feature detects;
    for optimal performance, create your own custom Modernizr build:
    www.modernizr.com/download/ -->
    <script src="/mukesh/erp2-test/public/master-js/libs/modernizr-2.0.6.min.js"></script>
</head>

<body>

<!-- Begin of #height-wrapper -->
<div id="height-wrapper">
    <!-- Begin of header -->
    <header>
        <!-- Begin of the header toolbar -->
        <div id="header_toolbar">
            <div class="container_12">
                <h1 class="grid_8">Hotbox</h1>
                <!-- Start of right part -->
                <div class="grid_4">
                    <!-- A small toolbar button -->
                   {{-- <div class="toolbar_small">
                        <div class="toolbutton">
                            <span>3</span>
                            <img src="/img/icons/16x16/mail.png" width="16" height="16" alt="mail" >
                        </div>
                        <div class="toolbox" >
                            <span class="arrow"></span>
                            <h3>Your Messages</h3>
                            <ul class="mail">
                                <li>
                                    <a href="#"> <strong>10:15</strong>Need your Help!
                                        <small>
                                            From: John
                                        </small> </a>
                                </li>
                                <li>
                                    <a href="#"> <strong>9:55</strong>New comment on you theme
                                        <small>
                                            From: themeforest
                                        </small></a>
                                </li>
                                <li>
                                    <a href="#"> <strong>Yest.</strong>Successfull backup
                                        <small>
                                            From: System
                                        </small></a>
                                </li>
                                <li class="read">
                                    <a href="#"> <strong>2 days</strong>Bug report
                                        <small>
                                            From: Jane
                                        </small></a>
                                </li>
                            </ul>
                            <a class="inbox" href="#">Go to inbox &raquo;</a>
                        </div>
                    </div> <!-- End of small toolbar button -->--}}

                    <!-- A large toolbar button -->
                    <div class="toolbar_large">
                        <div class="toolbutton">
                            <div class="toolicon">
                                <img src="/img/icons/16x16/user.png" width="16" height="16" alt="user" >
                            </div>
                            <div class="toolmenu">
                                <div class="toolcaption" >
                                    <span>@if(\Auth::check()){{\Auth::user()->name}}@endif</span>
                                </div>
                                <!-- Start of menu -->
                                <div class="dropdown">
                                    <ul>
                                        <li>
                                            <a href="/mukesh/erp2-test/admin/home">Settings</a>
                                        </li>
                                        <li>
                                            <a href="/mukesh/erp2-test/logout">Logout</a>
                                        </li>
                                    </ul>
                                </div> <!-- End of menu -->
                            </div>
                        </div>
                    </div> <!-- End of large toolbar button -->
                </div>
                <!-- End of right part -->
            </div>
        </div>
        <!-- End of the header toolbar -->

        <!-- Start of the main header bar -->
        <nav id="header_main">
            <div class="container_12">
                <!-- Start of the main navigation -->
                <ul id="nav_main">
                    {{--<li>
                        <a href="#">
                            <img src="/img/icons/25x25/dark/computer-imac.png" width=25 height=25 alt="">
                            Dashboard</a>
                        <ul>
                            <li>
                                <a href="/">Dashboard</a>
                            </li>

                            <li>
                                <a href="/admin/home">Permission Manager</a>
                            </li>
                        </ul>
                    </li>--}}
                    <li {{ areActiveRoutes(['customers.*'],'class=current') }}>
                        <a href="#">
                            <img src="/img/icons/25x25/dark/group.png" width=25 height=25 alt="">
                            Customers</a>
                        <ul>
                            <li>
                                <a href="/customers/new">New</a>
                            </li>
                            <li>
                                <a href="/customers/manage">Manage</a>
                            </li>

                        </ul>
                    </li>
                    <li {{ areActiveRoutes(['sms.*'],'class=current') }}>
                        <a href="#">
                            <img src="/img/icons/25x25/dark/speech-bubbles-2.png" width=25 height=25 alt="">
                            SMS</a>
                        <ul>
                            <li>
                                <a href="/sms/new">New</a>
                            </li>
                        </ul>
                    </li>
                    <li {{ areActiveRoutes(['grow.*'],'class=current') }}>
                        <a href="#">
                            Grow</a>
                        <ul>
                            <li>
                                <a href="grow/index">New</a>
                            </li>
                        </ul>
                    </li>
                    <li {{ areActiveRoutes(['cashdesk.*'],'class=current') }}>
                        <a href="/mukesh/erp2-test/cashdesk/affIndex">
                            Point of sale</a>
                        <!-- <ul>
                            <li>
                                <a href="cashdesk/index">New</a>
                            </li>
                        </ul> -->
                    </li>
                </ul>
                <!-- End of the main navigation -->
            </div>
        </nav>
        <div id="nav_sub"></div>
    </header>

    <!-- Start of the content -->
    <div role="main" class="container_12" id="content-wrapper">

        <!-- Start of the main content -->
        <div id="main_content">
            @if(session()->has('message.level'))
                <div class="alert {!! session('message.level') !!}">
                    <span class="icon"></span>
                    {!! session('message.content') !!}
                </div>
            @endif

        @yield('content')

        </div> <!-- End of #main_content -->
        <div class="clean"></div>

    </div> <!-- End of #content-wrapper -->
    <div class="clear"></div>

</div> <!-- End of #height-wrapper -->

<!-- Start of footer-->
<footer>
    <div class="container_12">
        Copyright &copy; 2018 Hotbox, all rights reserved.
        <div id="button_bar">
            <ul>
                <li>
                    <span><a href="dashboard.html">Dashboard</a></span>
                </li>
                <li>
                    <span><a href="#">Settings</a></span>
                </li>
            </ul>
        </div>
    </div>
</footer> <!-- End of footer-->

<!-- JavaScript at the bottom for fast page loading -->
<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/mukesh/erp2-test/public/master-js/libs/jquery-1.7.1.js"><\/script>')</script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script>window.jQuery.ui || document.write('<script src="/mukesh/erp2-test/public/master-js/libs/jquery-ui-1.8.16.min.js"><\/script>')</script>

<!-- scripts concatenated and minified via build script -->
<script defer src="/mukesh/erp2-test/public/master-js/plugins.js"></script> <!-- REQUIRED: Different own jQuery plugnis -->
<script defer src="/mukesh/erp2-test/public/master-js/mylibs/jquery.ba-resize.js"></script> <!-- RECOMMENDED when using sidebar: page resizing -->
<script defer src="/mukesh/erp2-test/public/master-js/mylibs/jquery.easing.1.3.js"></script> <!-- RECOMMENDED: box animations -->
<script defer src="/mukesh/erp2-test/public/master-js/mylibs/jquery.validate.js"></script>
<script defer src="/mukesh/erp2-test/public/master-js/mylibs/jquery.checkbox.js"></script>
<script defer src="/mukesh/erp2-test/public/master-js/mylibs/jquery.chosen.js"></script>
<script defer src="/mukesh/erp2-test/public/master-js/mylibs/jquery.fileinput.js"></script> <!-- Needed for <input type=file> -->
<script defer src="/mukesh/erp2-test/public/master-js/mylibs/jquery.placeholder.js"></script>
<script defer src="/mukesh/erp2-test/public/master-js/mylibs/jquery.miniColors.js"></script> <!-- Needed for <input type=color> -->
<script defer src="/mukesh/erp2-test/public/master-js/mylibs/jquery.text-overflow.js"></script> <!-- Needed for <input type=file> -->
<script defer src="/mukesh/erp2-test/public/master-js/mylibs/jquery.ui.timepicker.js"></script> <!-- Needed for <input type=date/datetime/time> -->
<script defer src="/mukesh/erp2-test/public/master-js/mylibs/jquery.ui.touch-punch.js"></script> <!-- RECOMMENDED: touch compatibility -->
<script defer src="/mukesh/erp2-test/public/master-js/plugins.js"></script> <!-- REQUIRED: Different own jQuery plugnis -->
<script defer src="/mukesh/erp2-test/public/master-js/mylibs/jquery.dataTables.js"></script>
<script defer src="/mukesh/erp2-test/public/master-js/script.js"></script> <!-- REQUIRED: Generic scripts -->
<!-- end scripts -->

<!--[if lt IE 7 ]>
<script defer
        src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
<script
        defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
<![endif]-->

@yield('footscript')

</body>
</html>
