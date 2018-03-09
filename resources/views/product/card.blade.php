@extends('layouts.master-grow')

@section('content')
<div id="id-right">
    <!-- Begin div class="fiche" -->
    <div class="fiche">
        <form action="/product/card.php" method="POST">

            <table summary="" class="centpercent notopnoleftnoright" style="margin-bottom: 2px;">
                <tbody>
                    <tr>
                        <td class="nobordernopadding widthpictotitle" valign="middle"><img src="/mukesh/erp2-test/public/theme/eldy/img/title_products.png" alt="" title="" class="valignmiddle" id="pictotitle"></td><td class="nobordernopadding" valign="middle"><div class="titre">New product</div></td>
                    </tr>
                </tbody>
            </table>

            <div class="tabs" data-role="controlgroup" data-type="horizontal">
            </div>

            <div class="tabBar tabBarWithBottom">
                <table class="border centpercent">
                    <tbody>
                        <tr>
                            <td class="titlefieldcreate fieldrequired">Metric ID</td>
                            <td colspan="3"><input id="ref" name="ref" class="maxwidth200" maxlength="128" value=""></td>
                        </tr>
                        <tr>
                            <td class="fieldrequired">Name</td><td colspan="3"><input name="label" class="minwidth300 maxwidth400onsmartphone" maxlength="255" value=""></td>
                        </tr>
                        <tr>
                            <td class="fieldrequired">Status (Sales)</td>
                            <td colspan="3">
                                <select id="statut" class="flat statut" name="statut">
                                    <option value="1">Packaged product</option>
                                    <option value="0">Bulk product</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Barcode type</td>
                            <td>
                                <select class="flat" name="fk_barcode_type" id="select_fk_barcode_type">
                                    <option value="0">&nbsp;</option>
                                    <option value="6">Code 128</option>
                                    <option value="5">Code 39</option>
                                    <option value="7">Datamatrix</option>
                                    <option value="2">EAN13</option>
                                    <option value="1">EAN8</option>
                                    <option value="4" selected="">ISBN</option>
                                    <option value="8">Qr Code</option>
                                    <option value="3">UPC</option>
                                </select></td>
                            <td colspan="2">Barcode value  
                                <input class="maxwidth200" name="barcode" value="" type="text">
                            </td>
                        </tr>
                        <tr>
                            <td class="tdtop">Description</td>
                            <td colspan="3">
                                <textarea id="desc" name="desc" rows="4" style="margin-top: 5px; width: 90%" class="flat">
                                    
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Public URL</td>
                            <td colspan="3">
                                <input name="url" class="quatrevingtpercent" value="" type="text">
                            </td>
                        </tr>
                        <tr>
                            <td>Stock limit for alert</td>
                            <td><input name="seuil_stock_alerte" class="maxwidth50" value=""></td>
                            <td>Desired optimal stock</td>
                            <td><input name="desiredstock" class="maxwidth50" value=""></td>
                        </tr>
                        <tr>
                            <td>Nature</td>
                            <td colspan="3">
                                <select id="finished" class="flat finished" name="finished">
                                <option class="optiongrey" value="-1">&nbsp;</option>
                                <option value="1">Medical products</option>
                                <option value="0">Recreational product</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Weight</td>
                            <td>
                                <input name="weight" size="4" value="">
                                <select class="flat" name="weight_units">
                                    <option value="-3">g</option>
                                    <option value="98">ounce</option>
                                </select>
                            </td>
                            <td colspan="2">
                                <input value="Yes" class="checkforselect" id="sellby_weight_check" name="sellby_weight_check" type="checkbox">
                                <label for="sellby_weight_check" style="margin-left: 5px;">Sell by weight</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Area</td>
                            <td colspan="3">
                                <input name="surface" size="4" value="">
                                <select class="flat" name="surface_units">
                                    <option value="-6">mm²</option>
                                    <option value="-4">cm²</option>
                                    <option value="-2">dm²</option>
                                    <option value="0" selected="">m²</option>
                                    <option value="98">ft²</option>
                                    <option value="99">in²</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Volume</td>
                            <td colspan="3">
                                <input name="volume" size="4" value="">
                                <select class="flat" name="volume_units">
                                    <option value="97">ounce</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="tdtop">Note (not visible on invoices, proposals...)</td>
                            <td colspan="3">
                                <textarea id="note_private" name="note_private" rows="8" style="margin-top: 5px; width: 90%" class="flat"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Categories</td>
                            <td colspan="3">
                                <select id="categories" class="multiselect" multiple="" name="categories[]" style="width: 100%; display: none;" tabindex="-1">
                                    <option value="8">Medical category</option>
                                    <option value="3">Product1</option>
                                    <option value="9">Product1 &gt;&gt; Grain category</option>
                                    <option value="5">Product1 &gt;&gt; Subcategory1</option>
                                    <option value="6">Product1 &gt;&gt; Subcategory2</option>
                                    <option value="4">Product2</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table><br>
                <table class="border" width="100%">
                    <tbody>
                        <tr>
                            <td class="titlefieldcreate">Selling price</td>
                            <td>
                                <input name="price" class="maxwidth50" value="">
                                <select class="flat" name="price_base_type">
                                    <option value="HT">Net of tax</option>
                                    <option value="TTC">Inc. tax</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Min. selling price</td>
                            <td>
                                <input name="price_min" class="maxwidth50" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>Tax Rate</td>
                            <td>
                                <select class="flat minwidth75imp" id="tva_tx" name="tva_tx" disabled="" title="VAT is not used"></select><input class="button" id="edit_tax" name="edit_tax" value="New Tax" style="margin-left:30px;" onclick="window.open('/admin/dict.php?id=10','windowname')" type="button">
                            </td>
                        </tr>
                    </tbody>
                </table><br>
                <table class="border" width="100%">
                    <tbody>
                        <tr>
                            <td class="titlefieldcreate">Accountancy code (sale)</td>
                            <td class="maxwidthonsmartphone">
                                <input class="minwidth100" name="accountancy_code_sell" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>Accountancy code (purchase)</td>
                            <td class="maxwidthonsmartphone">
                                <input class="minwidth100" name="accountancy_code_buy" value="">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="center">
                <input class="button" value="Create" type="submit"> &nbsp; &nbsp; 
                <input class="button" value="Cancel" onclick="javascript:history.go(-1)" type="button">
            </div>
        </form>
    </div> <!-- End div class="fiche" -->
