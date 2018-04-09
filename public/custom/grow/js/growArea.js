/* Grow Area  Edit modal start */

function showEditGrowModal( name, type, licenceNumber, id) {
    $('#editGrowAreaModal').modal('show');
    $('#editName').val(name);
    $('#editGrowAreaId').val(id);
    $('#editType').val(type);
    $('#editLicenceNumber').val(licenceNumber);
}

/* Grow Area  Edit modal end */

/* Grow Area Remove */
function removeGrowArea( id, name ) {
    swal({
      title: "Are you sure?",
      text: "You want to delete Grow Area <b>"+name+"</b>.",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false,
      html: true
    },
    function(){
        $.ajax({
            url: "/grow/growAreaAjax",
            type: "post",
            cache: false,
            data: {"action": 'remove_grow_area', "id": id },
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
            success: function(result) {
                if ( result == 'success' ) {
                    //$( '#growAreaRow'+id ).remove();
                    swal("Deleted!", "Grow Area has been deleted successfully.", "success"); 
                    $(window).attr('location','/grow/growArea?growMenu=visible');
                }
                else {
                    swal("Something Went Wrong!!!");
                }
            }
        });
    });
}
/* end*/