
GrowToolbar.prototype.build_toolbar = function()
{
    
    $( "#" + this.room_id + "_top_menu" ).append('\
            <div class="plant_gui_room_select">\
                <select class="room_select_option_box" id="' + this.room_id + '_select" name="' + this.room_id + '_select" style="width:100%">\
                </select>\
            </div>\
            <a><img src="custom/grow/mgt-gui/img/button3.png" id="room_information_' + this.room_id + '" /></a>\
            <a><img src="custom/grow/mgt-gui/img/button4.png" id="file_upload_menu_img_' + this.room_id + '" />\
                <div id="' + this.room_id + 'fileupload_menu" class="fileupload_menu">\
                    <li>\
                        <label for="' + this.room_id + '_file_add" class="img_cursor_show add_file_label">\
                            Add file\
                        </label>\
                        <input type="file" name="file" id="' + this.room_id + '_file_add"/>\
                    </li>\
                    <li>\
                        <label for="' + this.room_id + '_file_move" class="img_cursor_show move_file_label">\
                            Move file\
                        </label>\
                        <input type="file" name="file" id="' + this.room_id + '_file_move"/>\
                    </li>\
                    <li>\
                        <label for="' + this.room_id + '_file_release" class="img_cursor_show">\
                            Release file\
                        </label>\
                        <input type="file" name="file" id="' + this.room_id + '_file_release"/>\
                    </li>\
                    <li>\
                        <label for="' + this.room_id + '_file_remove" class="img_cursor_show">\
                            Remove file\
                        </label>\
                        <input type="file" name="file" id="' + this.room_id + '_file_remove"/>\
                    </li>\
                    <li class="fileupload_menu_margin_bottom">\
                        <label for="' + this.room_id + '_file_state" class="img_cursor_show">\
                            State change\
                        </label>\
                        <input type="file" name="file" id="' + this.room_id + '_file_state"/>\
                    </li>\
                </div>\
            </a>\
            <a><img src="custom/grow/mgt-gui/img/button5.png" id="fullscreen_svg_area' + this.room_id + '" /></a>\
            <a><img src="custom/grow/mgt-gui/img/button6.png" id="zoom_in_' + this.room_id + '" /></a>\
            <a><img src="custom/grow/mgt-gui/img/button7.png" id="zoom_out_' + this.room_id + '" /></a>\
            <a><img src="custom/grow/mgt-gui/img/button8.png" id="refresh_svg_panel' + this.room_id + '" /></a>\
        </div>\
    ');
    //
}

GrowToolbar.prototype.build_colorbar = function()
{
    $( "#" + this.room_id + "_palete" ).append('\
            <div class="left_svg_palette_items">\
                <svg id="LeftColorBar" version="1.1" baseProfile="full" xmlns="http://www.w3.org/2000/svg"\
                        xmlns:xlink="http://www.w3.org/1999/xlink"\
                        xmlns:ev="http://www.w3.org/2001/xml-events"  width=30 height=12 >\
                    <rect id="' + this.room_id + '_clone_color"  fill="#a080ff" x="0" y="0" width="30" height="12"/>\
                </svg> Clone \
            </div>\
            <div class="left_svg_palette_items">\
                <svg id="LeftColorBar" version="1.1" baseProfile="full" xmlns="http://www.w3.org/2000/svg"\
                        xmlns:xlink="http://www.w3.org/1999/xlink"\
                        xmlns:ev="http://www.w3.org/2001/xml-events"  width=30 height=12 >\
                    <rect id="' + this.room_id + '_vegetation_color"  fill="#a080ff" x="0" y="0" width="30" height="12"/>\
                </svg> Vegetation \
            </div>\
            <div class="left_svg_palette_items">\
                <svg id="LeftColorBar" version="1.1" baseProfile="full" xmlns="http://www.w3.org/2000/svg"\
                        xmlns:xlink="http://www.w3.org/1999/xlink"\
                        xmlns:ev="http://www.w3.org/2001/xml-events"  width=30 height=12 >\
                    <rect id="' + this.room_id + '_flower_color"  fill="#a080ff" x="0" y="0" width="30" height="12"/>\
                </svg> Flower \
            </div>\
            <div class="left_svg_palette_items">\
                <svg id="LeftColorBar" version="1.1" baseProfile="full" xmlns="http://www.w3.org/2000/svg"\
                        xmlns:xlink="http://www.w3.org/1999/xlink"\
                        xmlns:ev="http://www.w3.org/2001/xml-events"  width=30 height=12 >\
                    <rect id="' + this.room_id + '_cutweigh_wet_color"  fill="#a080ff" x="0" y="0" width="30" height="12"/>\
                </svg> Cutweigh Wet \
            </div>\
            <div class="left_svg_palette_items">\
                <svg id="LeftColorBar" version="1.1" baseProfile="full" xmlns="http://www.w3.org/2000/svg"\
                        xmlns:xlink="http://www.w3.org/1999/xlink"\
                        xmlns:ev="http://www.w3.org/2001/xml-events"  width=30 height=12 >\
                    <rect id="' + this.room_id + '_harvest_drying_color"  fill="#a080ff" x="0" y="0" width="30" height="12"/>\
                </svg> Harvest Drying \
            </div>\
            <div class="left_svg_palette_items">\
                <svg id="LeftColorBar" version="1.1" baseProfile="full" xmlns="http://www.w3.org/2000/svg"\
                        xmlns:xlink="http://www.w3.org/1999/xlink"\
                        xmlns:ev="http://www.w3.org/2001/xml-events"  width=30 height=12 >\
                    <rect id="' + this.room_id + '_harvest_curing_color"  fill="#a080ff" x="0" y="0" width="30" height="12"/>\
                </svg> Harvest Curing \
            </div>\
    ');
}

// Zooming
GrowToolbar.prototype.setHandlers = function()
{
    /**
     * Room Selection function
     * Initialization of GrowBuild Object
     * 
     */

    var room_id = this.room_id;
    var parent  = this.parent;
    var that = this;

    $( "#" + room_id + "_select" ).change( function(){
        parent.load_data();
    });

    $(document).click( function(){
        $('#' + room_id + 'fileupload_menu').hide();
    });

    $('#room_information_' + room_id).click( function(event){
        GetRoomInformation( room_id );
    });
    
    $('#file_upload_menu_img_' + room_id).click( function(event){
        event.stopPropagation();
        $('#' + room_id + 'fileupload_menu').toggle();
    });

    $('#refresh_svg_panel' + room_id).click( function(){
        GlobalLayout.reload_data( room_id );
    });

    $('#fullscreen_svg_area' + room_id).click( function(){
        ToggleFullScreen();
    });

    $('#zoom_in_' + room_id).click( function(){
        that.zoom_in();
    });

    $('#zoom_out_' + room_id).click( function(){
        that.zoom_out();
    });

}

