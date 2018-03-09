
function GrowToolbar( room_id , parent )
{
    this.room_id = room_id;  
    this.parent = parent;  
    
    this.construct = function( room_id )
    {
        this.build_toolbar();
        this.build_colorbar();
        this.setHandlers();
        this.setUploadHandler();
    }

    //Zooming
    this.zoom_ratio = 1;

    this.setZoomState = function()
    {
        var D = Math.round( 50000 * this.zoom_ratio );
        document.getElementById( this.room_id ).setAttribute( "viewBox" , " 0 0 " + D + " " + D );
        this.parent.GUI.set_position_of_column_and_header(); 
    }

    this.zoom_in = function()
    {
        this.zoom_ratio = this.zoom_ratio * 1.25;
        this.setZoomState();
    }

    this.zoom_out = function()
    {
        this.zoom_ratio = this.zoom_ratio / 1.25;
        this.setZoomState();
    }

    this.construct( room_id );
}
