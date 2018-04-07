$(document).ready(function(){

    ///////////////// menu part show ////////////////////

    $(document).click( function(){
        $('#grow_grid_menu').hide();
    });
    
    $('#grow_grid_img').click( function(event){
        event.stopPropagation();
        $('#grow_grid_menu').toggle();
    });

    /////////////////////////////////////////////////////

    /////////////////////////////  Start Add Plant Dialog      ////////////////////////////////////////////

    $("#fileupload_add_cancel").click(function(){
        $('#addfile_modal').plainModal('close');
    });

    $("#addfile_modal_detail_data").on('click','.modal_row_delete',function(){
        $(this).parent().remove();
    });

    $("#uploadnew_product").click(function(){
        console.log("aaa");
        window.open("/product/card.php?leftmenu=product&action=create&type=0", 'openwin');
    });

    //////////////////////////////  End Add Plant Dialog   ///////////////////////////////////////////

    /////////////////////////////////  Start Move Plant Dialog   /////////////////////////////////////////

    $("#move_select_dst" ).change( function(){
        $("#fileupload_move_success").removeAttr("disabled");
    });

    $("#fileupload_move_cancel").click(function(){
        $('#movefile_modal').plainModal('close');
    });

    $("#movefile_modal_detail_data").on('click','.modal_row_delete',function(){
        $(this).parent().remove();
    });

    /////////////////////////////////  End Move Plant Dialog   /////////////////////////////////////////

    /////////////////////////////////  Start Remove Plant Dialog   /////////////////////////////////////////

    $("#fileupload_remove_cancel").click(function(){
        $('#removefile_modal').plainModal('close');
    });

    $("#removefile_modal_detail_data").on('click','.modal_row_delete',function(){
        $(this).parent().remove();
    });

    /////////////////////////////////  End Remove Plant Dialog   /////////////////////////////////////////

    /////////////////////////////////  Start Release Plant Dialog   /////////////////////////////////////////

    $("#fileupload_release_cancel").click(function(){
        $('#releasefile_modal').plainModal('close');
    });

    $("#releasefile_modal_detail_data").on('click','.modal_row_delete',function(){
        $(this).parent().remove();
    });

    /////////////////////////////////  End Release Plant Dialog   /////////////////////////////////////////

    /////////////////////////////////  Start State Change Plant Dialog   /////////////////////////////////////////

    $("#fileupload_state_cancel").click(function(){
        $('#statefile_modal').plainModal('close');
    });

    $("#statefile_modal_detail_data").on('click','.modal_row_delete',function(){
        $(this).parent().remove();
    });

    /////////////////////////////////  End State Change Plant Dialog   /////////////////////////////////////////

});

function change_state_modal( rfid  , this_tr )
{
    var state = $(this_tr).html();
    var update_state;
    if( state == '' )                   update_state = "clone";
    if( state == 'clone' )              update_state = "vegetation";
    if( state == 'vegetation' )         update_state = "flower";
    if( state == 'flower' )             update_state = "Cutweigh-wet";
    if( state == 'Cutweigh-wet' )       update_state = "harvest-drying";
    if( state == 'harvest-drying' )     update_state = "harvest-curing";
    if( state == 'harvest-curing' )     update_state = "clone";

    $(this_tr).html(update_state);
}

function ToggleFullScreen()
{ 
    if ( ( document.fullScreenElement && document.fullScreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen)) 
    {
        if (document.documentElement.requestFullScreen) {  
            document.documentElement.requestFullScreen();  
        } else if (document.documentElement.mozRequestFullScreen) {  
            document.documentElement.mozRequestFullScreen();  
        } else if (document.documentElement.webkitRequestFullScreen) {  
            document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
        }

        // $("#left_panel_div").html( "&nbsp;Normal View" );
    } else {  
        
        if (document.cancelFullScreen) {
            document.cancelFullScreen();  
        } else if (document.mozCancelFullScreen) {  
            document.mozCancelFullScreen();  
        } else if (document.webkitCancelFullScreen) {  
            document.webkitCancelFullScreen();  
        }  
        // $("#left_panel_div").html( "&nbsp;Full Screen" );
    }   
}

