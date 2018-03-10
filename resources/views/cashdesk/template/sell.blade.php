<?php
/**
 *  \brief  Sell page of Point Of Sale
 */
?>
<div class="pos-sell-tab-panel">
    <div class="tab-wrapper">
        <div class="tab-btn selected-tab" id="sell_new_tab">New</div>
        <div class="tab-btn" id="sell_history_tab">History</div>
    </div>
</div>
<div class="full-width">
    <div class="pos_div_show_part pos_product_search_area">
        <div id="pos_left_panel">
            <div class="pos-panel-1">
                @include( 'cashdesk.affSearch' )
            </div>
            <div class="pos-panel-2">
                @include( 'cashdesk.affHistory' )
            </div>
        </div>
    </div>

    <div id="mainDiv" class="pos_div_show_part left_nomargin pos_product_number_area">
        <div class="pos-panel-1">
            @include( 'cashdesk.affNumber' )
        </div>
        <div class="pos-panel-2">
            @include( 'cashdesk.affPay_number' )
        </div>
    </div>

    <div class="pos_div_show_part right_panel_margin pos_product_order_area">
        @include( 'cashdesk.affOrder' )
    </div>
</div>
<script src="{{ asset('cashdesk/template/js/sell.js') }}"></script>

