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
            <div class="fichethirdleft">
                <form method="post" id="form" name="form">
                    <table width="100%">
                        <tbody>
                            @if(isset($_GET['growmode']) and $_GET['growmode']=='new')
                            <tr class="margin-table">
                                <td colspan="2">Grow Area : 
                                    <select id="move_src" name="move_src">
                                        <option value="2">Denver - roomA</option>
                                        <option value="38">Denver - roomB</option>
                                        <option value="45">Denver - roomC</option>
                                        <option value="47">Denver - roomD</option>
                                        <option value="49">Jason Street - room1</option>
                                        <option value="56"> - Clone</option>
                                    </select>
                                </td>
                            </tr>
                            @endif
                            @if(isset($_GET['growmode']) and $_GET['growmode']=='move')
                            <tr class="margin-table">
                                <td width="40%">
                                    <input id="move_src_value" name="move_src_value" value="" type="hidden">
                                    <input id="move_dst_value" name="move_dst_value" value="" type="hidden">Grow List : 
                                    <select id="move_src" name="move_src" onchange="setrome_id(this)">
                                        <option value="1">Denver</option>
                                        <option value="48">Jason Street</option>
                                    </select>
                                </td>
                                <td>src room : 
                                    <select id="grow_move_select_src" name="grow_move_select_src">
                                        <option value="2">roomA</option>
                                        <option value="3">room-Drying</option>
                                        <option value="4">Room-Flower</option>
                                        <option value="5">Room-Final</option>
                                        <option value="38">roomB</option>
                                        <option value="45">roomC</option>
                                        <option value="46">room-X</option>
                                        <option value="47">roomD</option>
                                    </select>&nbsp; &nbsp; &nbsp;
                                    dst room : 
                                    <select id="grow_move_select_dst" name="grow_move_select_dst">
                                        <option value="2">roomA</option>
                                        <option value="3">room-Drying</option>
                                        <option value="4">Room-Flower</option
                                            >
                                        <option value="5">Room-Final</option>
                                        <option value="38">roomB</option>
                                        <option value="45">roomC</option>
                                        <option value="46">room-X</option>
                                        <option value="47">roomD</option>
                                    </select>
                                </td>
                            </tr>
                            @endif
                            <tr class="margin-table">
                                <td colspan="2">Process Date : 
                                <input id="fiscalyear" name="fiscalyear" class="maxwidth75" maxlength="11" value="03/09/2018" onchange="dpChangeDay('fiscalyear','MM/dd/yyyy'); " type="text"><button id="fiscalyearButton" type="button" class="dpInvisibleButtons" onclick="showDP('/core/','fiscalyear','MM/dd/yyyy','en_US');">
                                <img src="/mukesh/erp2-test/public/theme/eldy/img/object_calendarday.png" alt="" title="Select a date" class="datecallink"></button><input id="fiscalyearday" name="fiscalyearday" value="09" type="hidden">
                                <input id="fiscalyearmonth" name="fiscalyearmonth" value="03" type="hidden">
                                <input id="fiscalyearyear" name="fiscalyearyear" value="2018" type="hidden">
                                </td>
                            </tr>
                            <tr class="margin-table">
                                <td colspan="2" nowrap="">Product : 
                                    <input name="sel_product_id" id="sel_product_id" value="" type="hidden"><input class="minwidth200 ui-autocomplete-input" name="search_sel_product_id" id="search_sel_product_id" value="" autocomplete="off" type="text"><input class="button" id="addproduct" name="addproduct" value="New Product" type="button">
                                </td>
                            </tr>   
                            <tr class="margin-table">
                                <td colspan="2" nowrap="">Metric ID :
                                    <input name="RFID" id="RFID" style="width:80%">
                                </td>
                            </tr>
                            <tr class="margin-table">
                                <td colspan="2" nowrap="">Parent Metric ID :
                                <input name="parent_rfid" id="parent_rfid" style="width:75%">
                                </td>
                            </tr>
                            <tr class="margin-table" id="more_option">
                                <td nowrap="">Column :
                                        <input name="col_val" id="col_val" style="width:80%">
                                </td>
                                <td nowrap="">Row :
                                        <input name="row_val" id="row_val" style="width:80%">
                                </td>
                            </tr>
                            @if(isset($_GET['growmode']) and $_GET['growmode']=='release')
                            <tr class="margin-table">
                                <td colspan="2" nowrap="">Flower Weight :
                                    <input name="flower_weight" id="flower_weight" style="width:80%">
                                </td>
                            </tr>
                            <tr class="margin-table">
                                <td colspan="2" nowrap="">Waste Weight :
                                <input id="waste_weight" name="waste_weight" style="width:80%">
                                </td>
                            </tr>
                            <tr class="margin-table">
                                <td colspan="2" nowrap="">         WareHouse :
                                    <select class="flat minwidth200" id="idwarehouse" name="idwarehouse" data-role="none" tabindex="-1" title="" style="display: none;">
                                        <option value="1">B-Store-Denver</option>
                                        <option value="2">B*GOOD Elevations (COS 402-01066)</option><option value="3">B*GOOD Elevations Grow (COS 403-01660)</option>
                                        <option value="4">B*GOOD North Med (402-00832)</option>
                                        <option value="5">B*GOOD North Rec (402R-00132)</option>
                                    </select>
                                </td>
                            </tr>
                            @endif
                            <tr class="margin-table">
                                <td colspan="2" style="text-align:center">

                                    <input name="updatemode" id="updatemode" type="hidden">
                                    <input name="growmode" id="growmode" value="new" type="hidden">
                                    <input name="sel_row_id" id="sel_row_id" value="0" type="hidden">
                                    <input class="button" id="addrecord" value="Add" type="button">&nbsp;&nbsp;&nbsp;
                                    <input class="button" id="removerecord" value="Remove" type="button">&nbsp;&nbsp;&nbsp;

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="fichetwothirdright">
                <div class="ficheaddleft">
                    <table class="noborder" width="100%">
                        <tbody>
                            <tr class="liste_titre">
                                <th class="grow-table-th">No</th>
                                <th class="grow-table-th">Name</th>
                                <th class="grow-table-th">Metric ID</th>
                                <th class="grow-table-th">Parent Metric ID</th>
                                <th class="grow-table-th">GrowHouse</th>
                            </tr>
                            <tr class="oddeven">
                                <td colspan="2" class="opacitymedium">No existing</td>
                            </tr>
                        </tbody>
                    </table><br>    
                </div>
            </div>
        </div>
    </div>    
