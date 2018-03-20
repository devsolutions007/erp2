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
    // if( $("#growRooms").val() == "all" )
    //     $('.searchfilter_btn').attr("disabled","disabled");
    // else
    //     roomtype_check();
});

$('#searchBtnGrow').click( function() {
    getSearchResult();
});

function getRoomList() {
    $.ajax({
        type: "POST",
        url: '/mukesh/erp2-test/public/grow/roomAjax',
        data: {
            action : 'getRoomList' ,
            area_id : $("#growArea").val() ,
            select_val : $("#growRooms").val() ,
            allset : 1
        } ,
        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
        success: function(data){
            $("#growRooms" ).html( data );
            getSearchResult();
        }
    });
}


function getSearchResult()
{
    $.ajax({
        type: "POST",
        url: '/mukesh/erp2-test/public/grow/ajaxSearchGrowTable',
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
        url: '/mukesh/erp2-test/public/grow/roomAjax',
        data: {
            action : 'get_next_room_list' ,
            room_id : $("#growRooms").val()
        } ,
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

$("#addnew_grow").click( function() {
    $("#modal_add_src").val($("#growArea").find('option:selected').text() + " - " + $("#growRooms").find('option:selected').text());
    $('#addPlantModal').modal('show');
});

// product name list
$( ".productNameList" ).autocomplete({
    source: '/mukesh/erp2-test/public/product/productNameList',
    autoFocus:true,
    minLength:2,
    select: function(event,ui) {
        $('.productNameList').val(ui.item.value);
    }
});