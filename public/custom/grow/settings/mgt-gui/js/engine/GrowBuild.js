
function GrowBuild( room_id )
{
    this.room_id    = room_id;

    this.Room           = null;
    this.GUI            = null;
    this.M              = null;
    this.Palette        = null;
    this.Toolbar        = null;

    this.SvgPoint       = null;
    this.SvgOffset      = null;
    this.flickerTimer   = null;

    // Object construction
    this.constrcut  = function(){
        this.build_div();
        this.Toolbar    = new GrowToolbar( room_id , this );
    }

    this.deconstruct = function(){
        clearTimeout( this.flickerTimer );
    }

    this.constrcut();

    
    // Data Binding

    this.init = function(  I , room_setting , room_infor )
    {
        this.Room       = new Room       ( this.room_id , this , I , room_infor , room_setting );
        this.GUI        = new GrowGUI    ( this.room_id , this );
        this.M          = new GrowMatrix ( this.room_id , this );
        this.Palette    = new GrowPalette( this.room_id , this , room_setting );
    
        var i , j ;
        for( i = 0 ; i < this.Room.rows ; i++ )
            for( j = 0 ; j < this.Room.columns ; j++ )
                this.M.set(  i , j , null , null , null );
         
        for( i = 0 ; i < I.length ; i++)
        {  
            this.M.set( parseInt(I[i].r) , parseInt(I[i].c) , parseInt(I[i].uid) , I[i].infor , I[i].rfid  );
        }
        
        this.GUI.render();
        this.flicker_data();
    }

    this.update_plant = function( plant )
    { 
        plant.r   = parseInt( plant.r   );
        plant.c   = parseInt( plant.c   );
        plant.uid = parseInt( plant.uid );
        this.M.set( plant.r , plant.c , plant.uid , plant.infor , plant.rfid  );
        this.GUI.draw_plant( this.Room.get_x_pos(plant.c) ,  this.Room.get_y_pos(plant.r) , this.M.plant( plant.r , plant.c ) );
    }

    this.remove_plant = function( r , c )
    {
        this.M.remove( r , c );
        this.GUI.draw_plant( this.Room.get_x_pos(c) ,  this.Room.get_y_pos(r) , this.M.plant( r , c ) );
    }

}

