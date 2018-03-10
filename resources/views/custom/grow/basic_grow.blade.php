@extends('layouts.master-grow')

@section('content')
<div id="id-right">
    <!-- Begin div class="fiche" -->
    <div class="fiche">
        <table summary="" class="centpercent notopnoleftnoright" style="margin-bottom: 2px;">
            <tbody>
                <tr>
                    <td class="nobordernopadding widthpictotitle" valign="middle">
                        <img src="{{ asset('custom/grow/img/grow.png') }}" alt="" title="" class="valignmiddle" id="pictotitle">
                    </td>
                    <td class="nobordernopadding" valign="middle">
                        <div class="titre">GrowArea</div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="fichecenter">
            <div class="fichethirdleft">
                <table class="noborder" width="100%">
                    <tbody>
                        <tr class="liste_titre">
                            <th>No</th>
                            <th>Name</th>
                            <th>Register Date</th>
                            <th>Administrator</th>
                            <th>Type</th>
                        </tr>
                        <tr class="oddeven" onclick="setselect('1','Denver','5236-2342234', this)" style="cursor:pointer;background: #fff;">
                            <td class="nowrap">1</td>
                            <td class="nowrap">Denver</td>
                            <td class="nowrap">2017-10-05</td>
                            <td class="nowrap">SuperAdmin</td>
                            <td class="nowrap">Grow</td>
                        </tr>
                        <tr class="oddeven" onclick="setselect('1','Denver','5236-2342234', this)" style="cursor:pointer;background: #fff;">
                            <td class="nowrap">1</td>
                            <td class="nowrap">Denver</td>
                            <td class="nowrap">2017-10-05</td>
                            <td class="nowrap">SuperAdmin</td>
                            <td class="nowrap">Grow</td>
                        </tr>
                        <tr class="oddeven" onclick="setselect('1','Denver','5236-2342234', this)" style="cursor:pointer;background: #fff;">
                            <td class="nowrap">1</td>
                            <td class="nowrap">Denver</td>
                            <td class="nowrap">2017-10-05</td>
                            <td class="nowrap">SuperAdmin</td>
                            <td class="nowrap">Grow</td>
                        </tr>
                        <tr class="oddeven" onclick="setselect('1','Denver','5236-2342234', this)" style="cursor:pointer;background: #fff;">
                            <td class="nowrap">1</td>
                            <td class="nowrap">Denver</td>
                            <td class="nowrap">2017-10-05</td>
                            <td class="nowrap">SuperAdmin</td>
                            <td class="nowrap">Grow</td>
                        </tr>
                    </tbody>
                </table><br>
            </div>
            <div class="fichetwothirdright">
                <div class="ficheaddleft">  
                    <form method="post" name="form" id="form">
                        <input name="updatemode" id="updatemode" type="hidden">
                        <input name="sel_row_id" id="sel_row_id" value="0" type="hidden">

                        <div class="divsearchfield row">
                            Name : 
                            <input name="growname" id="growname" class="input" style="margin-right: 65px;" type="input">
                            Type : 
                            <select id="grow_type" name="grow_type" style="vertical-align: bottom;">
                                <option value="0"></option>
                                <option value="1">Grow</option>
                                <option value="2">Clone</option>
                                <option value="3">Vegetation</option>
                                <option value="4">Flower</option>
                                <option value="7">Cutweigh-wet</option>
                                <option value="5">Harvest-drying</option>
                                <option value="6">Harvest-curing</option>
                            </select>
                        </div>
                        <div style="clear: both;">
                            <div class="divsearchfield">
                                Licence Number : <input name="licence_num" id="licence_num" class="input" type="input">
                            </div>
                            <div class="divsearchfield" style="margin-left: 30px;">
                                <input name="addrecord" id="addrecord" class="button" value="Add" type="button">
                                <input name="updaterecord" id="updaterecord" class="button" value="Update" type="button">
                                <input name="removerecord" id="removerecord" class="button" value="Remove" type="button">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>

            $("#addrecord").click( function() {
                $("#updatemode").val("add");
                $(".oddeven").removeClass('active');
               // document.form.submit();
            });
            $("#updaterecord").click( function() {
                if( $("#sel_row_id").val() == 0 )
                    return;
                $("#updatemode").val("update");
                $(".oddeven").removeClass('active');
               // document.form.submit();
            });
            $("#removerecord").click( function() {
                if( $("#sel_row_id").val() == 0 )
                    return;
                if( !confirm("Do you want to remove grow house?") )
                    return;
                $("#updatemode").val("remove");
                $(".oddeven").removeClass('active');
               // document.form.submit();
            });

            function setselect( rowid , name , licence_num , this_tr )
            {
                $("#sel_row_id").val(rowid);
                $("#growname").val(name);
                $("#licence_num").val(licence_num);
                
                $(".oddeven").removeClass('active');
                $(this_tr).addClass('active');
            }

            // function move_stock( rowid , name, this_tr )
            // {
            //     sessionStorage.setItem("move_src", rowid);
            //     window.open('/custom/grow/pages/plant-mgt/stock.php?move_src='+rowid, '_self');
            // }
        </script>
    </div> <!-- End div class="fiche" -->
</div>

@endsection

