$(document).ready(function(){

	$.ajax({
		type: "POST",
		url: "../../class/engine/roomAjax.php",
		data: {
			action : 'get_room_setting_global'
		} ,
		success: function( data ){
			var room_setting = JSON.parse(data);
			$("#clone_color").val( room_setting.clone_color );
			$("#vegetation_color").val( room_setting.vegetation_color );
			$("#flower_color").val( room_setting.flower_color );
			$("#cutweigh_wet_color").val( room_setting.cutweigh_wet_color );
			$("#harvest_drying_color").val( room_setting.harvest_drying_color );
			$("#harvest_curing_color").val( room_setting.harvest_curing_color );
		}
	});

	///////////////// Room Select part //////////////////
	var pubPath = '../../class/engine/roomAjax.php';
	$("#area_select").change(function(){
		$.ajax({
				type: "POST",
				url: pubPath,
				data: {
					action : 'get_room_list' ,
					area_id : $("#area_select").val() ,
					allFlag : 0
				} ,
				success: function(data){
					$("#left_room_select" ).html( data );
					$("#left_room_select" ).trigger('change');
				}
		});
	});
	$("#area_select" ).trigger('change');
	/////////////////////////////////////////////////////

	previewroom();
	$("#left_room_select" ).change( function(){

		$.ajax({
			type: "POST",
			url: "../../class/engine/roomAjax.php",
			data: {
				action : 'get_room_setting' , 
				room_id : $("#left_room_select").val()
			} ,
			success: function( data ){
				var room_setting = JSON.parse(data);
				previewroom();
				$("#room_rows").val( room_setting.rows );
				$("#room_grow_day").val( room_setting.grow_days );
				$("#room_alarm_days").val( room_setting.alarm_days );
				$("#room_cols").val( room_setting.columns );
				$("#room_offsetX").val( room_setting.offsetX );
				$("#room_offsetY").val( room_setting.offsetY );
				$("#room_cols_per").val( room_setting.col_per_block );
				$("#room_hgap").val( room_setting.room_hgap );
				$("#room_rows_per").val( room_setting.row_per_block );
				$("#room_wgap").val( room_setting.room_wgap );
				$("#room_cell_height").val( room_setting.cell_height );
				$("#room_cell_width").val( room_setting.cell_width );
			}
		});

	});
	
	$("#save_setting").click(function(){
		$.ajax({
			type: "POST",
			url: "../../class/engine/roomAjax.php",
			data: {
				action 					: 'update_room_setting' ,
				room_id 				: $("#left_room_select").val() ,
				rows 					: $("#room_rows").val() ,
				grow_days 				: $("#room_grow_day").val() ,
				alarm_days 				: $("#room_alarm_days").val() ,
				columns 				: $("#room_cols").val() ,
				offsetX 				: $("#room_offsetX").val() ,
				offsetY 				: $("#room_offsetY").val() ,
				col_per_block 			: $("#room_cols_per").val() ,
				room_hgap 				: $("#room_hgap").val() ,
				row_per_block 			: $("#room_rows_per").val() ,
				room_wgap 				: $("#room_wgap").val() ,
				cell_height 			: $("#room_cell_height").val() ,
				cell_width 				: $("#room_cell_width").val() 
			} ,
			success: function(data){
				previewroom();
				$(".room_save_sucess" ).show().delay(2000).fadeOut();
			}
		});
	});

	$("#save_setting_global").click(function(){
		$.ajax({
			type: "POST",
			url: "../../class/engine/roomAjax.php",
			data: {
				action 					: 'update_room_setting_global' ,
				clone_color 			: $("#clone_color").val() ,
				vegetation_color		: $("#vegetation_color").val() ,
				flower_color 			: $("#flower_color").val() ,
				cutweigh_wet_color		: $("#cutweigh_wet_color").val() ,
				harvest_drying_color	: $("#harvest_drying_color").val() ,
				harvest_curing_color	: $("#harvest_curing_color").val()
			} ,
			success: function(data){
				$(".room_save_sucess" ).show().delay(2000).fadeOut();
			}
		});
	});

	function previewroom()
	{
		var option_type = $('option:selected', this).attr('rtype');
	
		$.ajax({
			type: "GET",
			url: '../../class/engine/roomAjax.php',
			data: {
				action : 'get_room_setting' , 
				room_id : $("#left_room_select").val()
			} ,
			success: function(room_setting){
				var room_setting = JSON.parse(room_setting);
				$.ajax({
					type: "GET",
					url: '../../class/engine/plantAjax.php',
					data: {
						action : 'get_plant_list' ,
						room_id : $("#left_room_select").val(),
					} ,
					success: function(data){
						var plantdata = JSON.parse(data);
						$("#left_room").empty();
						var LeftGroup  = new GrowBuild( "left_room" );
						LeftGroup.init( plantdata , room_setting , { uid : $("#left_room_select").val() , name : $("#left_room_select option:selected").text() , type : option_type } );
					}
				});
			}
		});
	}	

});