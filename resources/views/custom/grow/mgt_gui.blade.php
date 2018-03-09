@extends('layouts.master-grow')

@section('content')

<div id="id-right">
    <div class="fiche">
        <div id='floatingCircle' class="floatingCircle"></div>
        <div class="fullscreen_control_set">
            <table class="plant_gui_top_left">
                <tr>Grow Areas : 
                    <select id="move_src" name="move_src">
                        <option value="1">Denver</option>
                        <option value="48">Jason Street</option>
                    </select>
                </tr>
            </table>

            <table class="plant_gui_top_right">
                <tr>
                    <td>
                        <img src="/mukesh/erp2-test/public/custom/grow/mgt-gui/img/file_upload/file2-1.png" id="grow_grid_img" class="grow_svg_return_btn img_cursor_show"/>
                            <div id="grow_grid_menu" class="grow_grid_menu">
                                <table>
                                    <tr>
                                        <td><img src="/mukesh/erp2-test/public/custom/grow/mgt-gui/img/file_upload/file1-1.png" value='1x1' onclick="setLayout( 1 , 1 );" /></td>
                                        <td><img src="/mukesh/erp2-test/public/custom/grow/mgt-gui/img/file_upload/file1-2.png" value='1x2' onclick="setLayout( 1 , 2 );" /></td>
                                        <td><img src="/mukesh/erp2-test/public/custom/grow/mgt-gui/img/file_upload/file1-3.png" value='1x3' onclick="setLayout( 1 , 3 );" /></td>
                                    </tr>
                                    <tr>
                                        <td><img src="/mukesh/erp2-test/public/custom/grow/mgt-gui/img/file_upload/file2-1.png" value='2x1' onclick="setLayout( 2 , 1 );" /></td>
                                        <td><img src="/mukesh/erp2-test/public/custom/grow/mgt-gui/img/file_upload/file2-2.png" value='2x2' onclick="setLayout( 2 , 2 );" /></td>
                                        <td><img src="/mukesh/erp2-test/public/custom/grow/mgt-gui/img/file_upload/file2-3.png" value='2x3' onclick="setLayout( 2 , 3 );" /></td>
                                    </tr>
                                    <tr>
                                        <td><img src="/mukesh/erp2-test/public/custom/grow/mgt-gui/img/file_upload/file3-1.png" value='3x1' onclick="setLayout( 3 , 1 );" /></td>
                                        <td><img src="/mukesh/erp2-test/public/custom/grow/mgt-gui/img/file_upload/file3-2.png" value='3x2' onclick="setLayout( 3 , 2 );" /></td>
                                        <td><img src="/mukesh/erp2-test/public/custom/grow/mgt-gui/img/file_upload/file3-3.png" value='3x3' onclick="setLayout( 3 , 3 );" /></td>
                                    </tr>
                                </table>
                            </div>
                    </td>
                    <td><a href="/mukesh/erp2-test/grow/index"><img src="/mukesh/erp2-test/public/custom/grow/mgt-gui/img/file_upload/close.png" id="return_grow_gui" class="grow_svg_return_btn img_cursor_show" /></a></td>
                    <!-- <td><input type="button" class="button grow_svg_return_btn" id="return_grow_gui" value="Back"></td> -->
                </tr>
            </table>
        </div>
    </div>
</div>    

<div classs="fichecenter full_screen" id='RenderDiv'>
</div>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/setting.js"></script>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/common/dragscroll.js"></script>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/common/jspdf.min.js"></script>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/engine/SvgCreatorLibrary.js"></script>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/engine/GrowEnum.js"></script>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/engine/GrowPlant.js"></script>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/engine/GrowRoom.js"></script>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/engine/GrowMatrix.js"></script>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/engine/GrowGUI.js"></script>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/engine/GrowGUIConstant.js"></script>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/engine/GrowGUIBox.js"></script>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/engine/GrowModal.js"></script>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/engine/GrowModalUpload.js"></script>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/engine/GrowGUI.proto.js"></script>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/engine/GrowToolbar.js"></script>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/engine/GrowToolbar.Proto.js"></script>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/engine/GrowToolbarUpload.Proto.js"></script>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/engine/GrowBuild.js"></script>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/engine/GrowBuild.Proto.js"></script>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/engine/GrowPalette.js"></script>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/engine/ShareFloatPlant.js"></script>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/engine/ShareAction.js"></script>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/engine/LayoutControl.js"></script>
<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/engine/LayoutControlAction.Proto.js"></script>

<script type="text/javascript" src="/mukesh/erp2-test/public/custom/grow/settings/mgt-gui/js/GuiFilter.js"></script>
@endsection

