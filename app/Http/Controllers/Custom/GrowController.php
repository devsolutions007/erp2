<?php

namespace App\Http\Controllers\Custom;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\ProductGrowList;
use App\Product;
use App\ProductGrowMovement;
use App\ProductGrowProductRFID;
use App\Entrepot;
use App\StockMovement;
use App\ProductStock;
use App\ProductGrowListSetting;
use App\ProductGrowListSettingGlobal;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use File;
use Session;


class GrowController extends Controller
{
    
    public function index() 
    {
        $growAreas = ProductGrowList::where( 'parent_id', '=', 0 )->get();
        $growRooms = ProductGrowList::where( 'parent_id', '=', 1 )->get();
        $warehouseList = Entrepot::all();
        return view('custom.grow.index', compact('growAreas', 'growRooms', 'warehouseList'));
    }

    public function growArea() 
    {
        
        $growAreas = ProductGrowList::where( 'parent_id', '=', 0 )->get();
        $growRooms = ProductGrowList::where( 'parent_id', '>', 0 )->get();
        return view('custom.grow.growArea', compact('growAreas', 'growRooms'));
    }

    public function growAreaAdd(Request $request) 
    {
        $date = date('Y-m-d');
        $user = Auth::user()->username;

        $productGrowList = new ProductGrowList;
        $productGrowList->name =  $request->input('name');
        $productGrowList->type =  1;
        $productGrowList->licence_num = $request->input('licence_number');
        $productGrowList->reg_date = $date;
        $productGrowList->parent_id = 0;
        $productGrowList->owner = $user;
        $productGrowList->save();
        $data = array(
                    array('parent_id'=> $productGrowList->id, 'name'=>'clone', 'reg_date' => $date, 'owner' => $user ,'type'=>2),
                    array('parent_id'=> $productGrowList->id, 'name'=>'Vegetation', 'reg_date' => $date, 'owner' => $user ,'type'=>3),
                    array('parent_id'=> $productGrowList->id, 'name'=>'Flower', 'reg_date' => $date, 'owner' => $user ,'type'=>4),
                    array('parent_id'=> $productGrowList->id, 'name'=>'Cutweigh-wet', 'reg_date' => $date, 'owner' => $user ,'type'=>7),
                    array('parent_id'=> $productGrowList->id, 'name'=>'Harvest-drying', 'reg_date' => $date, 'owner' => $user ,'type'=>5),
                    array('parent_id'=> $productGrowList->id, 'name'=>'Harvest-curing', 'reg_date' => $date, 'owner' => $user ,'type'=>6)
                );
        ProductGrowList::insert($data);

        Session::flash('message', 'Succesfully added'); 
        Session::flash('alert-class', 'alert-success');
        return redirect('grow/growArea?growMenu=visible');
    }
    
    public function growAreaEdit(Request $request) {
        
        $date = date('Y-m-d');
        $user = Auth::user()->username;
        $productGrowList = ProductGrowList::find($request->input('editGrowAreaId'));
        $productGrowList->name =  $request->input('name');
        if($productGrowList->type != 1) {
            $productGrowList->type =  $request->input('type');
        }
        
        $productGrowList->licence_num = $request->input('licence_number');
        $productGrowList->reg_date = $date;
        $productGrowList->owner = $user;
        $productGrowList->save();

        Session::flash('message', 'Succesfully updated'); 
        Session::flash('alert-class', 'alert-success');
        return redirect('grow/growArea?growMenu=visible');
    }
    // delete grow area 
    public function growAreaAjax(Request $request) 
    {
        if($request->input('action') == 'remove_grow_area') 
        {
            $productGrowList = ProductGrowList::find($request->input('id'));
            if($productGrowList->type == 1) 
            {
                $productGrowListRooms = ProductGrowList::where('parent_id', $productGrowList->id)->get();
                foreach ($productGrowListRooms as $productGrowListRoom) {
                    $productGrowListRoom->delete();
                }
                $productGrowList->delete();

            } else {
                $productGrowList->delete();
            }
            
            echo "success"; 
        }
    }
    // delete grow area

    public function room() 
    {
        $growAreas = ProductGrowList::where( 'parent_id', '=', 0 )->get();
        return view('custom.grow.settings.room', compact('growAreas'));
    }

    public function settingsRoomAjax(Request $request) 
    {
        if($request->input('action') == 'get_room_list') 
        {
            $area_id = $request->input('area_id');
            $options = '';

            $growRooms = ProductGrowList::where( 'parent_id', '=', $area_id )->get();

            foreach ($growRooms as $key => $row) 
            {
                $options .= "<option value='".$row->id."' rtype='".$row->type."'>".$row->name."</option>";
            }
            echo $options;

        } 

       if($request->input('action') == 'get_room_setting')  
       {
           $room_id =  $request->input('room_id');
           $result = [];
           $ProductGrowListSettings = ProductGrowListSetting::where('room_id', $room_id)->get(['key', 'value']);

           foreach ($ProductGrowListSettings as $ProductGrowListSetting) {
               $result[ $ProductGrowListSetting->key ] = $ProductGrowListSetting->value;
           }
           echo json_encode( $result );
       }

       if($request->input('action') == 'update_room_setting')  
       {
            $room_id                = $request->input('room_id');
            $rows                   = $request->input('rows');
            $grow_days              = $request->input('grow_days');
            $alarm_days             = $request->input('alarm_days');
            $columns                = $request->input('columns');
            $offsetX                = $request->input('offsetX');
            $offsetY                = $request->input('offsetY');
            $col_per_block          = $request->input('col_per_block');
            $room_hgap              = $request->input('room_hgap');
            $row_per_block          = $request->input('row_per_block');
            $room_wgap              = $request->input('room_wgap');
            $cell_height            = $request->input('cell_height');
            $cell_width             = $request->input('cell_width');

            $ProductGrowListSettings = ProductGrowListSetting::where('room_id', $room_id)->get();
            $update_data = [];
            array_push($update_data , 
                array('rows'                    , $rows ),
                array('grow_days'               , $grow_days ),
                array('alarm_days'              , $alarm_days ),
                array('columns'                 , $columns ), 
                array('offsetX'                 , $offsetX ),
                array('offsetY'                 , $offsetY ),
                array('col_per_block'           , $col_per_block ),
                array('room_hgap'               , $room_hgap ),
                array('row_per_block'           , $row_per_block ),
                array('room_wgap'               , $room_wgap ),
                array('cell_height'             , $cell_height ),
                array('cell_width'              , $cell_width )
            );


            foreach ($ProductGrowListSettings as $key => $ProductGrowListSetting) {
                $ProductGrowListSetting->room_id = $room_id;
                $ProductGrowListSetting->key = $update_data[$key][0];
                $ProductGrowListSetting->value = $update_data[$key][1];
                $ProductGrowListSetting->save();
            }
            echo "success";
        }
    }