// start auto complete product name
function addAutoCompleteToStrain(totalView) {
    for(var i=0 ; i < totalView ; i++ ) {
        //alert("#productNameList"+i);
         $( "#productNameList"+i ).autocomplete({
            source: '/product/productNameList',
            autoFocus:true,
            minLength:2,
            select: function(event,ui) {
                $(this).val(ui.item.value);
                $(this).prev('input').val(ui.item.id);
            }
        });
    }
} 



/**
 * Add Grows File Upload Dialog , [Dialog Add Button] Event Handler
 * 2017/12/20
 * RMS
 */

function setFileUploadButtonForAddActionEventHander( room_id )
{
    $("#fileupload_add_success").unbind( "click" );
    $("#fileupload_room_select").val( $( "#" + room_id + "_select option:selected").val() );
    
    $("input").change(function(){
        var isValid = true ;
        for( i = 0 ; i < $("#totalview").val() ; i++ )
        {
            $( "#sel_product_id" + i ).each(function() {
                var element = $(this);
                if (element.val() == "") {
                    isValid = false;
                }
             });
        }
        if( isValid == true ) $("#fileupload_add_success").removeAttr("disabled");
    });

    $("#fileupload_add_success").click(function(){
        var add_data = new Array();
        if( $("input[name=row]").val() != "" && $("input[name=col]").val() != "" ){

            for( i = 0 ; i < $("#totalview").val() ; i++ )
            {
                if( $( "#fileupload_modal_rfid" + i ).html() && $( "#sel_product_id" + i ).val() )
                {
                    add_data.push({
                        r       : $( "#row"                       + i ).val()  ,
                        c       : $( "#col"                       + i ).val()  ,
                        RFID    : $( "#fileupload_modal_rfid"     + i ).html()  ,
                        p_id    : $( "#sel_product_id"            + i ).val()  ,
                        state   : $( "#fileupload_state_area"     + i ).html() ,
                        parent  : $( "#modal_parent_rfid"         + i ).val() ,
                        uid     : i ,
                    });
                }
            }

            $.ajax({
                type: "POST",
                url: '/grow/plantAjaxFileUpload' ,
                data: {
                    action      : 'fileupload_add_data_check',
                    room_id     : $("#fileupload_room_select").val()  ,
                    data        : add_data
                } ,
                headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
                success: function(data){
                    var data = JSON.parse(data);

                    if( data['rfid_check'].length == 0 && data['postion_check'].length == 0 )
                    {
                        $.ajax({
                            type: "POST",
                            url: '/grow/plantAjaxFileUpload' ,
                            data: {
                                action      : 'fileupload_add_data',
                                data        : add_data ,
                                room_id     : $("#fileupload_room_select").val(),
                            } ,
                            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
                            success: function(data){
                                
                                GlobalLayout.reload_data( room_id );
                                $("#modal_dialog_alert_add_data").empty();
                                swal("Congrats", "Plant added successfully.", "success");
                                $('#addPlantUploadModal').modal('hide');
                                $(".addfile_modal_detail_data").empty();
                            }
                        });
                    } else {
                        for (i = 0; i < data['rfid_check'].length; i++) {
                                $("#fileupload_modal_rfid_warning_add" + data['rfid_check'][i]).text("Active tag");
                        }

                        for (i = 0; i < data['postion_check'].length; i++) {
                                $("#fileupload_modal_rowcol_warning_add" + data['postion_check'][i]).text("exist *");
                        }
                    }
                }
            });

        } else {
            $("#modal_dialog_alert_add_data").empty();
            $("#modal_dialog_alert_add_data").text("Please fill out valid values in the form.");
            $("#modal_dialog_alert_add_data").addClass("modal_dialog_alert_error");
            $("#modal_dialog_alert_add_data" ).show(0).delay(2000).fadeOut().hide(0);
        }

    });
}



/**
 * Move Grows File Upload Dialog , [Dialog Move Button] Event Handler
 * 2017/12/20
 * RMS
 */

