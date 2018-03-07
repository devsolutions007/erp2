<?php
/**
*  Reconcile page of Point Of Sale
*/
?>

<div class="full-width" style="margin-top: 90px;">
    <div class="pos_div_show_part pos_product_search_area">
        <div id="pos_left_panel">
           @include( 'cashdesk.affHistory' )
        </div>
    </div>
    <div id="mainDiv" class="pos_div_show_part left_nomargin pos_product_number_area">
       	@include( 'cashdesk.affReport' )
    </div>
    <div class="pos_div_show_part right_panel_margin pos_product_order_area">
    	@include( 'cashdesk.affPay_money' )
    </div>
</div>
<script src="/mukesh/erp2-test/public/cashdesk/template/js/reconcile.js"></script>

