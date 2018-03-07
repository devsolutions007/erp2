<?php
/**
*  Products page of Point Of Sale
*/
?>

<div class="full-width">
    <div class="product-left-panel align-right-panel" style="padding-top: 25px;">
        <label for="search_product"><img src="/mukesh/erp2-test/public/cashdesk/img/ic_search.png" width="40" height="40" style="margin-bottom: 10px;"></label>
    </div>
    <div class="product-right-panel">
        <input type="text" id="search_product" class="input-type-div">
    </div>
</div>

<div class="product-list-margin-div"></div>
<div class="full-width">
    <div class="product-left-panel align-center-panel">
        <div class="product-menu-wrapper">
            <div class="category-item-wrapper align-center-panel">
                <div class="all-item">Show All</div>
            </div>
            <div class="category-item-wrapper align-center-panel">
                <div class="category-item" data-id="8">Medical category</div>
                <div class="category-sub-wrapper align-center-panel"></div>
            </div>
            <div class="category-item-wrapper align-center-panel">
                <div class="category-item" data-id="3">Product1</div>
                <div class="category-sub-wrapper align-center-panel">
                    <div class="category-sub-item" data-id="9">Grain category</div>
                        <div class="category-sub-item" data-id="5">Subcategory1</div>
                        <div class="category-sub-item" data-id="6">Subcategory2</div>
                </div>
            </div>
            <div class="category-item-wrapper align-center-panel">
                    <div class="category-item" data-id="4">Product2</div>
                    <div class="category-sub-wrapper align-center-panel"></div>
            </div>
        </div>
        <div class="product-list-margin-div" style="width: 300px;"></div>
    </div>
    <div class="product-right-panel align-center-panel">
        <div class="product-list-area">
            <div class="product-list-panel">
                <input type="hidden" id="product_page" value="0">
                <ul class="product-ul">
                    <li class="product-li item-candidate item-selected" data-id="1" data-category="3," data-search="$10 Bowl" style="width: 290.333px; top: 0px; left: 0px;">
                        <div class="product-item">
                            <img src="/mukesh/erp2-test/public/cashdesk//img/product.png" class="product-img">
                            <div class="product-detail-wrapper">
                                <div style="width: 160.333px;">
                                    <a href="#" target="new" style="width: 160.333px;">$10 Bowl</a>
                                </div>
                                <div style="width: 160.333px;">Age: 36 days</div>
                                <div style="width: 160.333px;">Price: $6.95</div>
                                <div style="width: 160.333px;">Stock: 0.00kg</div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="loading">
                    <img src="/mukesh/erp2-test/public/cashdesk/img/circle_loading_animation.gif">
                </div>
                <div class="empty">
                    <img src="/mukesh/erp2-test/public/cashdesk/img/empty_stock.png">
                </div>
            </div>
        </div>

        <div class="product-list-margin-div"></div>

        <div style="width: 100%;">
            <table style="width: 300px; margin: 30px auto;">
                <tbody>
                <tr>
                    <td width="70">
                        <div class="btn-prev-panel">&#9668;</div>
                    </td>
                    <td width="160"></td>
                    <td width="70">
                        <div class="btn-next-panel">&#9658;</div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="/mukesh/erp2-test/public/cashdesk/template/js/products.js"></script>

