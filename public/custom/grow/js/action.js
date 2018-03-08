
function add_plant_update(){

    if( $("#sel_product_id").val() != "" && $("#rfid").val() != "" )
    {
        $.ajax({
            type: "POST",
            url: 'ajax-back.php',
            data: {
                mode        : 'add_plant',
                date        : $("#fiscalyear").val(),
                src         : $("#home_src").val(),
                p_id        : $("#sel_product_id").val() ,
                rfid        : $("#rfid").val(),
                p_rfid      : $("#p_rfid").val(),
                rol         : $("#row_val").val(),
                col         : $("#col_val").val(),
            } ,
            success: function(data){
                if( data == "The rfid is exist" )
                {
                    $(".plant_mgt_dialog" ).text("The rfid number is already exist.");
                    $(".plant_mgt_dialog" ).show().delay(2000).fadeOut();
                }else{
                    getSearchResult();
                    $('#add_modal').plainModal('close');
                }
            }
        });
    }else{
        $(".plant_mgt_dialog" ).text("Please insert the product data.");
        $(".plant_mgt_dialog" ).show().delay(2000).fadeOut();
    }

}

function move_plant_update(){
    var checkboxValues = [];
    $('input.checkboxfordelete:checked').map(function() {
        checkboxValues.push($(this).val());
    });
    // var element = $("#home_dst_val" ).find('option:selected'); 
    var option_type = $("#home_dst_val option:selected" ).attr("rtype");
    
    $.ajax({
        type: "POST",
        url: 'ajax-back.php',
        data: {
            mode    : 'move_plant',
            RFID    : checkboxValues,
            src     : $("#home_src").val() ,
            state   : option_type ,
            dst     : $("#home_dst_val").val()
        } ,
        success: function(data){
            getSearchResult();
        }
    });

}

function release_plant_update(){
    var checkboxValues = [];
    $('input.checkboxfordelete:checked').map(function() {
        checkboxValues.push($(this).val());
    });
    
    $.ajax({
        type: "POST",
        url: 'ajax-back.php',
        data: {
            mode        : 'release_plant',
            RFID        : checkboxValues,
            src         : $("#home_src").val() ,
            date        : $("#fiscalyear").val(),
            fl_weight   : $("#fl_weight").val() ,
            wa_weight   : $("#wa_weight").val(),
            dst         : $("#idwarehouse").val()
        } ,
        success: function(data){
            getSearchResult();
        }
    });

}

function remove_plant_update(){
    var checkboxValues = [];
    var add_data = new Array();

    $('input.checkboxfordelete:checked').map(function() {
        add_data.push({
            RFID    : $(this).val() ,
            src     : $("#home_src").val() ,
        });
    });
    
    $.ajax({
        type: "POST",
        url: 'ajax-back.php',
        data: {
            mode      : 'remove_plant',
            data      :  add_data ,
        } ,
        success: function(data){
            getSearchResult();
        }
    });

}