</div>
<!-- Set focus onto a specific field -->
<script type="text/javascript" language="javascript">
    jQuery(document).ready(function() { jQuery("input[name=\'ref\']").focus(); });
</script>
<!-- JS CODE TO ENABLE select2 for id categories -->
<script type="text/javascript">
    function formatResult(record) {
return record.text; };
    function formatSelection(record) {
return record.text; };
    $(document).ready(function () {
        $('#categories').select2({
            dir: 'ltr',
            // Specify format function for dropdown item
            formatResult: formatResult,
            templateResult: formatResult,       /* For 4.0 */
            // Specify format function for selected item
            formatSelection: formatSelection,
            templateResult: formatSelection     /* For 4.0 */
        });
    });
</script>

<!-- begin ajax form_confirm page=card.php?id= -->
<script type="text/javascript">
jQuery(document).ready(function() {
    $(function() {
        $( "#dialog-confirm-action-delete" ).dialog(
        {
            autoOpen: false,
                open: function() {
                    $(this).parent().find("button.ui-button:eq(2)").focus();
                },
            resizable: false,
            height: "200",
            width: "500",
            modal: true,
            closeOnEscape: false,
            buttons: {
                "Yes": function() {
                    var options="";
                    var inputok = [];
                    var pageyes = "card.php?id=&action=confirm_delete&confirm=yes";
                    if (inputok.length>0) {
                        $.each(inputok, function(i, inputname) {
                            var more = "";
                            if ($("#" + inputname).attr("type") == "checkbox") { more = ":checked"; }
                            if ($("#" + inputname).attr("type") == "radio") { more = ":checked"; }
                            var inputvalue = $("#" + inputname + more).val();
                            if (typeof inputvalue == "undefined") { inputvalue=""; }
                            options += "&" + inputname + "=" + inputvalue;
                        });
                    }
                    var urljump = pageyes + (pageyes.indexOf("?") < 0 ? "?" : "") + options;
                    //alert(urljump);
                    if (pageyes.length > 0) { location.href = urljump; }
                    $(this).dialog("close");
                },
                "No": function() {
                    var options = "";
                    var inputko = [];
                    var pageno="";
                    if (inputko.length>0) {
                        $.each(inputko, function(i, inputname) {
                            var more = "";
                            if ($("#" + inputname).attr("type") == "checkbox") { more = ":checked"; }
                            var inputvalue = $("#" + inputname + more).val();
                            if (typeof inputvalue == "undefined") { inputvalue=""; }
                            options += "&" + inputname + "=" + inputvalue;
                        });
                    }
                    var urljump=pageno + (pageno.indexOf("?") < 0 ? "?" : "") + options;
                    //alert(urljump);
                    if (pageno.length > 0) { location.href = urljump; }
                    $(this).dialog("close");
                }
            }
        }
        );

        var button = "action-delete";
        if (button.length > 0) {
            $( "#" + button ).click(function() {
                $("#dialog-confirm-action-delete").dialog("open");
            });
        }
    });
});
</script>
<!-- end ajax form_confirm -->


