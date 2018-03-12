/**
 * Created by LiuWebDev
 */

$(document).ready(function(){

    $('.loading').css('display', 'block');

    loadProducts();

    $(window).resize(function(){
        execSearch();
    });

    $('.category-item').click(function(){
        $(this).next().slideToggle();
        $('.category-sub-item').each(function(){
            $(this).removeClass('selected-sub-item');
        });
        $('.category-item').each(function(){
            $(this).removeClass('selected-item');
        });
        $(this).addClass('selected-item');
        execSearch();
    });

    $('.category-sub-item').click(function(){
        if($(this).hasClass('selected-sub-item')) return;
        $('.category-sub-item').each(function(){
            $(this).removeClass('selected-sub-item');
        });
        $('.category-item').each(function(){
            $(this).removeClass('selected-item');
        });
        $(this).addClass('selected-sub-item');
        execSearch();
    });

    $('#search_product').change(function () {
        execSearch();
    });

    $('.btn-prev-panel').click(function(){
        execPrevNext(false);
    });

    $('.btn-next-panel').click(function(){
        execPrevNext(true);
    });

    $('.all-item').click(function () {
        $('#search_product').val('');
        $('.category-sub-item').each(function(){
            $(this).removeClass('selected-sub-item');
        });
        $('.category-item').each(function(){
            $(this).removeClass('selected-item');
        });
        execSearch();
    });

    function getSelectedCat(){
        var id = -1;
        var elements = document.querySelectorAll('.category-sub-item.selected-sub-item');
        if(elements.length > 0){
            id = $('.category-sub-item.selected-sub-item').data('id');
        }
        var cat_elements = document.querySelectorAll('.category-item.selected-item');
        if(cat_elements.length > 0){
            id = $('.category-item.selected-item').data('id');
        }
        return id;
    }

    function setCadidates(){
        var cat_id = getSelectedCat();
        var search = $('#search_product').val();

        $('.product-li').each(function(){
            // check cat_id
            var id_candidate = false;
            var search_candidate = false;
            if(cat_id == -1){
                id_candidate = true;
            } else {
                var cat_str = $(this).data('category');
                var cats = cat_str.split(',');
                for(var m = 0; m < cats.length; m++){
                    if(cats[m] != ''){
                        var cat_item = parseInt(cats[m]);
                        if(cat_item == cat_id) id_candidate = true;
                    }
                }
            }

            if(search == ''){
                search_candidate = true;
            } else {
                var search_text = $(this).data('search');
                if(search_text.toLowerCase().indexOf(search) >= 0) search_candidate = true;
            }

            if(id_candidate == true && search_candidate == true){
                $(this).addClass('item-candidate');
            } else {
                $(this).removeClass('item-selected');
                $(this).removeClass('item-candidate');
            }
        });
    }

    function getCurrentPage(){
        return parseInt($('#product_page').val());
    }

    function setCurrentPage(page){
        $('#product_page').val(page);
    }

    function preparePrevNext(){
        var page = getCurrentPage();
        if(page == 0){
            $('.btn-prev-panel').css('display', 'none');
        } else {
            $('.btn-prev-panel').css('display', 'block');
        }

        var elements = document.querySelectorAll('.product-li.item-candidate');
        var cols = calcColumns();

        if(elements.length > (5 * cols * (page + 1))){
            $('.btn-next-panel').css('display', 'block');
        } else {
            $('.btn-next-panel').css('display', 'none');
        }

    }

    function calcColumns(){
        var total_width = $('.product-list-panel').width();

        var cols = 0;
        if(total_width > 900){
            cols = 3;
        } else if (total_width > 600){
            cols = 2;
        } else {
            cols = 1;
        }
        return cols;
    }

    function clearSelected(){
        $('.product-li.item-selected').each(function(){
            $(this).removeClass('item-selected');
        });
    }

    function setSelected(){
        var elements = document.querySelectorAll('.product-li.item-candidate');
        var page = getCurrentPage();
        var cols = calcColumns();
        var limit_index = 0;
        if(elements.length < (5 * cols * (page + 1))){
            limit_index = elements.length;
        } else {
            limit_index = 5 * cols * (page + 1);
        }
        for(var i = (5 * cols * page); i < limit_index; i++){
            var element = $('.product-li.item-candidate').eq(i);
            element.addClass('item-selected');
        }
    }

    function prepareGrid(){
        var elements = document.querySelectorAll('.product-li.item-selected');
        if(elements.length < 1){
            $('.empty').css('display', 'block');
        } else {
            $('.empty').css('display', 'none');
            $('.loading').css('display', 'none');
            var total_width = $('.product-list-panel').width();
            var cols = calcColumns();

            var mar_x = 25;
            var mar_y = 15;

            var item_width = (total_width - (mar_x * (cols -1)) - 2 * cols) / cols;
            var item_height = 100;

            $('.product-li').each(function(){
                $(this).css({width: item_width});
            });

            $('.product-detail-wrapper > div, .product-detail-wrapper > div > a').each(function(){
                $(this).css({width: item_width - 130});
            });

            for(var i = 0; i < elements.length; i++){
                var element = $('.product-li.item-selected').eq(i);
                var x_index = i % cols;
                var y_index = (i - x_index) / cols;
                var x_pos = (item_width + mar_x) * x_index;
                var y_pos = (item_height + mar_y) * y_index;
                element.css({top: y_pos, left: x_pos});
            }
        }
    }

    function execSearch(){
        setCadidates();
        setCurrentPage(0);
        preparePrevNext();
        clearSelected();
        setSelected();
        prepareGrid();
    }

    function execPrevNext(isNext){
        var page = getCurrentPage();
        if(isNext == true){
            page++;
        } else {
            page--;
        }
        setCurrentPage(page);
        preparePrevNext();
        clearSelected();
        setSelected();
        prepareGrid();
    }

    function loadProducts(){
        var elements = document.querySelectorAll('.product-li');
        var last_id = 0;
        if(elements.length < 1){
            last_id = 0;
        } else {
            last_id = $('.product-li').last().data('id');
        }
        $.ajax({
            url: '/product/getProduct',
            type: 'POST',
            data: {
                action: 'get_product_list',
                last_id: last_id,
                room_id: $('#WarehouseID').val()
            },
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
            success: function(data){

                if(data != '' && data != 'failed'){
                    $('.product-ul').append(data);
                    if(last_id == 0){
                        execSearch();
                    }
                    setCadidates();
                    preparePrevNext();
                    loadProducts();
                }
            }
        });
    }

});