    public function global() {
        
        $globalColorLists = ProductGrowListSettingGlobal::all();
        return view('custom.grow.settings.global', compact('globalColorLists'));
    }

    public function saveColorSettings(Request $request) 
    {
        $globalColorLists = ProductGrowListSettingGlobal::all();
        foreach ($globalColorLists as $key => $globalColorList) {
        
            //$globalColor = ProductGrowListSettingGlobal::where('rowid', $globalColorList->rowid);
            if($globalColorList->key == 'clone_color') $globalColorList->value =  $request->input('clone_color'); 

            if($globalColorList->key == 'vegetation_color')  $globalColorList->value = $request->input('vegetation_color'); 
            if($globalColorList->key == 'flower_color')  $globalColorList->value = $request->input('flower_color');

            if($globalColorList->key == 'cutweigh_wet_color')  $globalColorList->value = $request->input('cutweigh_wet_color');

            if($globalColorList->key == 'harvest_drying_color')  $globalColorList->value = $request->input('harvest_drying_color'); 

            if($globalColorList->key == 'harvest_curing_color')  $globalColorList->value = $request->input('harvest_curing_color');
            $globalColorList->save();
        }
        Session::flash('message', 'Succesfully Saved'); 
        Session::flash('alert-class', 'alert-success');
        return redirect('grow/settings/global?growMenu=visible'); 
    }

    /* plant growing part*/

    public function growIndex() 
    {
        $growAreas = ProductGrowList::where( 'parent_id', '=', 0 )->get();
        $growRooms = ProductGrowList::where( 'parent_id', '>', 0 )->get();
        $warehouseList = Entrepot::all();
        $date = date("Y-m-d");

        $query = DB::table('product_grow_movements as b')
                        ->leftJoin('product_grow_product_rfid as a', 'a.rfid', '=', 'b.rfid')
                        ->leftJoin('product_grow_lists as c', 'b.src', '=', 'c.id' )
                        ->leftJoin('product as d', 'a.p_id', '=', 'd.rowid');

        if(request()->growMode == 'new') 
        {
            $query->where('b.date', '=', $date)->where('b.type', '=', request()->growMode);
            $query->select('d.label as label', 'a.rfid as rfid', 'c.name as srcname', 'a.parent_rfid as parent_rfid');
        }
        if(request()->growMode == 'move') 
        {
            $query->leftJoin('product_grow_lists as e', 'b.dst', '=', 'e.id' );
            $query->where('b.date', '=', $date)->where('b.type', '=', request()->growMode);
            $query->select('d.label as label', 'a.rfid as rfid', 'c.name as srcname', 'e.name as dstname', 'a.parent_rfid as parent_rfid');
        }  
        if(request()->growMode == 'release') 
        {
            $query->leftJoin('entrepots as e', 'b.dst', '=', 'e.id' );
            $query->where('b.date', '=', $date)->where('b.type', '=', request()->growMode);
            $query->select('d.label as label', 'a.rfid as rfid', 'a.flowerweight as flowerweight', 'a.wasteweight as wasteweight', 'c.name as srcname', 'e.label as dstname', 'a.parent_rfid as parent_rfid');
        }  
                
        $product_lists = $query->get();

        return view('custom.grow.growing.index', compact('growAreas', 'growRooms', 'warehouseList', 'product_lists'));
        
    }


    public function growingAddGrow(Request $request) 
    {
        if(request()->growMode == 'new') 
        {
            $date    = $request->input('processDate');
            $src     = $request->input('growArea');
            $p_id    = $request->input('productId');
            $rfid    = $request->input('metricId');       
            $p_rfid  = $request->input('parentMetricId');
            $rol     = $request->input('row');
            $col     = $request->input('col');
            $date = date("Y-m-d", strtotime($date));

            $ProductGrowProductRFID = new ProductGrowProductRFID;
            $ProductGrowProductRFID->rfid = $rfid;
            $ProductGrowProductRFID->p_id = $p_id;
            $ProductGrowProductRFID->birthdate = $date;
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
            $ProductGrowMovement->date = $date;
            $ProductGrowMovement->type = 'new';
            $ProductGrowMovement->save();
            Session::flash('message', 'Succesfully Added'); 
            Session::flash('alert-class', 'alert-success');
            return redirect('/grow/growing/index?growMenu=visible&growMode=new');
        } 

        if(request()->growMode == 'move') 
        {
            $date    = $request->input('processDate');
            $src     = $request->input('sourceRoom');
            $dst     = $request->input('destinationRoom');
            $p_id    = $request->input('productId');
            $rfid    = $request->input('metricId');
            $date = date("Y-m-d", strtotime($date));

            $ProductGrowMovement = new ProductGrowMovement;
            $ProductGrowMovement->rfid = $rfid;
            $ProductGrowMovement->src = $src;
            $ProductGrowMovement->dst = $dst;
            $ProductGrowMovement->qty = 1;
            $ProductGrowMovement->date = $date;
            $ProductGrowMovement->type = 'move';
            $ProductGrowMovement->save();
            Session::flash('message', 'Succesfully moved'); 
            Session::flash('alert-class', 'alert-success');
            return redirect('/grow/growing/index?growMenu=visible&growMode=move');
        }

        if(request()->growMode == 'release') 
        {
            $date    = $request->input('processDate');
            $src     = $request->input('growArea');
            $dst     = $request->input('wareHouse');
            $p_id    = $request->input('productId');
            $rfid    = $request->input('metricId');
            $flowerWeight    = $request->input('flowerWeight');
            $wasteWeight    = $request->input('wasteWeight');
            $date = date("Y-m-d", strtotime($date));

            $ProductGrowMovement       = new ProductGrowMovement;
            $ProductGrowMovement->rfid = $rfid;
            $ProductGrowMovement->src  = $src;
            $ProductGrowMovement->dst  = $dst;
            $ProductGrowMovement->qty  = 1;
            $ProductGrowMovement->date = $date;
            $ProductGrowMovement->type = 'release';
            $ProductGrowMovement->save();

            $ProductGrowProductRFID = ProductGrowProductRFID::find($rfid);
            $ProductGrowProductRFID->flowerweight = $flowerWeight;
            $ProductGrowProductRFID->wasteweight = $wasteWeight;
            //$ProductGrowProductRFID->parent_rfid = $parent_rfid;
            $ProductGrowProductRFID->save();

            Session::flash('message', 'Succesfully Released'); 
            Session::flash('alert-class', 'alert-success');
            return redirect('/grow/growing/index?growMenu=visible&growMode=release');
        }
        
    }
    public function growingAjax(Request $request) 
    {
        if($request->input('action') == 'remove_growing') 
        {
            $ProductGrowMovement = ProductGrowMovement::where('rfid', $request->input('id'));
            $ProductGrowMovement->delete();
            echo "success"; 
        }
    }


