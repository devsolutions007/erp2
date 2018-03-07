<?php
/*
*  daily report
*/
?>

<div class="wave">
    <div class="customer_order_title">Daily Report</div>
    <div class="pos_customerid_insert">
        <div class="pos_customerid_table_div" style="margin-top: 20px;">
            <table>
                <tr>
                    <td style="padding-left: 10px;"><label for="report_date">Date:</label></td>
                    <td colspan="3"><input type="date" id="report_date" value="<?php echo date('Y-m-d'); ?>"></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="pos-list-panel" style="height: 500px;">
        <table class="topics_num" id="pos_daily_report_table">
            <tbody id="pos_daily_report">
            <?php
            //echo get_daily_report_html(date('Y-m-d'));
            ?>
                <tr><td>Total</td><td>:</td><td id="report_total">0.00$</td></tr>
                <tr><td>Card</td><td>:</td><td id="report_card">0.00$</td></tr>
                <tr><td>Cash</td><td>:</td><td id="report_cash">0.00$</td></tr>
                <tr><td>Count</td><td>:</td><td id="report_count">0.00$</td></tr>
                <tr><td>Different</td><td>:</td><td id="report_diff">0.00$</td></tr> 
            </tbody>
        </table>
    </div>
    <div class="customer_order_btn">
        <button class="btn button_floatright_set search_filter_btn_padding phone_confirm_icons" id="pos_report_reconcile_btn">Reconcile</button>
    </div>
</div>
<div class="customer_order_bottom_background"></div>
