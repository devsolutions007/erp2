//Datetimepicker plugin
// $('.datepicker').bootstrapMaterialDatePicker({
//     format: 'dddd DD MMMM YYYY',
//     clearButton: true,
//     weekStart: 1,
//     currentDate: true,
//     time: false
// });
$('.datepicker').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
// confirm alert

function showConfirmMessageGrow() {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function () {
        swal("Deleted!", "Your imaginary file has been deleted.", "success");
    });
}

// color picker
$('.colorpicker').colorpicker();