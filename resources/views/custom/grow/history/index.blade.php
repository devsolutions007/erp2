@extends('layouts.master-grow')

@section('content')
<div id="id-right">
    <div class="fiche">
        <form method="post" name="form" id="form">
            <div style="width:80%" class="div-table-responsive">
                <table width="100%">
                    <tbody>
                        <tr class="margin-table">
                            <td>Grow Areas : 
                                <select id="move_src" name="move_src">
                                    <option value="1">Denver</option>
                                    <option value="48">Jason Street</option>
                                </select>
                            </td>
                            <td>From : 
                                <input id="startdate" name="startdate" class="maxwidth75" maxlength="11" value="03/01/2018" onchange="dpChangeDay('startdate','MM/dd/yyyy'); " type="text"><button id="startdateButton" type="button" class="dpInvisibleButtons" onclick="showDP('/core/','startdate','MM/dd/yyyy','en_US');"><img src="/mukesh/erp2-test/public/theme/eldy/img/object_calendarday.png" alt="" title="Select a date" class="datecallink"></button>
                                <input id="startdateday" name="startdateday" value="01" type="hidden">
                                <input id="startdatemonth" name="startdatemonth" value="03" type="hidden">
                                <input id="startdateyear" name="startdateyear" value="2018" type="hidden">
                            </td>
                            <td>To : 
                                <input id="lastdate" name="lastdate" class="maxwidth75" maxlength="11" value="03/09/2018" onchange="dpChangeDay('lastdate','MM/dd/yyyy'); " type="text">
                                <button id="lastdateButton" type="button" class="dpInvisibleButtons" onclick="showDP('/core/','lastdate','MM/dd/yyyy','en_US');"><img src="/mukesh/erp2-test/public/theme/eldy/img/object_calendarday.png" alt="" title="Select a date" class="datecallink"></button>
                                <input id="lastdateday" name="lastdateday" value="09" type="hidden">
                                <input id="lastdatemonth" name="lastdatemonth" value="03" type="hidden">
                                <input id="lastdateyear" name="lastdateyear" value="2018" type="hidden">
                            </td>
                            <td nowrap="">Metric ID :
                                <input name="RFID" id="RFID" style="width:60%">
                            </td>
                            <td>
                                &nbsp;&nbsp;&nbsp;<input class="button" id="searchvalue" value="Search" type="button">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="tagtable liste">
                    <tbody>
                        <tr style="text-align:center;" class="liste_titre">
                            <th class="liste_titre">Date</th>
                            <th class="liste_titre">Product</th>
                            <th class="liste_titre">Metric ID</th>
                            <th class="liste_titre">From Place</th>
                            <th class="liste_titre">To Place</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div> <!-- End div class="fiche" -->  
</div>

<script type="text/javascript">
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});

$("#searchvalue").click( function() {
    document.form.submit();
});
</script>
@endsection