    public function historyIndex() 
    {
        
        $growAreas = ProductGrowList::where( 'parent_id', '=', 0 )->get();
        $startdate = date("Y-m-01");
        $lastdate = date("Y-m-d");
        $move_src = '';
        $rfid = '';

        $histories = DB::table('product_grow_movements as p')
                        ->leftJoin('product_grow_product_rfid as s', 'p.rfid', '=', 's.rfid')
                        ->leftJoin('product as b', 'b.rowid', '=', 's.p_id')
                        ->leftJoin('product_grow_lists as c', 'c.id', '=', 'p.src' )
                        ->leftJoin('product_grow_lists as d', 'd.id', '=', 'p.dst' )
                        ->whereBetween('p.date', [$startdate, $lastdate])
                        ->select('s.p_id as productid', 'p.date as date', 'b.label as label', 'p.rfid as rfid', 'c.name as srcname', 'd.name as dstname')
                        ->groupBy('s.rfid')
                        ->get();

        return view('custom.grow.history.index', compact('histories', 'startdate', 'lastdate', 'growAreas', 'move_src', 'rfid'));
    }

    public function historySearchResult(Request $request) 
    {
        $rfid = '';
        $growAreas = ProductGrowList::where( 'parent_id', '=', 0 )->get();
        $startdate = date("Y-m-d", strtotime($request->input('startdate')));
        $lastdate = date("Y-m-d", strtotime($request->input('lastdate')));
        $rfid  = $request->input('metricId');
        $move_src = $request->input('growArea');
        if($rfid != '') {
            $histories = DB::table('product_grow_movements as p')
                        ->leftJoin('product_grow_product_rfid as s', 'p.rfid', '=', 's.rfid')
                        ->leftJoin('product as b', 'b.rowid', '=', 's.p_id')
                        ->leftJoin('product_grow_lists as c', 'c.id', '=', 'p.src' )
                        ->leftJoin('product_grow_lists as d', 'd.id', '=', 'p.dst' )
                        ->whereBetween('p.date', [$startdate, $lastdate])
                        ->where('c.parent_id', $move_src)
                        ->where('p.rfid', $rfid)
                        ->select('s.p_id as productid', 'p.date as date', 'b.label as label', 'p.rfid as rfid', 'c.name as srcname', 'd.name as dstname')
                        ->groupBy('s.rfid')
                        ->get();
        } else {
            $histories = DB::table('product_grow_movements as p')
                        ->leftJoin('product_grow_product_rfid as s', 'p.rfid', '=', 's.rfid')
                        ->leftJoin('product as b', 'b.rowid', '=', 's.p_id')
                        ->leftJoin('product_grow_lists as c', 'c.id', '=', 'p.src' )
                        ->leftJoin('product_grow_lists as d', 'd.id', '=', 'p.dst' )
                        ->whereBetween('p.date', [$startdate, $lastdate])
                        ->where('c.parent_id', $move_src)
                        ->select('s.p_id as productid', 'p.date as date', 'b.label as label', 'p.rfid as rfid', 'c.name as srcname', 'd.name as dstname')
                        ->groupBy('s.rfid')
                        ->get();
        }
        
        
        return view('custom.grow.history.index', compact('histories', 'startdate', 'lastdate', 'growAreas', 'move_src', 'rfid'));
    }

    public function mgtGUI() 
    {
        
        $growAreas = ProductGrowList::where( 'parent_id', '=', 0 )->get();
        $growRooms = ProductGrowList::where( 'parent_id', '=', 1 )->get();
        $warehouseList = Entrepot::all();
        return view('custom.grow.mgt_gui', compact('growAreas', 'growRooms', 'warehouseList'));
    }
   
