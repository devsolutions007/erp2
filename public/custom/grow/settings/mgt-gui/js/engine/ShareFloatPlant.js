
function ShareFloatPlant( parent ){

    this.parent = parent;

    this.move = function ( x , y )
    {
        $("#floatingCircle").offset({ top: y , left: x });
    }

    this.show = function ( x , y )
    {
        $("#floatingCircle").show();
    }

    this.hide = function ( x , y )
    {
        $("#floatingCircle").hide();
    }
    this.setColor = function( color )
    {
        $("#floatingCircle").css( "background-color" , color );
    }

}
