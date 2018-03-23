<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" />
    <title>Hotbox</title>
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}" />
    <!--  grow page custom css -->
    <link rel="stylesheet" href="{{ asset('custom/grow/css/custom.css') }}"> 
    <!--  end -->
    <!-- Includes CSS added by module grow -->
    <link rel="stylesheet" href="{{ asset('custom/grow/css/grow.css') }}">
    
    <!--Theme JS -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('vendor/unifyMenu/unifyMenu.js') }}"></script>
    <script src="{{ asset('vendor/onoffcanvas/onoffcanvas.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/tether.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.2/umd/popper.min.js"></script>

    <!-- Grow JS -->
    <script src="{{ asset('custom/grow/js/jquery.plainmodal.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/common/dragscroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/common/jspdf.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/SvgCreatorLibrary.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowEnum.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowPlant.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowRoom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowMatrix.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowGUI.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowGUIConstant.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowGUIBox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowModal.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowModalUpload.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowGUI.proto.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowToolbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowToolbar.Proto.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowToolbarUpload.Proto.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowBuild.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowBuild.Proto.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowPalette.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/ShareFloatPlant.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/ShareAction.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/LayoutControl.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/LayoutControlAction.Proto.js') }}"></script>

    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/GuiFilter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/GuiFilter_display.js') }}"></script>
</head>
<body>
    <!-- Loading starts -->
        <div class="loading-wrapper">
            <div class="loading">
                <div class="img"></div>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- Loading ends -->
    <div id='floatingCircle' class="floatingCircle"></div>
    <div class="container-fluid">
        <div class="main-content">
            <div class="row grow-gui-nav">
                <div class="col-md-3">
                    <div class="form-group row gutters">
                        <label for="modal_move_src" class="col-sm-4 col-form-label">Grow Area</label>
                        <div class="col-sm-6">
                            <select id="area_select" name="area_select" class="form-control">
                                @foreach( $growAreas as $growArea )
                                <option value="{{ $growArea->id }}">{{ $growArea->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-5"></div>
                <div class="col-md-4">
                    <table class="plant_gui_top_right">
                        <tr>
                            <td>
                                <img src="{{ asset('custom/grow/mgt-gui/img/file_upload/file2-1.png') }}" id="grow_grid_img" class="grow_svg_return_btn img_cursor_show"/>
                                    <div id="grow_grid_menu" class="grow_grid_menu">
                                        <table>
                                            <tr>
                                                <td><img src="{{ asset('custom/grow/mgt-gui/img/file_upload/file1-1.png') }}" value='1x1' onclick="setLayout( 1 , 1 );" /></td>
                                                <td><img src="{{ asset('custom/grow/mgt-gui/img/file_upload/file1-2.png') }}" value='1x2' onclick="setLayout( 1 , 2 );" /></td>
                                                <td><img src="{{ asset('custom/grow/mgt-gui/img/file_upload/file1-3.png') }}" value='1x3' onclick="setLayout( 1 , 3 );" /></td>
                                            </tr>
                                            <tr>
                                                <td><img src="{{ asset('custom/grow/mgt-gui/img/file_upload/file2-1.png') }}" value='2x1' onclick="setLayout( 2 , 1 );" /></td>
                                                <td><img src="{{ asset('custom/grow/mgt-gui/img/file_upload/file2-2.png') }}" value='2x2' onclick="setLayout( 2 , 2 );" /></td>
                                                <td><img src="{{ asset('custom/grow/mgt-gui/img/file_upload/file2-3.png') }}" value='2x3' onclick="setLayout( 2 , 3 );" /></td>
                                            </tr>
                                            <tr>
                                                <td><img src="{{ asset('custom/grow/mgt-gui/img/file_upload/file3-1.png') }}" value='3x1' onclick="setLayout( 3 , 1 );" /></td>
                                                <td><img src="{{ asset('custom/grow/mgt-gui/img/file_upload/file3-2.png') }}" value='3x2' onclick="setLayout( 3 , 2 );" /></td>
                                                <td><img src="{{ asset('custom/grow/mgt-gui/img/file_upload/file3-3.png') }}" value='3x3' onclick="setLayout( 3 , 3 );" /></td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            <td><a href="/grow/index?growMenu=visible"><img src="{{ asset('custom/grow/mgt-gui/img/file_upload/close.png') }}" id="return_grow_gui" class="grow_svg_return_btn img_cursor_show" /></a></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div classs="fichecenter full_screen" id='RenderDiv'></div>
                </div>
            </div>
        </div>    
    </div>
    <!-- Common JS -->
    <script src="{{ asset('js/common.js') }}"></script>
</body>
</html>