    public function roomAjax(Request $request) 
    {
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

    public function getroomAjax(Request $request) 
    {
        if( $request->input('action') == 'get_room_setting' )
        {
            $result = array();

            $room_id = $request->input('room_id');

            $productGrowListSettings = DB::table('product_grow_list_setting')->select('key','value')->where('room_id', $room_id);

            $setting_lists = DB::table('product_grow_list_setting_global')->select('key','value')->unionAll($productGrowListSettings)->get();

            if(count($setting_lists) > 0) {
                foreach ($setting_lists as $key => $setting_value) {
                    $result[ $setting_value->key ] = $setting_value->value;
                }
            } 
            echo json_encode( $result );
        }
    }

    public function getplantAjax(Request $request) 
    {
        if( $request->input('action') == 'get_plant_list' )
        {
            $room_id = $request->input('room_id');
            $product_lists = [];
            $product_lists = $this->grow_stock_product_search( $room_id );

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

        // get Room info in GUI Modal
        if( $request->input('action') == 'plant_get_roominfor' )
        {
            $room_id = $request->input('room_id');
            $this_month = date("m");
            $this_year = date("Y");
            $output_room_infor = [];

            $productGrowListSettings = DB::table('product_grow_list_setting')->select('key','value')->where('room_id', $room_id);

            $roominfors = DB::table('product_grow_list_setting_global')->select('key','value')->unionAll($productGrowListSettings)->get();

            if(count($roominfors) > 0) 
            {
                foreach ($roominfors as $roominfor) 
                {
                    if( $roominfor->key =="rows" ) $rows = $roominfor->value;

                    if( $roominfor->key =="grow_days" ) $days = $roominfor->value;

                    if( $roominfor->key =="columns" ) $columns = $roominfor->value;
                }
            }
            $cells = $rows * $columns;

            $plantinfors = $this->grow_stock_product_search( $room_id );
            $all_plant_cnt = count( $plantinfors );
            $clone_count            = 0;
            $flower_count           = 0;
            $vegetation_count       = 0;
            $harvest_drying_count   = 0;
            $harvest_curing_count   = 0;
            $cutweigh_wet_count     = 0;

            foreach ($plantinfors as $plantinfor) 
            {
                if( $plantinfor->state == "clone" )           $clone_count ++ ;
                if( $plantinfor->state == "flower" )          $flower_count ++ ;
                if( $plantinfor->state == "vegetation" )      $vegetation_count ++ ;
                if( $plantinfor->state == "harvest-drying" )  $harvest_drying_count ++ ;
                if( $plantinfor->state == "harvest-curing" )  $harvest_curing_count ++ ;
                if( $plantinfor->state == "Cutweigh-wet" )    $cutweigh_wet_count ++ ;
            }

            $monthly_process = $this->grow_product_iostock( $room_id ,'', $this_year , $this_month);
            
            $yearly_process = $this->grow_product_iostock( $room_id , '' ,  $this_year , '');
            //return json_encode( $yearly_process );
            $monthly_import = $monthly_process[0]->import_stock;
            $monthly_output = $monthly_process[0]->output_stock;
            $yearly_import  = $yearly_process[0]->import_stock;
            $yearly_output  = $yearly_process[0]->output_stock;

            array_push($output_room_infor , 
                array('all_plant'   , $all_plant_cnt ),
                array('rows'            , $rows ),
                array('days'            , $days ),
                array('columns'         , $columns ), 
                array('cells'           , $cells ),
                array('clone'           , $clone_count ),
                array('flower'          , $flower_count ),
                array('vegetation'      , $vegetation_count ),
                array('harvest-drying'  , $harvest_drying_count ),
                array('harvest-curing'  , $harvest_curing_count ),
                array('Cutweigh-wet'    , $cutweigh_wet_count ),
                array('month_input'     , $monthly_import ),
                array('month_output'    , $monthly_output ),
                array('year_input'      , $yearly_import ),
                array('year_output'     , $yearly_output )
            );

        echo json_encode( $output_room_infor );
        }
    }

    // Start Get the I/O relation data of room 
    public function grow_product_iostock( $room_id , $RFID='' , $Yeartime='' , $Monthtime='' )
    {
        $product_lists = [];
        $query = DB::table('product_grow_movements as p')
                                ->leftJoin('product_grow_product_rfid as s', 'p.rfid', '=', 's.rfid')
                                ->leftJoin('product_grow_lists as m', 'm.id', '=', 'p.src' )
                                ->leftJoin('product_grow_lists as n', 'n.id', '=', 'p.dst' )
                                ->leftJoin('product as b', 'b.rowid', '=', 's.p_id');

                                $query->whereRaw('((p.src = '.$room_id.') or (p.dst = '.$room_id.'))');

                                if($RFID) $query->where('p.rfid', '=', $RFID);

                                if($Monthtime) $query->whereMonth('p.date', '=', $Monthtime);

                                if($Yeartime) $query->whereYear('p.date', '=', $Yeartime);

                                 $query->select('p.date', 'b.label', 'p.rfid', 's.p_id', 's.birthdate', 's.col', 's.rol', 's.parent_rfid', 's.state', 'n.name', DB::raw("SUM(if((p.src = '".$room_id."') , p.qty , 0 )) as output_stock, SUM(if((p.dst = '".$room_id."') , p.qty , 0 )) as import_stock"));
                                
                                $query->groupBy('p.rfid');
                                

                                
                                //$query->where('stock_value', '>', 0); 
                                 $product_lists = $query->get();
                            return $product_lists;
    }
    // End Get the I/O relation data of room 

    // start search product by only grow_id function
    public function grow_stock_productby_growarea( $grow_id )
    {
        $product_lists = [];
        $query = DB::table('product_grow_movements as p')
                                ->leftJoin('product_grow_product_rfid as s', 'p.rfid', '=', 's.rfid')
                                ->leftJoin('product_grow_lists as m', 'm.id', '=', 's.room_id' )
                                ->leftJoin('product as b', 'b.rowid', '=', 's.p_id')
                                ->whereRaw('(p.src = 0 or p.dst < 1)')
                                ->where('m.parent_id', '=', $grow_id)
                                ->select('b.label', 'p.rfid', 's.p_id', 's.birthdate', 's.col', 's.rol', 's.parent_rfid', 's.state', 'm.name', DB::raw("SUM( ( case when (p.src = NULL) then -p.qty else p.qty end ) ) AS stock_value"))
                                ->groupBy('s.rfid');
                                //->where('stock_value', '>', 0);
                $product_lists = $query->get();
                return $product_lists;
    }
    // End 
    //  Start grow product search function by room_id, RFID, room_time, product_id, grow_id
    public function grow_stock_product_search( $room_id , $RFID= NULL , $room_time= NULL , $product_id= NULL , $grow_id = NULL ) 
    {  

        $product_lists = [];
        $query = DB::table('product_grow_movements as p')
                                ->leftJoin('product_grow_product_rfid as s', 'p.rfid', '=', 's.rfid')
                                ->leftJoin('product_grow_lists as m', 'm.id', '=', 'p.src' )
                                ->leftJoin('product_grow_lists as n', 'n.id', '=', 'p.dst' )
                                ->leftJoin('product as b', 'b.rowid', '=', 's.p_id');
                                
                                if( is_numeric( $room_id ) ) { 

                                    $query->whereRaw('((p.src = '.$room_id.') or (p.dst = '.$room_id.'))')
                                          ->select('b.label', 'p.rfid', 's.p_id', 's.birthdate', 's.col', 's.rol', 's.parent_rfid', 's.state', 'n.name', DB::raw("SUM( ( case when (p.src = '".$room_id."') then -p.qty else p.qty end ) ) AS stock_value"));
                                } else {
                                    $query->whereRaw('(p.src in (select id from product_grow_lists where parent_id = '.$grow_id.' )) or (p.dst in (select id from product_grow_lists where parent_id = '.$grow_id.'))')
                                          ->select('b.label', 'p.rfid', 's.p_id', 's.birthdate', 's.col', 's.rol', 's.parent_rfid', 's.state', 'n.name', DB::raw("SUM( ( case when (p.src in (select id from product_grow_lists where parent_id = '".$grow_id."' )) then -p.qty else p.qty end ) ) AS stock_value"));
                                }
                                
                                if($RFID) $query->where('p.rfid', '=', $RFID);

                                if($room_time) $query->where('s.birthdate', '=', $room_time);

                                if($product_id) $query->where('s.p_id', '=', $product_id);
                                $query->groupBy('p.rfid');
                                //$query->where('stock_value', '>', 0); 
                                $product_lists = $query->get();
                            return $product_lists;
    }
    // End 
    // get product by rfid
    public function grow_stock_productby_rfid( $rfid ) 
    {
        $product = [];
        $query = DB::table('product_grow_movements as p')
                                ->leftJoin('product_grow_product_rfid as s', 'p.rfid', '=', 's.rfid')
                                ->leftJoin('product_grow_lists as m', 'm.id', '=', 's.room_id' )
                                ->leftJoin('product as b', 'b.rowid', '=', 's.p_id')
                                ->whereRaw('(p.src = 0 or p.dst < 1)')
                                ->where('s.rfid', '=', $rfid)
                                ->select( 'p.src' , 'p.dst', 'p.date', 'p.type', 'm.name' , 'm.type', 'm.parent_id', 's.*' , DB::raw("SUM( ( case when (p.src = NULL) then -p.qty else p.qty end ) ) AS stock_value"))
                                ->groupBy('s.rfid');
                                //->where('stock_value', '>', 0)
        $product = $query->get();
        return $product;
    }
    /* Start search grow table data */

    public function ajaxSearchGrowTable(Request $request) 
    {
        if($request->input('mode') == 'searchResults') {
            $grow_id    = $request->input('grow_id');
            $room_id    = $request->input('room_id');
            $RFID       = $request->input('metric_id');
            $room_time  = $request->input('room_time');
            $product_id = '' ;
            if( $room_time )
                $room_plant_time  = date('Y-m-d', strtotime('-'.$room_time.' days', strtotime(date("Y-m-d"))));
            else
                $room_plant_time = "";

            $product_lists = [];


            if( $room_id == "all" ) 
            {
                $product_lists = $this->grow_stock_productby_growarea( $grow_id );
            } else {
                $product_lists = $this->grow_stock_product_search( $room_id , $RFID , $room_plant_time , '' , $grow_id );
                               
            }
            $data = '';
            $count = 1;
            $current = Carbon::now();
            if($product_lists != '') {
                foreach ($product_lists as $key => $product) {
                    if($product->stock_value > 0 ) {
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
                        $data .= "<td onclick='change_state_table(\"$product->rfid\", this )'>".$product->state."</td>";
                        $data .= '</tr>';
                    }
                }
            } else {
                $data = "<tr>Data not available</tr>";
            }
            echo $data;
            
        }

        if($request->input('mode') == 'change_state_table') 
        { 
            $rfid    = $request->input('rfid');
            $state   = $request->input('state');

            if($state == '' )                   $update_state = "clone";
            if($state == 'clone' )              $update_state = "vegetation";
            if($state == 'vegetation' )         $update_state = "flower";
            if($state == 'flower' )             $update_state = "Cutweigh-wet";
            if($state == 'Cutweigh-wet' )       $update_state = "harvest-drying";
            if($state == 'harvest-drying' )     $update_state = "harvest-curing";
            if($state == 'harvest-curing' )     $update_state = "clone";

            $ProductGrowProductRFID = ProductGrowProductRFID::find($rfid);
            $ProductGrowProductRFID->state = $update_state;
            $ProductGrowProductRFID->save();
            echo $update_state;
        }
    }
    /* End Search gtow Table data */

    /* Start grow modal function */
    public function ajaxRequestGrowModal(Request $request) 
    {

        /* add grow plant */

        if( $request->input('mode') == 'add_plant' )
        {
            $date    = $request->input('date');
            $src     = $request->input('src');
            $p_id    = $request->input('p_id');
            $rfid    = $request->input('rfid');
            $p_rfid  = $request->input('p_rfid');
            $rol     = $request->input('rol');
            $col     = $request->input('col');

            $date = date("Y-m-d", strtotime($date));

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
                $ProductGrowProductRFID->birthdate = $date;
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
                $ProductGrowMovement->date = $date;
                $ProductGrowMovement->type = 'new';
                $ProductGrowMovement->save();
                echo "Success insert";

            }
        }
        /* end grow plant*/

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

    

    public function plantAjaxFileUpload(Request $request) 
    {
        /* Start file upload add plant */
        if($request->input('action') == 'file_upload_add_data_dialog') 
        {
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
                        if($position_result_count == 0) {
                            array_push( $emptyList , array( 'r' => $i , 'c' => $j ) );
                        }
                    }
                }
                //return $emptyList;
                $j = 0;
                $data = '';
                if(count($emptyList) > 0 ) 
                {
                    for ( $i = 0; $i < count( $filedata ); $i++) {
                        if( $filedata[$i] !="dentifie" && $filedata[$i] !="" ){               
                            $no = $j + 1;
                            //return $emptyList[$j]['c'];
                            $data .="<tr class='each_rfid_list'>
                                    <td><div class='plant_gui_top_left fileupload_modal_number_area'>$no</div></td>
                                    <td><div class='plant_gui_top_left fileupload_modal_rfid_area'>
                                        <div class='plant_gui_top_left' name='fileupload_modal_rfid_area' id='fileupload_modal_rfid$j'>$filedata[$i]</div>
                                        </div><p id='fileupload_modal_rfid_warning_add$j' class='modal_dialog_error_text_p' ></p></td>
                                    <td width='150'><div class='plant_gui_top_left fileupload_modal_rowcol_area'><div id='fileupload_modal_rowcol$j'><input type='text' id='row$j' name='row' class='form-control input_row_col_state' required value='".$emptyList[$j]['r']."' /> / <input type='text' id='col$j' name='col' class='form-control input_row_col_state_right' required value='".$emptyList[$j]['c']."' /></div></div><p id='fileupload_modal_rowcol_warning_add$j' class='modal_dialog_error_text_p'></p></td>
                                    <td><div name='fileupload_state_area' id='fileupload_state_area$j' class='img_cursor_show plant_gui_top_left fileupload_modal_state_area' onclick='change_state_modal(\"clone\" , this)'>clone</div></td>
                                    <td><div class='plant_gui_top_left fileupload_modal_plant_area'><input type='hidden' name='sel_product_id$j' id='sel_product_id$j' ><input id='productNameList$j' class='form-control' type='text' name='productNameList$j'></div></td>
                                    <td><div class='plant_gui_top_left fileupload_modal_parent_area' ><input type='text' id='modal_parent_rfid$j' name='modal_parent_rfid' class='form-control grow_set_width_100'/></div></td>
                                    <td class='fileupload_modal_delete_area modal_row_delete' id='modal_row_delete$j'><span>&#10540</span></td>
                                    </tr>";
                            $j++;
                        }
                    }
                    echo $data .= "<input type='hidden' name='totalview' id='totalview' value='$j'> ";
                } else { 
                    echo "<p class='alert alert-info'>No empty Rows/Colums available</p>";
                }
                
            }

        }

