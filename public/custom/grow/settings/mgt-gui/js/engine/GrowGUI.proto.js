GrowGUI.prototype.remove_plant = function( plant )
{
    var room_id = this.room_id
    var hkey = plant.hkey;
    $( "#circle_white" + hkey + room_id ).remove();
    $( "#circle_outer" + hkey + room_id ).remove();
    $( "#circle" + hkey + room_id ).remove();
}

GrowGUI.prototype.plant_toggle_flick = function ( hkey )
{ 
    var room_id = this.room_id;

    if( $( "#circle_white" + hkey + room_id ).is(":visible")  )
    {
        $( "#circle_white" + hkey + room_id ).hide();
        $( "#circle_outer" + hkey + room_id ).hide();
    }
    else 
    {
        $( "#circle_white" + hkey + room_id ).show();
        $( "#circle_outer" + hkey + room_id ).show();
    }
  
}

GrowGUI.prototype.draw_plant = function ( x , y , plant )
{
    var pObject = this.svg();
    var room_id = this.room_id
    var hkey = plant.hkey;
    var c = plant.color;
    var room_type = this.parent.Room.type;
    var parentBuild = this.parent ;

    this.remove_plant( plant );

    var circle_outer = SvgCreator.AddCircle( x , y , CIRCLE_OUTER_R , CIRCLE_OUTER_COLOR, CIRCLE_OUTER_COLOR , "circle_outer" + hkey + room_id , "" ,"" );
    var circle_white = SvgCreator.AddCircle( x , y , CIRCLE_OUTER_WHITE_R , CIRCLE_OUTER_WHITE_COLOR, CIRCLE_OUTER_WHITE_COLOR , "circle_white" + hkey + room_id , "" ,"" );
    var circle       = SvgCreator.AddCircle( x , y , CIRCLE_INNER_R , c, c , "circle" + hkey + room_id , "circle_class" ,"" );

    pObject.appendChild(circle_outer);
    pObject.appendChild(circle_white);
    pObject.appendChild(circle);

    $("#circle_outer" + hkey + room_id).hide();
    $("#circle_white" + hkey + room_id).hide();


    var IBox = this.IBox; 

    $( "#circle" + hkey + room_id).mouseover(function(){
        IBox.update( plant , x , y );
        $( "#circle_white" + hkey + room_id ).show();
        $( "#circle_outer" + hkey + room_id ).show();
    });

    $("#circle" + hkey + room_id).mouseout(function(){
        IBox.hide();
        $( "#circle_white" + hkey + room_id ).hide();
        $( "#circle_outer" + hkey + room_id ).hide();
    });

    if( plant.state )
    { 

        $("#circle" + hkey + room_id).mousedown(function(e){
            switch( event.which )
            {
                case 1:
                    ShareAction.MoveStart( room_id , hkey ,e , plant , parentBuild );
                    break;
                case 3: 
                    ShowRightMenu( plant , parentBuild , e.pageX , e.pageY );
                    break;
            }
        });

        $("#circle" + hkey + room_id).dblclick(function(e){  
            ShareAction.MoveEnd();
            UpdatePlantState( parentBuild , plant , room_id ); 
        });
 
    }
    else
    {
        $("#circle" + hkey + room_id).mouseup(function(){
            if( ShareAction.isActive )
            {
                if( ShareAction.active_build == parentBuild ) // inner Movement
                     MovePlantAjaxAction( ShareAction.active_plant , plant , ShareAction.active_build , parentBuild );
                else MovePlantDialog( ShareAction.active_plant , plant , ShareAction.active_build , parentBuild );
            }
        });

        $("#circle" + hkey + room_id).mousedown(function(e){
            switch( event.which )
            { 
                case 3: 
                    ShowRightMenu( plant , parentBuild , e.pageX , e.pageY );
                    break;
            }
        });
    }

    ///////////////////////         Double click event handler      ///////////////////////////////////////

    //
    // Add Plant Event Handler
    //
    
    if( !plant.state )
    {   
        $("#circle" + hkey + room_id).dblclick(function(e){
            AddPlantDialog( plant , room_id , parentBuild );    
        });
    }
    
}

