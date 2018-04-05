/* area select */

$("#checkallactions").click(function() {
    if($(this).is(':checked')){
        $(".checkboxfordelete").prop('checked', true);
    }
    else
    {
        $(".checkboxfordelete").prop('checked', false);
    }
});

getRoomList();

$('#growArea').change( function() {
    getRoomList();
});

$("#growRooms").change( function() {
    getSearchResult();
    if( $("#growRooms").val() == "all" )
        $('.searchfilter_btn').attr("disabled","disabled");
    else
        roomtype_check();
});

$('#searchBtnGrow').click( function() {
    getSearchResult();
});

function getRoomList() {
    $.ajax({
        type: "POST",
        url: '/grow/roomAjax',
        data: {
            action : 'getRoomList' ,
            area_id : $("#growArea").val() ,
            select_val : $("#growRooms").val() ,
            allset : 1
        } ,
        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
        success: function(data){
            $("#growRooms" ).html( data );
            $('#home_dst_val').html( data);
            $('#move_select_dst').html(data);
            getSearchResult();
        }
    });
}

// search grow table data

function getSearchResult()
{
    $.ajax({
        type: "POST",
        url: '/grow/ajaxSearchGrowTable',
        data: {
            mode        : 'searchResults',
            metric_id   : $("#metricId").val() ,
            room_time   : $("#roomTime").val() ,
            grow_id     : $("#growArea").val()  ,
            room_id     : $("#growRooms").val() ,
        } ,
        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
        success: function(data){
            $("#search_table_body").html( data );
            //$('#datatableInitialize').ajax.reload();
        }
    });
}
// End search grow table data

// start change grow state in table data
// change state of grow  modal
function change_state_table( rfid, element )
{
    $.ajax({
        type: "POST",
        url: '/grow/ajaxSearchGrowTable',
        data: {
            mode        : 'change_state_table',
            rfid        : rfid,
            state       : $(element).html()
        } ,
        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
        success: function(data){ 
            $(element).html(data);
        }
    });    
}
// end change state of grow modal

//End  change state in table data 
function roomtype_check(){
    $('.searchfilter_btn').removeAttr("disabled");     
    $.ajax({
        type: "POST",
        url: '/grow/roomAjax',
        data: {
            action : 'get_next_room_list' ,
            room_id : $("#growRooms").val()
        } ,
        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
        success: function(data){
            // $('#home_dst_val').html(data);
            $('#move_select_dst').html(data);
            var element = $("#growRooms" ).find('option:selected'); 
            var option_type = element.attr("rtype"); 
            // console.log(option_type);
            // if(option_type != "5")
            //     $('.searchfilter_release_btn').attr("disabled","disabled");
            // else
            //     $('.searchfilter_move_btn').attr("disabled","disabled");
        }
    });
}

// product name list
$( ".productNameList" ).autocomplete({
    source: '/product/productNameList',
    autoFocus:true,
    minLength:2,
    select: function(event,ui) {
        $('.productNameList').val(ui.item.value);
        $('#sel_product_id').val(ui.item.id);
        $('.productId').val(ui.item.id);
    }
});

// Add grow plant modal

var ajaxRequestGrowModalRoute = '/grow/ajaxRequestGrowModal'; 

$("#addnew_grow").click( function() {
    $("#modal_add_src").val($("#growArea").find('option:selected').text() + " - " + $("#growRooms").find('option:selected').text());
    $('#addPlantModal').modal('show');
});

$("#bulk_add_grow").click(function(){
    add_plant_update(); 
});


function add_plant_update(){

    if( $("#sel_product_id").val() != "" && $("#rfid").val() != "" )
    {
        $.ajax({
            type: "POST",
            url: ajaxRequestGrowModalRoute,
            data: {
                mode        : 'add_plant',
                date        : $("#fiscalyear").val(),
                src         : $("#growRooms").val(),
                p_id        : $("#sel_product_id").val() ,
                rfid        : $("#rfid").val(),
                p_rfid      : $("#p_rfid").val(),
                rol         : $("#row_val").val(),
                col         : $("#col_val").val(),
            } ,
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
            success: function(data){
                if( data == "The rfid is exist" )
                {
                    $(".error-message" ).show().text("Metric Id is already exist.");
                    $(".error-message" ).show().delay(2000).fadeOut();

                } else {
                    $("#growRooms").val('');
                    $("#sel_product_id").val('');
                    $("#rfid").val('');
                    $("#p_rfid").val('');
                    $("#row_val").val('');
                    $("#col_val").val('');
                    $("#addPlantProduct").val('');
                    $('#addPlantModal').modal('hide');
                    getSearchResult();
                    swal("Congrats", "Plant added successfully", "success");

                }
            }
        });
    } else {
        $(".error-message" ).show().text("Please insert the product data.");
        $(".error-message" ).show().delay(2000).fadeOut();
    }

}
// end add grow plant modal