</div> <!-- End div class="fiche" -->

<!-- Javascript code for autocomplete of field sel_product_id -->
<script type="text/javascript">
$(document).ready(function() {
    var autoselect = 0;
    var options = [];

    /* Remove product id before select another product use keyup instead of change to avoid loosing the product id. This is needed only for select of predefined product */
    /* TODO Check if we can remove this */
    $("input#search_sel_product_id").keydown(function() {
        $("#sel_product_id").val("");
    });

    /* I disable this. A call to trigger is already done later into the select action of the autocomplete code
        $("input#search_sel_product_id").change(function() {
        console.log("Call the change trigger on input sel_product_id because of a change on search_sel_product_id was triggered");
        $("#sel_product_id").trigger("change");
    });*/

    // Check options for secondary actions when keyup
    $("input#search_sel_product_id").keyup(function() {
            if ($(this).val().length == 0)
            {
                $("#search_sel_product_id").val("");
                $("#sel_product_id").val("").trigger("change");
                if (options.option_disabled) {
                    $("#" + options.option_disabled).removeAttr("disabled");
                }
                if (options.disabled) {
                    $.each(options.disabled, function(key, value) {
                        $("#" + value).removeAttr("disabled");
                    });
                }
                if (options.update) {
                    $.each(options.update, function(key, value) {
                        $("#" + key).val("").trigger("change");
                    });
                }
                if (options.show) {
                    $.each(options.show, function(key, value) {
                        $("#" + value).hide().trigger("hide");
                    });
                }
                if (options.update_textarea) {
                    $.each(options.update_textarea, function(key, value) {
                        if (typeof CKEDITOR == "object" && typeof CKEDITOR.instances != "undefined" && CKEDITOR.instances[key] != "undefined") {
                            CKEDITOR.instances[key].setData("");
                        } else {
                            $("#" + key).html("");
                        }
                    });
                }
            }
    });
    $("input#search_sel_product_id").autocomplete({
        source: function( request, response ) {
            $.get("/product/ajax/products.php?htmlname=sel_product_id&outjson=1&price_level=0&type=&mode=1&status=1&finished=2&warehousestatus=", { sel_product_id: request.term }, function(data){
                if (data != null)
                {
                    response($.map( data, function(item) {
                        if (autoselect == 1 && data.length == 1) {
                            $("#search_sel_product_id").val(item.value);
                            $("#sel_product_id").val(item.key).trigger("change");
                        }
                        var label = item.label.toString();
                        var update = {};
                        if (options.update) {
                            $.each(options.update, function(key, value) {
                                update[key] = item[value];
                            });
                        }
                        var textarea = {};
                        if (options.update_textarea) {
                            $.each(options.update_textarea, function(key, value) {
                                textarea[key] = item[value];
                            });
                        }
                        return { label: label, value: item.value, id: item.key, update: update, textarea: textarea, disabled: item.disabled }
                    }));
                }
                else console.error("Error: Ajax url /product/ajax/products.php?htmlname=sel_product_id&outjson=1&price_level=0&type=&mode=1&status=1&finished=2&warehousestatus= has returned an empty page. Should be an empty json array.");
            }, "json");
        },
        dataType: "json",
        minLength: 2,
        select: function( event, ui ) {     // Function ran once new value has been selected into javascript combo
            console.log("Call change on input sel_product_id because of select definition of autocomplete select call on input#search_sel_product_id");
            console.log("Selected id = "+ui.item.id+" - If this value is null, it means you select a record with key that is null so selection is not effective");
            $("#sel_product_id").val(ui.item.id).trigger("change"); // Select new value
            // Disable an element
            if (options.option_disabled) {
                console.log("Make action option_disabled on #"+options.option_disabled+" with disabled="+ui.item.disabled)
                if (ui.item.disabled) {
                    $("#" + options.option_disabled).prop("disabled", true);
                    if (options.error) {
                        $.jnotify(options.error, "error", true);        // Output with jnotify the error message
                    }
                    if (options.warning) {
                        $.jnotify(options.warning, "warning", false);       // Output with jnotify the warning message
                    }
                } else {
                    $("#" + options.option_disabled).removeAttr("disabled");
                }
            }
            if (options.disabled) {
                console.log("Make action disabled on each "+options.option_disabled)
                $.each(options.disabled, function(key, value) {
                    $("#" + value).prop("disabled", true);
                });
            }
            if (options.show) {
                console.log("Make action show on each "+options.show)
                $.each(options.show, function(key, value) {
                    $("#" + value).show().trigger("show");
                });
            }
            // Update an input
            if (ui.item.update) {
                console.log("Make action update on each ui.item.update")
                // loop on each "update" fields
                $.each(ui.item.update, function(key, value) {
                    $("#" + key).val(value).trigger("change");
                });
            }
            if (ui.item.textarea) {
                console.log("Make action textarea on each ui.item.textarea")
                $.each(ui.item.textarea, function(key, value) {
                    if (typeof CKEDITOR == "object" && typeof CKEDITOR.instances != "undefined" && CKEDITOR.instances[key] != "undefined") {
                        CKEDITOR.instances[key].setData(value);
                        CKEDITOR.instances[key].focus();
                    } else {
                        $("#" + key).html(value);
                        $("#" + key).focus();
                    }
                });
            }
            console.log("ajax_autocompleter new value selected, we trigger change on original component so field #search_sel_product_id");

            $("#search_sel_product_id").val(ui.item.label).trigger("change");   // We have changed value of the combo select, we must be sure to trigger all js hook binded on this event. This is required to trigger other javascript change method binded on original field by other code.
        }
        ,delay: 500
    }).data("ui-autocomplete")._renderItem = function( ul, item ) {
        return $("<li>")
        .data( "ui-autocomplete-item", item ) // jQuery UI > 1.10.0
        .append( '<a><span class="tag">' + item.label + "</span></a>" )
        .appendTo(ul);
    };

});</script>


