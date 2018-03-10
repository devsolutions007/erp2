<?php
/*

*	Bottom of main page of point of sale module
*/

?>
<div class='wave'>
	<div class="customer_order_title">Invoice</div>
	<div class="pos_customerid_insert">
		<div class="pos_customerid_table_div">
			<table>
				<tr>
						<td style="padding-left: 10px;">ID</td>
						<td colspan="3" class="select_customer_indicate">
							<!-- <input type="text" name="customer_id" id="customer_id" class="input_customerid_div"/> -->
							<?php //echo $form->select_company($_SESSION["CASHDESK_ID_THIRDPARTY"], 'CASHDESK_ID_THIRDPARTY', 's.client IN (1,10)', '', 0, 0, null, 0, 'valignmiddle inline-block'); ?>
						</td>
				</tr>
				<tr>
						<td style="width: 60px;">Name:</td>
						<td colspan="3" id="customer_name"></td>
						<!-- <td></td>
						<td id="discount_val"></td> -->
				</tr>
			</table>
		</div>
		<img src="{{ asset('cashdesk/img/user_history.png') }}" id='pos_customer_name'>
		<img src="{{ asset('cashdesk/img/add_user.png') }}" id='pos_add_customer'>
	</div>
	<div class="pos_customer_product_list pos-list-panel">
		<table class="topics_num" id="product_topics_order">
			<thead>
				<tr>
					<td style="text-align: center;">Name</td>
					<td>Weight</td>
					<td>Each</td>
					<td>Total</td>
					<td>Del</td>
				</tr>
			</thead>
			<tbody class="topics_num_tbody"><tr></tr></tbody>
		</table>
	</div>
	<div class="customer_order_total_price">
		<table>
			<tr>
					<td>Sub Total :</td>
					<td class="total_subprice_val"></td>
					<td></td>
					<td>Tax Value :</td>
					<td class="total_taxprice_val"></td>
			</tr>
			<tr>
					<td>Discounts</td>
					<td>$0.00</td>
					<td></td>
					<td>TOTAL :</td>
					<td><b style="font-size:30px" class="total_price_val" id="total_price_val"></b></td>
			</tr>
		</table>
	</div>
	<div class="customer_order_btn">
		<button class="btn phone_confirm_icons search_filter_btn_padding button_floatright_set" onclick="change_number()">Checkout</button>
		<button class="btn cancel_order_btn search_filter_btn_padding button_floatright_set" onclick="cancel_order()">Cancel Order</button>
	</div>
</div>
<div class="customer_order_bottom_background"></div>

<div id="addcustomer_modal" class="w3-modal addcustomer_modal_div">
	<span id="close_modal_span" class="w3-button w3-display-topright">&times;</span>
	<div id="content-php"></div>
</div>

<script type="text/javascript">
	function change_number() {
		var total_cache_data = parseFloat($(".total_price_val").text());
		if( total_cache_data ){
			total_cache_data = total_cache_data.toFixed(2);
			$("#total_cache").val(total_cache_data);
			$('#postotal_payment_value').text('' + total_cache_data);
			$('.pos-panel-1').css('display', 'none');
			$('.pos-panel-2').css('display','block');
		}else{
			$('#alert_message').text('Insert the data correctly.');
			$('#alert_modal').css('display', 'block');
		}
	}

	$("#pos_add_customer").click(function(){
		$("#content-php").load("/societe/modal_card");
		$("#addcustomer_modal").css("display", "block");  
	});

	$("#close_modal_span").click(function(){
		$("#addcustomer_modal").css("display", "none"); 
	});
	
</script>