// move grow plant modal

$("#move_grow").click( function() {
    $("#modal_move_src").val($("#growArea").find('option:selected').text());
    $("#modal_home_src").val($("#growRooms").find('option:selected').text());
    var check_count = $("[type='checkbox']:checked").length;
    $("#modal_checklist_count").val(check_count);
    $('#bulkMoveModal').modal('show');
});
// end move grow plant modal

// bulk move plant modal
$("#bulk_move_grow").click( function() {
    move_plant_update(); 
    $('#bulkMoveModal').modal('hide');
});

function move_plant_update(){
    var checkboxValues = [];
    $('input.checkboxfordelete:checked').map(function() {
        checkboxValues.push($(this).val());
    });
    // var element = $("#home_dst_val" ).find('option:selected'); 
    var option_type = $("#home_dst_val option:selected" ).attr("rtype");
    
    $.ajax({
        type: "POST",
        url: ajaxRequestGrowModalRoute,
        data: {
            mode    : 'move_plant',
            RFID    : checkboxValues,
            src     : $("#growRooms").val() ,
            state   : option_type ,
            dst     : $("#home_dst_val").val(),
            date    : $("#movegrowfiscalyear").val(),
        } ,
        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
        success: function(data) {
            $("#movegrowfiscalyear").val('');
            $("#home_dst_val").val('all');
            getSearchResult();
            swal("Congrats", "Plant moved successfully", "success");
        }
    });

}
// end bulk move plant modal
// release grow modal 
$("#release_grow").click( function() {
    $("#modal_release_src").val($("#growArea").find('option:selected').text() + " - " + $("#growRooms").find('option:selected').text());
    var check_count = $("[type='checkbox']:checked").length;
    $("#modal_checklist_count_rel").val(check_count);
    $('#bulkReleaseModal').modal('show');
});

$("#bulk_release_grow").click( function() {
    release_plant_update(); 
    $('#bulkReleaseModal').modal('hide');
});

function release_plant_update(){
    var checkboxValues = [];
    $('input.checkboxfordelete:checked').map(function() {
        checkboxValues.push($(this).val());
    });
    
    $.ajax({
        type: "POST",
        url: ajaxRequestGrowModalRoute,
        data: {
            mode        : 'release_plant',
            RFID        : checkboxValues,
            src         : $("#growRooms").val() ,
            date        : $("#releasefiscalyear").val(),
            fl_weight   : $("#fl_weight").val() ,
            wa_weight   : $("#wa_weight").val(),
            dst         : $("#idwarehouse").val()
        } ,
        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
        success: function(data){
            getSearchResult();
            swal("Congrats", "Plant Released successfully", "success");
        }
    });

}
// end release grow modal 

// remove grow table row
$("#remove_grow").click( function() {
    var checkboxValues = [];
    var add_data = new Array();

    $('input.checkboxfordelete:checked').map(function() {
        add_data.push({
            RFID    : $(this).val() ,
            src     : $("#growRooms").val() ,
        });
    });
    if(add_data.length > 0 ) {
        swal({
          title: "Are you sure?",
          text: "You want to remove</b>.",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false,
          html: true
        },
        function(){
            $.ajax({
                type: "POST",
                url: ajaxRequestGrowModalRoute,
                data: {
                    mode      : 'remove_plant',
                    data      :  add_data ,
                } ,
                headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
                success: function(data){
                    getSearchResult();
                    swal("Congrats", " Deleted successfully.", "success");
                }
            });
       });
    } else {
        swal("Error", "Please check the checbox which you want to delete", "error");
    }        
});

// File Upload events

// change state of grow  modal
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
// end change state of grow modal

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

// end auto complete  product name


// start  delete  row from modal
$("#addfile_modal_detail_data").on('click','.modal_row_delete',function(){
    $(this).parent().remove();
});
// end delete row from modal

