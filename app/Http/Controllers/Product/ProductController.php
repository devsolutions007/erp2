<?php


namespace App\Http\Controllers\Product;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Product;
use App\ProductCategory;
use App\Inventory;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    
    public function index() {
        
        return view('product.index');
    }

    public function createWareHouse() {
        
        return view('product.createWareHouse');
    }


    public function card() {
        
        return view('product.card');
    }


    public function getProduct(Request $request) {

        /* ajax call from sell mode */
        if($request->input('action') == 'getProduct') {

        	$result = '';
	        $rfid_val = $request->input('rfid_val');

	        $products = Product::where('label', 'like', '%'.$rfid_val.'%')->get();
	        if($products) {
	        	foreach ($products as $key => $product) {
	        	// if($product->image != '') {
	        	// 	$image = $product->image;
	        	// } else {
	        		$image = 'product.png';
	        	//} 
	        	if($product->price != '')  {
	        		$price = $product->price;
	        	} else {
	        		$price  = 0;
	        	}
				$created =  date('d-m-Y', strtotime( $product->tms ) );
	        	$result .= '<div class="product_list_area_value" id="plavid'.$product->rowid.'">
					    <input name="setProductID" id="setProductIDplavid'.$product->rowid.'" value="2" type="hidden">
					    <input name="setProductRFID" id="setProductRFIDplavid'.$product->rowid.'" value="" type="hidden">
					    <input name="sellby_weight_check" id="sellby_weight_checkplavid'.$product->rowid.'" value="1" type="hidden">
					    <div id="product_img" class="product_list_img">
					        <img src="/cashdesk/img/'.$image.'">
					    </div>
					    <div id="product_information" class="product_information_value">
					        <p id="product_information_nameplavid'.$product->rowid.'">'. $product->label .'</p>
					        <p id="product_information_unitplavid'.$product->rowid.'">'. number_format((float) ( $price ), 2, '.', ',').'</p>
					        <p id="product_information_date'.$product->rowid.'">'.$created.'</p>
					        <img src="/cashdesk/img/dolibarr_pos_check.png" id="product_information_value_checkplavid'.$product->rowid.'" class="product_information_value_check">
					    </div>
					</div>';
	        	}
	        	return $result; 
	        } else {
	        	$result = 'No matches found';
	        	return $result;
	        }
	    }


       	/* ajax call from product mode */
       	if($request->input('action') == 'get_product_list') {
       		$result = '';
       		$category = '';
       		$last_id = $request->input('last_id');
       		$current = Carbon::now();
       		
       		$products = Product::where('rowid', '>', $last_id)->orderBy('rowid', 'ASC')->limit(30)->get();
       		if($products) {
       			foreach ($products as $key => $product) {

       			$created =  date('Y-m-d', strtotime( $product->tms ) );
       			$tms = Carbon::parse($product->tms);
       			$age = $current->diffInDays($tms); 
       			// if($product->image != '') {
	        	// 	$image = $product->image;
	        	// } else {
	        		$image = 'product.png';
	        	//}
	        	$product_weight = Inventory::where('productid', $product->rowid)->sum('weight');
       			$item = '<li class="product-li" data-id="' . $product->rowid . '" data-category="' . $product->productcategory . '," data-search="' . $product->label . '">';
	            $item .= '<div class="product-item">';
	            $item .= '<img src="/cashdesk/img/'.$image.'" class="product-img">';
	            $item .= '<div class="product-detail-wrapper">';
	            $item .= '<div>';
	            $item .= '<a href="/product/card.php?id=' . $product->rowid . '" target="new">' . $product->label . '</a>';
	            $item .= '</div>';
	            $item .= '<div>';
	            $item .= 'Age : ' . $age  . ( $age < 2 ? ' day' : ' days');
	            $item .= '</div>';
	            $item .= '<div>';
	            $item .= 'Price' . ': $ ' . number_format((float) ($product->price), 2, '.', ',');
	            $item .= '</div>';
	            $item .= '<div>';
	            $item .= 'Stock : ' . number_format((float)$product_weight, 2, '.', ',') . 'kg';
	            $item .= '</div>';
	            $item .= '</div>';
	            $item .= '</div>';
	            $item .= '</li>';
	            $result .= $item;
       			}
       		}

       		echo $result;
       	}
    } 
    public function productNameList(Request $request) {
    	$term = $request->input('term');
    	$products = Product::where('label', 'like', '%'.$term.'%')->take(5)->get();
    	foreach ($products as $product)
		{
			$label = $product->ref. ' - ' .$product->label. ' - '. $product->price. 'Net of tax - Stock: '.$product->stock;
		    $results[] = [ 'id' => $product->rowid, 'value' => $product->ref, 'label' => $label ];
		}
		return Response::json($results);
    } 	
}