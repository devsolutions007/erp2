<?php
/**
*
* sold history
*
*/

?>

<div class="wave">
    <div class="customer_order_title">History</div>
    <div class="pos_customerid_insert">
        <div class="pos_customerid_table_div">
            <table>
                <tr>
                    <td style="padding-left: 10px;">ID</td>
                    <td colspan="3" class="select_customer_indicate">
                        <?php
                        //echo $form->select_company(-1, 'pos_sell_history_id', 's.client IN (1, 10)', 'All', 0, 0, null, 0, 'valignmiddle inline-block');
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="history_from">From: </label></td>
                    <td><input type="date" id="history_from" value="<?php echo date('Y-m-d'); ?>"></td>
                    <td><label for="history_to">To:</label></td>
                    <td><input type="date" id="history_to" value="<?php echo date('Y-m-d'); ?>"></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="pos-list-panel" style="height: 500px;">
        <table class="topics_num" id="pos_sold_history">
            <thead>
            <tr>
                <td style="text-align: center;">ID</td>
                <td style="text-align: center;">Date/Time</td>
                <td style="text-align: center;">Customer</td>
                <td style="text-align: center;">Amount</td>
            </tr>
            </thead>
            <tbody id="pos_history_list">
            <?php
            //echo get_pos_history_list_html(-1, date('Y-m-d'), date('Y-m-d'));
            ?>
            </tbody>
        </table>
    </div>
    <div class="customer_order_btn">
        <button class="btn button_floatright_set search_filter_btn_padding phone_confirm_icons" id="pos_history_delete_btn">Delete</button>
    </div>
</div>
<div class="customer_order_bottom_background"></div>
