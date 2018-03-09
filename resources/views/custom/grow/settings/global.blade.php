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

                <h3>GUI Configuration</h3>
                <table>
                    <tr>
                        <td>Clone Color</td>
                        <td><input type="color" id="clone_color"></td>
                        <td>Vegetation Color</td>
                        <td><input type="color" id="vegetation_color"></td>
                    </tr>
                    <tr>
                        <td>Flower Color</td>
                        <td><input type="color" id="flower_color"></td>
                        <td>Cutweigh Wet Color</td>
                        <td><input type="color" id="cutweigh_wet_color"></td>
                    </tr>
                    <tr>
                        <td>Harvest Drying Color</td>
                        <td><input type="color" id="harvest_drying_color"></td>
                        <td>Harvest Curing Color</td>
                        <td><input type="color" id="harvest_curing_color"></td>
                    </tr>
                </table>
                
                <div class="room_save_sucess">Global color data saved</div>
                
            </div>
            <div class="fichetwothirdright">
                <div class="ficheaddleft">
                    <input type="button" class="button" id="save_setting_global" name="save_setting_global" value="Save" align="center">
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

