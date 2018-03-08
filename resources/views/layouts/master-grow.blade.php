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
    <!-- <link rel="stylesheet" href="/mukesh/erp2-test/public/master-css/sprite.forms.css"> --> <!-- SPRITE: Forms styling -->
    <!-- Styling of JS plugins -->
    <link rel="stylesheet" href="/mukesh/erp2-test/public/master-css/external/jquery-ui-1.8.16.custom.css">	<!-- PLUGIN: jQuery UI styling -->
    <!-- Includes CSS for JQuery (Ajax library) -->
    <link rel="stylesheet" type="text/css" href="/mukesh/erp2-test/public/includes/jquery/css/smoothness/jquery-ui.css?version=6.0.0">
    <link rel="stylesheet" type="text/css" href="/mukesh/erp2-test/public/includes/jquery/plugins/tiptip/tipTip.css?version=6.0.0">
    <link rel="stylesheet" type="text/css" href="/mukesh/erp2-test/public/includes/jquery/plugins/jnotify/jquery.jnotify-alt.min.css?version=6.0.0">
    <!-- <link rel="stylesheet" type="text/css" href="/mukesh/erp2-test/public/includes/jquery/plugins/select2/select2.css?version=6.0.0"> -->
    <!-- End -->
    <!-- Includes CSS for font awesome -->
    <link rel="stylesheet" type="text/css" href="/mukesh/erp2-test/public/plugins/fontawesome/css/font-awesome.min.css?version=6.0.0">
    
    <!-- Includes CSS added by page -->
    <link rel="stylesheet" href="/mukesh/erp2-test/public/cashdesk/css/pos_style.css">
    <!-- <link rel="stylesheet" href="/mukesh/erp2-test/public/cashdesk/css/ticket.css"> -->
    <!--  template css -->
    <link rel="stylesheet" href="/mukesh/erp2-test/public/cashdesk/template/css/style.css">
    <!--  custom societe css -->
    <link rel="stylesheet" href="/mukesh/erp2-test/public/societe/css/custom.css">
    <!-- main custom style -->
    <!-- <link rel="stylesheet" href="/mukesh/erp2-test/public/cashdesk/css/style.css"> -->
    <link rel="stylesheet" href="/mukesh/erp2-test/public/cashdesk/css/w3_style.css">
    <link rel="stylesheet" href="/mukesh/erp2-test/public/custom/grow/css/custom.css">
     <!-- Includes CSS for Dolibarr theme -->
    <link rel="stylesheet" type="text/css" href="/mukesh/erp2-test/public/theme/style.css">
    <!--  grow page custom css -->
    
    <link rel="stylesheet" href="/mukesh/erp2-test/public/custom/grow/css/grow.css"> 
    <!--  end -->
    <!-- Includes JS for JQuery -->
    <script type="text/javascript" src="/mukesh/erp2-test/public/includes/jquery/js/jquery.min.js?version=6.0.0"></script>
    <script type="text/javascript" src="/mukesh/erp2-test/public/includes/jquery/js/jquery-ui.min.js?version=6.0.0"></script>
    <script type="text/javascript" src="/mukesh/erp2-test/public/includes/jquery/plugins/tablednd/jquery.tablednd.0.6.min.js?version=6.0.0"></script>
    <script type="text/javascript" src="/mukesh/erp2-test/public/includes/jquery/plugins/tiptip/jquery.tipTip.min.js?version=6.0.0"></script>
    <!-- <script type="text/javascript" src="/mukesh/erp2-test/public/includes/jquery/plugins/jnotify/jquery.jnotify.min.js?version=6.0.0"></script> -->
    <!-- <script type="text/javascript" src="/mukesh/erp2-test/public/core/js/jnotify.js?version=6.0.0"></script> -->
    <script type="text/javascript" src="/mukesh/erp2-test/public/includes/jquery/plugins/flot/jquery.flot.min.js?version=6.0.0"></script>
    <script type="text/javascript" src="/mukesh/erp2-test/public/includes/jquery/plugins/flot/jquery.flot.pie.min.js?version=6.0.0"></script>
    <script type="text/javascript" src="/mukesh/erp2-test/public/includes/jquery/plugins/flot/jquery.flot.stack.min.js?version=6.0.0"></script>
    <!-- <script type="text/javascript" src="/mukesh/erp2-test/public/includes/jquery/plugins/select2/select2.min.js?version=6.0.0"></script> -->

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
                        <a href="/mukesh/erp2-test/grow/index">
                            Grow</a>
                        <!-- <ul>
                            <li>
                                <a href="/mukesh/erp2-test/grow/index">New</a>
                            </li>
                        </ul> -->
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
    <div role="main" id="content-wrapper">

        <!-- Start of the main content -->
        <div id="main_content_module">
            @if(session()->has('message.level'))
                <div class="alert {!! session('message.level') !!}">
                    <span class="icon"></span>
                    {!! session('message.content') !!}
                </div>
            @endif
            <!-- Begin side-nav menu -->
            <div class="side-nav">
                <div id="id-left">

                    <!-- Begin left menu -->
                    <div class="vmenu">


                        <!-- Show logo on menu -->
                        <div class="blockvmenuimpair blockvmenulogo">
                            <div class="menu_titre" id="menu_titre_logo"></div>
                            <div class="menu_top" id="menu_top_logo"></div>
                            <div class="menu_contenu" id="menu_contenu_logo">
                                <div class="center">
                                    <img class="mycompany" title="Go into Home - Setup - Company to change logo or go into Home - Setup - Display to hide." alt="" src="/theme/dolibarr_inline_logo.png" style="max-width: 60%">
                                </div>
                            </div>
                            <div class="menu_end" id="menu_end_logo"></div>
                        </div>

                        <!-- Begin SearchForm -->
                        <div id="blockvmenusearch" class="blockvmenusearch">
                            <div class="select2-container searchselectcombo vmenusearchselectcombo" id="s2id_autogen3">
                                <a href="javascript:void(0)" class="select2-choice select2-default" tabindex="-1">   <span class="select2-chosen" id="select2-chosen-4">Search</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow" role="presentation"><b role="presentation"></b></span></a>
                                <label for="s2id_autogen4" class="select2-offscreen"></label>
                                <input class="select2-focusser select2-offscreen" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-4" id="s2id_autogen4" type="text">
                            </div>
                            <input class="searchselectcombo vmenusearchselectcombo" name="searchselectcombo" tabindex="-1" title="" style="display: none;" type="text">
                        </div>
                        <!-- End SearchForm -->
                        <div class="blockvmenu blockvmenupair blockvmenufirst">
                        <!-- Process menu entry with mainmenu=grow, leftmenu=grow_Stock, level=0 enabled=1, position=1102 -->
                            <div class="menu_titre">
                                <a class="vmenu" href="/custom/grow/pages/plant-mgt/stock.php?updatemode=search&amp;idmenu=317&amp;mainmenu=grow&amp;leftmenu=">Grow House</a>
                            </div>
                            <div class="menu_top"></div>
                            <!-- Process menu entry with mainmenu=grow, leftmenu=, level=1 enabled=1, position=1103 -->
                            <div class="menu_contenu menu_contenu_grow_basic_grow">
                                <a class="vsmenu" href="/custom/grow/basic_grow.php?idmenu=318&amp;mainmenu=grow&amp;leftmenu=">Grow Area</a><br>
                            </div>
                            <!-- Process menu entry with mainmenu=grow, leftmenu=, level=1 enabled=1, position=1104 -->
                            <div class="menu_contenu menu_contenu_grow_pages_plant-mgt_stock">
                                <a class="vsmenu" href="/custom/grow/pages/plant-mgt/stock.php?updatemode=search&amp;idmenu=319&amp;mainmenu=grow&amp;leftmenu=">Plant Mgt</a><br>
                            </div>
                            <!-- Process menu entry with mainmenu=grow, leftmenu=, level=1 enabled=1, position=1105 -->
                            <div class="menu_contenu menu_contenu_grow_pages_plant-mgt-gui_index">
                                <a class="vsmenu" href="/custom/grow/pages/plant-mgt-gui/index.php?idmenu=320&amp;mainmenu=grow&amp;leftmenu=">Plant Mgt(GUI)</a><br>
                            </div>
                            <div class="menu_end"></div>
                        </div>
                        <div class="blockvmenu blockvmenuimpair">
                            <!-- Process menu entry with mainmenu=grow, leftmenu=grow_basic_data, level=0 enabled=1, position=1106 -->
                            <div class="menu_titre">
                                <a class="vmenu" href="/custom/grow/pages/plant-room-setting/index.php?idmenu=321&amp;mainmenu=grow&amp;leftmenu=">Setting</a>
                            </div>
                            <div class="menu_top"></div>
                            <!-- Process menu entry with mainmenu=grow, leftmenu=, level=1 enabled=1, position=1107 -->
                            <div class="menu_contenu menu_contenu_grow_pages_plant-room-setting_index">
                                <a class="vsmenu" href="/custom/grow/pages/plant-room-setting/index.php?idmenu=322&amp;mainmenu=grow&amp;leftmenu=">Room</a><br>
                            </div>
                            <!-- Process menu entry with mainmenu=grow, leftmenu=, level=1 enabled=1, position=1108 -->
                            <div class="menu_contenu menu_contenu_grow_pages_plant-room-setting_global">
                                <a class="vsmenu" href="/custom/grow/pages/plant-room-setting/global.php?idmenu=323&amp;mainmenu=grow&amp;leftmenu=">Global</a><br>
                            </div>
                            <div class="menu_end"></div>
                            </div>
                            <div class="blockvmenu blockvmenupair">
                            <!-- Process menu entry with mainmenu=grow, leftmenu=grow_growing, level=0 enabled=1, position=1109 -->
                            <div class="menu_titre">
                                <a class="vmenu" href="/custom/grow/pages/plant-growing/index.php?growmode=new&amp;idmenu=324&amp;mainmenu=grow&amp;leftmenu=">Growing</a>
                            </div>
                            <div class="menu_top"></div>
                            <!-- Process menu entry with mainmenu=grow, leftmenu=, level=1 enabled=1, position=1110 -->
                            <div class="menu_contenu menu_contenu_grow_pages_plant-growing_index">
                                <a class="vsmenu" href="/custom/grow/pages/plant-growing/index.php?growmode=new&amp;idmenu=325&amp;mainmenu=grow&amp;leftmenu=">New Grow</a><br>
                            </div>
                            <!-- Process menu entry with mainmenu=grow, leftmenu=, level=1 enabled=1, position=1111 -->
                            <div class="menu_contenu menu_contenu_grow_pages_plant-growing_index">
                                <a class="vsmenu" href="/custom/grow/pages/plant-growing/index.php?growmode=move&amp;idmenu=326&amp;mainmenu=grow&amp;leftmenu=">Move Grow</a><br>
                            </div>
                            <!-- Process menu entry with mainmenu=grow, leftmenu=, level=1 enabled=1, position=1112 -->
                            <div class="menu_contenu menu_contenu_grow_pages_plant-growing_index">
                                <a class="vsmenu" href="/custom/grow/pages/plant-growing/index.php?growmode=release&amp;idmenu=327&amp;mainmenu=grow&amp;leftmenu=">Release</a><br>
                            </div>
                            <div class="menu_end"></div>
                        </div>
                        <div class="blockvmenu blockvmenuimpair blockvmenulast">
                            <!-- Process menu entry with mainmenu=grow, leftmenu=grow_History, level=0 enabled=1, position=1113 -->
                            <div class="menu_titre">
                                <a class="vmenu" href="/custom/grow/pages/plant-move-history/history.php?idmenu=328&amp;mainmenu=grow&amp;leftmenu=">History</a>
                            </div>
                            <div class="menu_top"></div>
                            <!-- Process menu entry with mainmenu=grow, leftmenu=, level=1 enabled=1, position=1114 -->
                            <div class="menu_contenu menu_contenu_grow_pages_plant-move-history_history">
                                <a class="vsmenu" href="/custom/grow/pages/plant-move-history/history.php?idmenu=329&amp;mainmenu=grow&amp;leftmenu=">Move History</a><br>
                            </div>
                            <div class="menu_end"></div>
                        </div>
                        <div class="blockvmenuend"></div>
                        <!-- Begin Help Block-->
                        <div id="blockvmenuhelp" class="blockvmenuhelp">
                            <div id="blockvmenuhelpapp" class="blockvmenuhelp"></div>
                        </div>    
                    </div>
                    <!-- End Help Block-->
                </div>    
            </div>
            <!-- End left menu -->
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
