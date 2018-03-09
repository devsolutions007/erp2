
function IBox( room_id , parent ){

    this.room_id = room_id;
    this.parent = parent; 
    this.plant_id = null;

    this.initBox = function( room_id )
    {
        var pBox = SvgCreator.CreateSvgGroup( room_id + '_information_box' );
        pObject = document.getElementById( room_id );
        pObject.appendChild(pBox);

        var foreign = document.createElementNS('http://www.w3.org/2000/svg',"foreignObject");
        foreign.setAttribute('width', 50);
        foreign.setAttribute('height', 20);
        foreign.setAttribute('x' , 90);
        foreign.setAttribute('y' , 80);

        var InforBOX = {};
        InforBOX.pname       = SvgCreator.AddText( 90 , 30 , '' , "rgb(82,82,82)" ,  'font-size: 16px; font-weight: bold',room_id+'pname'  );
        InforBOX.pdays       = SvgCreator.AddText( 90 , 60 , '' , "rgb(82,82,82)" ,  'font-size: 16px; font-weight: bold',room_id+'pdays'  );
        InforBOX.postion     = SvgCreator.AddText( 90 , 90 , '' , "rgb(82,82,82)" ,  'font-size: 16px; font-weight: bold',room_id+'postion'  );
        InforBOX.rfid        = SvgCreator.AddText( 25 , 120 , '' , "rgb(82,82,82)" , 'font-size: 14px; font-weight: bold',room_id+'rfid'  );
        InforBOX.image       = SvgCreator.AddImage( 10 , 5 , 70 , 100 , '' , room_id + 'image' );
  
        pBox.appendChild( SvgCreator.AddRoundRect(0 , 0 , 0 , 0 , 240 , 130 ,"rgb(87,87,87)" , "rgb(246,246,246)"  ) );
        pBox.appendChild( InforBOX.image    );
        pBox.appendChild( InforBOX.postion  );
        pBox.appendChild( InforBOX.pname    );
        pBox.appendChild( InforBOX.pdays    ); 
        pBox.appendChild( InforBOX.rfid     ); 
        pBox.appendChild( foreign           );
        
        $( "#" + room_id + '_information_box' ).hide();
    }
    
    this.update = function( plant , x , y )
    { 
        if( this.plant_id == plant.uid ) return;
        this.plant_id = plant.uid;
        SvgCreator.updateText ( document.getElementById( room_id + 'postion') , plant.infor ? plant.infor.state             : '' );
        SvgCreator.updateImage( document.getElementById( room_id + 'image')   , plant.infor ? plant.infor.imgurl            : '' );
        SvgCreator.updateText ( document.getElementById( room_id + 'pname')   , plant.infor ? plant.infor.name              : '' );
        SvgCreator.updateText ( document.getElementById( room_id + 'rfid')    , plant.rfid  ? plant.rfid                    : '' );
        SvgCreator.updateText ( document.getElementById( room_id + 'pdays')   , plant.infor ? plant.infor.days + " day"     : '' );

        document.getElementById( room_id + '_information_box').style.display = "";

        var xlate = parseInt(x) + 10;
        var ylate = parseInt(y) + 10;

        document.getElementById( room_id + '_information_box').setAttributeNS(null, "transform", "translate(" + xlate +"," + ylate + ")");
    }
    
    this.hide = function()
    {
        document.getElementById(room_id + '_information_box').style.display = "none";
        this.plant_id = null;
    }

    this.initBox( room_id );
}