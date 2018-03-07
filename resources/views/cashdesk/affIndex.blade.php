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
	<meta charset="utf-8">
    <!-- DNS prefetch -->
    <link rel=dns-prefetch href="//fonts.googleapis.com">
    <!-- Use the .htaccess and remove these lines to avoid edge case issues.
    More info: h5bp.com/b/378 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="shortcut icon" type="image/x-icon" href=""/>
	<title>Hotbox App</title>
	<meta name="description" content="">
    <meta name="author" content="">
	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<!-- Includes CSS for JQuery (Ajax library) -->
	<link rel="stylesheet" type="text/css" href="/mukesh/erp2-test/public/includes/jquery/css/smoothness/jquery-ui.css?version=6.0.0">
	<link rel="stylesheet" type="text/css" href="/mukesh/erp2-test/public/includes/jquery/plugins/tiptip/tipTip.css?version=6.0.0">
	<link rel="stylesheet" type="text/css" href="/mukesh/erp2-test/public/includes/jquery/plugins/jnotify/jquery.jnotify-alt.min.css?version=6.0.0">
	<link rel="stylesheet" type="text/css" href="/mukesh/erp2-test/public/includes/jquery/plugins/select2/select2.css?version=6.0.0">
	<!-- End -->
	<!-- Includes CSS for font awesome -->
	<link rel="stylesheet" type="text/css" href="/mukesh/erp2-test/public/plugins/fontawesome/css/font-awesome.min.css?version=6.0.0">
	<!-- Includes CSS for Dolibarr theme -->
	<link rel="stylesheet" type="text/css" href="/mukesh/erp2-test/public/theme/style.css">
	<!--  end -->
	<!-- Includes CSS added by page -->
	<link rel="stylesheet" href="/mukesh/erp2-test/public/cashdesk/css/pos_style.css">
	<!-- <link rel="stylesheet" href="/mukesh/erp2-test/public/cashdesk/css/ticket.css"> -->
	<!--  template css -->
	<link rel="stylesheet" href="/mukesh/erp2-test/public/cashdesk/template/css/style.css">

	<!-- main custom style -->
	<!-- <link rel="stylesheet" href="/mukesh/erp2-test/public/cashdesk/css/style.css"> -->
	<link rel="stylesheet" href="/mukesh/erp2-test/public/cashdesk/css/w3_style.css">

	<!-- Includes JS for JQuery -->
	<script type="text/javascript" src="/mukesh/erp2-test/public/includes/jquery/js/jquery.min.js?version=6.0.0"></script>
	<script type="text/javascript" src="/mukesh/erp2-test/public/includes/jquery/js/jquery-ui.min.js?version=6.0.0"></script>
	<script type="text/javascript" src="/mukesh/erp2-test/public/includes/jquery/plugins/tablednd/jquery.tablednd.0.6.min.js?version=6.0.0"></script>
	<script type="text/javascript" src="/mukesh/erp2-test/public/includes/jquery/plugins/tiptip/jquery.tipTip.min.js?version=6.0.0"></script>
	<script type="text/javascript" src="/mukesh/erp2-test/public/includes/jquery/plugins/jnotify/jquery.jnotify.min.js?version=6.0.0"></script>
	<script type="text/javascript" src="/mukesh/erp2-test/public/core/js/jnotify.js?version=6.0.0"></script>
	<script type="text/javascript" src="/mukesh/erp2-test/public/includes/jquery/plugins/flot/jquery.flot.min.js?version=6.0.0"></script>
	<script type="text/javascript" src="/mukesh/erp2-test/public/includes/jquery/plugins/flot/jquery.flot.pie.min.js?version=6.0.0"></script>
	<script type="text/javascript" src="/mukesh/erp2-test/public/includes/jquery/plugins/flot/jquery.flot.stack.min.js?version=6.0.0"></script>
	<script type="text/javascript" src="/mukesh/erp2-test/public/includes/jquery/plugins/select2/select2.min.js?version=6.0.0"></script>
	
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
							<td width="70"><img src="/mukesh/erp2-test/public/cashdesk/img/alert.png" width="70" height="70"></td>
							<td><p id="alert_message">Something is wrong.</p></td>
						</tr>
						</tbody>
					</table>
				</div>

			</div>
		</div>
		<div class="processing">
			<img src="/mukesh/erp2-test/public/cashdesk/img/processing.gif">
		</div>

	</div>
	<script type="text/javascript" src="/mukesh/erp2-test/public/cashdesk/template/js/global.js"></script>
	<script type="text/javascript" src="/mukesh/erp2-test/public/cashdesk/javascript/pos_event.js"></script>
</body>
</html>