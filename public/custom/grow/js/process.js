/* area select */
$('#growArea').change( function() {
    $.ajax({
        type: "POST",
        url: '/mukesh/erp2-test/public/grow/roomAjax',
        data: {
            action : 'getRoomList' ,
            area_id : $("#growArea").val() ,
            select_val : $("#select_room").val() ,
            allset : 1
        } ,
        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
        success: function(data){
            $("#growRooms" ).html( data );
            getSearchResult();
        }
    });
});

function getSearchResult()
{
    $.ajax({
        type: "POST",
        url: '/mukesh/erp2-test/public/grow/ajaxSearchGrowTable',
        data: {
            mode        : 'searchResults',
            metric_id   : $("#metricId").val() ,
            room_time   : $("#roomTime").val() ,
            grow_id     : $("#growArea").val()  ,
            room_id     : $("#growRooms").val() ,
        } ,
        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
        success: function(data){
            $("#search_table_body").html( data );
        }
    });
}