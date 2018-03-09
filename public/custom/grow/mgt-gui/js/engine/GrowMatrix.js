
const MAX_R = 999999;

function GrowMatrix( room_id , parent )
{   
    this.room_id = room_id;
    this.parent = parent;

    this.R = new Array();

    this.reset = function ()
    {
        this.R = new Array();
    }

    this.hash = function( r , c )
    {
        return MAX_R * c + r;
    }

    this.rc = function( key )
    {
        return { r : Math.floor( key / MAX_R ) , c :  key % MAX_R };
    }

    this.set = function( r , c , uid , infor , rfid )
    {
        var hkey = this.hash( r , c );  
        this.R[hkey] = new GrowPlant( this , hkey , r , c , uid , infor , rfid );
        return true;
    }

    this.remove = function ( r , c  )
    {       
        var hkey = this.hash( r , c );
        this.R[hkey] = new GrowPlant( this , hkey , r , c , null , null );
        return true; 
    }

    this.plant = function( r , c )
    {
        return this.R[this.hash( r , c ) ];
    }


    this.plant_by_id = function( uid )
    {
        for( var key in this.R )
            if( this.R[key].uid == uid )
            {
                return this.R[key];
            }
        return null;
    }
}