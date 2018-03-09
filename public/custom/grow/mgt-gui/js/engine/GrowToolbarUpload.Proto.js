GrowToolbar.prototype.setUploadHandler = function()
{
    ///////////////////// Add Event /////////////////////////////
    var room_id = this.room_id;
    $("#"+ room_id + "_file_add").change(function(){        
        var data = new FormData();
        data.append( 'file', $( "#"+ room_id + "_file_add" )[0].files[0] );
        $.ajax({
            url: '../../class/engine/plantAjaxFileUpload.php?action=file_upload_add_data_dialog&room_id=' + $("#" + room_id + "_select").val() ,
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
                $('#' + room_id + 'fileupload_menu').css("display", "none");
                $("#addfile_modal_detail_data").html(data);

                $( "#"+ room_id + "_file_add" ).val("");
                $("#fileupload_add_success").attr("disabled", "disabled");
                
                setFileUploadButtonForAddActionEventHander( room_id );
            }
        });
    });

    
    // ///////////////////////////////////////////////////////////////

    ////////////////// Move event /////////////////////////////////
    $("#"+ room_id + "_file_move").change(function(){        
        var data = new FormData();
        data.append( 'file', $( "#"+ room_id + "_file_move" )[0].files[0] );
        $.ajax({
            url: '../../class/engine/plantAjaxFileUpload.php?action=file_upload_move_data_dialog&src_room=' + $( "#" + room_id + "_select option:selected").val() + '&dst_room=' + $("#move_select_dst").val()  ,
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
                $('#' + room_id + 'fileupload_menu').css("display", "none");
                $("#movefile_modal_detail_data").html(data);

                $( "#"+ room_id + "_file_move" ).val("");
                setFileUploadButtonForMoveActionEventHander( room_id );
            }
        });
    });

    // ////////////////////////////////////////////////////////////

    // ///////////////////////////// ReMove event ///////////////
    $("#"+ room_id + "_file_remove").change(function(){          
        var data = new FormData();
        data.append( 'file', $( "#"+ room_id + "_file_remove" )[0].files[0] );
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
                $('#' + room_id + 'fileupload_menu').css("display", "none");
                $("#removefile_modal_detail_data").html(data);

                $( "#"+ room_id + "_file_remove" ).val("");
                setFileUploadButtonForRemoveActionEventHander( room_id );
            }
        });
    });

    // /////////////////////////////////////////////////////////////

    // ///////////////////////////// Release event ///////////////
    $("#"+ room_id + "_file_release").change(function(){     
        var data = new FormData();
        data.append( 'file', $( "#"+ room_id + "_file_release" )[0].files[0] );
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
                $('#' + room_id + 'fileupload_menu').css("display", "none");
                $("#releasefile_modal_detail_data").html(data);

                $( "#"+ room_id + "_file_release" ).val("");
                setFileUploadButtonForReleaseActionEventHander( room_id );
            }
        });
    });
    // /////////////////////////////////////////////////////////////

    // //////////////////// State change event ////////////////////
    $("#"+ room_id + "_file_state").change(function(){     
        var data = new FormData();
        data.append( 'file', $( "#"+ room_id + "_file_state" )[0].files[0] );
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
                $('#' + room_id + 'fileupload_menu').css("display", "none");
                $("#statefile_modal_detail_data").html(data);

                $( "#"+ room_id + "_file_state" ).val("");
                setFileUploadButtonForStateActionEventHander( room_id );
            }
        });
    });

    // /////////////////////////////////////////////////////////////

}
 