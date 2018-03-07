<?php
$class = "pos-redirect-button";
$selected_class = " selected-mode"
?>
<div class="pos-redirect-btn-area">
    <div class="pos-redirect-btn-list">
        <button class="<?php echo $class . ( $mode == 'sell' || $mode == '' ? $selected_class : '' ); ?>" id="btn_redirect_sell">Sell</button>
    </div>
    <div class="pos-redirect-btn-list">
        <button class="<?php echo $class . ( $mode == 'products' ? $selected_class : '' ); ?>" id="btn_redirect_products">Products</button>
    </div>
    <div class="pos-redirect-btn-list">
        <button class="<?php echo $class . ( $mode == 'reconcile' ? $selected_class : '' ); ?>" id="btn_redirect_reconcile">Reconcile</button>
    </div>
    <div class="pos-redirect-btn-list" id="btn_redirect_back" style="margin: 0;">
        <button class="<?php echo $class; ?>">System</button>
    </div>
</div>
