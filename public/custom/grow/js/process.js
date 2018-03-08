var pubPath = '../../class/engine/roomAjax.php';

function make_room_selectbox(){
    $.ajax({
        type: "POST",
        url: pubPath,
        data: {
            action : 'get_room_list' ,
            area_id : $("#area_select").val() ,
            select_val : $("#select_room").val() ,
            allset : 1
        } ,
        success: function(data){
            $("#home_src" ).html( data );
            $("#home_dst_val" ).html( data );
            $("#fileupload_room_select" ).html( data );
            $("#move_select_src" ).html( data );
            getSearchResult();
        }
    });
}

function roomtype_check(){
    $('.searchfilter_btn').removeAttr("disabled");     
    $.ajax({
        type: "POST",
        url: pubPath,
        data: {
            action : 'get_next_room_list' ,
            room_id : $("#home_src").val()
        } ,
        success: function(data){
            // $('#home_dst_val').html(data);
            $('#move_select_dst').html(data);
            var element = $("#home_src" ).find('option:selected'); 
            var option_type = element.attr("rtype"); 
            // console.log(option_type);
            // if(option_type != "5")
            //     $('.searchfilter_release_btn').attr("disabled","disabled");
            // else
            //     $('.searchfilter_move_btn').attr("disabled","disabled");
        }
    });
}

function getSearchResult()
{
    $.ajax({
        type: "POST",
        url: 'ajax-back.php',
        data: {
            mode        : 'search_result',
            RFID        : $("#RFID").val() ,
            room_time   : $("#room_time").val() ,
            grow_id     : $("#area_select").val()  ,
            room_id     : $("#home_src").val() ,
        } ,
        success: function(data){
            $("#search_table_body").html( data );
        }
    });
}

function change_state( rfid  , this_tr )
{
    $.ajax({
        type: "POST",
        url: 'ajax-back.php',
        data: {
            mode    : 'update_rfid_state',
            rfid    : rfid ,
            state   : $(this_tr).html() ,
        } ,
        success: function(data){
            $(this_tr).html( data );
        }
    });
}