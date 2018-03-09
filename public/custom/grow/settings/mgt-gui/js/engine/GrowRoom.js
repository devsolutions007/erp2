
function Room( room_id , parent , I , infor , room_setting )
{
      this.room_id = room_id;
      this.parent = parent;
      this.infor = infor;

      this.type = infor.type ? infor.type : PlantStateEnum.ROOM_CLONE;
      this.uid = this.infor.uid;
      this.name = this.infor.name;

      this.rows               = room_setting.rows                 ? parseInt(room_setting.rows)                 : 5 ;
      this.columns            = room_setting.columns              ? parseInt(room_setting.columns)              : 5 ;
      this.grow_days          = room_setting.grow_days            ? parseInt(room_setting.grow_days)            : 30 ;
      this.plant_row_size     = room_setting.plant_row_size       ? parseInt(room_setting.plant_row_size)       : 50 ;
      this.plant_column_size  = room_setting.plant_column_size    ? parseInt(room_setting.plant_column_size)    : 35 ;
      this.block_row_gap      = room_setting.block_row_gap        ? parseInt(room_setting.block_row_gap)        : 70 ;
      this.block_column_gap   = room_setting.block_column_gap     ? parseInt(room_setting.block_column_gap)     : 70 ;
      this.row_per_block      = room_setting.row_per_block        ? parseInt(room_setting.row_per_block)        : 2 ;
      this.column_per_block   = room_setting.column_per_block     ? parseInt(room_setting.column_per_block)     : 4 ;
      this.offsetX            = room_setting.offsetX              ? parseInt(room_setting.offsetX)              : 50 ;
      this.offsetY            = room_setting.offsetY              ? parseInt(room_setting.offsetY)              : 50 ;
 

      // set Room State
      this.init = function( I )
      {
            var i;
            for( i = 0 ; i < I.length ; i++ )
            {
                  this.columns = Math.max(  this.columns , parseInt(I[i].c) + 1 ) ;
                  this.rows    = Math.max(  this.rows    , parseInt(I[i].r) + 1 ) ;
            }
            this.block_columns = Math.ceil( this.columns / this.column_per_block );
            this.block_rows    = Math.ceil( this.rows    / this.row_per_block    );
      }

      this.get_row_size_per_block= function()
      {
            return this.row_per_block * this.plant_row_size;
      }

      this.get_column_size_per_block = function()
      {
            return this.column_per_block * this.plant_column_size;
      }


      this.get_row_and_gap_per_block = function()
      {
            return this.get_row_size_per_block() + this.block_row_gap ;
      }

      this.get_column_and_gap_per_block = function()
      {
            return this.get_column_size_per_block() + this.block_column_gap;
      }

      this.get_x_pos = function( c )
      {
            var xRepeatGo = parseInt( c / this.column_per_block ) * this.get_column_and_gap_per_block();
            var xRemain = c % this.column_per_block;
            var xRemainGo =  this.plant_column_size * xRemain + this.plant_column_size / 2 ;
            // console.log(this.offsetX + xRepeatGo + xRemainGo);
            return this.offsetX + xRepeatGo + xRemainGo;
      }

      this.get_y_pos = function( r )
      {
            var yRepeatGo = parseInt( r / this.row_per_block )  * this.get_row_and_gap_per_block();
            var yRemain = r % this.row_per_block;
            var yRemainGo =   this.plant_row_size * yRemain + this.plant_row_size / 2 ;
            // console.log(this.offsetY + yRepeatGo + yRemainGo);
            return  this.offsetY + yRepeatGo + yRemainGo;
      }

      this.init( I );
 
}