GrowGUI.prototype.render = function()
{
    var i , j , r , c , p;
    var Room = this.parent.Room;
    var M = this.parent.M;
    var pObject = this.svg();

    for( r = 0 ; r < Room.rows; r++ )
        for( c = 0 ; c < Room.columns ; c++ )
        {
            var plant = M.plant( r, c );
            plant.r = r;
            plant.c = c;
            this.draw_plant( Room.get_x_pos(c) , Room.get_y_pos(r) , plant );
        }
 

    for( i = 0 ; i < Room.block_rows ; i++ )
        for( j = 0 ; j < Room.block_columns ; j++ )
        {
            var y = Room.offsetY + Room.get_row_and_gap_per_block()    * i;
            var x = Room.offsetX + Room.get_column_and_gap_per_block() * j;
            var y1 = y + Room.get_row_size_per_block();
            var x1 = x + Room.get_column_size_per_block();

            pObject.appendChild( SvgCreator.AddLine( x , y , x1 , y   , "stroke:rgb(207,207,195);stroke-width:1" ,"" ) );
            pObject.appendChild( SvgCreator.AddLine( x1 , y , x1 , y1 , "stroke:rgb(207,207,195);stroke-width:1" ,"" ) );
            pObject.appendChild( SvgCreator.AddLine( x1 , y1 , x , y1 , "stroke:rgb(207,207,195);stroke-width:1" ,"" ) );
            pObject.appendChild( SvgCreator.AddLine( x , y1 , x ,  y  , "stroke:rgb(207,207,195);stroke-width:1" ,"" ) );

            // block seperation lines
            
            for( p = 0 ; p < Room.column_per_block - 1 ; p++ )
            {
                x += Room.plant_column_size ;
                pObject.appendChild( SvgCreator.AddLine( x , y , x , y1 , "stroke:rgb(207,207,195);stroke-width:1" ,"" ) );
            }
        }
        this.column_and_header();
}

GrowGUI.prototype.column_and_header = function(){

    var r , c;
    var pObject = this.svg();
    var Room = this.parent.Room;
    var that = this;
    var svg = document.getElementById( this.room_id );

    var column_header_group = SvgCreator.CreateSvgGroup( this.room_id + '_column_header' );
    var row_header_group    = SvgCreator.CreateSvgGroup( this.room_id + '_row_header' );
    pObject.appendChild( row_header_group );
    pObject.appendChild( column_header_group );
    

    column_header_group.appendChild( SvgCreator.AddRect (0, 0, 50000 , 30 ,  "rgb(82,82,82)"  ,  "rgb(232,232,232)") )
    row_header_group.appendChild(    SvgCreator.AddRect (0, 0, 30 , 50000 ,  "rgb(82,82,82)"  ,  "rgb(232,232,232)") )
    
    for( c = 0 ; c < Room.columns ; c++ )
        column_header_group.appendChild( SvgCreator.AddText( Room.get_x_pos(c) , 20 , c+1 , "rgb(82,82,82)" ,  'font-size: 16px; font-weight: bold' ) );


    for( r = 0 ; r < Room.rows ; r++ )
        row_header_group.appendChild( SvgCreator.AddText( 10 , Room.get_y_pos(r) , r+1 , "rgb(82,82,82)" ,  'font-size: 16px; font-weight: bold' ) );

    
    $( '#' + this.room_id  ).draggable({
        drag: function( event, ui ) {
            // var left = parseInt( document.getElementById(that.room_id).style.left );
            // var top  = parseInt( document.getElementById(that.room_id).style.top  );
            // if( left > 0 ) document.getElementById(that.room_id).style.left = 0;
            // if( top > 0 ) document.getElementById(that.room_id).style.top = 0;  

            that.set_position_of_column_and_header();
        }
    });
}

GrowGUI.prototype.set_position_of_column_and_header = function(){
    var that = this;
    var svg = document.getElementById( this.room_id );
    that.SvgPoint.x = that.SvgOffset.left;
    that.SvgPoint.y = that.SvgOffset.top;
    var new_point = that.SvgPoint.matrixTransform(svg.getScreenCTM().inverse());
    new_point.x = ( Math.max( new_point.x , 0 ) );
    new_point.y = ( Math.max( new_point.y , 0 ) ); 
    document.getElementById( that.room_id + '_column_header' ).setAttribute( 'transform' , 'translate(0                 , ' + new_point.y + ' )' );
    document.getElementById( that.room_id + '_row_header'    ).setAttribute( 'transform' , 'translate('+ new_point.x +' ,                   0 )' );
}