function setFileUploadButtonForMoveActionEventHander( room_id )
{
    $("#fileupload_move_success").unbind( "click" );
    
    $("#move_select_src").val( $( "#" + room_id + "_select option:selected").text() ); 
    $("#move_select_src").attr("disabled", "disabled");


    $("#fileupload_move_success").click(function(){
        $("#move_select_src").val( $( "#" + room_id + "_select option:selected").val() ); 
        var add_data = new Array();
        $("#modal_dialog_alert_move_data").removeClass("modal_dialog_alert_error");
        $("#modal_dialog_alert_move_data").removeClass("modal_dialog_alert_sucess");

        if( $("#move_select_src").val() != $("#move_select_dst option:selected").val() )
        {
            for( i = 0 ; i < $("#totalview").val() ; i++ )
            {
                if( $( "#fileupload_modal_rfid" + i ).html() && $( "#fileupload_state_area" + i ).html() )
                {
                add_data.push({
                    r       : $( "#row"                       + i ).val()  ,
                    c       : $( "#col"                       + i ).val()  ,
                    RFID    : $( "#fileupload_modal_rfid"     + i ).html() ,
                    state   : $( "#fileupload_state_area"     + i ).html() ,
                });
                }
            }

            $.ajax({
                type: "POST",
                url: '/grow/plantAjaxFileUpload' ,
                data: {
                    action      : 'fileupload_move_data',
                    data        :  add_data ,
                    src         : $("#move_select_src").val() ,
                    dst         : $("#move_select_dst").val() ,
                } ,
                headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
                success: function(data){
                    GlobalLayout.reload_data( room_id );
                    swal("Congrats", "Plants moved successfully.", "success");
                    $('#movefile_modal').modal('hide');
                    $(".movefile_modal_detail_data").empty();
                }
            });
        }else{
            $("#modal_dialog_alert_move_data").empty();
            $("#modal_dialog_alert_move_data").text("Select other DST Room.");
            $("#modal_dialog_alert_move_data").addClass("modal_dialog_alert_error");
            $("#modal_dialog_alert_move_data" ).show(0).delay(2000).fadeOut().hide(0);
        }
    });
}


function setFileUploadButtonForReleaseActionEventHander( room_id )
{
    $("#fileupload_release_success").unbind( "click" );

    $("#fileupload_release_success").click(function(){
        var add_data = new Array();
        $("#modal_dialog_alert_release_data").removeClass("modal_dialog_alert_error");
        $("#modal_dialog_alert_release_data").removeClass("modal_dialog_alert_sucess");

        for( i = 0 ; i < $("#totalview").val() ; i++ )
        {
            if( $( "#fileupload_modal_rfid" + i ).text() && $( "#fileupload_state_area" + i ).text() )
            {
            add_data.push({
                RFID    : $( "#fileupload_modal_rfid"     + i ).html()  ,
                src     : $( "#plant_srcid"     + i ).val() ,
                dst     : $( "#release_gui_plant" ).val() ,
            });
            }
        }

        $.ajax({
            type: "POST",
            url: '/grow/plantAjaxFileUpload' ,
            data: {
                action      : 'fileupload_release_data',
                data        :  add_data ,
            } ,
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
            success: function(data){
                GlobalLayout.reload_data( room_id );
                swal("Congrats", "Plants released successfully.", "success");
                $('#releasefile_modal').modal('hide');
                $("#releasefile_modal_detail_data").empty();
                $( "#release_gui_plant" ).val("");
            }
        });
    });
}

function setFileUploadButtonForRemoveActionEventHander( room_id )
{
    $("#fileupload_remove_success").unbind( "click" );

    $("#fileupload_remove_success").click(function(){
        var add_data = new Array();

        for( i = 0 ; i < $("#totalview").val() ; i++ )
        {
            if( $( "#fileupload_modal_rfid" + i ).text() && $( "#fileupload_state_area" + i ).text() )
            {
            add_data.push({
                RFID    : $( "#fileupload_modal_rfid"     + i ).html()  ,
                src     : $( "#plant_srcid"     + i ).val() ,
            });
            }
        }

        $.ajax({
            type: "POST",
            url: '/grow/plantAjaxFileUpload' ,
            data: {
                action      : 'fileupload_remove_data',
                data        :  add_data ,
            } ,
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
            success: function(data){
                GlobalLayout.reload_data( room_id );
                swal("Congrats", "Plant deleted succeesfully.", "success");
                $('#removefile_modal').modal('hide');
                $(".removefile_modal_detail_data").empty();
            }
        });

    });

}

