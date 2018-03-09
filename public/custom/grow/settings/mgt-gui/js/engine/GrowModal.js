var d = new Date();
var month = d.getMonth()+1;
var day = d.getDate();
var today_val = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day;

$("#add_plant_cancel").click(function(){
    $('#add_modal').plainModal('close');
});
$("#remove_plant_cancel").click(function(){
    $('#remove_modal').plainModal('close');
});
$("#release_plant_cancel").click(function(){
    $('#release_modal').plainModal('close');
});
$("#move_plant_cancel").click(function(){
    $('#move_modal').plainModal('close');
});
$("#addproduct").click(function(){
    window.open("/product/card.php?leftmenu=product&action=create&type=0", 'openwin');
});


function AddPlantDialog( plant , room_id , src_build )
{
    $("#row_val").text( parseInt(plant.r) + 1 );
    $("#col_val").text( parseInt(plant.c) + 1 );
    
    var modal = $('#add_modal').plainModal({duration: 300});
    modal.plainModal('open');
    
        $( "#add_plant_success" ).unbind( "click" );
        $( "#add_plant_success" ).click(function(){
            if( $("#sel_product_id").val() != "" && $("#RFID").val() != "" )
            {
                $.ajax({
                    type: "GET",
                    url: '/custom/grow/class/engine/plantAjax.php',
                    data: {
                        action  : 'add_plant_gui' ,
                        row     : plant.r ,
                        col     : plant.c ,
                        rfid    : $("#RFID").val() ,
                        p_rfid  : $("#P_RFID").val() ,
                        p_id    : $("#sel_product_id").val() ,
                        date    : today_val ,
                        src     : src_build.Room.uid ,
                    } ,
                    success: function(data){
                        if( data == "The rfid is exist" )
                        {
                            $(".plant_gui_dialog" ).text("The rfid number is already exist.");
                            $(".plant_gui_dialog" ).show().delay(2000).fadeOut();
                        }else{
                            $('#add_modal').plainModal('close');
                            var plant = JSON.parse(data);
                            if( plant.length > 0 )
                                src_build.update_plant(plant[0]);
                            $("#RFID").val('');
                            $("#P_RFID").val('');
                            $("#sel_product_id").val('');
                            $("#search_sel_product_id").val('');
                        }
                    }
                });
            }else{
                $(".plant_gui_dialog" ).text("Please insert the product data.");
                $(".plant_gui_dialog" ).show().delay(2000).fadeOut();
            }
        });
    
}

function RemovePlantDialog( plant , room_id , src_build )
{
    var modal = $('#remove_modal').plainModal({duration: 300});
    modal.plainModal('open');

    $( "#remove_plant_success" ).unbind( "click" );
    $( "#remove_plant_success" ).click(function(){
        $.ajax({
			type: "GET",
			url: '/custom/grow/class/engine/plantAjax.php',
			data: {
				action : 'remove_plant_gui' ,
                date   : today_val ,
                rfid   : plant.rfid,
                src    : src_build.Room.uid ,
			} ,
			success: function(data){
                $('#remove_modal').plainModal('close');
                src_build.remove_plant( plant.r , plant.c );
			}
		 });
    });
}

function MovePlantDialog( src_plant , dst_plant , src_build , dst_build )
{
    $("#modal_move_grow").text( $("#area_select option:selected").text() );
    $("#modal_move_src").text( src_build.Room.name );
    $("#modal_move_dst").text( dst_build.Room.name );

    var modal = $('#move_modal').plainModal({duration: 300});
    modal.plainModal('open');
    
    $( "#move_plant_success" ).unbind( "click" );
    $( "#move_plant_success" ).click( function(){
        MovePlantAjaxAction( src_plant , dst_plant , src_build , dst_build );
    });
}

