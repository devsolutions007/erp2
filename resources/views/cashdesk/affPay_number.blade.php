<?php
/*
*	Bottom of main page of point of sale module
*/

?>
	<div style="padding-bottom:5px;">
		<span class="pos_payment_total_title" style="font-size: 25px;">Total</span>
		<span class="pos_payment_cash_title" style="font-size: 25px;">Received</span>
		<span class="pos_payment_due_title" style="font-size: 25px;">Due</span>
	</div>
	<div>
		<div class="postotal_payment_value" id="postotal_payment_value"><?php //echo $_GET['total_cache_data']; ?></div>
		<div class="poscash_payment_value" id="poscash_payment_value"></div>
		<div class="posdue_payment_value" id="posdue_payment_value"></div>
	</div>
	<div class="number_control_pan">
		<table class="phone_number_control_icons" align="center">
			<tr>
				<td><button class="btn phone_number_icons" onclick="insertmoney_num(7)">7</button></td>
				<td><button class="btn phone_number_icons" onclick="insertmoney_num(8)">8</button></td>
				<td><button class="btn phone_number_icons" onclick="insertmoney_num(9)">9</button></td>
				<td><button class="btn green_phone_number_icons" onclick="insertUnits('1g')">1$</button></td>
			</tr>
			<tr>
				<td><button class="btn phone_number_icons" onclick="insertmoney_num(4)">4</button></td>
				<td><button class="btn phone_number_icons" onclick="insertmoney_num(5)">5</button></td>
				<td><button class="btn phone_number_icons" onclick="insertmoney_num(6)">6</button></td>
				<td><button class="btn green_phone_number_icons" onclick="insertUnits('5g')">5$</button></td>
			</tr>
			<tr>
				<td><button class="btn phone_number_icons" onclick="insertmoney_num(1)">1</button></td>
				<td><button class="btn phone_number_icons" onclick="insertmoney_num(2)">2</button></td>
				<td><button class="btn phone_number_icons" onclick="insertmoney_num(3)">3</button></td>
				<td><button class="green_phone_number_icons number_10g_value" onclick="insertUnits('10g')">10$</button></td>
			</tr>
			<tr>
				<td><button class="btn phone_number_icons backzero_symbol_value" onclick="insertmoney_num('clear')">C</button></td>
				<td><button class="btn phone_number_icons" onclick="insertmoney_num(0)">0</button></td>
				<td><button class="phone_number_icons number_symbol_value" onclick="insertmoney_num('.')">.</button></td>
				<td><button class="btn phone_number_icons" onclick="insertmoney_num('back')"><</button></td>
			</tr>
		</table>
			<div class="row">
				<div class="payment_number_btn" align="center">
						<button type="submit" class="btn phone_confirm_icons phone_confirm_payment_icons" id="cache_process">Cash</button>
						<button type="submit" class="btn phone_confirm_icons phone_confirm_payment_icons phone_payment_icons_margin" id="credit_process">Credit</button>
				</div>
			</div>
	</div>

<script>
// $(document).ready(function(){

	function insertUnits(value){
		var payment_number = '';
		var pay_str = $('.poscash_payment_value').text();
		var pay = 0;
		if(pay_str != ''){
			pay = parseFloat(pay_str);
		}
		if(value == "1g" ){
			payment_number = pay + 1 ;
		}
		if(value == "5g" ){
			payment_number = pay + 5 ;
		}
		if(value == "10g" ){
			payment_number = pay + 10 ;
		}
		$('.poscash_payment_value').text('');
		$('.poscash_payment_value').append(payment_number);
		due_value = (payment_number - $("#total_cache").val()).toFixed(2);
		$('.posdue_payment_value').text('');
		$('.posdue_payment_value').append(due_value);
	}
	function insertmoney_num(value){
		var number = '',cache = '',due_value = '';
		if(value == "clear" ){
			$('.poscash_payment_value').text('');
			$('.posdue_payment_value').text('');
		}
		else if(value == "back"){
			$('.posdue_payment_value').text('');
			$("#poscash_payment_value").value = $("#poscash_payment_value").val().slice(0,-1);
			cache = $('.poscash_payment_value').text();
			cache = cache.slice(0,-1);
			due_value = parseFloat(cache) - $("#total_cache").val();
			$('.poscash_payment_value').text(cache);
		}
		else{
			$('.posdue_payment_value').text('');
			number = number + value;
			$('.poscash_payment_value').append(number);
			due_value = parseFloat($('.poscash_payment_value').text()) - $("#total_cache").val();
		}
		due_value = due_value.toFixed(2);
		$('.posdue_payment_value').append(due_value);
	}

</script>