// Start Add  plant file upload Dialog
$("#stock_file_add").change(function(){        
    var data = new FormData();
    data.append( 'file', $( '#stock_file_add' )[0].files[0] );
    $.ajax({
        url: '/grow/plantAjaxFileUpload?action=file_upload_add_data_dialog&room_id=' + $("#growRooms").val() ,
        // dataType: 'html',
        type: 'POST',
        data: data,
        cache: false,
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
        success: function(data)
        {
            $('#addPlantUploadModal').modal('show');
            $("#addfile_modal_detail_data").html(data);
            $("#fileupload_room_select").val( $( "#growRooms option:selected").val() );
            var totalView = $('#totalview').val();
            addAutoCompleteToStrain(totalView)
        },
        error: function(xhr, textStatus, error){
          alert('File could not be accepted ! Please upload any "*.txt" file');
      }
    });
});



// file upload change room value event

$("#fileupload_room_select").change(function(){        
    var data = new FormData();
    data.append( 'file', $( '#stock_file_add' )[0].files[0] );
    $.ajax({
        url: '/grow/plantAjaxFileUpload?action=file_upload_add_data_dialog&room_id=' + $("#fileupload_room_select").val() ,
        // dataType: 'html',
        type: 'POST',
        data: data,
        cache: false,
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
        success: function(data)
        {
            $("#addfile_modal_detail_data").empty();
            $("#addfile_modal_detail_data").html(data);
            var totalView = $('#totalview').val();
            addAutoCompleteToStrain(totalView); 
        }
    });
});

// add plant file upload save event

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
                        parent  : $( "#modal_parent_rfid"         + i ).val(),
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
                                
                                getSearchResult();
                                $("#modal_dialog_alert_add_data").empty();
                                swal("Congrats", "Plant added successfully.", "success");
                                $('#addPlantUploadModal').modal('hide');
                                $(".addfile_modal_detail_data").empty();
                                $( "#stock_file_add" ).val("");

                            }
                        });
                    } else {
                        for (i = 0; i < data['rfid_check'].length; i++) {
                                $('.modal_dialog_error_text_p').show();
                                $("#fileupload_modal_rfid_warning_add" + data['rfid_check'][i]).text("Active tag");
                        }

                        for (i = 0; i < data['postion_check'].length; i++) {
                                $('.modal_dialog_error_text_p').show();
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

 //// //////////////////////////  End Add Plant Dialog   ///////////////////////////////////////////

// End Add Plant File Upload Dialog

//Start Move Plant File upload Dialog 


$("#movefile_modal_detail_data").on('click','.modal_row_delete',function(){
    $(this).parent().remove();
});

$("#stock_file_move").change(function(){
    if($("#growRooms").val() != 'all')  {

        var data = new FormData();
        data.append( 'file', $( '#stock_file_move' )[0].files[0] );
        $.ajax({
            url: '/grow/plantAjaxFileUpload?action=file_upload_move_data_dialog&src_room=' + $("#growRooms option:selected").val() + '&dst_room=' + $("#move_select_dst").val()  ,
            // dataType: 'html',
            type: 'POST',
            data: data,
            cache: false,
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
            success: function(data)
            {
                $('#movefile_modal').modal('show');
                $("#movefile_modal_detail_data").html(data);
                $( "#stock_file_move" ).val("");

                $("#move_select_src").val( $("#growRooms option:selected").text() ); 
                $("#move_select_src").attr("disabled", "disabled");
            }
        });
    } else {
        swal("Alert", "Please select a room from selectbox where you want to move plant.", "warning");
    }    
});


$("#fileupload_move_success").click(function()
{
var add_data = new Array();
$("#modal_dialog_alert_move_data").removeClass("modal_dialog_alert_error");
$("#modal_dialog_alert_move_data").removeClass("modal_dialog_alert_sucess");

if( $("#move_select_src").val() != $("#move_select_dst option:selected").text() )
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
            getSearchResult();
            swal("Congrats", "Plants moved successfully.", "success");
            $('#movefile_modal').modal('hide');
            $(".movefile_modal_detail_data").empty();
        }
    });
} else {
    $("#modal_dialog_alert_move_data").empty();
    $("#modal_dialog_alert_move_data").text("Select other DST Room.");
    $("#modal_dialog_alert_move_data").addClass("modal_dialog_alert_error");
    $("#modal_dialog_alert_move_data" ).show(0).delay(2000).fadeOut().hide(0);
}

});

//End Move Plant File Upload Dialog

//Start Release Plant File Upload Dialog  
$("#releasefile_modal_detail_data").on('click','.modal_row_delete',function(){
    $(this).parent().remove();
});

