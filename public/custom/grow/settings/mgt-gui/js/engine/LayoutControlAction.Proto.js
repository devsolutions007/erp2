LayoutControl.prototype.reload_data = function( room_id )
{
    var i;
    for( i = 0 ; i < this.Grows.length; i++ )
        if( this.Grows[i].room_id == room_id )
        {
            this.Grows[i].load_data(); 
            break;
        }
}