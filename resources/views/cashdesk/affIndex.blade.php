<?php 
if(isset($_GET['mode'])) {
	$mode = $_GET['mode'];
} else {
	$mode = 'sell';
}

?>
<!DOCTYPE html>
<html>
<head>
	@include('partials.module-head')
	
</head>
<body style="background: #f5f5f5;">
	@include('cashdesk.template.modes')
	<div class="full-screen-pos-display" id="pos_wrapper" data-mode="<?php echo $mode ? $mode : ''; ?>">

		<input type="hidden" name="total_cache" id="total_cache">
		<input type="hidden" name="WarehouseID" id="WarehouseID" value="">
		<input type="hidden" name="author_id" id="author_id" value="">
		<input type="hidden" name="author_name" id="author_name" value="">
		<input type="hidden" name="tax_value" id="tax_value">
		<input type="hidden" name="product_unit_price" id="product_unit_price">
		<input type="hidden" name="product_unit_name" id="product_unit_name">
		<input type="hidden" name="product_unit_id" id="product_unit_id">
		<input type="hidden" name="product_unit_rfid" id="product_unit_rfid">

		
		@if( $mode == 'products' )
			@include( 'cashdesk.template.products' )
		@elseif ( $mode == 'reconcile' )
			@include( 'cashdesk.template.reconcile' )
		@else
			@include( 'cashdesk.template.sell' )
		@endif
		<div id="alert_modal" class="modal">
			<div class="modal-content">
				<div class="modal-header">
					<span class="alert-close">&times;</span>
					<h2>Alert</h2>
				</div>
				<div class="modal-body">
					<table>
						<tbody>
						<tr>
							<td width="70"><img src="{{ asset('cashdesk/img/alert.png') }}" width="70" height="70"></td>
							<td><p id="alert_message">Something is wrong.</p></td>
						</tr>
						</tbody>
					</table>
				</div>

			</div>
		</div>
		<div class="processing">
			<img src="{{ asset('cashdesk/img/processing.gif') }}">
		</div>

	</div>
	<script type="text/javascript" src="{{ asset('cashdesk/template/js/global.js') }}"></script>
	<script type="text/javascript" src="{{ asset('cashdesk/javascript/pos_event.js') }}"></script>
</body>
</html>