<script>

function setrome_id(select){
    var dataString = '&rowid_value=' + $("#move_src").val();
    $.ajax({
         type: "POST",
         url: 'move_ajax.php',
         data: dataString ,
            success: function(data){
                $('#grow_move_select_src').html(data);
                $('#grow_move_select_dst').html(data);
            }
     });
}
setrome_id( document.getElementById('move_src'));

function update_move_src_dst()
{
    var res_src = $("#grow_move_select_src").val();
    var res_dst = $("#grow_move_select_dst").val();
    $("#move_src_value").val(res_src);
    $("#move_dst_value").val(res_dst);
}

if ($('#grow_move_select_src').length)
{
    $("#grow_move_select_src").change( update_move_src_dst );
    update_move_src_dst();
}
if ($('#grow_move_select_dst').length)
{
    $("#grow_move_select_dst").change( update_move_src_dst );
    update_move_src_dst();
}

$("#addrecord").click( function() {
    $("#updatemode").val("add");

    if( !$("#RFID").val() )
        return alert("please input Metric ID value");

    if( !$("#sel_product_id").val()  || $("#sel_product_id").val() == 0 )
        return alert('please select product');

    document.form.submit();
});

$("#removerecord").click( function() {
    if( $("#sel_row_id").val() == 0 )
        return;
    if( !confirm("Do you want to remove grow house?") )
        return;


    $("#updatemode").val("remove");
    document.form.submit();
});

