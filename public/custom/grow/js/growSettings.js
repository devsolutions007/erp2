/* Room Setting JS start */

var pubPath = '/grow/settings/roomAjax';
$("#area_select").change(function(){
    $.ajax({
            type: "POST",
            url: pubPath,
            data: {
                action : 'get_room_list' ,
                area_id : $("#area_select").val()
            } ,
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
            success: function(data){
                $("#left_room_select" ).html( data );
                $("#left_room_select" ).trigger('change');
            }
    });
});
$("#area_select" ).trigger('change');

previewroom();

// change select room value  

$("#left_room_select" ).change( function(){

    $.ajax({
        type: "POST",
        url: pubPath,
        data: {
            action : 'get_room_setting' , 
            room_id : $("#left_room_select").val()
        } ,
        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
        success: function( data ){
            var room_setting = JSON.parse(data);
            previewroom();
            $("#room_rows").val( room_setting.rows );
            $("#room_grow_day").val( room_setting.grow_days );
            $("#room_alarm_days").val( room_setting.alarm_days );
            $("#room_cols").val( room_setting.columns );
            $("#room_offsetX").val( room_setting.offsetX );
            $("#room_offsetY").val( room_setting.offsetY );
            $("#room_cols_per").val( room_setting.col_per_block );
            $("#room_hgap").val( room_setting.room_hgap );
            $("#room_rows_per").val( room_setting.row_per_block );
            $("#room_wgap").val( room_setting.room_wgap );
            $("#room_cell_height").val( room_setting.cell_height );
            $("#room_cell_width").val( room_setting.cell_width );
        }
    });

});

// end change room value

// save room settings

$("#save_setting").click(function(){
    $.ajax({
        type: "POST",
        url: pubPath,
        data: {
            action                  : 'update_room_setting' ,
            room_id                 : $("#left_room_select").val() ,
            rows                    : $("#room_rows").val() ,
            grow_days               : $("#room_grow_day").val() ,
            alarm_days              : $("#room_alarm_days").val() ,
            columns                 : $("#room_cols").val() ,
            offsetX                 : $("#room_offsetX").val() ,
            offsetY                 : $("#room_offsetY").val() ,
            col_per_block           : $("#room_cols_per").val() ,
            room_hgap               : $("#room_hgap").val() ,
            row_per_block           : $("#room_rows_per").val() ,
            room_wgap               : $("#room_wgap").val() ,
            cell_height             : $("#room_cell_height").val() ,
            cell_width              : $("#room_cell_width").val() 
        } ,
        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
        success: function(data){
            previewroom();
            swal('Congrats','Settings Saved Successfully.', 'success');
        }
    });
});

// end room setting

// preview room settings

function previewroom()
{
    var option_type = $('option:selected', this).attr('rtype');

    $.ajax({
        type: "GET",
        url:  '/grow/getroomAjax',
        data: {
            action : 'get_room_setting' , 
            room_id : $("#left_room_select").val()
        } ,
        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
        success: function(room_setting){
            var room_setting = JSON.parse(room_setting);
            $.ajax({
                type: "GET",
                url: '/grow/getplantAjax',
                data: {
                    action : 'get_plant_list' ,
                    room_id : $("#left_room_select").val(),
                } ,
                headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
                success: function(data){
                    //var plantdata = JSON.parse(data);
                    var plantdata = data;
                    $("#left_room").empty();
                    var LeftGroup  = new GrowBuild( "left_room" );
                    LeftGroup.init( plantdata , room_setting , { uid : $("#left_room_select").val() , name : $("#left_room_select option:selected").text() , type : option_type } );
                }
            });
        }
    });
}

// end preview room settings