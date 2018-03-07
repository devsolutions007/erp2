<div class="modal_card_header_title">New Customer</div>
<form enctype="multipart/form-data" action="#" method="post" name="formsoc">
	<div class="tabBar tabBarWithBottom">
		<table class="border" width="100%">
			<tbody>
				<tr>
					<td class="titlefieldcreate"><span id="TypeName" class="fieldrequired"><label for="name">Name</label></span></td><td colspan="2"><input class="minwidth300" maxlength="128" name="name" id="name" value="" autofocus="autofocus" type="text"></td>
					<td></td>
				</tr>
				<tr>
					<td><label for="phone">Phone</label></td>
					<td colspan="2"><input name="phone" id="phone" class="maxwidth100onsmartphone" value="" type="text">
	                <input class="checkforselect" value="SMS" id="message_service_register" type="checkbox">
	                <label for="message_service_register" style="margin-left: 5px;">SMS</label>
	                <span id="sucess_service" style="color: #56C36F;display: none;">Success</span>
	                <span id="error_service" style="color: red;display: none;">Error</span></td>
	                <td></td>
	            </tr>
			</tbody>
		</table>
	</div>
	<div class="center" style="margin-bottom: 30px;">
		<input class="button" name="create" value="Create third party" type="submit"> &nbsp; &nbsp; 
		<input id="close_add_customer" class="button" value="Cancel" type="button">
	</div>
</form>