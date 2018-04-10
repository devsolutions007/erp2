<?php


namespace App\Http\Controllers\Warehouses;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;

use Session;
use App\Entrepot;
use App\Country;


class WarehouseController extends Controller
{
	public function index() 
	{
        
        return view('warehouse.index');
    }

    public function create() 
    {
        $warehouseList = Entrepot::all();
        $countries = Country::all();
        return view('warehouse.create', compact('warehouseList', 'countries'));
    }

    public function store(Request $request) 
    {
    	$entrepot = new Entrepot;

    	$entrepot->label = $request->input('ref');
    	$entrepot->short_location_name = $request->input('short_location_name');
    	$entrepot->entrepot_id = $request->input('add_in');
    	$entrepot->description = $request->input('description');
    	$entrepot->address = $request->input('address');
    	$entrepot->zip = $request->input('zip');
    	$entrepot->city = $request->input('city');
		$entrepot->country_id  = $request->input('country_id');
		$entrepot->status  = $request->input('status');

        $entrepot->save();

        Session::flash('message', 'Warehouse created succesfully.'); 
        Session::flash('alert-class', 'alert-success');
        return redirect('warehouse/viewAll');
    }

    public function viewAll() 
    {
    	$warehouses = Entrepot::all();
    	return view('warehouse.viewAll',compact('warehouses'));
    }
}