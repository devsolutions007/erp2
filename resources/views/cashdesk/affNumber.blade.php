<?php
/* 
* Bottom of main page of point of sale module
*/

?>
	<div class="pos_numbervalue_show" id="pos_numbervalue_show"></div>
	<div class="pos_numberunit_show">g</div>
	<div class="number_control_pan">
		<table class="phone_number_control_icons" align="center">
			<tr>
				<td><button class="btn phone_number_icons" onclick="insertnum(7)">7</button></td>
				<td><button class="btn phone_number_icons" onclick="insertnum(8)">8</button></td>
				<td><button class="btn phone_number_icons" onclick="insertnum(9)">9</button></td>
				<td><button class="btn green_phone_number_icons" onclick="insertfix('1g')">1g</button></td>
			</tr>
			<tr>
				<td><button class="btn phone_number_icons" onclick="insertnum(4)">4</button></td>
				<td><button class="btn phone_number_icons" onclick="insertnum(5)">5</button></td>
				<td><button class="btn phone_number_icons" onclick="insertnum(6)">6</button></td>
				<td><button class="btn green_phone_number_icons" onclick="insertfix('5g')">5g</button></td>
			</tr>
			<tr>
				<td><button class="btn phone_number_icons" onclick="insertnum(1)">1</button></td>
				<td><button class="btn phone_number_icons" onclick="insertnum(2)">2</button></td>
				<td><button class="btn phone_number_icons" onclick="insertnum(3)">3</button></td>
				<td><button class="green_phone_number_icons number_10g_value" onclick="insertfix('10g')">10g</button></td>
			</tr>
			<tr>
				<td><button class="btn phone_number_icons backzero_symbol_value" onclick="insertnum('clear')">C</button></td>
				<td><button class="btn phone_number_icons" onclick="insertnum(0)">0</button></td>
				<td><button class="phone_number_icons number_symbol_value" onclick="insertnum('.')">.</button></td>
				<td><button class="btn phone_number_icons" onclick="insertnum('back')"><</button></td>
			</tr>
		</table>

			<div class="row">
				<div class="number_confirm_div" align="center">
						<button class="btn phone_confirm_icons" id="product_confirm_btn">Confirm</button>
				</div>
			</div>
	</div>

<script>
	function insertnum(value){
		var number = '',answer = '';
		if(value == "clear" ){
			$('.pos_numbervalue_show').text('');
		}
		else if(value == "back"){
			$("#pos_numbervalue_show").value = $("#pos_numbervalue_show").val().slice(0,-1);
			answer = $('.pos_numbervalue_show').text();
			answer = answer.slice(0,-1);
			$('.pos_numbervalue_show').text(answer);
		}
		else{
			number = number + value;
			$('.pos_numbervalue_show').append(number);
		}
	}
	function insertfix(value){
		var weight_number = '';
		var showed_str = $('.pos_numbervalue_show').text();
		var showed = 0;
		if(showed_str != ''){
			showed = parseFloat(showed_str);
		}
		if(value == "1g" ){
			weight_number = (showed + 1).toFixed(3);
		}
		if(value == "5g" ){
			weight_number = (showed + 5).toFixed(3);
		}
		if(value == "10g" ){
			weight_number = (showed + 10).toFixed(3);
		}
		$('.pos_numbervalue_show').text('');
		$('.pos_numbervalue_show').append(weight_number);
	}
</script>
