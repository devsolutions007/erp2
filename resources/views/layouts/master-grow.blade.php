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
    <link rel="shortcut icon" type="image/x-icon" href=""/>
    <title>Hotbox</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Mobile viewport optimized: j.mp/bplateviewport -->
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- Includes CSS for JQuery (Ajax library) -->
    <link rel="stylesheet" type="text/css" href="{{ asset('includes/jquery/css/smoothness/jquery-ui.css?version=6.0.0') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('includes/jquery/plugins/tiptip/tipTip.css?version=6.0.0') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('includes/jquery/plugins/jnotify/jquery.jnotify-alt.min.css?version=6.0.0') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('includes/jquery/plugins/select2/select2.css?version=6.0.0') }}">
    <!-- End -->
    <!-- Includes CSS for font awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css?version=6.0.0') }}">
    <!-- Includes CSS for Dolibarr theme -->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/style.css') }}">
    <!--  end -->
    <!--  grow page custom css -->
    <link rel="stylesheet" href="{{ asset('custom/grow/css/custom.css') }}"> 
    <!--  end -->
    <!-- Includes CSS added by module grow -->
    <link rel="stylesheet" href="{{ asset('custom/grow/css/grow.css') }}">
    <!-- end -->
    <!-- Includes JS for JQuery -->
    <script type="text/javascript" src="{{ asset('includes/jquery/js/jquery.min.js?version=6.0.0') }}"></script>
    <script type="text/javascript" src="{{ asset('includes/jquery/js/jquery-ui.min.js?version=6.0.0') }}"></script>
    <script type="text/javascript" src="{{ asset('includes/jquery/plugins/tablednd/jquery.tablednd.0.6.min.js?version=6.0.0') }}"></script>
    <script type="text/javascript" src="{{ asset('includes/jquery/plugins/tiptip/jquery.tipTip.min.js?version=6.0.0') }}"></script>
    <script type="text/javascript" src="{{ asset('includes/jquery/plugins/jnotify/jquery.jnotify.min.js?version=6.0.0') }}"></script>
    <script type="text/javascript" src="core/js/jnotify.js?version=6.0.0') }}"></script>
    <script type="text/javascript" src="{{ asset('includes/jquery/plugins/flot/jquery.flot.min.js?version=6.0.0') }}"></script>
    <script type="text/javascript" src="{{ asset('includes/jquery/plugins/flot/jquery.flot.pie.min.js?version=6.0.0') }}"></script>
    <script type="text/javascript" src="{{ asset('includes/jquery/plugins/flot/jquery.flot.stack.min.js?version=6.0.0') }}"></script>
    <script type="text/javascript" src="{{ asset('includes/jquery/plugins/select2/select2.min.js?version=6.0.0') }}"></script>
    
</head>

<body>

