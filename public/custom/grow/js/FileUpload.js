$(document).ready(function(){

    $(document).click( function(){
        $('#fileupload_menu').hide();
    });
    
    $('#fileupload_event').click( function(event){
        event.stopPropagation();
        $('#fileupload_menu').toggle();
    });

    /////////////////////////////  Start Add Plant Dialog      ////////////////////////////////////////////

    $("#fileupload_add_cancel").click(function(){
        $('#addfile_modal').plainModal('close');
    });

    $("#addfile_modal_detail_data").on('click','.modal_row_delete',function(){
        $(this).parent().remove();
    });

    $("#stock_file_add").change(function(){        
        var data = new FormData();
        data.append( 'file', $( '#stock_file_add' )[0].files[0] );
        $.ajax({
            url: '../../class/engine/plantAjaxFileUpload.php?action=file_upload_add_data_dialog&room_id=' + $("#home_src").val() ,
            // dataType: 'html',
            type: 'POST',
            data: data,
            cache: false,
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data)
            {
                var modal = $('#addfile_modal').plainModal({duration: 300});
                modal.plainModal('open');
                $("#fileupload_menu").css("display", "none");
                $("#addfile_modal_detail_data").html(data);

                $("#fileupload_room_select").val( $( "#home_src option:selected").val() );
            }
        });
    });

    $("#fileupload_room_select").change(function(){        
        var data = new FormData();
        data.append( 'file', $( '#stock_file_add' )[0].files[0] );
        $.ajax({
            url: '../../class/engine/plantAjaxFileUpload.php?action=file_upload_add_data_dialog&room_id=' + $("#fileupload_room_select").val() ,
            // dataType: 'html',
            type: 'POST',
            data: data,
            cache: false,
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data)
            {
                $("#addfile_modal_detail_data").empty();
                $("#addfile_modal_detail_data").html(data);
            }
        });
    });

    $("#fileupload_add_success").unbind( "click" );
    $("#fileupload_add_success").click(function()
    {
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
                        uid     : i ,
                    });
                }
            }

            $.ajax({
                type: "POST",
                url: '../../class/engine/plantAjaxFileUpload.php' ,
                data: {
                    action      : 'fileupload_add_data_check',
                    room_id     : $("#fileupload_room_select").val()  ,
                    data        : add_data
                } ,
                success: function(data){
                    var data = JSON.parse(data);

                    if( data['rfid_check'].length == 0 && data['postion_check'].length == 0 )
                    {
                        $.ajax({
                            type: "POST",
                            url: '../../class/engine/plantAjaxFileUpload.php' ,
                            data: {
                                action      : 'fileupload_add_data',
                                data        : add_data ,
                                room_id     : $("#fileupload_room_select").val(),
                            } ,
                            success: function(data){
                                
                                getSearchResult();
                                $("#modal_dialog_alert_add_data").empty();
                                $("#modal_dialog_alert_add_data").text("Successfully uploaded");
                                $("#modal_dialog_alert_add_data").addClass("modal_dialog_alert_sucess");
                                $("#modal_dialog_alert_add_data" ).show(0).delay(2000).fadeOut().hide(0);
                                setTimeout(function(){
                                    $('#addfile_modal').plainModal('close');
                                    $(".addfile_modal_detail_data").empty();
                                }, 2000);
                                $( "#stock_file_add" ).val("");

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

    //////////////////////////////  End Add Plant Dialog   ///////////////////////////////////////////

    /////////////////////////////////  Start Move Plant Dialog   /////////////////////////////////////////

    $("#fileupload_move_cancel").click(function(){
        $('#movefile_modal').plainModal('close');
    });

    $("#movefile_modal_detail_data").on('click','.modal_row_delete',function(){
        $(this).parent().remove();
    });

    $("#stock_file_move").change(function(){        
        var data = new FormData();
        data.append( 'file', $( '#stock_file_move' )[0].files[0] );
        $.ajax({
            url: '../../class/engine/plantAjaxFileUpload.php?action=file_upload_move_data_dialog&src_room=' + $("#home_src option:selected").val() + '&dst_room=' + $("#move_select_dst").val()  ,
            // dataType: 'html',
            type: 'POST',
            data: data,
            cache: false,
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data)
            {
                var modal = $('#movefile_modal').plainModal({duration: 300});
                modal.plainModal('open');
                $("#fileupload_menu").css("display", "none");
                $("#movefile_modal_detail_data").html(data);
                $( "#stock_file_move" ).val("");

                $("#move_select_src").val( $("#home_src option:selected").val() ); 
                $("#move_select_src").attr("disabled", "disabled");
            }
        });
    });

    $("#fileupload_move_success").click(function()
    {
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
                url: '../../class/engine/plantAjaxFileUpload.php' ,
                data: {
                    action      : 'fileupload_move_data',
                    data        :  add_data ,
                    src         : $("#move_select_src").val() ,
                    dst         : $("#move_select_dst").val() ,
                } ,
                success: function(data){
                   getSearchResult();
                    $("#modal_dialog_alert_move_data").text("Move the plants.");
                    $("#modal_dialog_alert_move_data").addClass("modal_dialog_alert_sucess");
                    $("#modal_dialog_alert_move_data" ).show(0).delay(1500).fadeOut().hide(0);
                    setTimeout(function(){
                        $('#movefile_modal').plainModal('close');
                        $(".movefile_modal_detail_data").empty();
                    }, 1500);
                }
            });
        }else{
            $("#modal_dialog_alert_move_data").empty();
            $("#modal_dialog_alert_move_data").text("Select other DST Room.");
            $("#modal_dialog_alert_move_data").addClass("modal_dialog_alert_error");
            $("#modal_dialog_alert_move_data" ).show(0).delay(2000).fadeOut().hide(0);
        }

    });

    /////////////////////////////////  End Move Plant Dialog   /////////////////////////////////////////

    /////////////////////////////////  Start Remove Plant Dialog   /////////////////////////////////////////

    $("#fileupload_remove_cancel").click(function(){
        $('#removefile_modal').plainModal('close');
    });

    $("#removefile_modal_detail_data").on('click','.modal_row_delete',function(){
        $(this).parent().remove();
    });

    $("#stock_file_remove").change(function(){        
        var data = new FormData();
        data.append( 'file', $( '#stock_file_remove' )[0].files[0] );
        $.ajax({
            url: '../../class/engine/plantAjaxFileUpload.php?action=file_upload_remove_data_dialog' ,
            // dataType: 'html',
            type: 'POST',
            data: data,
            cache: false,
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data)
            {
                var modal = $('#removefile_modal').plainModal({duration: 300});
                modal.plainModal('open');
                $("#fileupload_menu").css("display", "none");
                $("#removefile_modal_detail_data").html(data);

                $( "#stock_file_remove" ).val("");
            }
        });
    });

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
            url: '../../class/engine/plantAjaxFileUpload.php' ,
            data: {
                action      : 'fileupload_remove_data',
                data        :  add_data ,
            } ,
            success: function(data){
               getSearchResult();
                $("#modal_dialog_alert_remove_data").text("Delete the plant data.");
                $("#modal_dialog_alert_remove_data").addClass("modal_dialog_alert_sucess");
                $("#modal_dialog_alert_remove_data" ).show(0).delay(1500).fadeOut().hide(0);
                setTimeout(function(){
                    $('#removefile_modal').plainModal('close');
                    $(".removefile_modal_detail_data").empty();
                }, 1500);
            }
        });

    });

    /////////////////////////////////  End Remove Plant Dialog   /////////////////////////////////////////

    /////////////////////////////////  Start Release Plant Dialog   /////////////////////////////////////////

    $("#fileupload_release_cancel").click(function(){
        $('#releasefile_modal').plainModal('close');
    });

    $("#releasefile_modal_detail_data").on('click','.modal_row_delete',function(){
        $(this).parent().remove();
    });

    $("#stock_file_release").change(function(){        
        var data = new FormData();
        data.append( 'file', $( '#stock_file_release' )[0].files[0] );
        $.ajax({
            url: '../../class/engine/plantAjaxFileUpload.php?action=file_upload_release_data_dialog' ,
            // dataType: 'html',
            type: 'POST',
            data: data,
            cache: false,
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data)
            {
                var modal = $('#releasefile_modal').plainModal({duration: 300});
                modal.plainModal('open');
                $("#fileupload_menu").css("display", "none");
                $("#releasefile_modal_detail_data").html(data);

                $( "#stock_file_release" ).val("");
            }
        });
    });

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
                dst     : $( "#release_stock_plant" ).val() ,
            });
            }
        }

        $.ajax({
            type: "POST",
            url: '../../class/engine/plantAjaxFileUpload.php' ,
            data: {
                action      : 'fileupload_release_data',
                data        :  add_data ,
            } ,
            success: function(data){
               getSearchResult();
                $("#modal_dialog_alert_release_data").text("Release plant data.");
                $("#modal_dialog_alert_release_data").addClass("modal_dialog_alert_sucess");
                $("#modal_dialog_alert_release_data" ).show(0).delay(1500).fadeOut().hide(0);
                setTimeout(function(){
                    $('#releasefile_modal').plainModal('close');
                    $(".releasefile_modal_detail_data").empty();
                }, 1500);
            }
        });

    });

    /////////////////////////////////  End Release Plant Dialog   /////////////////////////////////////////

    /////////////////////////////////  Start State Change Plant Dialog   /////////////////////////////////////////

    $("#fileupload_state_cancel").click(function(){
        $('#statefile_modal').plainModal('close');
    });

    $("#statefile_modal_detail_data").on('click','.modal_row_delete',function(){
        $(this).parent().remove();
    });

    $("#stock_file_state").change(function(){        
        var data = new FormData();
        data.append( 'file', $( '#stock_file_state' )[0].files[0] );
        $.ajax({
            url: '../../class/engine/plantAjaxFileUpload.php?action=file_upload_state_data_dialog' ,
            // dataType: 'html',
            type: 'POST',
            data: data,
            cache: false,
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data)
            {
                var modal = $('#statefile_modal').plainModal({duration: 300});
                modal.plainModal('open');
                $("#fileupload_menu").css("display", "none");
                $("#statefile_modal_detail_data").html(data);

                $( "#stock_file_state" ).val("");
            }
        });
    });

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
            url: '../../class/engine/plantAjaxFileUpload.php' ,
            data: {
                action      : 'fileupload_state_data',
                data        :  add_data ,
            } ,
            success: function(data){
               getSearchResult();
                $("#modal_dialog_alert_state_data").text("Update plant state.");
                $("#modal_dialog_alert_state_data").addClass("modal_dialog_alert_sucess");
                $("#modal_dialog_alert_state_data" ).show(0).delay(1500).fadeOut().hide(0);
                setTimeout(function(){
                    $('#statefile_modal').plainModal('close');
                    $(".statefile_modal_detail_data").empty();
                }, 1500);
            }
        });

    });

    /////////////////////////////////  End State Change Plant Dialog   /////////////////////////////////////////

});

// $("input").change(function(){
//     var isValid = true ;console.log("aaa");
//     for( i = 0 ; i < $("#totalview").val() ; i++ )
//     {
//         $( "#sel_product_id" + i ).each(function() {
//             var element = $(this);
//             if (element.val() == "") {
//                 isValid = false;
//             }
//          });
//     }
//     if( isValid == true ) $("#fileupload_add_success").removeAttr("disabled");
// });

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