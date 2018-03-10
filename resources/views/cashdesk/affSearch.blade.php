<?php

/**
*	Bottom of main page of point of sale module
*/

?>

<div class="pos_search_div_area pos_search_div_area_margin">
	<p>Search (Barcode/RFID)</p>
	<input type="text" name="rfid_val" id="rfid_val" class="input_type_div">
</div>
<div id="product_list" class="pos_search_div_area pos_search_div_area_margin pos_product_list_area">
	<div class="product_list_area_value" id="plavid1">
	    <input name="setProductID" id="setProductIDplavid1" value="2" type="hidden">
	    <input name="setProductRFID" id="setProductRFIDplavid1" value="" type="hidden">
	    <input name="sellby_weight_check" id="sellby_weight_checkplavid1" value="1" type="hidden">
	    <div id="product_img" class="product_list_img">
	        <img src="{{ asset('cashdesk/img/product.png') }}">
	    </div>
	    <div id="product_information" class="product_information_value">
	        <p id="product_information_nameplavid1">$10 Dab Straw</p>
	        <p id="product_information_unitplavid1">5.00000000</p>
	        <p id="product_information_date"></p>
	        <img src="{{ asset('cashdesk/img/dolibarr_pos_check.png') }}" id="product_information_value_checkplavid1" class="product_information_value_check">
	    </div>
	</div>
	<div class="product_list_area_value" id="plavid1">
	    <input name="setProductID" id="setProductIDplavid1" value="2" type="hidden">
	    <input name="setProductRFID" id="setProductRFIDplavid1" value="" type="hidden">
	    <input name="sellby_weight_check" id="sellby_weight_checkplavid1" value="1" type="hidden">
	    <div id="product_img" class="product_list_img">
	        <img src="{{ asset('cashdesk/img/product.png') }}">
	    </div>
	    <div id="product_information" class="product_information_value">
	        <p id="product_information_nameplavid1">$10 Dab Straw</p>
	        <p id="product_information_unitplavid1">5.00000000</p>
	        <p id="product_information_date"></p>
	        <img src="{{ asset('cashdesk/img/dolibarr_pos_check.png') }}" id="product_information_value_checkplavid1" class="product_information_value_check">
	    </div>
	</div>
</div>