<!-- Begin of #height-wrapper -->
<div id="height-wrapper">

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
            @if(!isset($_GET['mainmenu']))
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
                                <a class="vmenu" href="/grow/index">Grow House</a>
                            </div>
                            <div class="menu_top"></div>
                            <!-- Process menu entry with mainmenu=grow, leftmenu=, level=1 enabled=1, position=1103 -->
                            <div class="menu_contenu menu_contenu_grow_basic_grow">
                                <a class="vsmenu" href="/grow/basic_grow">Grow Area</a><br>
                            </div>
                            <!-- Process menu entry with mainmenu=grow, leftmenu=, level=1 enabled=1, position=1104 -->
                            <div class="menu_contenu menu_contenu_grow_pages_plant-mgt_stock">
                                <a class="vsmenu" href="/grow/index">Plant Mgt</a><br>
                            </div>
                            <!-- Process menu entry with mainmenu=grow, leftmenu=, level=1 enabled=1, position=1105 -->
                            <div class="menu_contenu menu_contenu_grow_pages_plant-mgt-gui_index">
                                <a class="vsmenu" href="/grow/mgt_gui?idmenu=320&amp;mainmenu=grow&amp;leftmenu=">Plant Mgt(GUI)</a><br>
                            </div>
                            <div class="menu_end"></div>
                        </div>
                        <div class="blockvmenu blockvmenuimpair">
                            <!-- Process menu entry with mainmenu=grow, leftmenu=grow_basic_data, level=0 enabled=1, position=1106 -->
                            <div class="menu_titre">
                                <a class="vmenu" href="/grow/settings/room">Setting</a>
                            </div>
                            <div class="menu_top"></div>
                            <!-- Process menu entry with mainmenu=grow, leftmenu=, level=1 enabled=1, position=1107 -->
                            <div class="menu_contenu menu_contenu_grow_pages_plant-room-setting_index">
                                <a class="vsmenu" href="/grow/settings/room">Room</a><br>
                            </div>
                            <!-- Process menu entry with mainmenu=grow, leftmenu=, level=1 enabled=1, position=1108 -->
                            <div class="menu_contenu menu_contenu_grow_pages_plant-room-setting_global">
                                <a class="vsmenu" href="/grow/settings/global">Global</a><br>
                            </div>
                            <div class="menu_end"></div>
                            </div>
                            <div class="blockvmenu blockvmenupair">
                            <!-- Process menu entry with mainmenu=grow, leftmenu=grow_growing, level=0 enabled=1, position=1109 -->
                            <div class="menu_titre">
                                <a class="vmenu" href="/grow/growing/index?growmode=new&idmenu=325&mainmenu=grow&leftmenu=">Growing</a>
                            </div>
                            <div class="menu_top"></div>
                            <!-- Process menu entry with mainmenu=grow, leftmenu=, level=1 enabled=1, position=1110 -->
                            <div class="menu_contenu menu_contenu_grow_pages_plant-growing_index">
                                <a class="vsmenu" href="/grow/growing/index?growmode=new&idmenu=325&mainmenu=grow&leftmenu=">New Grow</a><br>
                            </div>
                            <!-- Process menu entry with mainmenu=grow, leftmenu=, level=1 enabled=1, position=1111 -->
                            <div class="menu_contenu menu_contenu_grow_pages_plant-growing_index">
                                <a class="vsmenu" href="/grow/growing/index?growmode=move&idmenu=326&mainmenu=grow&leftmenu=">Move Grow</a><br>
                            </div>
                            <!-- Process menu entry with mainmenu=grow, leftmenu=, level=1 enabled=1, position=1112 -->
                            <div class="menu_contenu menu_contenu_grow_pages_plant-growing_index">
                                <a class="vsmenu" href="/grow/growing/index?growmode=release&amp;idmenu=327&amp;mainmenu=grow&amp;leftmenu=">Release</a><br>
                            </div>
                            <div class="menu_end"></div>
                        </div>
                        <div class="blockvmenu blockvmenuimpair blockvmenulast">
                            <!-- Process menu entry with mainmenu=grow, leftmenu=grow_History, level=0 enabled=1, position=1113 -->
                            <div class="menu_titre">
                                <a class="vmenu" href="/grow/history/index?idmenu=328&amp;mainmenu=grow&amp;leftmenu=">History</a>
                            </div>
                            <div class="menu_top"></div>
                            <!-- Process menu entry with mainmenu=grow, leftmenu=, level=1 enabled=1, position=1114 -->
                            <div class="menu_contenu menu_contenu_grow_pages_plant-move-history_history">
                                <a class="vsmenu" href="/grow/history/index?idmenu=329&amp;mainmenu=grow&amp;leftmenu=">Move History</a><br>
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
            @endif
             @yield('content')

        </div> <!-- End of #main_content -->
        <div class="clean"></div>

    </div> <!-- End of #content-wrapper -->
    <div class="clear"></div>

</div> <!-- End of #height-wrapper -->

</body>
</html>
