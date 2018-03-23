
$(document).ready(function(){

	var pubPath = '/grow/roomAjax';
	setLayout( 1 , 1 );
	
	$("#area_select").change(function(){
		$.ajax({
				type: "POST",
				url: pubPath,
				data: {
					action : 'getRoomList' ,
					area_id : $("#area_select").val() ,
					allFlag : 0
				} ,
				headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
				success: function(data){
					$(".room_select_option_box" ).html( data );
					$("#fileupload_room_select" ).html( data );
					$("#move_select_src" ).html( data );
					$("#move_select_dst" ).html( data );
					$(".room_select_option_box" ).trigger('change');
				}
		});
	});
	
	$("#area_select" ).trigger('change');

});