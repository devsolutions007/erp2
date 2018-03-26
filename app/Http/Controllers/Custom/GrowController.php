<?php

namespace App\Http\Controllers\Custom;

use Illuminate\Http\Request;
use App\ProductGrowList;
use App\Product;
use App\ProductGrowMovement;
use App\ProductGrowProductRFID;
use App\Entrepot;
use App\StockMovement;
use App\ProductStock;
use App\ProductGrowListSetting;
use App\ProductGrowListGlobal;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use File;


class GrowController extends Controller
{
    
    public function index() {

        $growAreas = ProductGrowList::where( 'parent_id', '=', 0 )->get();
        $growRooms = ProductGrowList::where( 'parent_id', '=', 1 )->get();
        $warehouseList = Entrepot::all();
        return view('custom.grow.index', compact('growAreas', 'growRooms', 'warehouseList'));
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
        
        $growAreas = ProductGrowList::where( 'parent_id', '=', 0 )->get();
        $growRooms = ProductGrowList::where( 'parent_id', '=', 1 )->get();
        return view('custom.grow.mgt_gui', compact('growAreas', 'growRooms'));
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
            $options = '';
            $next_room_area = DB::table('product_grow_lists')
                                ->whereRaw(DB::raw('(type , parent_id) in ( select type + 1 , parent_id from product_grow_lists where id = "'.$room_id .'")'))
                                ->get();
            //return $next_room_area;
            foreach($next_room_area as $row)
            {
                if( ($row->type != "Harvest-drying") || ($row->type != "Harvest-curing") )
                    $options .= "<option value='".$row->id."' rtype='".$row->type."' >".$row->name."</option>";
                else
                    $options = "";
            }
            echo $options;
        }
    }

    public function getroomAjax(Request $request) {
        if( $request->input('action') == 'get_room_setting' )
        {
            $result = array();

            $room_id = $request->input('room_id');

            $first = DB::table('product_grow_list_setting')->select('key','value')
                        ->where('room_id', $room_id);
            $setting_list = DB::table('product_grow_list_setting_global')->select('key','value')
                        ->unionAll($first)
                        ->get();
            if(count($setting_list) > 0) {
                foreach ($setting_list as $key => $setting_value) {
                    $result[ $setting_value->key ] = $setting_value->value;
                }
            } 
            echo json_encode( $result );
        }
    }
    public function getplantAjax(Request $request) {
        if( $request->input('action') == 'get_plant_list' )
        {
            $room_id = $request->input('room_id');
            $grow_id = '';
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
                //$query->where('stock_value', '>', 0); 
            $product_lists = $query->get();

            $print_result = [];
            $today = strtotime(date("Y-m-d"));

            foreach ($product_lists as $product_list)
            {
                if($product_list->p_id == 0) 
                    continue;
                // $this->cProd->fetch($product_list->p_id);
                // $description = $this->cProd->show_photos_url($conf->product->multidir_output[$this->cProd->entity],1,1,0,0,0,80);
                $description = '';
                if( $description =="" ) $description = "/custom/grow/mgt-gui/img/flower.png";
                
                if(strlen($product_list->label) > 14) 
                    $product_string = substr($product_list->label , 0 , 14 )."..";
                else
                    $product_string = $product_list->label;
        
                $birthdate_val = round(($today - strtotime($product_list->birthdate)) / (60 * 60 * 24));
                array_push( $print_result , array(
                    'r'=>$product_list->rol ,
                    'c'=>$product_list->col ,
                    'uid'=>$product_list->p_id ,
                    'rfid'=>$product_list->rfid ,
                    'infor'=> array(
                            'days'=>$birthdate_val,
                            'state'=>$product_list->state ,
                            'imgurl'=>$description,
                            'name'=> $product_string
                        )
                    ) 
                );
            }
            return $print_result;

            echo json_encode( $print_result );
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

                // $product_lists = DB::select('*')
                //         ->from(DB::raw('SELECT b.label as p_name, p.rfid as rfid_value, s.p_id as rowid, s.birthdate as birthdate, s.col as col_val, s.rol as rol_val, s.parent_rfid as parent_rfid, as imgurl, s.state as state, m.name as room_name, SUM( case when (p.src = ) then p.qty else - p.qty end ) as stock_value FROM product_grow_movements as p LEFT JOIN product_grow_product_rfid as s on p.rfid = s.rfid LEFT JOIN product_grow_lists as m on m.id = s.room_id LEFT JOIN product as b on b.rowid = s.p_id WHERE ( (p.src = 0) or (p.dst < 1) ) and m.parent_id = 48 GROUP BY s.rfid as stable'))
                //         ->where('stock_value', '>', 0)
                //         ->get();

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
        if( $request->input('mode') == 'release_plant' )
        {
            $src        = $request->input('src');
            $dst        = $request->input('dst');
            $rfids       = $request->input('RFID');
            $date       = $request->input('date');
            $fl_weight  = $request->input('fl_weight');
            $wa_weight  = $request->input('wa_weight');
            $date   = date("Y-m-d", strtotime($date));
            $product_date = date("Y-m-d H:i:s");

            foreach ($rfids as $key => $rfid) {
                $ProductGrowProductRFID = ProductGrowProductRFID::find($rfid);
                $ProductGrowProductRFID->room_id = 0;
                $ProductGrowProductRFID->flowerweight = $fl_weight;
                $ProductGrowProductRFID->wasteweight = $wa_weight;
                $ProductGrowProductRFID->save();

                $ProductGrowMovement       = new ProductGrowMovement;
                $ProductGrowMovement->rfid = $rfid;
                $ProductGrowMovement->src  = $src;
                $ProductGrowMovement->dst  = 0;
                $ProductGrowMovement->qty  = 1;
                $ProductGrowMovement->date = $date;
                $ProductGrowMovement->type = 'release';
                $ProductGrowMovement->save();

                $fk_product = ProductGrowProductRFID::where('rfid',$rfid)->pluck('p_id');
                $fk_product = $fk_product[0];
                $StockMovement       = new StockMovement;
                $StockMovement->tms = $product_date;
                $StockMovement->datem  = $product_date;
                $StockMovement->fk_product  = $fk_product;
                $StockMovement->fk_entrepot  = $dst;
                $StockMovement->value = 1;
                $StockMovement->type_mouvement = 0;
                $StockMovement->fk_user_author = 1;
                $StockMovement->label = 'Stock correction for product';
                $StockMovement->inventorycode = 22222;
                $StockMovement->fk_origin = 0;
                $StockMovement->rfid = $rfid;

                $StockMovement->save();

                $stockCount = DB::table("product_stock")->select('*')
                        ->whereIn('fk_product',function($query) use ($dst, $rfid) {
                        $query->select('p_id')->from('product_grow_product_rfid')
                        ->where('fk_entrepot', $dst)
                        ->where('rfid', $rfid);
                        })
                        ->count();
                if($stockCount > 0 ) {
                    $ProductStock = ProductStock::whereIn('fk_product',function($query) use ($dst, $rfid) {
                        $query->select('p_id')->from('product_grow_product_rfid')
                        ->where('fk_entrepot', $dst)
                        ->where('rfid', $rfid);
                        })
                        ->first();
                    $ProductStock->reel = $ProductStock->reel + 1;
                    $ProductStock->rfid = $rfid;
                    $ProductStock->save();
                } else {
                    $ProductStock = new ProductStock;
                    $ProductStock->tms = $product_date;
                    $ProductStock->fk_product = $fk_product;
                    $ProductStock->fk_entrepot = $dst;
                    $ProductStock->reel = 1;
                    $ProductStock->rfid = $rfid;
                    $ProductStock->save();
                }
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

    public function plantAjaxFileUpload(Request $request) {
        if($request->input('action') == 'file_upload_add_data_dialog') {
            $room_id    = $request->input('room_id');
             if ($request->hasFile('file')) {
                $validatedData = $request->validate([
                    'file' => 'required|mimes:txt'
                ]);
                $file     = $request->file('file');
                $fileName = $file->getClientOriginalName();
                $filedata = [];
                $output_result = '';
                foreach(file($file->getRealPath()) as $line) {
                    $output_result = explode(",",$line);
                    $suboutput_data = substr($output_result[1], 1, -1);
                    array_push( $filedata , $suboutput_data);
                }
                $room_rows = ProductGrowListSetting::where('room_id', $room_id)->where('key', 'rows')->pluck('value');
                $room_cols = ProductGrowListSetting::where('room_id', $room_id)->where('key', 'columns')->pluck('value');

                $emptyList = [];

                for( $i = 0 ; $i < $room_rows[0] ; $i ++ ) {
                    for( $j = 0 ; $j < $room_cols[0] ; $j ++ ) {
                        $position_result_count = ProductGrowProductRFID::where('rol', $i)->where('col', $j)->where('room_id', $room_id)->get()->count();
                        if($position_result_count > 0) {
                            array_push( $emptyList , array( 'r' => $i , 'c' => $j ) );
                        }
                    }
                }
                $j = 0;
                $data = '';
                for ( $i = 0; $i < count( $filedata ); $i++) {
                    if( $filedata[$i] !="dentifie" && $filedata[$i] !="" ){               
                        $no = $j + 1;
                        
                        $data .= '<tr class="">';
                        $data .= '<td class="">'.$no.'</td>
                                    <td>'.$filedata[$i].'</td>
                                    <td><input class="form-control" type="text" value='.$emptyList[$j]['r'].' name=""></td>
                                    <td><input class="form-control" type="text" name="" value='.$emptyList[$j]['c'].'></td>
                                    <td onclick="change_state_modal(\'clone\' , this)">Clone</td>
                                    <td><input type="hidden" name="sel_product_id'.$j.'" id="sel_product_id'.$j.'"><input id="productNameList'.$j.'" class="form-control" type="text" name="productName'.$j.'"></td>
                                    <td><input class="form-control" type="text" name=""></td>
                                    <td class="fileupload_modal_delete_area modal_row_delete" id="modal_row_delete'.$j.'"><span>&#10540</span></td>';
                        $data .= '</tr>';
                        $j++;
                    }
                }
                echo $data .= "<input type='hidden' name='totalview' id='totalview' value='$j'> ";
            }

        }
    } 
}