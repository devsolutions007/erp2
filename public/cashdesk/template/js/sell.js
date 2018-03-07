/**
 * Created by LiuWebDev
 */

$(document).ready(function(){

    $('#sell_new_tab').click(function(){
        $('.tab-btn').each(function(){
            $(this).removeClass('selected-tab');
        });
        $(this).addClass('selected-tab');

        $('.pos-panel-1').css('display', 'block');
        $('.pos-panel-2').css('display', 'none');
    });

    $('#sell_history_tab').click(function(){
        $('.tab-btn').each(function(){
            $(this).removeClass('selected-tab');
        });
        $(this).addClass('selected-tab');

        $('.pos-panel-1').css('display', 'none');
        $('.pos-panel-2').css('display', 'block');
    });
});

