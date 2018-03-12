$(document).ready(function(){

	var total_title = $("#total_cache").val();
	$("#rfid_val").focus();
	$('.postotal_payment_value').text(total_title);

	$("#rfid_val").change(function(){
		if($("#rfid_val").val() != "") {
			$.ajax({
				url	:"/product/getProduct",
				type: "POST",
				data: {
					action  	: 'getProduct',
					rfid_val    : $("#rfid_val").val(),
					room_id     : $("#WarehouseID").val()
				},
				headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
				success: function(data){
					$("#product_list").html(data);
					$('.product_list_area_value').click(function() {
						var id = $(this).attr('id');
						$('.product_information_value_check').each( function(){
							$(this).css('display', 'none');
						});
						$('#product_information_value_check' + id).css('display','inline');
						if($("#sellby_weight_check" + id).val() != '0'){
							$("#product_unit_price").val(parseFloat($("#product_information_unit" + id).text()));
							$("#product_unit_name").val($("#product_information_name" + id).text());
							$("#product_unit_id").val($("#setProductID" + id).val());
							$("#product_unit_rfid").val($("#setProductRFID" + id).val());
						} else {
							product_confirm_process($("#setProductID" + id).val(), $("#setProductRFID" + id).val(), $("#product_information_name" + id).text(), "1", parseFloat($("#product_information_unit" + id).text()));
						}
					});
				}
			});
		}
	});

	$("#product_confirm_btn").click(function(){
		var p_name 			= $("#product_unit_name").val();
		var p_weight 		= parseFloat($('.pos_numbervalue_show').text());
		var p_unitweight 	= $("#product_unit_price").val();
		var p_rowid 		= $("#product_unit_id").val();
		var p_rfid 			= $("#product_unit_rfid").val();
		if(p_rowid == ''){

		} else {
			product_confirm_process(p_rowid, p_rfid, p_name, p_weight, p_unitweight);
		}
	});

	$("#newsell_btn").click( function() {
		window.open("/cashdesk/affIndex.php", '_self');
		$( "#rfid_val" ).focus();
	});

	$("#backoffice_btn").click( function() {
		window.open("/index.php?mainmenu=home&leftmenu=home", '_self');
	});

	$("#product_list_btn").click( function() {
		window.open("/product/list.php?leftmenu=product&type=0", '_self');
	});

	$(".topics_num_tbody").on('click','.row_delete_order', function(){
		$(this).parent().remove();
		sumOfColumns();
	});

	$("#CASHDESK_ID_THIRDPARTY").change( function(){
		$.ajax({
			url		: "affProcess.php",
			type 	: "POST",
			data	: {
				action  	: 'getTaxValue',
				warehouse   : $("#WarehouseID").val()
			},
			success: function(data){
				$("#tax_value").val(data);
			}
		});

		$.ajax({
			url		 : "affProcess.php",
			type	 : "POST",
			dataType : "json",
			data	 : {
				action  	: 'getCustomer_discount',
				party_id    : $("#CASHDESK_ID_THIRDPARTY option:selected").val()
			},
			success: function(data){
				$("#discount_val").text("Discount " + data[0].remise_client + " %");
				if(data[0].phone)
					$("#customer_name").text( data[0].nom + "  (" + data[0].phone + ") ");
				else
					$("#customer_name").text( data[0].nom);
			}
		});
	});
	$("#CASHDESK_ID_THIRDPARTY" ).trigger( "change");

	$("#pos_customer_name").click(function(){
		$("#content-php").load( "/societe/pos_consumption?socid=" + $("#CASHDESK_ID_THIRDPARTY option:selected").val()
			+ "&type_element=invoice&button_third=Search&limit=25" );
		$("#addcustomer_modal").css("display", "block");
	});

	$(document).on('click', '.oddeven', function(){
		var pid = $(this).find('.product-cont').data('id');
		$.ajax({
			url	:"affProcess.php",
			type: "POST",
			data: {
				action  	: 'getProduct',
				p_id	    : pid
			},
			success: function(data){
				$("#product_list").html(data);
				var idd = $('#product_list').find('.product_list_area_value').first().attr('id');
				$('#product_information_value_check' + idd).css('display','inline');
				if($("#sellby_weight_check" + idd).val() != '0'){
					$("#product_unit_price").val(parseFloat($("#product_information_unit" + idd).text()));
					$("#product_unit_name").val($("#product_information_name" + idd).text());
					$("#product_unit_id").val($("#setProductID" + idd).val());
					$("#product_unit_rfid").val($("#setProductRFID" + idd).val());
				} else {
					product_confirm_process($("#setProductID" + idd).val(), $("#setProductRFID" + idd).val(), $("#product_information_name" + idd).text(), "1", parseFloat($("#product_information_unit" + idd).text()));
				}
			}
		});
	});

	$(document).on('click', '.alert-close', function(){
		$('#alert_modal').css('display', 'none');
	});
});

function cancel_order(){
	window.open("/cashdesk/affIndex.php?menutpl=facturation&id=NOUV", '_self');
}

function sumOfColumns(){
	var sum = 0;
	$(".total_price_value").each( function() {
			var total_price = $(this).text();
			sum += parseFloat(total_price);
			var subprice = sum.toFixed(2);
			var sumtax_value = sum.toFixed(2) * $("#tax_value").val() / 100;
			$(".total_subprice_val").text(subprice);
			$(".total_taxprice_val").text(sumtax_value.toFixed(2));
			var total_price_value = parseFloat(subprice) + parseFloat(sumtax_value.toFixed(2));
			$(".total_price_val").text(total_price_value);
	});
}

function insertmoney_cnt(value , id){
	var money_count;
	if($("#" + id ).val() != "")
		money_count = parseInt($("#" + id ).val());
	else
		money_count = 0;
	money_count = money_count + 1;
	$("#" + id ).val(money_count);

	var number = '', cache = '', due_value = '';
	
	$('.posdue_payment_value').text('');
	var poscash_payment_value_text;
	if($(".poscash_payment_value").text() != "")
		poscash_payment_value_text = parseFloat($(".poscash_payment_value").text());
	else
		poscash_payment_value_text = 0;
	number = poscash_payment_value_text + value;
	$('.poscash_payment_value').text(number);
	due_value = parseFloat($('.poscash_payment_value').text()) - $("#total_cache").val();
	due_value = due_value.toFixed(2);
	$('.posdue_payment_value').text(due_value);
}

function product_confirm_process(p_id, p_rfid, p_name, p_weight, p_unitweight){
	var sub_weight = (p_weight * p_unitweight).toFixed(2);
	if(p_weight){
		$('.topics_num_tbody').html('<tr><td class="product_name" real_val="' + p_id + '">' + p_name + '</td>' +
			'<td class="order_weight" real_val="' + p_weight + '">' + p_weight + ' g</td>' +
			'<td class="united_weight" real_val="' + p_unitweight + '">$ ' + p_unitweight + '</td>' +
			'<td class="total_price_value" real_val="' + p_rfid + '">' + sub_weight + '</td>' +
			'<td class="row_delete_order"><span>&#10540</span></td></tr>');
		sumOfColumns();
		$('.pos_numbervalue_show').text('');
	}else{
		$('#alert_message').text('Please insert the weight');
		$('#alert_modal').css('display', 'block');
	}
}