$("#stock_file_release").change(function(){        
    var data = new FormData();
    data.append( 'file', $( '#stock_file_release' )[0].files[0] );
    $.ajax({
        url: '/grow/plantAjaxFileUpload?action=file_upload_release_data_dialog' ,
        // dataType: 'html',
        type: 'POST',
        data: data,
        cache: false,
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
        success: function(data)
        {
            $('#releasefile_modal').modal('show');
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
        url: '/grow/plantAjaxFileUpload' ,
        data: {
            action      : 'fileupload_release_data',
            data        :  add_data ,
        } ,
        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
        success: function(data){
            getSearchResult();
            swal("Congrats", "Plants released successfully.", "success");
            $('#releasefile_modal').modal('hide');
            $("#releasefile_modal_detail_data").empty();
        }
    });

});
//End Release Plant File Upload Dialog 

//Start Remove Plant Dialog  


$("#removefile_modal_detail_data").on('click','.modal_row_delete',function(){
    $(this).parent().remove();
});

$("#stock_file_remove").change(function(){        
    var data = new FormData();
    data.append( 'file', $( '#stock_file_remove' )[0].files[0] );
    $.ajax({
        url: '/grow/plantAjaxFileUpload?action=file_upload_remove_data_dialog' ,
        // dataType: 'html',
        type: 'POST',
        data: data,
        cache: false,
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
        success: function(data)
        {
            $('#removefile_modal').modal('show');
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
        url: '/grow/plantAjaxFileUpload' ,
        data: {
            action      : 'fileupload_remove_data',
            data        :  add_data ,
        } ,
        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
        success: function(data){
            getSearchResult();
            swal("Congrats", "Plant deleted succeesfully.", "success");
            $('#removefile_modal').modal('hide');
            $(".removefile_modal_detail_data").empty();
        }
    });

});

//End Remove Plant Dialog  

//Start State Change Plant Dialog

$("#statefile_modal_detail_data").on('click','.modal_row_delete',function(){
    $(this).parent().remove();
});

$("#stock_file_state").change(function(){        
    var data = new FormData();
    data.append( 'file', $( '#stock_file_state' )[0].files[0] );
    $.ajax({
        url: '/grow/plantAjaxFileUpload?action=file_upload_state_data_dialog' ,
        // dataType: 'html',
        type: 'POST',
        data: data,
        cache: false,
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
        success: function(data)
        {
            $('#statefile_modal').modal('show');
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
        url: '/grow/plantAjaxFileUpload' ,
        data: {
            action      : 'fileupload_state_data',
            data        :  add_data ,
        } ,
        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
        success: function(data){
            getSearchResult();
            swal("Congrats", "Plants state updated succeesfully.", "success");
            $('#statefile_modal').modal('hide');
            $(".statefile_modal_detail_data").empty();
        }
    });

});

//End State Change Plant Dialog

/* Grow Area  Edit modal start */

function showEditGrowModal( name, type, licenceNumber, id) {
    $('#editGrowAreaModal').modal('show');
    $('#editName').val(name);
    $('#editGrowAreaId').val(id)
    $('#editLicenceNumber').val(licenceNumber);
}

/* Grow Area  Edit modal end */

/* Grow Area Remove */
function removeGrowArea( id, name ) {
    swal({
      title: "Are you sure?",
      text: "You want to delete Grow Area <b>"+name+"</b>.",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false,
      html: true
    },
    function(){
        $.ajax({
            url: "/grow/growAreaAjax",
            type: "post",
            cache: false,
            data: {"action": 'remove_grow_area', "id": id },
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
            success: function(result) {
                if ( result == 'success' ) {
                    $( '#growAreaRow'+id ).remove();
                    swal("Deleted!", "Grow Area has been deleted successfully.", "success"); 
                }
                else {
                    swal("Something Went Wrong!!!");
                }
            }
        });
    });
}
/* end*/

/* Growing Remove */
function removeGrowing( id, name, key ) {
    swal({
      title: "Are you sure?",
      text: "You want to delete Growing  <b>"+name+"</b>.",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false,
      html: true
    },
    function(){
        $.ajax({
            url: "/grow/growingAjax",
            type: "post",
            cache: false,
            data: {"action": 'remove_growing', "id": id },
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
            success: function(result) {
                if ( result == 'success' ) {
                    $( '#growingRow'+key ).remove();
                    swal("Deleted!", "Grow Area has been deleted successfully.", "success"); 
                }
                else {
                    swal("Something Went Wrong!!!");
                }
            }
        });
    });
}
/* end*/

