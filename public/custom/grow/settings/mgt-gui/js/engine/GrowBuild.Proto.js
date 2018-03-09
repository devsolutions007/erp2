$(document).contextmenu(function() {
    return false;
});

GrowBuild.prototype.build_div = function(){
    $( "#"+this.room_id +'_container' ).append('\
        <div id="' + this.room_id + '_top_menu" class="top_header_svg_controller"></div>\
        <div id="' + this.room_id + '_svg"      class="dragscroll dragscroll_view" >\
            <svg version="1.1" baseProfile="full" xmlns="http://www.w3.org/2000/svg"\
                xmlns:xlink="http://www.w3.org/1999/xlink"\
                xmlns:ev="http://www.w3.org/2001/xml-events" id="' + this.room_id + '" width=50000 height=50000 >\
            </svg>\
        </div>\
        <div id="' + this.room_id + '_palete"   class="left_svg_palette left_svg_palette_show_hidden"></div>\
    ');
 
}

GrowBuild.prototype.load_data = function()
{
    var room_uid    = $( "#" + this.room_id + "_select" ).val();
    var room_name   = $( "#" + this.room_id + "_select option:selected").text();
    var option_type = $('option:selected', this).attr('rtype');
    var room_id     = this.room_id;
    var that = this;

    $.ajax({
        type: "GET",
        url: '../../class/engine/roomAjax.php',
        data: {
            action : 'get_room_setting' , 
            room_id : room_uid
        } ,
        success: function(room_setting){
            var room_setting = JSON.parse(room_setting); 
            $.ajax({
                type: "GET",
                url: '../../class/engine/plantAjax.php',
                data: {
                    action : 'get_plant_list' ,
                    room_id : room_uid
                } ,
                success: function(data){
                    $( "#" + room_id ).empty();
                    plantdata = JSON.parse( data );
                    that.init( plantdata , room_setting , 
                            { 	uid  : room_uid , 
                                name : room_name , 
                                type : option_type 
                            } 
                        );
                }
            });
        }
    }); 

}

GrowBuild.prototype.flicker_data = function()
{
    var i , j ;
    for( var key in this.M.R )
        if( this.M.R[key].state )
        {
            var plant = this.M.R[key];
            this.GUI.plant_toggle_flick( plant.hkey );
        }
    var that = this;
    this.flickerTimer = setTimeout(function(){
            that.flicker_data();
    } , 2000);
}

//  if( plant.infor.days >= this.parent.Room.grow_days - 5 )
//  {
//     that = this;

// }

//     setTimeout(function() {
//         that.plant_toggle_flick( plant );
//     }, 2000 );