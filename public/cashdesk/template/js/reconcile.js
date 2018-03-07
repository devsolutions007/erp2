/**
 * Created by LiuWebDev
 */

$(document).ready(function(){

    $('#report_date').change(function(){
        $.ajax({
            url: 'affAjax.php',
            type: 'POST',
            data: {
                action  : 'get_daily_report',
                date    : $('#report_date').val()
            },
            success: function(data){
                if(data == 'failed'){
                    $('#pos_daily_report').html('');
                } else {
                    $('#pos_daily_report').html(data);
                }
            }
        });
    });

    $('.pos_moneyvalue_show_big, .pos_moneyvalue_show_cent').on('change', function(){
        var val = $(this).val();
        if(val != '' && val < 0){
            val = 0;
        }
        $(this).val(val);
    });

    $('#report_reconcile_confirm_btn').on('click', function(){
        var valBig = getValue('#cur1') + 5 * getValue('#cur5') + 10 * getValue('#cur10') + 20 * getValue('#cur20') + 50 * getValue('#cur50') + 100 * getValue('#cur100');
        var valCent = 0.01 * getValue('#cent1') + 0.05 * getValue('#cent5') + 0.1 * getValue('#cent10') + 0.25 * getValue('#cent25') + 0.5 * getValue('#cent50');
        var count = valBig + valCent;
        $('#report_count').text('' + count.toFixed(2) + '$');
        var cash_str = $('#report_cash').text().replace('$', '');
        var cash = parseFloat(cash_str);
        var diff = count - cash;
        $('#report_diff').text('' + diff.toFixed(2) + '$');
    });

    function getValue(id){
        var value = $(id).val();
        if(value == ''){
            value = 0;
        }
        return value;
    }

});