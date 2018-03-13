<?php
/**
*  Products page of Point Of Sale
*/
?>

<div class="full-width">
    <div class="product-left-panel align-right-panel" style="padding-top: 25px;">
        <label for="search_product"><img src="{{ asset('cashdesk/img/ic_search.png') }}" width="40" height="40" style="margin-bottom: 10px;"></label>
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
            @if($categories)
            @foreach( $categories as $category )
                <div class="category-item-wrapper align-center-panel">
                    <div class="category-item" data-id="{{$category->id}}">{{$category->name}}</div>
                </div>
            @endforeach
            @endif
        </div>
        <div class="product-list-margin-div" style="width: 300px;"></div>
    </div>
    <div class="product-right-panel align-center-panel">
        <div class="product-list-area">
            <div class="product-list-panel">
                <input type="hidden" id="product_page" value="0">
                <ul class="product-ul"></ul>
                <div class="loading">
                    <img src="{{ asset('cashdesk/img/circle_loading_animation.gif') }}">
                </div>
                <div class="empty">
                    <img src="{{ asset('cashdesk/img/empty_stock.png') }}">
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
<script src="{{ asset('cashdesk/template/js/products.js') }}"></script>

