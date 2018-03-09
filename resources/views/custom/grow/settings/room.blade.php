@extends('layouts.master-grow')

@section('content')
<div id="id-right">
    <!-- Begin div class="fiche" -->
    <div class="fiche">
        <table summary="" class="centpercent notopnoleftnoright" style="margin-bottom: 2px;">
            <tbody>
                <tr>
                    <td class="nobordernopadding widthpictotitle" valign="middle">
                        <img src="/mukesh/erp2-test/public/custom/grow/img/grow.png" alt="" title="" class="valignmiddle" id="pictotitle">
                    </td>
                    <td class="nobordernopadding" valign="middle">
                        <div class="titre">GrowArea</div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="fichecenter">
            <div class="fichethirdleft grow_room_setting_table">

            <table style="width:400px;">
                <tr>
                    <td style="width: 90px;">Grow Area :</td>
                    <td>
                        <select id="area_select" name="area_select">
                            <option value="53">Denver</option>
                            <option value="54">Jason Street</option>
                        </select>
                    </td>
                    <td>Rooms :</td>
                    <td>
                        <select id="left_room_select" name="left_room_select" style="width:100%">
                            <option value="2" rtype="2">roomA</option>
                            <option value="38" rtype="2">roomB</option>
                            <option value="5" rtype="5">Room-Final</option>
                            <option value="45" rtype="2">roomC</option>
                        </select>
                    </td>
                </tr>
            </table>

                <h3>General Setting</h3>
                <table>
                    <tr>
                        <td>Growing days:</td>
                        <td><input name="room_grow_day" id="room_grow_day" style="width:80%"></input></td>
                        <td>Expire Alarm Days:</td>
                        <td><input name="room_alarm_days" id="room_alarm_days" style="width:80%"></input></td>
                    </tr>
                    <tr>
                        <td>Rows:</td>
                        <td><input name="room_rows" id="room_rows" style="width:80%"></input></td>
                        <td>Columns:</td>
                        <td><input name="room_cols" id="room_cols" style="width:80%"></input></td>
                    </tr>
                </table>
                <h3>GUI Configuration</h3>
                <table>
                    <tr>
                        <td>OffsetX:</td>
                        <td><input name="room_offsetX" id="room_offsetX" style="width:80%"></input></td>
                        <td>OffsetY:</td>
                        <td><input name="room_offsetY" id="room_offsetY" style="width:80%"></input></td>
                    </tr>
                </table>
                <h3>Block Configuration</h3>
                <table>
                    <tr>
                        <td>Columns per block:</td>
                        <td><input name="room_cols_per" id="room_cols_per" style="width:80%"></input></td>
                        <td>H-gap between block:</td>
                        <td><input name="room_hgap" id="room_hgap" style="width:80%"></input></td>
                    </tr>
                    <tr>
                        <td>Rows per block:</td>
                        <td><input name="room_rows_per" id="room_rows_per" style="width:80%"></input></td>
                        <td>W-gap between block:</td>
                        <td><input name="room_wgap" id="room_wgap" style="width:80%"></input></td>
                    </tr>
                </table>
                <h3>Cell Configuration</h3>
                <table>
                    <tr>
                        <td>Cell height of plant:</td>
                        <td><input name="room_cell_height" id="room_cell_height" style="width:80%"></input></td>
                        <td>Cell width of plant:</td>
                        <td><input name="room_cell_width" id="room_cell_width" style="width:80%"></input></td>
                    </tr>
                </table>
                <div class="room_save_sucess">Room data saved</div>
                
            </div>
            <div class="fichetwothirdright">
                <div class="ficheaddleft">
                    <input type="button" class="button" id="save_setting" name="save_setting" value="Save" align="center">
                    <div id='preview_room_settings' class="dragscroll dragscroll_view room_preview_setting" >
                        <svg version="1.1"
                            baseProfile="full"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            xmlns:ev="http://www.w3.org/2001/xml-events" id='left_room' width=50000 height=50000 >
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End div class="fiche" -->
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