var current_date = null;

function checkandRefresh(){
    if( current_date == null )
         current_date = $("#fiscalyear").val();
    else
    {
        if( current_date != $("#fiscalyear").val() )
        {
            document.form.submit();
        }
    }
    setTimeout(checkandRefresh , 1500);
}

setTimeout(checkandRefresh , 1500);

$("#RFID").change( function(){
    $.ajax({
     type: "POST",
     url: 'ajax-back.php',
     data: { 'action' : 'get_product_by_rfid' , 'RFID' : $("#RFID").val() } ,
     success: function (data) {
         console.log(data);
         if( data )
         {
             $("#sel_product_id").val( data );
             console.log( $("#sel_product_id option:selected").text() );
             $("#select2-chosen-1").html($("#sel_product_id option:selected").text());

         }
     },
     dataType: "json"
 });
});

$("#addproduct").click(function(){
        window.open("/mukesh/erp2-test/product/card?leftmenu=product&action=create&type=0", 'openwin');
});

$(document).ready(function(e) {
    $("#read_more").onclick(function(e) {alert("show");
        $("#more_option").show("blind");
    });
    $("#more_option").onclick(function(e) {alert("hide");
        $("#more_option").hide("blind");
    });
});

</script>

<script>
function setselect( rfid )
{
    console.log( rfid );
    $("#sel_row_id").val(rfid);
}
</script>
<!-- JS CODE TO ENABLE select2 for id = idwarehouse -->
<script type="text/javascript">
$(document).ready(function () {
    $('#idwarehouse').select2({
        dir: 'ltr',
        width: 'resolve',       /* off or resolve */
        minimumInputLength: 0
    });
});
</script>
@endsection

