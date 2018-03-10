@extends('layouts.master-grow')

@section('content')
<div id="id-right">
    <!-- Begin div class="fiche" -->
    <div class="fiche">
        <div id="add_modal" class="demo">
            <h3 class="move_modal_title">Add Plant</h3>
            <div class="plant_mgt_dialog"></div>
            <div class="move_modal_detail_stock_set">
                <table class="stock_dialog_table_set">
                    <tbody>
                        <tr>
                            <td>Date</td>
                            <td><input id="fiscalyear" name="fiscalyear" class="maxwidth75" maxlength="11" value="03/08/2018" onchange="dpChangeDay('fiscalyear','MM/dd/yyyy'); " type="text"><button id="fiscalyearButton" type="button" class="dpInvisibleButtons" onclick="showDP('/core/','fiscalyear','MM/dd/yyyy','en_US');"><img src="{{ asset('theme/eldy/img/object_calendarday.png') }}" alt="" title="Select a date" class="datecallink"></button><input id="fiscalyearday" name="fiscalyearday" value="08" type="hidden">
                            <input id="fiscalyearmonth" name="fiscalyearmonth" value="03" type="hidden">
                            <input id="fiscalyearyear" name="fiscalyearyear" value="2018" type="hidden">
                            </td>
                        </tr>
                        <tr>
                            <td>Grow Area</td>
                            <td id="modal_add_src"></td>
                        </tr>
                        <tr>
                            <td>Product</td>
                            <td>
                                <input name="sel_product_id" id="sel_product_id" value="" type="hidden"><input class="minwidth200 ui-autocomplete-input" name="search_sel_product_id" id="search_sel_product_id" value="" autocomplete="off" type="text">                           <!-- <input type="button" class="button" id="addproduct" name="addproduct" value="New Product" > -->
                            </td>
                        </tr>
                        <tr>
                            <td>Metric ID</td>
                            <td><input name="rfid" id="rfid" style="width:100%"></td>
                        </tr>
                        <tr>
                            <td>Parent ID</td>
                            <td>
                                <input name="p_rfid" id="p_rfid" style="width:100%">
                            </td>
                        </tr>
                        <tr>
                            <td><input name="row_val" id="row_val" placeholder="Row" style="width:50%"></td>
                            <td><input name="col_val" id="col_val" placeholder="Column" style="width:50%"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal_btn_margin_value">
                <input class="button bulk_add_grow" id="bulk_add_grow" value="O K" type="button">
                <input class="button" id="bulk_add_cancel" value="Cancel" type="button">
            </div>
        </div>
    
        <div id="move_modal" class="demo">
            <h3 class="move_modal_title">Bulk Move</h3>
            <div class="move_modal_detail">
                <table class="move_modal_detail_table">
                    <tbody>
                        <tr>
                            <td>Date </td>
                            <td><input id="fiscalyear" name="fiscalyear" class="maxwidth75" maxlength="11" value="03/08/2018" onchange="dpChangeDay('fiscalyear','MM/dd/yyyy'); " type="text"><button id="fiscalyearButton" type="button" class="dpInvisibleButtons" onclick="showDP('/core/','fiscalyear','MM/dd/yyyy','en_US');"><img src="{{ asset('theme/eldy/img/object_calendarday.png') }}" alt="" title="Select a date" class="datecallink"></button><input id="fiscalyearday" name="fiscalyearday" value="08" type="hidden">
                            <input id="fiscalyearmonth" name="fiscalyearmonth" value="03" type="hidden">
                            <input id="fiscalyearyear" name="fiscalyearyear" value="2018" type="hidden">
                            </td>
                        </tr>
                        <tr>
                            <td>Grow Area</td>
                            <td id="modal_move_src"></td>
                        </tr>
                        <tr>
                            <td>Source</td>
                            <td id="modal_home_src"></td>
                        </tr>
                        <tr>
                            <td>Destination</td>
                            <td><select id="home_dst_val" name="home_dst_val" style="width:100%" onchange="setdst_romeid(this)"><option value="all" rtype="">All</option><option value="2" rtype="2">roomA</option><option value="38" rtype="2">roomB</option><option value="45" rtype="2">roomC</option><option value="47" rtype="2">roomD</option><option value="3" rtype="3">room-Drying</option><option value="46" rtype="3">room-X</option><option value="4" rtype="4">Room-Flower</option><option value="5" rtype="5">Room-Final</option></select></td>
                        </tr>
                        <tr>
                            <td>Count</td>
                            <td id="modal_checklist_count"></td>
                        </tr>
                    </tbody>
                </table>
            </div>    
        
            <div class="modal_btn_margin_value">
                <input class="button bulk_move_grow" id="bulk_move_grow" value="O K" type="button">
                <input class="button" id="bulk_move_cancel" value="Cancel" type="button">
            </div>
        </div>
        <div id="release_modal" class="demo">
            <h3 class="move_modal_title">Bulk Release</h3>
            <div class="move_modal_detail">
                <table class="move_modal_detail_table">
                    <tbody>
                        <tr>
                            <td>Date </td>
                            <td><input id="fiscalyear" name="fiscalyear" class="maxwidth75" maxlength="11" value="03/08/2018" onchange="dpChangeDay('fiscalyear','MM/dd/yyyy'); " type="text"><button id="fiscalyearButton" type="button" class="dpInvisibleButtons" onclick="showDP('/core/','fiscalyear','MM/dd/yyyy','en_US');"><img src="{{ asset('theme/eldy/img/object_calendarday.png') }}" alt="" title="Select a date" class="datecallink"></button><input id="fiscalyearday" name="fiscalyearday" value="08" type="hidden">
                            <input id="fiscalyearmonth" name="fiscalyearmonth" value="03" type="hidden">
                            <input id="fiscalyearyear" name="fiscalyearyear" value="2018" type="hidden">
                            </td>
                        </tr>
                        <tr>
                            <td>Grow Area</td>
                            <td id="modal_release_src"></td>
                        </tr>
                        <tr>
                            <td>Destination</td>
                            <td>
                                
                                <select class="flat minwidth200" id="idwarehouse" name="idwarehouse" data-role="none" tabindex="-1" title="">
                                    <option value="1">B-Store-Denver</option>
                                    <option value="2">B*GOOD Elevations (COS 402-01066)</option>
                                    <option value="3">B*GOOD Elevations Grow (COS 403-01660)</option>
                                    <option value="4">B*GOOD North Med (402-00832)</option><option value="5">B*GOOD North Rec (402R-00132)</option>
                                </select>                        
                            </td>
                        </tr>
                        <tr>
                            <td>Count</td>
                            <td id="modal_checklist_count_rel"></td>
                        </tr>
                        <tr>
                            <td><input name="fl_weight" id="fl_weight" placeholder="Flower weight" style="width:80%"></td>
                            <td><input name="wa_weight" id="wa_weight" placeholder="Waste weight" style="width:80%"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal_btn_margin_value">
                <input class="button bulk_move_grow" id="bulk_release_grow" value="O K" type="button">
                <input class="button" id="bulk_release_cancel" value="Cancel" type="button">
            </div>
        </div>

        <div id="addfile_modal" class="fileupload_add_modal">
            <div>
                <h3 class="move_modal_title plant_gui_top_left" style="font-size: 20px;">Add Plant</h3>
                <select id="fileupload_room_select" name="fileupload_room_select" style="margin-top:25px; float: right;margin-right: 10px;"><option value="all" rtype="">All</option><option value="2" rtype="2">roomA</option><option value="38" rtype="2">roomB</option><option value="45" rtype="2">roomC</option><option value="47" rtype="2">roomD</option><option value="3" rtype="3">room-Drying</option><option value="46" rtype="3">room-X</option><option value="4" rtype="4">Room-Flower</option><option value="5" rtype="5">Room-Final</option></select>
            </div>   
            <div class="fileupload_modal_detail_newpart fileupload_modal_detail_font">
                    <div class="addfile_modal_detail_header row">
                        <p class="fileupload_modal_number_area">No</p>
                        <p class="fileupload_modal_rfid_area" style="text-align:center;">Metric ID</p>
                        <p class="fileupload_modal_rowcol_area">Row/Col</p>
                        <p class="fileupload_modal_state_area" style="text-align: left;padding-left: 20px;">State</p>
                        <p class="fileupload_modal_plant_area">Strain</p>
                        <p class="fileupload_modal_parent_area">Parent Metric ID</p>
                    </div>
                    <div class="addfile_modal_detail_data" id="addfile_modal_detail_data"></div>
            </div>
            <div class="modal_btn_margin_value">
                <div id="modal_dialog_alert_add_data"></div>
                <input class="button bulk_move_grow btn_common_width" id="fileupload_add_success" value="OK" type="button">
                <input class="button btn_common_width" id="fileupload_add_cancel" value="Cancel" type="button">
            </div>
        </div>

        <div id="movefile_modal" class="fileupload_add_modal">
            <div>
                <h3 class="move_modal_title plant_gui_top_left" style="font-size: 20px;margin-right: -300px;">Move Plant</h3>
                <div class="plant_gui_top_left" style="float:right;">
                    SRC Room  <select id="move_select_src" name="move_select_src" style="margin-top:30px;margin-right: 10px;"><option value="all" rtype="">All</option><option value="2" rtype="2">roomA</option><option value="38" rtype="2">roomB</option><option value="45" rtype="2">roomC</option><option value="47" rtype="2">roomD</option><option value="3" rtype="3">room-Drying</option><option value="46" rtype="3">room-X</option><option value="4" rtype="4">Room-Flower</option><option value="5" rtype="5">Room-Final</option></select>
                    DST Room  <select id="move_select_dst" name="move_select_dst" style="margin-top:30px;margin-right: 10px;"></select>
                </div>
            </div>
            <div class="fileupload_modal_detail_newpart fileupload_modal_detail_font">
                    <div class="addfile_modal_detail_header row">
                        <p class="fileupload_modal_number_area">No</p>
                        <p class="fileupload_modal_rfid_area" style="text-align: center;">Metric ID</p>
                        <p class="fileupload_modal_plant_area">Source Row/Col</p>
                        <p class="fileupload_modal_rowcol_area">Destination Row/Col</p>
                        <p class="fileupload_modal_state_area" style="text-align: left;padding-left: 20px;">State</p>
                        
                    </div>
                    <div class="addfile_modal_detail_data" id="movefile_modal_detail_data"></div>
            </div>
            <div class="modal_btn_margin_value">
                <div id="modal_dialog_alert_move_data"></div>
                <input class="button bulk_move_grow btn_common_width" id="fileupload_move_success" value="OK" type="button">
                <input class="button btn_common_width" id="fileupload_move_cancel" value="Cancel" type="button">
            </div>
        </div>

        <div id="releasefile_modal" class="fileupload_add_modal">
            <div>
                <h3 class="move_modal_title plant_gui_top_left" style="font-size: 20px;padding-left: 200px;">Release Plant</h3>
                <div class="fileupload_release_warehouse">
                    <select class="flat minwidth200" id="release_stock_plant" name="release_stock_plant" data-role="none" tabindex="-1" title="" style="display: none;">
                        <option value="-1">&nbsp;</option>
                        <option value="1">B-Store-Denver</option>
                        <option value="2">B*GOOD Elevations (COS 402-01066)</option>
                        <option value="3">B*GOOD Elevations Grow (COS 403-01660)</option>
                        <option value="4">B*GOOD North Med (402-00832)</option>
                        <option value="5">B*GOOD North Rec (402R-00132)</option>
                    </select>
                </div>
            </div>
            <div class="fileupload_modal_detail_newpart fileupload_modal_detail_font">
                <div class="addfile_modal_detail_header row">
                    <p class="fileupload_modal_number_area">No</p>
                    <p class="fileupload_modal_rfid_area" style="text-align: center;">Metric ID</p>
                    <p class="fileupload_modal_rowcol_area">Room</p>
                    <p class="fileupload_modal_plant_area">Source Row/Col</p>
                    <p class="fileupload_modal_state_area" style="text-align: left;padding-left: 20px;">State</p>
                    
                </div>
                <div class="addfile_modal_detail_data" id="releasefile_modal_detail_data"></div>
            </div>
            <div class="modal_btn_margin_value">
                <div id="modal_dialog_alert_release_data"></div>
                <input class="button bulk_move_grow btn_common_width" id="fileupload_release_success" value="OK" type="button">
                <input class="button btn_common_width" id="fileupload_release_cancel" value="Cancel" type="button">
            </div>
        </div>

        <div id="removefile_modal" class="fileupload_add_modal">
            <div>
                <h3 class="move_modal_title plant_gui_top_left" style="font-size: 20px;">Remove Plant</h3>
            </div>
            <div class="fileupload_modal_detail_newpart fileupload_modal_detail_font">
                <div class="addfile_modal_detail_header row">
                    <p class="fileupload_modal_number_area">No</p>
                    <p class="fileupload_modal_rfid_area" style="text-align: center;">Metric ID</p>
                    <p class="fileupload_modal_rowcol_area">Room</p>
                    <p class="fileupload_modal_plant_area">Source Row/Col</p>
                    <p class="fileupload_modal_state_area" style="text-align: left;padding-left: 20px;">State</p>
                    
                </div>
                <div class="addfile_modal_detail_data" id="removefile_modal_detail_data"></div>
            </div>
            <div class="modal_btn_margin_value">
                <div id="modal_dialog_alert_remove_data"></div>
                <input class="button bulk_move_grow btn_common_width" id="fileupload_remove_success" value="OK" type="button">
                <input class="button btn_common_width" id="fileupload_remove_cancel" value="Cancel" type="button">
            </div>
        </div>

        <div id="statefile_modal" class="fileupload_add_modal">
            <div>
                <h3 class="move_modal_title plant_gui_top_left" style="font-size: 20px;">State Change</h3>
            </div>
            <div class="fileupload_modal_detail_newpart fileupload_modal_detail_font">
                    <div class="addfile_modal_detail_header row">
                        <p class="fileupload_modal_number_area">No</p>
                        <p class="fileupload_modal_rfid_area" style="text-align: center;">Metric ID</p>
                        <p class="fileupload_modal_room_area">Room</p>
                        <p class="fileupload_modal_rowcol_value">Row/Col</p>
                        <p class="fileupload_modal_now_state" style="text-align: left;">Now State</p>
                        <p class="fileupload_modal_next_state" style="text-align: left;">Next State</p>
                        
                    </div>
                    <div class="addfile_modal_detail_data" id="statefile_modal_detail_data"></div>
            </div>
            <div class="modal_btn_margin_value">
                <div id="modal_dialog_alert_state_data"></div>
                <input class="button bulk_move_grow btn_common_width" id="fileupload_state_success" value="OK" type="button">
                <input class="button btn_common_width" id="fileupload_state_cancel" value="Cancel" type="button">
            </div>
        </div>
        <form method="post" id="form" name="form" enctype="multipart/form-data">   
            <div class="div-table-responsive">
                <table width="100%">
                    <tbody>
                        <tr class="margin-table">
                            <td>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td style="width: 90px;">Grow Area :</td>
                                            <td>
                                                <select id="area_select" name="area_select">
                                                    <option value="53"></option>
                                                    <option value="1">Denver</option>
                                                    <option value="48">Jason Street</option></select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Rooms :</td>
                                            <td>
                                                <select id="home_src" name="home_src" style="width:100%">
                                                    <option value="all" rtype="">All</option><option value="2" rtype="2">roomA</option><option value="38" rtype="2">roomB</option><option value="45" rtype="2">roomC</option><option value="47" rtype="2">roomD</option><option value="3" rtype="3">room-Drying</option>
                                                    <option value="46" rtype="3">room-X</option><option value="4" rtype="4">Room-Flower</option><option value="5" rtype="5">Room-Final</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Time in Rooms :</td>
                                            <td><input style="width:50%" name="room_time" id="room_time" value=""> day</td>
                                        </tr>
                                        <tr>
                                            <td>Metric ID :</td>
                                            <td><input style="width:90%" name="RFID" id="RFID" value=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <input class="button" id="searchvalue" value="Search" type="button"></td>
                            <td>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input class="button searchfilter_btn" id="addnew_grow" value="Add" type="button">
                                                 <input class="button searchfilter_btn searchfilter_move_btn" id="move_grow" value="Move" type="button">
                                                <input class="button searchfilter_btn searchfilter_release_btn" id="release_grow" value="Release" type="button">
                                                <input class="button searchfilter_btn" id="remove_grow" value="Remove" type="button">
                                            </td>
                                            <td>
                                                <label for="file" class="custom-file-upload button" id="fileupload_event">
                                                    <i class="fa fa-cloud-upload"></i> File Upload
                                                </label>
                                                <div id="fileupload_menu" class="fileupload_menu" style="display: none;">
                                                    <li>
                                                        <label for="stock_file_add" class="img_cursor_show add_file_label">
                                                            Add file
                                                        </label>
                                                        <input name="file" id="stock_file_add" type="file">
                                                    </li>
                                                    <li>
                                                        <label for="stock_file_move" class="img_cursor_show move_file_label">
                                                            Move file
                                                        </label>
                                                        <input name="file" id="stock_file_move" type="file">
                                                    </li>
                                                    <li>
                                                        <label for="stock_file_release" class="img_cursor_show">
                                                            Release file
                                                        </label>
                                                        <input name="file" id="stock_file_release" type="file">
                                                    </li>
                                                    <li>
                                                        <label for="stock_file_remove" class="img_cursor_show">
                                                            Remove file
                                                        </label>
                                                        <input name="file" id="stock_file_remove" type="file">
                                                    </li>
                                                    <li class="fileupload_menu_margin_bottom">
                                                        <label for="stock_file_state" class="img_cursor_show">
                                                            State change
                                                        </label>
                                                        <input name="file" id="stock_file_state" type="file">
                                                    </li>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="tagtable liste">
                    <tbody>
                        <tr style="text-align:center;" class="liste_titre">
                            <th class="liste_titre">No</th>
                            <th class="liste_titre" align="center">
                                <input id="checkallactions" name="checkallactions" class="checkallactions" type="checkbox"></th>
                            <th class="liste_titre">Strain</th>
                            <th class="liste_titre">Birthdate</th>
                            <th class="liste_titre">Time in Room</th>
                            <th class="liste_titre">Room(R , C)</th>
                            <th class="liste_titre">Metric ID</th>
                            <th class="liste_titre">States</th>
                        </tr>
                    </tbody>
                    <tbody id="search_table_body">
                        <tr style="cursor:pointer">
                            <td>1</td>
                            <td align="center">
                                <input class="flat checkboxfordelete" name="check_list[]" value="1298379812734" type="checkbox"></td>
                            <td onclick="setselect('394','Extracts - Shatter', this)" align="center">Extracts - Shatter</td>
                            <td onclick="setselect('394','Extracts - Shatter', this)" align="center">2018-01-04</td>
                            <td onclick="setselect('394','Extracts - Shatter', this)" align="center">63 days</td>
                            <td onclick="setselect('394','Extracts - Shatter', this)" align="center">room-Drying (1 , 4)</td>
                            <td align="center">1298379812734</td>
                            <td onclick="change_state('1298379812734', this)" align="center">harvest-drying</td>
                        </tr>
                        <tr style="cursor:pointer">
                            <td>1</td>
                            <td align="center">
                                <input class="flat checkboxfordelete" name="check_list[]" value="1298379812734" type="checkbox"></td>
                            <td onclick="setselect('394','Extracts - Shatter', this)" align="center">Extracts - Shatter</td>
                            <td onclick="setselect('394','Extracts - Shatter', this)" align="center">2018-01-04</td>
                            <td onclick="setselect('394','Extracts - Shatter', this)" align="center">63 days</td>
                            <td onclick="setselect('394','Extracts - Shatter', this)" align="center">room-Drying (1 , 4)</td>
                            <td align="center">1298379812734</td>
                            <td onclick="change_state('1298379812734', this)" align="center">harvest-drying</td>
                        </tr>
                        <tr style="cursor:pointer">
                            <td>1</td>
                            <td align="center">
                                <input class="flat checkboxfordelete" name="check_list[]" value="1298379812734" type="checkbox"></td>
                            <td onclick="setselect('394','Extracts - Shatter', this)" align="center">Extracts - Shatter</td>
                            <td onclick="setselect('394','Extracts - Shatter', this)" align="center">2018-01-04</td>
                            <td onclick="setselect('394','Extracts - Shatter', this)" align="center">63 days</td>
                            <td onclick="setselect('394','Extracts - Shatter', this)" align="center">room-Drying (1 , 4)</td>
                            <td align="center">1298379812734</td>
                            <td onclick="change_state('1298379812734', this)" align="center">harvest-drying</td>
                        </tr>
                        <tr style="cursor:pointer">
                            <td>1</td>
                            <td align="center">
                                <input class="flat checkboxfordelete" name="check_list[]" value="1298379812734" type="checkbox"></td>
                            <td onclick="setselect('394','Extracts - Shatter', this)" align="center">Extracts - Shatter</td>
                            <td onclick="setselect('394','Extracts - Shatter', this)" align="center">2018-01-04</td>
                            <td onclick="setselect('394','Extracts - Shatter', this)" align="center">63 days</td>
                            <td onclick="setselect('394','Extracts - Shatter', this)" align="center">room-Drying (1 , 4)</td>
                            <td align="center">1298379812734</td>
                            <td onclick="change_state('1298379812734', this)" align="center">harvest-drying</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
        <div id="file_upload_result_missing"></div>
        <!-- <script src="/custom/grow/js/jquery-1.11.0.min.js"></script> -->
        <script src="{{ asset('custom/grow/js/jquery.plainmodal.min.js') }}"></script>
        <script src="{{ asset('custom/grow/js/jquery.form.js') }}"></script>
        <script src="{{ asset('custom/grow/js/event.js') }}"></script>
        <script src="{{ asset('custom/grow/js/process.js') }}"></script>
        <script src="{{ asset('custom/grow/js/action.js') }}"></script>
        <script src="{{ asset('custom/grow/js/FileUpload.js') }}"></script>
    </div> <!-- End div class="fiche" -->
</div>

@endsection

