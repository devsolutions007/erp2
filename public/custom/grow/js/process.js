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
            getSearchResult();
        }
    });
}


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
        }
    });
}
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
    }
});

// add grow plant
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
                }else{
                    getSearchResult();
                    $('#addPlantModal').modal('hide');
                }
            }
        });
    } else {
        $(".error-message" ).show().text("Please insert the product data.");
        $(".error-message" ).show().delay(2000).fadeOut();
    }

}

// move grow 

$("#move_grow").click( function() {
    $("#modal_move_src").val($("#growArea").find('option:selected').text());
    $("#modal_home_src").val($("#growRooms").find('option:selected').text());
    var check_count = $("[type='checkbox']:checked").length;
    $("#modal_checklist_count").val(check_count);
    $('#bulkMoveModal').modal('show');
});

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
        success: function(data){
            getSearchResult();
        }
    });

}

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
        }
    });

}

// remove grow table row
$("#remove_grow").click( function() {
    if( !confirm("Do you want to remove the plants?") )
        return;
    remove_plant_update();
});

function remove_plant_update(){
    var checkboxValues = [];
    var add_data = new Array();

    $('input.checkboxfordelete:checked').map(function() {
        add_data.push({
            RFID    : $(this).val() ,
            src     : $("#growRooms").val() ,
        });
    });
    
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
            alert("Removed Succesfully");
        }
    });

}

// File Upload events

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
        },
        error: function(xhr, textStatus, error){
          alert('File could not be accepted ! Please upload any "*.txt" file');
      }
    });
});
// delete  row from modal
$("#addfile_modal_detail_data").on('click','.modal_row_delete',function(){
    $(this).parent().remove();
});

// change state in modal
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