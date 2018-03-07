<?php
/**
 *	Bottom of main page of point of sale module
 */

?>
	<div class="number_control_pan">
		<table class="phone_number_control_icons" align="center">
			<tr>
				<td><button class="btn green_phone_number_icons" onclick="insertmoney_cnt(1 , 'cur1')">1$</button></td>
				<td><input type="number" class="pos_moneyvalue_show_big" id="cur1"></td>
				<td><button class="btn green_phone_number_icons" onclick="insertmoney_cnt(20 , 'cur20')">20$</button></td>
				<td><input type="number" class="pos_moneyvalue_show_big" id="cur20"></td>
			</tr>
			<tr>
				<td><button class="btn green_phone_number_icons" onclick="insertmoney_cnt(5 , 'cur5')">5$</button></td>
				<td><input type="number" class="pos_moneyvalue_show_big" id="cur5"></td>
				<td><button class="btn green_phone_number_icons" onclick="insertmoney_cnt(50 , 'cur50')">50$</button></td>
				<td><input type="number" class="pos_moneyvalue_show_big" id="cur50"></td>
			</tr>
			<tr>
				<td><button class="btn green_phone_number_icons" onclick="insertmoney_cnt(10 , 'cur10')">10$</button></td>
				<td><input type="number" class="pos_moneyvalue_show_big" id="cur10"></td>
				<td><button class="btn green_phone_number_icons padding_left10_center" onclick="insertmoney_cnt(100 , 'cur100')">100$</button></td>
				<td><input type="number" class="pos_moneyvalue_show_big" id="cur100"></td>
			</tr>
		</table>
		<table align="center">
			<tr>
				<td><button class="btn green_money_cent_icons" onclick="insertmoney_cnt(0.01 , 'cent1')">1¢</button></td>
				<td><button class="btn green_money_cent_icons" onclick="insertmoney_cnt(0.05 , 'cent5')">5¢</button></td>
				<td><button class="btn green_money_cent_icons" onclick="insertmoney_cnt(0.1 , 'cent10')">10¢</button></td>
				<td><button class="btn green_money_cent_icons" onclick="insertmoney_cnt(0.25 , 'cent25')">25¢</button></td>
				<td><button class="btn green_money_cent_icons" onclick="insertmoney_cnt(0.5 , 'cent50')">50¢</button></td>
			</tr>
			<tr>
				<td><input type="number" class="pos_moneyvalue_show_cent" id="cent1"></td>
				<td><input type="number" class="pos_moneyvalue_show_cent" id="cent5"></td>
				<td><input type="number" class="pos_moneyvalue_show_cent" id="cent10"></td>
				<td><input type="number" class="pos_moneyvalue_show_cent" id="cent25"></td>
				<td><input type="number" class="pos_moneyvalue_show_cent" id="cent50"></td>
			</tr>
		</table>
		<div class="row">
			<div class="number_confirm_div" align="center">
				<button class="btn phone_confirm_icons" id="report_reconcile_confirm_btn">Confirm</button>
			</div>
		</div>
	</div>

<script>
	function insertfix(value){
		var payment_number = '';
		var showed_str = $('.poscash_payment_value').text();
		var showed = 0;
		if(showed_str != ''){
			showed = parseFloat(showed_str);
		}
		if(value == "1g" ){
			payment_number = showed + 1 ;
		}
		if(value == "5g" ){
			payment_number = showed + 5 ;
		}
		if(value == "10g" ){
			payment_number = showed + 10 ;
		}
		$('.poscash_payment_value').text('');
		$('.poscash_payment_value').append(payment_number);
		due_value = (payment_number - $("#total_cache").val()).toFixed(2);
		$('.posdue_payment_value').text('');
		$('.posdue_payment_value').append(due_value);
	}

</script>
