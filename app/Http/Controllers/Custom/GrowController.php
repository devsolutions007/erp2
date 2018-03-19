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
        $options = '';
        if($request->input('action') == 'getRoomList') {
            $growRooms = ProductGrowList::where( 'parent_id', '=', $request->input('area_id') )->get();
            $options .= '<option value="all">All</option>';
            foreach ($growRooms as $key => $growRoom) {
                $options .= '<option value="'.$growRoom->id.'">'.$growRoom->name.'</option>';
            }
            echo $options;
            
        }
    }

    public function ajaxSearchGrowTable(Request $request) {
        $grow_id    = $request->input('grow_id');
        $room_id    = $request->input('room_id');
        $RFID       = $request->input('RFID');
        $room_time  = $request->input('room_time');
        $product_lists = '';
        if($request->input('mode') == 'searchResults') {
            if( $room_id == "all" ) {


                $product_lists = DB::table('product_grow_movements')
                                ->leftJoin('product_grow_product_rfid', 'product_grow_movements.rfid', '=', 'product_grow_product_rfid.rfid')
                                ->leftJoin('product_grow_lists', 'product_grow_lists.id', '=', 'product_grow_product_rfid.room_id' )
                                ->leftJoin('products', 'products.id', '=', 'product_grow_product_rfid.p_id')
                                ->where('product_grow_movements.src', '=', 0)
                                ->orWhere('product_grow_movements.dst', '<', 1)
                                ->where('product_grow_lists.parent_id', '=', $grow_id)
                                //->selectRaw('SUM(case when (product_grow_movement.src = '.$room_id.') then -product_grow_movement.qty else product_grow_movement.qty end) as stock_value')
                                //->groupBy('product_grow_product_rfid.rfid')
                                ->get(['products.strain', 'product_grow_movements.rfid', 'product_grow_product_rfid.p_id', 'product_grow_product_rfid.birthdate', 'product_grow_product_rfid.col', 'product_grow_product_rfid.rol', 'product_grow_product_rfid.parent_rfid', 'product_grow_product_rfid.state', 'product_grow_lists.name']);
            }

            $data = '';
            $count = 1;
            $current = Carbon::now();
            foreach ($product_lists as $key => $product) {

                $created = Carbon::parse($product_lists[$key]->birthdate);
                $age = $current->diffInDays($created);
                //echo $product_lists[$key]->rfid;
                $data .= '<tr>';
                $data .= '<td>'.$count++.'</td>';
                $data .= '<td><input type="checkbox" id="grow_checkbox_1" class="filled-in"/></td>';
                $data .= '<td>'.$product_lists[$key]->strain.'</td>';
                $data .= '<td>'.$product_lists[$key]->birthdate.'</td>';
                $data .= '<td>'.$age . ( $age < 2 ? ' day' : ' days') .'</td>';
                $data .= '<td>'.$product_lists[$key]->name.'( '.$product_lists[$key]->rol.', '.$product_lists[$key]->col .' )</td>';
                $data .= '<td>'.$product_lists[$key]->rfid.'</td>';
                $data .= '<td>'.$product_lists[$key]->state.'</td>';
                $data .= '</tr>';
            }

            echo $data;
            
        }
    }
    
}