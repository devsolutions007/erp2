
function GrowPalette( room_id , parent , room_setting ){
      
            this.room_id = room_id;
            this.parent = parent;  
            
            this.date_range = 30;
            this.EmptyColor   = "#EBEBEB";
            this.MinColor     = "#FFF5C8";
            this.MaxColor     = "#8ABF0B";
 

            this.clone_color              = room_setting.clone_color          ? room_setting.clone_color                    : "#F1EEB0";
            this.vegetation_color         = room_setting.vegetation_color     ? room_setting.vegetation_color               : "#D4E182";
            this.flower_color             = room_setting.flower_color         ? room_setting.flower_color                   : "#AFD047";
            this.cutweigh_wet_color       = room_setting.cutweigh_wet_color   ? room_setting.cutweigh_wet_color             : "#6FC113";
            this.harvest_drying_color     = room_setting.harvest_drying_color ? room_setting.harvest_drying_color           : "#8FC113";
            this.harvest_curing_color     = room_setting.harvest_curing_color ? room_setting.harvest_curing_color           : "#A3DC15";

        

            this.setDateRangeColor = function( emptycolor , mincolor , maxcolor ){
                  this.EmptyColor = emptycolor;                        
                  this.MinColor = mincolor;
                  this.MaxColor = maxcolor;
 
                  $( "#" + this.room_id + '_colorbar_start' ).attr( "stop-color" , this.MinColor );
                  $( "#" + this.room_id + '_colorbar_end'   ).attr( "stop-color" , this.MaxColor );
            }

            this.setStateColor = function( clone_color , vegetation_color , flower_color , cutweigh_wet_color , harvest_drying_color , harvest_curing_color )
            {
                  this.clone_color              = clone_color;
                  this.vegetation_color         = vegetation_color;
                  this.flower_color             = flower_color;
                  this.cutweigh_wet_color       = cutweigh_wet_color;
                  this.harvest_drying_color     = harvest_drying_color;
                  this.harvest_curing_color     = harvest_curing_color;

                  $( "#" + this.room_id + '_clone_color'      ).attr( "fill" , this.clone_color        );
                  $( "#" + this.room_id + '_vegetation_color' ).attr( "fill" , this.vegetation_color   );
                  $( "#" + this.room_id + '_flower_color'     ).attr( "fill" , this.flower_color       );
                  $( "#" + this.room_id + '_cutweigh_wet_color'   ).attr( "fill" , this.cutweigh_wet_color      );
                  $( "#" + this.room_id + '_harvest_drying_color' ).attr( "fill" , this.harvest_drying_color      );
                  $( "#" + this.room_id + '_harvest_curing_color' ).attr( "fill" , this.harvest_curing_color      );

            }
            
            this.GetDayValue = function( day )
            {
                  return blend_colors( this.MaxColor , this.MinColor ,  Math.min( day / this.date_range , 1 ) );
            }
      
            /*
            blend two colors to create the color that is at the percentage away from the first color
            this is a 5 step process
                  1: validate input
                  2: convert input to 6 char hex
                  3: convert hex to rgb
                  4: take the percentage to create a ratio between the two colors
                  5: convert blend to hex
            @param: color1      => the first color, hex (ie: #000000)
            @param: color2      => the second color, hex (ie: #ffffff)
            @param: percentage  => the distance from the first color, as a decimal between 0 and 1 (ie: 0.5)
            @returns: string    => the third color, hex, represenatation of the blend between color1 and color2 at the given percentage
            */
            function blend_colors(color1, color2, percentage)
            {
                  // check input
                  color1 = color1 || '#000000';
                  color2 = color2 || '#ffffff';
                  percentage = percentage || 0.5;
                  
                  // 1: validate input, make sure we have provided a valid hex
                  if (color1.length != 4 && color1.length != 7)
                        throw new error('colors must be provided as hexes');
      
                  if (color2.length != 4 && color2.length != 7)
                        throw new error('colors must be provided as hexes');    
      
                  if (percentage > 1 || percentage < 0)
                  {
                        throw new error('percentage must be between 0 and 1');
                  }
      
              
       
                  // 2: check to see if we need to convert 3 char hex to 6 char hex, else slice off hash
                  //      the three character hex is just a representation of the 6 hex where each character is repeated
                  //      ie: #060 => #006600 (green)
                  if (color1.length == 4)
                        color1 = color1[1] + color1[1] + color1[2] + color1[2] + color1[3] + color1[3];
                  else
                        color1 = color1.substring(1);
                  if (color2.length == 4)
                        color2 = color2[1] + color2[1] + color2[2] + color2[2] + color2[3] + color2[3];
                  else
                        color2 = color2.substring(1);   
      
                  
                  // 3: we have valid input, convert colors to rgb
                  color1 = [parseInt(color1[0] + color1[1], 16), parseInt(color1[2] + color1[3], 16), parseInt(color1[4] + color1[5], 16)];
                  color2 = [parseInt(color2[0] + color2[1], 16), parseInt(color2[2] + color2[3], 16), parseInt(color2[4] + color2[5], 16)];
       
      
                  // 4: blend
                  var color3 = [ 
                        (1 - percentage) * color1[0] + percentage * color2[0], 
                        (1 - percentage) * color1[1] + percentage * color2[1], 
                        (1 - percentage) * color1[2] + percentage * color2[2]
                  ];
       
      
                  // 5: convert to hex
                  color3 = '#' + int_to_hex(color3[0]) + int_to_hex(color3[1]) + int_to_hex(color3[2]);
       
      
                  // return hex
                  return color3;
            }
      
            /*
                  convert a Number to a two character hex string
                  must round, or we will end up with more digits than expected (2)
                  note: can also result in single digit, which will need to be padded with a 0 to the left
                  @param: num         => the number to conver to hex
                  @returns: string    => the hex representation of the provided number
            */
            function int_to_hex(num)
            {
                  var hex = Math.round(num).toString(16);
                  if (hex.length == 1)
                        hex = '0' + hex;
                  return hex;
            }      


            //this.setColor("#FFFFFF" ,  "#FFF5C8" ,  "#8ABF0B");
            this.setStateColor( this.clone_color , this.vegetation_color , this.flower_color , this.cutweigh_wet_color , this.harvest_drying_color , this.harvest_curing_color )
      }
      