        if( $request->input('action') == 'fileupload_add_data_check' )
        {
            $data       = $request->input('data');
            $room_id    = $request->input('room_id'); 

            $rfid_check =  array();
            $postion_check =  array();

            for( $i = 0 ;$i < count( $data ) ; $i++ )
            {
                $rfid_check_count = ProductGrowProductRFID::where('rfid', $data[$i]['RFID'])->get()->count();

                if( $rfid_check_count  > 0 ) array_push($rfid_check , $data[$i]['uid']);

                $postion_check_count = ProductGrowProductRFID::where('rol', $data[$i]['r'])
                                        ->where('col', $data[$i]['c'])->where('room_id', $room_id)->get()->count();

                if( $postion_check_count  > 0 ) array_push($postion_check , $data[$i]['uid']);

            }

            $invalid_list =  array( 'rfid_check'  =>  $rfid_check  , 'postion_check' => $postion_check ) ;

            echo json_encode( $invalid_list );

        }

        if( $request->input('action') == 'fileupload_add_data' )
        {
            $data       = $request->input('data');
            $room_id    = $request->input('room_id'); 
            $today      = date("Y-m-d");

            for( $i = 0 ;$i < count( $data ) ; $i++ )
            {
                $ProductGrowProductRFID = new ProductGrowProductRFID;
        
                $ProductGrowProductRFID->rfid = $data[$i]["RFID"];
                $ProductGrowProductRFID->p_id = $data[$i]["p_id"];
                $ProductGrowProductRFID->birthdate = $today;
                $ProductGrowProductRFID->room_id = $room_id;
                $ProductGrowProductRFID->col = $data[$i]["c"];
                $ProductGrowProductRFID->rol = $data[$i]["r"];
                $ProductGrowProductRFID->parent_rfid = $data[$i]["parent"];
                $ProductGrowProductRFID->state = $data[$i]["state"]; 
                $ProductGrowProductRFID->save();

                $ProductGrowMovement = new ProductGrowMovement;
                $ProductGrowMovement->rfid = $data[$i]["RFID"];
                $ProductGrowMovement->dst = $room_id;
                $ProductGrowMovement->qty = 1;
                $ProductGrowMovement->date = $today;
                $ProductGrowMovement->type = 'new';
                $ProductGrowMovement->save();
            }
            echo "Success insert";
        }
        /* End  file upload add plant */

