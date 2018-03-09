var ShareAction = new ShareAction();

function ShareAction()
{
      this.active_build       = null;
      this.active_room_id     = null; 
      this.active_plant        = null;
      this.isActive           = false;
      this.floatP             = new ShareFloatPlant( this );
      this.start_point        = {};
      
      
      this.MoveStart = function( room_id , hkey , e , plant , build )
      {
            if( this.isActive && plant.active_plant == plant && this.active_room_id == room_id )
                  return;

            this.active_build = build;
            this.active_room_id = room_id; 
            this.isActive = true;
            this.active_plant = plant;
            this.floatP.move( e.pageX + 2 , e.pageY + 2 );
            this.floatP.setColor( plant.color );
            this.start_point = { x: e.pageX , y: e.pageY };
      }

      this.MoveEnd = function()
      {
            if( ! this.isActive ) return;

            this.active_plant_id = null;
            this.active_room_id = null;
            this.active_build = null;
            this.isActive = false;
            this.active_plant = null;
            this.floatP.hide();
      }

      this.init = function(){
            var me = this;
            $(document).mousemove( function(e){
                  if( ShareAction.isActive )
                  {
                        me.floatP.move( e.pageX + 2 , e.pageY + 2 );
                        if( ( e.pageX - me.start_point.x ) * ( e.pageX - me.start_point.x ) +( e.pageY - me.start_point.y ) * ( e.pageY - me.start_point.y ) > 600 )
                        {
                              me.floatP.show();
                        } 
                        else me.floatP.hide();
                        
                  }
            });
            
            $(document).mouseup(function(e){
                  ShareAction.MoveEnd();
            });
      }

      this.init();
      
}