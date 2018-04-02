// toggle checkbox value on check 
function checkboxClick(ele) {
    if($(ele).val() == 0 && $(ele).attr('checked','')) {
        $(ele).attr('checked','checked')
        $(ele).val(1);
    } else {
        $(ele).removeAttr('checked')
        $(ele).val(0);
    }
} 

// email dublicate entry check

function checkEmailExist(element) {
	if($(element).val().length > 0) { 
	    $.ajax({
	        type: "POST",
	        url: '/customers/customerAjax',
	        data: {
	            action : 'checkEmailExist' ,
	            email : $(element).val()
	        } ,
	        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
	        success: function(data){
	            if(data > 0) {
	            	swal('Error','Email already exist.', 'warning');
	            	$(element).val('');
	            }
	        }
	    });
	}    
}

// phone dublicate entry check

function checkPhoneExist(element) {
	if($(element).val().length > 0) { 
		$.ajax({
	        type: "POST",
	        url: '/customers/customerAjax',
	        data: {
	            action : 'checkPhoneExist' ,
	            phone : $(element).val()
	        } ,
	        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
	        success: function(data){
	            if(data > 0) {
	            	swal('Error','Phone number already exist.', 'warning');
	            	$(element).val('');
	            }
	        }
    	});
	}
}  

// delete customer

function deleteCustomer( id, name, key ) {
    swal({
      title: "Are you sure?",
      text: "You want to delete Customer <b>"+name+"</b>.",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false,
      html: true
    },
    function(){
        $.ajax({
            url: "/customers/customerAjax",
            type: "post",
            cache: false,
            data: {"action": 'delete_customer', "id": id },
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
            success: function(result) {
                if ( result == 'success' ) {
                    $( '#customer_row'+key ).remove();
                    swal("Deleted!", "Customer has been deleted successfully.", "success"); 
                }
                else {
                    swal("Error", "Something Went Wrong!!!", "error");
                }
            }
        });
    });
}
/* end*/