
function GrowPlant( parent , hkey , r , c , uid , infor , rfid ){

      this.hkey = hkey;
      this.r = r;
      this.c = c;
      this.uid = uid;
      this.infor = infor;
      this.rfid = rfid;
      this.color = null;
      this.parent = parent;
      this.state = infor ? infor.state : null;

      this.set_plant_state = function()
      {
            p = this;      
            var palette = this.parent.parent.Palette;
            var room = this.parent.parent.Room;
            //p.state = p.infor ? ( p.infor.days && p.infor.days < room.grow_days ? PlantDurationTypeEnum.CELL_STATE_GROWING : PlantDurationTypeEnum.CELL_STATE_COMPLETE )  : PlantDurationTypeEnum.CELL_STATE_EMPTY;
            
            switch( p.state )
            {
                  case 'clone':
                        p.color = palette.clone_color;
                        break;
                  case 'vegetation':
                        p.color = palette.vegetation_color;
                        break;
                  case 'flower':
                        p.color = palette.flower_color;
                        break;
                  case 'Cutweigh-wet':
                        p.color = palette.cutweigh_wet_color;
                        break;
                  case 'harvest-drying':
                        p.color = palette.harvest_drying_color;
                        break;
                  case 'harvest-curing':
                        p.color = palette.harvest_curing_color;
                        break;
                  default:
                        p.color = palette.EmptyColor;
            }
      }

      this.set_plant_state();
}