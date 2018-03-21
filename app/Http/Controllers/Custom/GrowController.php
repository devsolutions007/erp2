<?php

namespace App\Http\Controllers\Custom;

use Illuminate\Http\Request;
use App\ProductGrowList;
use App\Product;
use App\ProductGrowMovement;
use App\ProductGrowProductRFID;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;



class GrowController extends Controller
{
    
    public function index() {

        $growAreas = ProductGrowList::where( 'parent_id', '=', 0 )->get();
        $growRooms = ProductGrowList::where( 'parent_id', '=', 1 )->get();
        return view('custom.grow.index', compact('growAreas', 'growRooms'));
    }

    public function growArea() {
        
        return view('custom.grow.growArea');
    }

    public function room() {
        
        return view('custom.grow.settings.room');
    }

    public function global() {
        
        return view('custom.grow.settings.global');
    }

    public function growIndex() {
        
        return view('custom.grow.growing.index');
    }

    public function historyIndex() {
        
        return view('custom.grow.history.index');
    }

    public function mgtGUI() {
        
        return view('custom.grow.mgt_gui');
    }
   
    public function roomAjax(Request $request) {
        $area_id = $request->input('area_id');
        $allset = $request->input('allset');
        $select_room = $request->input('select_val');
        $options = '';
        if($request->input('action') == 'getRoomList') {

            $growRooms = ProductGrowList::where( 'parent_id', '=', $area_id )->get();

            if( $allset ) $options .= "<option value='all' rtype=''>All</option>";

            foreach ($growRooms as $key => $row) {
                if($select_room != $row->id) {
                    $options .= "<option value='".$row->id."' rtype='".$row->type."' >".$row->name."</option>";
                } else {
                    $options .= "<option value='".$row->id."' rtype='".$row->type."' selected>".$row->name."</option>";
                }
            }
            echo $options;
            
        }
        if( $request->input('action') == 'get_next_room_list' )
        {
            $room_id = $request->input('room_id');

            // $next_room_area = DB::table('product_grow_lists')
            //                 ->select('type', 'parent_id')
            //                 ->where()
            //                 ->toSql();

            // return $next_room_area;
            $next_room_area = ProductGrowList::where( 'id', '=', $room_id )->get();
            
            foreach($next_room_area as $row)
            {
                if( ($row->type != "Harvest-drying") || ($row->type != "Harvest-curing") )
                    $ret .= "<option value='".$row->rowid."' rtype='".$row->type."' >".$row->name."</option>";
                else
                    $ret = "";
            }
            echo $ret;
        }
    }

    public function ajaxSearchGrowTable(Request $request) {

        $grow_id    = $request->input('grow_id');
        $room_id    = $request->input('room_id');
        $RFID       = $request->input('metric_id');
        $room_time  = $request->input('room_time');
        $product_id = '' ;
        if( $room_time )
            $room_plant_time  = date('Y-m-d', strtotime('-'.$room_time.' days', strtotime(date("Y-m-d"))));
        else
            $room_plant_time = "";

        $product_lists = '';

        if($request->input('mode') == 'searchResults') {
            if( $room_id == "all" ) {
                $query = DB::table('product_grow_movements as p')
                                ->leftJoin('product_grow_product_rfid as s', 'p.rfid', '=', 's.rfid')
                                ->leftJoin('product_grow_lists as m', 'm.id', '=', 's.room_id' )
                                ->leftJoin('product as b', 'b.rowid', '=', 's.p_id')
                                ->where('p.src', '=', 0)
                                ->orWhere('p.dst', '<', 1)
                                ->where('m.parent_id', '=', $grow_id)
                                ->select('b.label', 'p.rfid', 's.p_id', 's.birthdate', 's.col', 's.rol', 's.parent_rfid', 's.state', 'm.name', DB::raw("SUM( ( case when (p.src = '".NULL."') then -p.qty else p.qty end ) ) AS stock_value"))
                                ->groupBy('s.rfid');
                                //->where('stock_value', '>', 0)
                $product_lists = $query->get();

            } else {
                $query = DB::table('product_grow_movements as p')
                                ->leftJoin('product_grow_product_rfid as s', 'p.rfid', '=', 's.rfid')
                                ->leftJoin('product_grow_lists as m', 'm.id', '=', 'p.src' )
                                ->leftJoin('product_grow_lists as n', 'n.id', '=', 'p.dst' )
                                ->leftJoin('product as b', 'b.rowid', '=', 's.p_id');
                                
                if( is_numeric( $room_id ) ) { 

                    $query->where('p.src', '=', $room_id)
                          ->orWhere('p.dst', '=', $room_id)
                          ->where('m.parent_id', '=', $grow_id)
                          ->select('b.label', 'p.rfid', 's.p_id', 's.birthdate', 's.col', 's.rol', 's.parent_rfid', 's.state', 'n.name', DB::raw("SUM( ( case when (p.src = '".$room_id."') then -p.qty else p.qty end ) ) AS stock_value"));
                } else {
                    $query->where(DB::raw( "p.src in(select id from product_grow_lists where parent_id = '".$grow_id."'" ))
                          ->orwhere(DB::raw( "p.dst in(select id from product_grow_lists where parent_id = '".$grow_id."'" ) )
                          ->where('m.parent_id', '=', $grow_id)
                          ->select('b.label', 'p.rfid', 's.p_id', 's.birthdate', 's.col', 's.rol', 's.parent_rfid', 's.state', 'n.name', DB::raw("SUM( ( case when (p.src in(select id from product_grow_lists where parent_id = '".$grow_id."' ) then -p.qty else p.qty end ) ) AS stock_value"));
                }
                $query->groupBy('s.rfid');
                if($RFID) $query->where('p.rfid', '=', $RFID);

                if($room_time) $query->where('s.birthdate', '=', $room_plant_time);

                if($product_id) $query->where('s.p_id', '=', $product_id);
                //$query->where('stock_value', '>', 0); 
                $product_lists = $query->get();

                               
            }
            $data = '';
            $count = 1;
            $current = Carbon::now();
            if(count($product_lists) > 0 ) {
                foreach ($product_lists as $key => $product) {
                    //if($product->stock_value > 0 ) {
                        $created = Carbon::parse($product->birthdate);
                        $age = $current->diffInDays($created);
                        $data .= '<tr>';
                        $data .= '<td>'.$count++.'</td>';
                        $data .= '<td><input class="flat checkboxfordelete" name="check_list[]" value="'.$product->rfid.'" type="checkbox"></td>';
                        $data .= '<td>'.$product->label.'</td>';
                        $data .= '<td>'.$product->birthdate.'</td>';
                        $data .= '<td>'.$age . ( $age < 2 ? ' day' : ' days') .'</td>';
                        $data .= '<td>'.$product->name.'( '.$product->rol.', '.$product->col .' )</td>';
                        $data .= '<td>'.$product->rfid.'</td>';
                        $data .= '<td>'.$product->state.'</td>';
                        $data .= '</tr>';
                    //}
                }
            }
            echo $data;
            
        }
    }
    
