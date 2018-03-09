var SvgCreator = new SvgCreatorLibrary();

function GrowGUI( room_id , parent )
{
    this.room_id = room_id; 
    this.IBox = null;
    this.parent = parent;
    this.SvgPoint = null;
    this.SvgOffset = null
    

    this.init = function( room_id )
    {
        svg_content = document.getElementById( room_id );
        svg_group = SvgCreator.CreateSvgGroup( room_id + '_group' );
        svg_content.appendChild(svg_group);
        this.IBox = new IBox( room_id , this );

        var svg = document.getElementById( this.room_id );
        this.SvgPoint = svg.createSVGPoint();
        this.SvgOffset = $( '#' + this.room_id + '_svg' ).offset();  
    }

    this.svg = function()
    {        
        return document.getElementById( this.room_id + "_group" );
    }

    this.init( room_id );
}