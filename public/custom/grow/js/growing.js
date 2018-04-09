/* Growing Remove */
function removeGrowing( id, name, key ) {
    swal({
      title: "Are you sure?",
      text: "You want to delete Growing  <b>"+name+"</b>.",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false,
      html: true
    },
    function(){
        $.ajax({
            url: "/grow/growingAjax",
            type: "post",
            cache: false,
            data: {"action": 'remove_growing', "id": id },
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
            success: function(result) {
                if ( result == 'success' ) {
                    $( '#growingRow'+key ).remove();
                    swal("Deleted!", "Grow Area has been deleted successfully.", "success"); 
                }
                else {
                    swal("Something Went Wrong!!!");
                }
            }
        });
    });
}

// product name list
$( ".productNameList" ).autocomplete({
    source: '/product/productNameList',
    autoFocus:true,
    minLength:2,
    select: function(event,ui) {
        $('.productNameList').val(ui.item.value);
        $('#sel_product_id').val(ui.item.id);
        $('.productId').val(ui.item.id);
    }
});

// on change grow area

$('#growArea').change( function() {
    getRoomList(); 
});
getRoomList();

function  getRoomList() {
  $.ajax({
        type: "POST",
        url: '/grow/roomAjax',
        data: {
            action : 'getRoomList' ,
            area_id : $("#growArea").val()
        } ,
        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
        success: function(data){
            $("#sourceRoom" ).html( data );
            $("#destinationRoom" ).html( data );
        }
    });
}
/* end*/