    public function ajaxRequestGrowModal(Request $request) {
        if( $request->input('mode') == 'add_plant' )
        {
            $date    = $request->input('date');
            $src     = $request->input('src');
            $p_id    = $request->input('p_id');
            $rfid    = $request->input('rfid');
            $p_rfid  = $request->input('p_rfid');
            $rol     = $request->input('rol');
            $col     = $request->input('col');

            $new_date = date("Y-m-d", strtotime($date));

            $countRFID = ProductGrowProductRFID::where('rfid', '=', $rfid)->count();
            if($countRFID > 0) {
                echo "The rfid is exist";
            } else {
                $validatedData = $request->validate([
                    'rfid' => 'required|unique:product_grow_product_rfid',
                    'p_id' => 'required',
                ]);

                $ProductGrowProductRFID = new ProductGrowProductRFID;
        
                $ProductGrowProductRFID->rfid = $rfid;
                $ProductGrowProductRFID->p_id = $p_id;
                $ProductGrowProductRFID->birthdate = $new_date;
                $ProductGrowProductRFID->room_id = $src;
                $ProductGrowProductRFID->col = $col;
                $ProductGrowProductRFID->rol = $rol; 
                $ProductGrowProductRFID->parent_rfid = $p_rfid;
                $ProductGrowProductRFID->state = 'clone'; 
                $ProductGrowProductRFID->save();

                $ProductGrowMovement = new ProductGrowMovement;
                $ProductGrowMovement->rfid = $rfid;
                $ProductGrowMovement->dst = $src;
                $ProductGrowMovement->qty = 1;
                $ProductGrowMovement->date = $new_date;
                $ProductGrowMovement->type = 'new';
                $ProductGrowMovement->save();
                echo "Sucess insert";

            }
        }

        if( $request->input('mode') == 'move_plant' )
        {
            $date = $request->input('date');
            $date = date("Y-m-d", strtotime($date));
            $src  = $request->input('src');
            $dst  = $request->input('dst');
            $state  = $request->input('state');
            $rfids = $request->input('RFID');

            if( $state == '3' ) $state = "vegetation";
            if( $state == '4' ) $state = "flower";
            if( $state == '5' ) $state = "harvest-drying";
            if( $state == '6' ) $state = "harvest-curing";
            if( $state == '7' ) $state = "Cutweigh-wet";

            foreach ($rfids as $key => $rfid) {
                 $ProductGrowMovement       = new ProductGrowMovement;
                 $ProductGrowMovement->rfid = $rfid;
                 $ProductGrowMovement->src  = $src;
                 $ProductGrowMovement->dst  = $dst;
                 $ProductGrowMovement->qty  = 1;
                 $ProductGrowMovement->date = $date;
                 $ProductGrowMovement->type = 'move';
                 $ProductGrowMovement->save();

                 $ProductGrowProductRFID = ProductGrowProductRFID::find($rfid);
                 $ProductGrowProductRFID->state = $state;
                 $ProductGrowProductRFID->room_id = $dst;
                 $ProductGrowProductRFID->save();
            }
            echo "success";

        }

        if( $request->input('mode') == 'remove_plant' )
        {
            $plantLists = $request->input('data');
            $date     = date("Y-m-d");
            $results = '';
            foreach ($plantLists as $key => $plantList) {
                $ProductGrowMovement = new ProductGrowMovement;
                $ProductGrowMovement->rfid = $plantList["RFID"];
                $ProductGrowMovement->src  = $plantList["src"];
                $ProductGrowMovement->dst  = -1;
                $ProductGrowMovement->qty  = 1;
                $ProductGrowMovement->date = $date;
                $ProductGrowMovement->type = 'release';
                $ProductGrowMovement->save();

                $ProductGrowProductRFID = ProductGrowProductRFID::find($plantList["RFID"]);
                $ProductGrowProductRFID->room_id = -1;
                $ProductGrowProductRFID->save();
            }
            echo "success";
        }
    }   
}