        /* Start file upload move plant */
        if( $request->input('action') == 'file_upload_move_data_dialog' ) 
        {
            $src_room    = $request->input('src_room');   
            $dst_room    = $request->input('dst_room');
            $room_id     = $dst_room;
            $room_time = ''; 

            if ($request->hasFile('file')) 
            {
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
                        if($position_result_count == 0) {
                            array_push( $emptyList , array( 'r' => $i , 'c' => $j ) );
                        }
                    }
                }
                //return $emptyList;
                $j = 0;
                $data = '';
                $grow_id = '';
                if(count($emptyList) > 0 ) 
                {
                    for ( $i = 0; $i < count( $filedata ); $i++) {
                        if( $filedata[$i] !="dentifie" && $filedata[$i] !="" )
                        {               
                            $no = $j + 1;
                            $product_lists = $this->grow_stock_product_search( $src_room , $filedata[$i] );
                            //return $product_lists;
                            $data .="<tr class='each_rfid_list'>
                                        <td><div class='plant_gui_top_left fileupload_modal_number_area'>$no</div></td>
                                        <td><div class='plant_gui_top_left' name='fileupload_modal_rfid_area' id='fileupload_modal_rfid$j'>$filedata[$i]</div>";
                            if($product_lists->count() > 0) {
                                return $plant_state = $product_lists[0]->state;
                                $data .= "</td>
                                <td width='200'><div class='plant_gui_top_left fileupload_modal_plant_area'>".$product_lists[0]->rol." / ".$product_lists[0]->col."</div></td>
                                <td width='200'><div id='fileupload_modal_rowcol$j' class='fileupload_modal_rowcol_area'>
                                    <input type='text' id='row$j' name='row' class='form-control input_row_col_state' required value='".$emptyList[$j]['r']."' />
                                    <input type='text' id='col$j' name='col' class='form-control input_row_col_state_right' required value='".$emptyList[$j]['c']."' />
                                </div>
                                </td>
                                <td><div name='fileupload_state_area' id='fileupload_state_area$j' class='img_cursor_show plant_gui_top_left fileupload_modal_state_area' onclick='change_state_modal(\"$plant_state\" , this)'>".$plant_state."</div></td>
                                <td class='fileupload_modal_delete_area modal_row_delete' id='modal_row_delete$j'><span>&#10540</span></td>
                                </tr>";
                            } else {
                                $data .= "<p id='fileupload_modal_rfid_warning_move$j' class='modal_dialog_error_text_p' >not found</p>
                                </td>
                                <td width='200'><div class='plant_gui_top_left fileupload_modal_plant_area'></div></td>
                                <td width='200'><div id='fileupload_modal_rowcol$j' class='fileupload_modal_rowcol_area'>
                                    <input type='text' id='row$j' name='row' class='form-control input_row_col_state' required value='' />
                                    <input type='text' id='col$j' name='col' class='form-control input_row_col_state_right' required value='' />
                                </div>
                                <p id='fileupload_modal_rowcol_warning_add$j' class='modal_dialog_error_text_p'></p>
                                </td>
                                <td><div name='fileupload_state_area' id='fileupload_state_area$j' class='img_cursor_show plant_gui_top_left fileupload_modal_state_area'></div></td>
                                <td class='fileupload_modal_delete_area modal_row_delete' id='modal_row_delete$j'><span>&#10540</span></td>
                                </tr>";
                            }
                            $j++;
                        }       
                    }
                    echo $data .= "<input type='hidden' name='totalview' id='totalview' value='$j'> ";
                } else {
                    echo "<p class='alert alert-info'>No empty Rows/Colums available</p>";
                }

            }

        }
        if($request->input('action') == 'fileupload_move_data') 
        {
            $plantList   = $request->input('data');
            $src    = $request->input('src');   
            $dst    = $request->input('dst'); 
            $today  = date("Y-m-d");

            for( $i = 0 ;$i < count( $plantList ) ; $i++ )
            {
                $ProductGrowMovement       = new ProductGrowMovement;
                $ProductGrowMovement->rfid = $plantList[$i]['RFID'];
                $ProductGrowMovement->src  = $src;
                $ProductGrowMovement->dst  = $dst;
                $ProductGrowMovement->qty  = 1;
                $ProductGrowMovement->date = $today;
                $ProductGrowMovement->type = 'move';
                $ProductGrowMovement->save();

                $ProductGrowProductRFID = ProductGrowProductRFID::find($plantList[$i]["RFID"]);
                if($ProductGrowProductRFID) {
                    $ProductGrowProductRFID->state = $plantList[$i]["state"];
                    $ProductGrowProductRFID->room_id = $dst;
                    $ProductGrowProductRFID->rol = $plantList[$i]["r"];
                    $ProductGrowProductRFID->col = $plantList[$i]["c"];
                    $ProductGrowProductRFID->birthdate = $today;
                    $ProductGrowProductRFID->save();
                } 

            }
            echo "success";
            
        }
        /* End  file upload move plant */

        /* Start file upload release plant */
        if( $request->input('action') == 'file_upload_release_data_dialog' ) 
        {
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
                $j= 0;
                for ( $i = 0; $i < count( $filedata ); $i++) {
                    if( $filedata[$i] !="dentifie" && $filedata[$i] !="" ){               
                        $no = $j + 1;
                        $rfid_data = $this->grow_stock_productby_rfid( $filedata[$i] );
                        echo "<tr class='each_rfid_list'>
                                <td><div class='plant_gui_top_left fileupload_modal_number_area'>$no</div></td>";
                        echo "<td><div class='plant_gui_top_left' name='fileupload_modal_rfid_area' id='fileupload_modal_rfid$j'>$filedata[$i]</div>";
                        if($rfid_data) {
                            
                        echo "</td><td><input type='hidden' id='plant_srcid$j' value='".$rfid_data[0]->room_id."'><div class='plant_gui_top_left fileupload_modal_rowcol_area'>".$rfid_data[0]->name."</div></td>
                            <td class='plant_gui_top_left fileupload_modal_plant_area'>
                                <div id='fileupload_modal_rowcol$j'>".$rfid_data[0]->rol." / ".$rfid_data[0]->col."</div></td>";
                        echo "<td><div name='fileupload_state_area' id='fileupload_state_area$j' class='img_cursor_show plant_gui_top_left fileupload_modal_state_area'>".$rfid_data[0]->state."</div></td>";
                        echo "<td class='plant_gui_top_left fileupload_modal_delete_area modal_row_delete' id='modal_row_delete$j'><span>&#10540</span></td> </tr>";
                        } else {
                             echo "<p id='fileupload_modal_rfid_warning_release$j' class='modal_dialog_error_text_p' >not found</p>";
                            echo "</td><td><input type='hidden' id='plant_srcid$j' value=''><div class='plant_gui_top_left fileupload_modal_rowcol_area'></div></td>
                                <td class='plant_gui_top_left fileupload_modal_plant_area'>
                                    <div id='fileupload_modal_rowcol$j'>  / </div></td>";
                            echo "<td><div name='fileupload_state_area' id='fileupload_state_area$j' class='img_cursor_show plant_gui_top_left fileupload_modal_state_area'></div></td>";
                            echo "<td class='plant_gui_top_left fileupload_modal_delete_area modal_row_delete' id='modal_row_delete$j'><span>&#10540</span></td> </tr>";
                        }
                        
                        $j++;
                    }
                }
                echo "<input type='hidden' name='totalview' id='totalview' value='$j'> ";
            }
        }

        if($request->input('action') == 'fileupload_release_data') 
        {
            $plantList       = $request->input('data');
            $date      = date("Y-m-d");
            $product_date = date("Y-m-d H:i:s");
            for( $i = 0 ;$i < count( $plantList ) ; $i++ )
            {
                $ProductGrowMovement       = new ProductGrowMovement;
                $ProductGrowMovement->rfid = $plantList[$i]['RFID'];
                $ProductGrowMovement->src  = $plantList[$i]['src'];
                $ProductGrowMovement->dst  = 0;
                $ProductGrowMovement->qty  = 1;
                $ProductGrowMovement->date = $date;
                $ProductGrowMovement->type = 'release';
                $ProductGrowMovement->save();

                $ProductGrowProductRFID = ProductGrowProductRFID::find($plantList[$i]["RFID"]);
                if($ProductGrowProductRFID) {
                    $ProductGrowProductRFID->room_id = 0;
                    $ProductGrowProductRFID->save();
                }
                $dst = $plantList[$i]['dst'];
                $rfid = $plantList[$i]['RFID'];

                $fk_product = ProductGrowProductRFID::where('rfid', $rfid)->pluck('p_id');
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
                $StockMovement->rfid = $plantList[$i]['RFID'];

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

        /* End  file upload release plant */

        /* Start file upload remove plant */
        if($request->input('action') == 'file_upload_remove_data_dialog') 
        {
            if ($request->hasFile('file')) 
            {
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

                $j = 0;
                for ( $i = 0; $i < count( $filedata ); $i++) {
                    if( $filedata[$i] !="dentifie" && $filedata[$i] !="" ){               
                        $no = $j + 1;
                        $rfid_data = $this->grow_stock_productby_rfid( $filedata[$i] );

                        echo "<tr class='each_rfid_list'>
                                <td><div class='plant_gui_top_left fileupload_modal_number_area'>$no</div></td>";
                        echo "<td><div class='plant_gui_top_left' name='fileupload_modal_rfid_area' id='fileupload_modal_rfid$j'>$filedata[$i]</div>";
                        if($rfid_data) {
                            echo "</td><td><input type='hidden' id='plant_srcid$j' value='".$rfid_data[0]->room_id."'><div class='plant_gui_top_left fileupload_modal_rowcol_area'>".$rfid_data[0]->name."</div></td>
                                <td class='plant_gui_top_left fileupload_modal_plant_area'>
                                    <div id='fileupload_modal_rowcol$j'>".$rfid_data[0]->rol." / ".$rfid_data[0]->col."</div></td>";
                            echo "<td><div name='fileupload_state_area' id='fileupload_state_area$j' class='img_cursor_show plant_gui_top_left fileupload_modal_state_area'>".$rfid_data[0]->state."</div></td>";
                            echo "<td class='plant_gui_top_left fileupload_modal_delete_area modal_row_delete' id='modal_row_delete$j'><span>&#10540</span></td> </tr>";
                        } else {
                            echo "<p id='fileupload_modal_rfid_warning_remove$j' class='modal_dialog_error_text_p' >not found</p>";
                            echo "</td><td><input type='hidden' id='plant_srcid$j' value=''><div class='plant_gui_top_left fileupload_modal_rowcol_area'></div></td>
                                <td class='plant_gui_top_left fileupload_modal_plant_area'>
                                    <div id='fileupload_modal_rowcol$j'></div></td>";
                            echo "<td><div name='fileupload_state_area' id='fileupload_state_area$j' class='img_cursor_show plant_gui_top_left fileupload_modal_state_area'></div></td>";
                            echo "<td class='plant_gui_top_left fileupload_modal_delete_area modal_row_delete' id='modal_row_delete$j'><span>&#10540</span></td> </tr>";
                        }
                        $j++;
                    }
                }
                echo "<input type='hidden' name='totalview' id='totalview' value='$j'> ";
            }

            
        }

        if($request->input('action') == 'fileupload_remove_data')
        {
            $plantList       = $request->input('data');
            $today      = date("Y-m-d");

            for( $i = 0 ;$i < count( $plantList ) ; $i++ )
            {
                $ProductGrowMovement = new ProductGrowMovement;
                $ProductGrowMovement->rfid = $plantList[$i]["RFID"];
                $ProductGrowMovement->src  = $plantList[$i]["src"];
                $ProductGrowMovement->dst  = -1;
                $ProductGrowMovement->qty  = 1;
                $ProductGrowMovement->date = $today;
                $ProductGrowMovement->type = 'release';
                $ProductGrowMovement->save();

                $ProductGrowProductRFID = ProductGrowProductRFID::find($plantList[$i]["RFID"]);
                $ProductGrowProductRFID->room_id = -1;
                $ProductGrowProductRFID->save();
            }
            echo "success";
        } 

        /* End  file upload remove plant */

        /* Start file upload state change plant */

        if( $request->input('action') == 'file_upload_state_data_dialog' )
        {
            if ($request->hasFile('file')) 
            {
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

                $j = 0;
                for ( $i = 0; $i < count( $filedata ); $i++) {
                    if( $filedata[$i] !="dentifie" && $filedata[$i] !="" ){               
                        $no = $j + 1;
                        $rfid_data = $this->grow_stock_productby_rfid( $filedata[$i] );

                        if( $rfid_data[0]->state == '' )                $next_state = "clone";
                        if( $rfid_data[0]->state == 'clone' )           $next_state = "vegetation";
                        if( $rfid_data[0]->state == 'vegetation' )      $next_state = "flower";
                        if( $rfid_data[0]->state == 'flower' )          $next_state = "Cutweigh-wet";
                        if( $rfid_data[0]->state == 'Cutweigh-wet' )    $next_state = "harvest-drying";
                        if( $rfid_data[0]->state == 'harvest-drying' )  $next_state = "harvest-curing";
                        if( $rfid_data[0]->state == 'harvest-curing' )  $next_state = "clone";

                        echo "<tr class='each_rfid_list'>
                                <td><div class='plant_gui_top_left fileupload_modal_number_area'>$no</div></td>";
                        echo "<td><div class='plant_gui_top_left' name='fileupload_modal_rfid_area' id='fileupload_modal_rfid$j'>$filedata[$i]</div>";
                        if($rfid_data) {
                            echo "</td><td><input type='hidden' id='plant_srcid$j' value='".$rfid_data[0]->room_id."'><div class='plant_gui_top_left fileupload_modal_rowcol_area'>".$rfid_data[0]->name."</div></td>
                                <td class='plant_gui_top_left fileupload_modal_plant_area'>
                                    <div id='fileupload_modal_rowcol$j'>".$rfid_data[0]->rol." / ".$rfid_data[0]->col."</div></td>";
                            echo "<td><div name='fileupload_now_state' id='fileupload_now_state$j' class='img_cursor_show plant_gui_top_left fileupload_modal_now_state'>".$rfid_data[0]->state."</div></td>";
                            echo "<td><div name='fileupload_next_state' id='fileupload_next_state$j' class='img_cursor_show plant_gui_top_left fileupload_modal_next_state' onclick='change_state_modal(\"$next_state\" , this)'>".$next_state."</div></td>";
                            echo "<td class='plant_gui_top_left fileupload_modal_delete_area modal_row_delete' id='modal_row_delete$j'><span>&#10540</span></td> </tr>";
                        } else {
                            echo "<p id='fileupload_modal_rfid_warning_state$j' class='modal_dialog_error_text_p' >not found</p>";
                            echo "</td><td><input type='hidden' id='plant_srcid$j' value=''><div class='plant_gui_top_left fileupload_modal_rowcol_area'></div></td>
                                <td class='plant_gui_top_left fileupload_modal_plant_area'>
                                    <div id='fileupload_modal_rowcol$j'></div></td>";
                            echo "<td><div name='fileupload_now_state' id='fileupload_now_state$j' class='img_cursor_show plant_gui_top_left fileupload_modal_now_state'></div></td>";
                            echo "<td><div name='fileupload_next_state' id='fileupload_next_state$j' class='img_cursor_show plant_gui_top_left fileupload_modal_next_state' onclick='change_state_modal(\"$next_state\" , this)'>".$next_state."</div></td>";
                            echo "<td class='plant_gui_top_left fileupload_modal_delete_area modal_row_delete' id='modal_row_delete$j'><span>&#10540</span></td> </tr>";
                        }
                        
                        
                        $j++;
                    }
                }
                echo "<input type='hidden' name='totalview' id='totalview' value='$j'> ";

            }
        }

        if( $request->input('action') == 'fileupload_state_data' )
        {
            $plantList       = $request->input('data');
            $today      = date("Y-m-d");

            for( $i = 0 ;$i < count( $plantList ) ; $i++ )
            {
                $ProductGrowProductRFID = ProductGrowProductRFID::find($plantList[$i]["RFID"]);
                if($ProductGrowProductRFID) {
                    $ProductGrowProductRFID->state = $plantList[$i]["next_state"];
                    $ProductGrowProductRFID->save();
                }
                
            }
            echo "success";
        }

        /* End  file upload state change  plant */
    }

}