function setFileUploadButtonForStateActionEventHander( room_id )
{
    $("#fileupload_state_success").unbind( "click" );

    $("#fileupload_state_success").click(function(){
        var add_data = new Array();

        for( i = 0 ; i < $("#totalview").val() ; i++ )
        {
            if( $( "#fileupload_modal_rfid" + i ).text() && $( "#fileupload_now_state" + i ).text() )
            {
            add_data.push({
                RFID         : $( "#fileupload_modal_rfid"     + i ).html()  ,
                now_state    : $( "#fileupload_now_state"      + i ).html()  ,
                next_state   : $( "#fileupload_next_state"     + i ).html()  ,
            });
            }
        }

        $.ajax({
            type: "POST",
            url: '/grow/plantAjaxFileUpload' ,
            data: {
                action      : 'fileupload_state_data',
                data        :  add_data ,
            } ,
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
            success: function(data){
                GlobalLayout.reload_data( room_id );
                swal("Congrats", "Plants state updated succeesfully.", "success");
                $('#statefile_modal').modal('hide');
                $(".statefile_modal_detail_data").empty();
            }
        });

    });

}

function GetRoomInformation( room_id )
{
    $.ajax({
        type: "POST",
        url: '/grow/getplantAjax' ,
        data: {
            action      : 'plant_get_roominfor',
            room_id     :  $( "#" + room_id + "_select option:selected").val() ,
        } ,
        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
        success: function(data){
            var data = JSON.parse(data);
            for (i = 0 ; i < data.length ; i++) {
                if( data[i][0] == "all_plant")      $("#all_plant").text(       data[i][1] );
                if( data[i][0] == "rows")           $("#setting_rows").text(        data[i][1] );
                if( data[i][0] == "days")           $("#setting_days").text(        data[i][1] );
                if( data[i][0] == "columns")        $("#setting_column").text(      data[i][1] );
                if( data[i][0] == "cells")          $("#setting_cells").text(       data[i][1] );
                if( data[i][0] == "clone")          $("#clone_count").text(         data[i][1] );
                if( data[i][0] == "flower")         $("#flower_count").text(        data[i][1] );
                if( data[i][0] == "vegetation")     $("#vegetation_count").text(    data[i][1] );
                if( data[i][0] == "Cutweigh-wet")   $("#cutweigh_wet_count").text(         data[i][1] );
                if( data[i][0] == "harvest-drying") $("#harvest_drying_count").text(       data[i][1] );
                if( data[i][0] == "harvest-curing") $("#harvest_curing_count").text(       data[i][1] );
                if( data[i][0] == "month_input")    $("#monthly_import").text(      data[i][1] );
                if( data[i][0] == "month_output")   $("#monthly_export").text(      data[i][1] );
                if( data[i][0] == "year_input")     $("#yearly_import").text(       data[i][1] );
                if( data[i][0] == "year_output")    $("#yearly_output").text(       data[i][1] );
            }

            $('#room_infor_modal').modal('show');       
        }
    })
}

$("#close_room_information").click(function(){
    $('#room_infor_modal').modal('hide'); 
    $("#all_plant").empty();
    $("#setting_rows").empty();
    $("#setting_days").empty();
    $("#setting_column").empty();
    $("#setting_cells").empty();
    $("#clone_count").empty();
    $("#flower_count").empty();
    $("#vegetation_count").empty();
    $("#cutweigh_wet_count").empty();
    $("#harvest_drying_count").empty();
    $("#harvest_curing_count").empty();
    $("#monthly_import").empty();
    $("#monthly_export").empty();
    $("#yearly_import").empty();
    $("#yearly_output").empty();
});