<!-- begin ajax form_confirm page=/product/card.php?id= -->
<script type="text/javascript">
jQuery(document).ready(function() {
    $(function() {
        $( "#dialog-confirm-action-clone" ).dialog(
        {
            autoOpen: false,
            resizable: false,
            height: "250",
            width: "600",
            modal: true,
            closeOnEscape: false,
            buttons: {
                "Yes": function() {
                    var options="";
                    var inputok = ["clone_ref","clone_content","clone_prices"];
                    var pageyes = "/product/card.php?id=&action=confirm_clone&confirm=yes";
                    if (inputok.length>0) {
                        $.each(inputok, function(i, inputname) {
                            var more = "";
                            if ($("#" + inputname).attr("type") == "checkbox") { more = ":checked"; }
                            if ($("#" + inputname).attr("type") == "radio") { more = ":checked"; }
                            var inputvalue = $("#" + inputname + more).val();
                            if (typeof inputvalue == "undefined") { inputvalue=""; }
                            options += "&" + inputname + "=" + inputvalue;
                        });
                    }
                    var urljump = pageyes + (pageyes.indexOf("?") < 0 ? "?" : "") + options;
                    //alert(urljump);
                    if (pageyes.length > 0) { location.href = urljump; }
                    $(this).dialog("close");
                },
                "No": function() {
                    var options = "";
                    var inputko = [];
                    var pageno="";
                    if (inputko.length>0) {
                        $.each(inputko, function(i, inputname) {
                            var more = "";
                            if ($("#" + inputname).attr("type") == "checkbox") { more = ":checked"; }
                            var inputvalue = $("#" + inputname + more).val();
                            if (typeof inputvalue == "undefined") { inputvalue=""; }
                            options += "&" + inputname + "=" + inputvalue;
                        });
                    }
                    var urljump=pageno + (pageno.indexOf("?") < 0 ? "?" : "") + options;
                    //alert(urljump);
                    if (pageno.length > 0) { location.href = urljump; }
                    $(this).dialog("close");
                }
            }
        }
        );

        var button = "action-clone";
        if (button.length > 0) {
            $( "#" + button ).click(function() {
                $("#dialog-confirm-action-clone").dialog("open");
            });
        }
    });
});
</script>
<!-- end ajax form_confirm -->
<script type="text/javascript">
$(document).ready(function() {
    $("#print_barcode").click(function() {
        window.location.href = "/barcode/printsheet.php";
    });
});
</script>
@endsection

