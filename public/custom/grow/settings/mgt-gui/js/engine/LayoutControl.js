var GlobalLayout = {};

var LayoutControl = function ( parent_div_id , columns , rows )
{
    this.parent_div_id  = parent_div_id;
    this.columns        = columns;
    this.rows           = rows;

    this.Grows          = new Array();

    this.marginTop          = 50;
    this.marginBottom       = 20;
    this.marginLeft         = 40;
    this.marginRight        = 30;
    this.paddingW           = 15;
    this.paddingH           = 15;
    this.marginH            = this.marginTop  + this.marginBottom;
    this.marginW            = this.marginLeft + this.marginRight;

    this.clear_object = function(){
        $( "#" + this.parent_div_id ).empty();
    }

    this.check_dimension_validency = function()
    {

    }

    this.did = function( x , y )
    {
        return "room_" + x + "_" + y;
    }

    this.cid = function( x , y )
    {
        return this.did( x , y ) + "_container";
    }

    this.build_object = function(){
        var i , j ;
        for( i = 0 ; i < this.columns ; i++ )
            for( j = 0 ; j < this.rows ; j++ )
            {
                var childdiv = "<div id='" + this.cid( i , j ) + "' class='absolute_div'></div>";
                $( "#" + this.parent_div_id ).append( childdiv );
            }
    }

    this.layout_object = function(){ 
        var W = $( window ).width()  - this.marginW;
        var H = $( window ).height() - this.marginH;
        var oneW =( W - (this.columns   - 1) * this.paddingW ) / this.columns ;
        var oneH =( H - (this.rows      - 1) * this.paddingH ) / this.rows ;
        var i , j ;
        for( i = 0 ; i < this.columns ; i++ )
        {
            for( j = 0 ; j < this.rows ; j++ )
            {
                var startY = this.marginTop +  ( this.paddingH + oneH ) * j ;
                var startX = this.marginLeft + ( this.paddingW + oneW ) * i ;

                $( "#" + this.cid( i , j ) ).width ( oneW );
                $( "#" + this.cid( i , j ) ).height( oneH );
                $( "#" + this.cid( i , j ) ).offset({ top : startY , left : startX });
                
            } 
        }
    }

    this.set_window_resize_event_hander = function()
    {
        var that = this;
        $( window ).unbind( "resize" );
        $( window ).resize( function(){ that.layout_object(); } );
    }

    this.build_grow = function(){
        var i , j ;
        for( i = 0 ; i < this.Grows.length; i++ )
            this.Grows[i].deconstruct();
            
        this.Grows = new Array();

        for( i = 0 ; i < this.columns ; i++ )
            for( j = 0 ; j < this.rows ; j++ )
                this.Grows.push( new GrowBuild( this.did( i , j ) ) );
    }

    this.build = function(){
        this.clear_object();
        this.check_dimension_validency();
        this.build_object();
        this.layout_object();
        this.set_window_resize_event_hander();

        //build children
        this.build_grow();
    }

    this.build();
}

function setLayout( x , y ){
    $("#grow_grid_img").attr("src","/mukesh/erp2-test/public/custom/grow/mgt-gui/img/file_upload/file" + x + "-" + y + ".png");
    GlobalLayout = new LayoutControl( 'RenderDiv' , x , y );
    $("#area_select" ).trigger('change');
}