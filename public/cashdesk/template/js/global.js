/**
 * Created by LiuWebDev
 */

$(document).ready(function(){
    $('#btn_redirect_sell').click(function(){
        var mode = $('#pos_wrapper').data('mode');
        if(mode == '' || mode == 'sell'){

        } else {
            window.open("/mukesh/erp2-test/cashdesk/affIndex?menutpl=facturation&id=NOUV", '_self');
        }
    });

    $('#btn_redirect_products').click(function(){
        var mode = $('#pos_wrapper').data('mode');
        if(mode != 'products'){
            window.open("/mukesh/erp2-test/cashdesk/affIndex?menutpl=facturation&id=NOUV&mode=products", '_self');
        }
    });

    $('#btn_redirect_reconcile').click(function(){
        var mode = $('#pos_wrapper').data('mode');
        if(mode != 'reconcile'){
            window.open("/mukesh/erp2-test/cashdesk/affIndex?menutpl=facturation&id=NOUV&mode=reconcile", '_self');
        }
    });

    $('#btn_redirect_back').click(function(){
        window.open("/mukesh/erp2-test?mainmenu=home&leftmenu=home", '_self');
    });

    $('#pos_sell_history_id').change(function(){
        refreshHistory();
    });

    $('#history_from').change(function(){
        refreshHistory();
    });

    $('#history_to').change(function(){
        refreshHistory();
    });

    $('#cache_process').on('click',function(){
        send_pos_data(0);
    });

    $('#credit_process').on('click',function(){
        send_pos_data(1);
    });

    $('#pos_history_delete_btn').on('click', function(){
        $.ajax({
            url: 'affAjax.php',
            type: 'POST',
            data: {
                action  : 'delete_pos_history',
                id      : $('#pos_sell_history_id').val(),
                from    : $('#history_from').val(),
                to      : $('#history_to').val()
            },
            success: function(data){
                console.log(data);
                $('#pos_history_list').html('');
            }
        });
    });

    function send_pos_data(type){
        $('.processing').css('display', 'block');

        var customer_name 		= $("#CASHDESK_ID_THIRDPARTY option:selected").attr( "dataname" );
        var product_price 		= parseFloat($('.postotal_payment_value').text());
        var product_due_price 	= parseFloat($('.posdue_payment_value').text());
        var product_cash_price  = product_price + product_due_price;
        var total_tax_price 	= ( product_price * 0.0765 ).toFixed(2);
        var product_list   		= $('.topics_num_tbody').html();
        var WarehouseID			= $("#WarehouseID").val();

        $.ajax({
            url:"affProcess.php",
            type: "POST",
            data: {
                action  			: 'pos_cash_process' ,
                total_price    		: product_price ,
                total_cash_price    : product_cash_price ,
                total_tax    		: total_tax_price ,
                customer_id    		: $("#CASHDESK_ID_THIRDPARTY option:selected").val() ,
                customer_name    	: customer_name ,
                fk_type    			: "LIQ",
                type                : type,
                creator_user    	: $("#author_id").val() ,
                data    			: product_list ,
                WarehouseID    		: WarehouseID
            },
            success: function(data){
                getPrint();
                $('.topics_num tbody > tr').remove();
                $('.topics_num tbody').html("<tr></tr>");
                $('#postotal_payment_value').text('');
                $('#poscash_payment_value').text('');
                $('#posdue_payment_value').text('');
                $('.product_information_value_check').each( function(){
                    $(this).css('display', 'none');
                });
                $('#pos_numbervalue_show').text('');
                $('#rfid_val').text('');
                $('.pos-panel-1').css('display', 'block');
                $('.pos-panel-2').css('display', 'none');
                refreshHistory();
                $('.processing').css('display', 'none');
                $('#rfid_val').val('');
                $('#product_list').html('');
            }
        });
    }

    function getPrint(){
        var divToPrint = escape($('.topics_num_tbody').html());
        var total_product_price = parseFloat($('.postotal_payment_value').text());
        var total_tax_price 	= parseFloat($('.total_taxprice_val').text());
        var total_sub_price 	= parseFloat($('.total_subprice_val').text());
        var poscash_price 		= parseFloat($('.poscash_payment_value').text());

        largeur = 600;
        hauteur = 500;
        var temp = 0;
        $('td').each(function(){
            var tdTxt = $(this).text();
            if($(this).hasClass('order_weight')) {
                temp = temp + parseFloat($(this).text());
            }
        });
        opt = 'width='+largeur+', height='+hauteur+', left='+(screen.width - largeur)/2+', top='+(screen.height-hauteur)/2+'';
        window.open('affpos_print.php?data=' + divToPrint + '&tax_rate=' + $("#tax_value").val() + '&total_price=' + total_product_price
            + '&tax_price=' + total_tax_price + '&poscash_price=' + poscash_price + '&sub_price=' + total_sub_price + '&total_weight=' + temp , 'PrintTicket' , opt);
    }

    function refreshHistory(){
        $.ajax({
            url: 'affAjax.php',
            type: 'POST',
            data: {
                action  : 'get_pos_history',
                id      : $('#pos_sell_history_id').val(),
                from    : $('#history_from').val(),
                to      : $('#history_to').val()
            },
            success: function(data){
                if(data == 'failed'){
                    $('#pos_history_list').html('');
                } else {
                    $('#pos_history_list').html(data);
                }
            }
        });
    }
});