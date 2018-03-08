
$(document).ready(function() {
    make_room_selectbox();

    $("#checkallactions").click(function() {
        if($(this).is(':checked')){
            $(".checkboxfordelete").prop('checked', true);
        }
        else
        {
            $(".checkboxfordelete").prop('checked', false);
        }
    });
    
    $("#area_select").change(function(){
        make_room_selectbox();
    });

    $("#home_src").change( function() {
        getSearchResult();
        if( $("#home_src").val() == "all" )
            $('.searchfilter_btn').attr("disabled","disabled");
        else
            roomtype_check();
    });
    
    $("#searchvalue").click( function() {
        getSearchResult();
    });

    ////////////  add event part  //////////////

    $("#addnew_grow").click( function() {
        $("#modal_add_src").text($("#area_select").find('option:selected').text() + " - " + $("#home_src").find('option:selected').text());
        var modal = $('#add_modal').plainModal({duration: 300});
        modal.plainModal('open');
    });
    
    $("#bulk_add_grow").click(function(){
        add_plant_update(); 
    });

    $("#bulk_add_cancel").click(function(){
        $('#add_modal').plainModal('close');
    });

    ///////////////////////////////////////////

    ////////////  move event part  ////////////

    $("#move_grow").click( function() {
        $("#modal_move_src").text($("#area_select").find('option:selected').text());
        $("#modal_home_src").text($("#home_src").find('option:selected').text());
        var check_count = $("[type='checkbox']:checked").length;
        $("#modal_checklist_count").text(check_count);
        var modal = $('#move_modal').plainModal({duration: 300});
        modal.plainModal('open');
    });

    $("#bulk_move_cancel").click(function(){
        $('#move_modal').plainModal('close');
    });

    $("#bulk_move_grow").click( function() {
        move_plant_update(); 
        $('#move_modal').plainModal('close');
    });

    ////////////////////////////////////////////

    ///////////////// release event part ///////
    
    $("#release_grow").click( function() {
        $("#modal_release_src").text($("#area_select").find('option:selected').text() + " - " + $("#home_src").find('option:selected').text());
        var check_count = $("[type='checkbox']:checked").length;
        $("#modal_checklist_count_rel").text(check_count);
        var modal = $('#release_modal').plainModal({duration: 300});
        modal.plainModal('open');
    });

    $("#file").change(function(){

        var data = new FormData();
        data.append( 'file', $( '#file' )[0].files[0] );

        $.ajax({
            url: 'ajax-back.php?mode=file_upload&room_id=' + $("#home_src").val() ,
            dataType: 'html',
            type: 'POST',
            data: data,
            cache: false,
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data)
            {
                var result = $.parseJSON(data);
                $("#search_table_body").html( result.print_data );
                $("#file_upload_result_missing").html( '<div class="file_upload_result_missing"><h3>Mismatching RFID</h3><p id="invalid_upload_data">' + result.valid_data + '</p></div>' );
            }
        });

    });

    $("#bulk_release_grow").click( function() {
        release_plant_update(); 
        $('#release_modal').plainModal('close');
    });

    $("#bulk_release_cancel").click(function(){
        $('#release_modal').plainModal('close');
    });

    ///////////////////////////////////////////

    $("#remove_grow").click( function() {
        if( !confirm("Do you want to remove the plants?") )
            return;
        remove_plant_update();
    });


    $("#move_src").change( function() {
        getSearchResult();
    });

    
    
});


function setdst_romeid(select){
    document.getElementById("home_dst").value = $("#home_dst_val").val();
}

function setrelease_romeid(select){
    document.getElementById("move_src_harvest").value = $("#move_src_harvest_val").val();
}

function setselect( rowid , name, this_tr )
{
    window.open("/product/card.php?id="+rowid, '_self');
}