function MovePlantAjaxAction( src_plant , dst_plant , src_build , dst_build )
{
    $.ajax({
        type: "GET",
        url: '/custom/grow/class/engine/plantAjax.php',
        data: {
            action  : 'move_plant_gui' ,
            rfid    : src_plant.rfid,
            date    : today_val ,
            src     : src_build.Room.uid ,
            dst     : dst_build.Room.uid ,
            row     : dst_plant.r ,
            col     : dst_plant.c ,
        } ,
        success: function(plant){
            $('#move_modal').plainModal('close');
            var plant = JSON.parse(plant);
            dst_build.update_plant( plant[0] );
            src_build.remove_plant( src_plant.r , src_plant.c );
        }
    });
}

function ReleasePlantDialog( plant , room_id , src_build )
{
    $("#release_modal_grow").text( $("#area_select option:selected").text() );
    $("#release_modal_room").text( src_build.Room.name );

    var modal = $('#release_modal').plainModal({duration: 300});
    modal.plainModal('open');

    $( "#release_plant_success" ).unbind( "click" );
    $("#release_plant_success").click(function(){
        $.ajax({
			type: "GET",
			url: '/custom/grow/class/engine/plantAjax.php',
			data: {
                action  : 'release_plant_gui' ,
                rfid    : plant.rfid,
                date    : today_val ,
                src     : src_build.Room.uid ,
                dst     : $("#idwarehouse").val() ,
			} ,
			success: function(data){
                $('#release_modal').plainModal('close');
                src_build.remove_plant( plant.r , plant.c );
			}
		 });
    });
}

function UpdatePlantState( src_build , plant , room_id )
{
        $.ajax({
			type: "GET",
			url: '/custom/grow/pages/plant-mgt/ajax-back.php',
			data: {
                mode   : 'update_rfid_state',
                rfid   : plant.rfid,
                state  : plant.state
			} ,
			success: function(data){
                plant.infor.state = data;
                src_build.update_plant( plant );
			}
		 });
}

function ShowRightMenu( plant , src_build , x , y )
{
    $("#contextMenu").empty();
    $("#contextMenu").css({top: y , left: x, position:'absolute'});
    // $("#contextMenu").append("<ul>");
    switch( plant.state )
    {
        case 'clone':
        case 'vegetation':
        case 'flower':
            $("#contextMenu").append("<li id='state_change_item'>State Change</li><li id='release_item'>Release</li><li id='delete_item' class='contextMenu_li_margin_bottom'>Delete</li>");
            break;
        case 'Cutweigh-wet':
            $("#contextMenu").append("<li id='state_change_item'>State Change</li><li id='release_item'>Release</li><li id='delete_item' class='contextMenu_li_margin_bottom'>Delete</li>");
            break;
        case 'harvest-drying':
            $("#contextMenu").append("<li id='state_change_item'>State Change</li><li id='release_item'>Release</li><li id='delete_item' class='contextMenu_li_margin_bottom'>Delete</li>");
            break;
        case 'harvest-curing':
            $("#contextMenu").append("<li id='state_change_item'>State Change</li><li id='release_item'>Release</li><li id='delete_item' class='contextMenu_li_margin_bottom'>Delete</li>");
            break;
        default:
            $("#contextMenu").append("<li id='add_item' class='contextMenu_li_margin_bottom'>Add</li>");
            break;
    }
     

    $("#delete_item").unbind( "click" );
    $("#delete_item").click( function(){
        RemovePlantDialog( plant , src_build.room_id , src_build );
    });

    $("#state_change_item").unbind( "click" );
    $("#state_change_item").click( function(){
        UpdatePlantState( src_build ,  plant , src_build.room_id );
    });

    $("#add_item").unbind( "click" );
    $("#add_item").click( function(){
        AddPlantDialog( plant , src_build.room_id , src_build );
    });

    $("#release_item").unbind( "click" );
    $("#release_item").click( function(){
        ReleasePlantDialog( plant , src_build.room_id , src_build );
    });

    $("#contextMenu").show();

}

$(document).ready(function(){
    $(document).click(function(){
        $("#contextMenu").hide();
    })
})