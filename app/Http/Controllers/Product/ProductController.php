<?php


namespace App\Http\Controllers\Product;


use Illuminate\Http\Request;
use App\Product;
use App\ProductCategory;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    
    public function card() {
        
        return view('product.card');
    }


    public function getProduct(Request $request) {

        /* ajax call from sell mode */
        if($request->input('action') == 'getProduct') {
	        $rfid_val = $request->input('rfid_val');

	        //echo $rfid_val;
	        $products = Product::where('name', 'like', '%'.$rfid_val.'%')->get();
	        foreach ($products as $key => $product) {
	        	//echo $product->name;
	        	if($product->image != '') {
	        		$image = $product->image;
	        	} else {
	        		$image = 'product.png';
	        	}  
				$created =  date('d-m-Y', strtotime( $product->created ) );
	        	echo '<div class="product_list_area_value" id="plavid'.$product->id.'">
					    <input name="setProductID" id="setProductIDplavid'.$product->id.'" value="2" type="hidden">
					    <input name="setProductRFID" id="setProductRFIDplavid'.$product->id.'" value="" type="hidden">
					    <input name="sellby_weight_check" id="sellby_weight_checkplavid'.$product->id.'" value="1" type="hidden">
					    <div id="product_img" class="product_list_img">
					        <img src="/cashdesk/img/'.$image.'">
					    </div>
					    <div id="product_information" class="product_information_value">
					        <p id="product_information_nameplavid'.$product->id.'">'. $product->name .'</p>
					        <p id="product_information_unitplavid'.$product->id.'">'. $product->costperunit.'</p>
					        <p id="product_information_date'.$product->id.'">'.$created.'</p>
					        <img src="/cashdesk/img/dolibarr_pos_check.png" id="product_information_value_checkplavid'.$product->id.'" class="product_information_value_check">
					    </div>
					</div>';
	        }
	    return;    
       	}

       		/* ajax call from product mode */
       	if($request->input('action') == 'get_product_list') {
       		$result = '';
       		$category = '';

       		$products = Product::all();
       		
       		foreach ($products as $key => $product) {
       			if($product->image != '') {
	        		$image = $product->image;
	        	} else {
	        		$image = 'product.png';
	        	} 
       			$item = '<li class="product-li" data-id="' . $product->id . '" data-category="' . $category . '" data-search="' . $product->name . '">';
	            $item .= '<div class="product-item">';
	            $item .= '<img src="/cashdesk/img/'.$image.'" class="product-img">';
	            $item .= '<div class="product-detail-wrapper">';
	            $item .= '<div>';
	            $item .= '<a href="/product/card.php?id=' . $product->id . '" target="new">' . $product->name . '</a>';
	            $item .= '</div>';
	            $item .= '<div>';
	            //$item .= $langs->trans('Age') . ': ' . $product->age . ' ' . ( $product->age < 2 ? $langs->trans('day') : $langs->trans('days'));
	            $item .= '</div>';
	            $item .= '<div>';
	            //$item .= $langs->trans('Price') . ': $' . number_format($product->costperunit, 2, '.', ',');
	             $item .= 'Price : $' . $product->costperunit;
	            $item .= '</div>';
	            $item .= '<div>';
	            //$item .= $langs->trans('Stock') . ': ' . number_format($product->stock, 2, '.', ',') . 'kg';
	            $item .= '</div>';
	            $item .= '</div>';
	            $item .= '</div>';
	            $item .= '</li>';
	            $result .= $item;
       		}

       		echo $result;
       	}
    }   	
}