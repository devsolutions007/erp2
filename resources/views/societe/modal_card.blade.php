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
	            <tr id="name_alias">
	            	<td><label for="name_alias_input">Alias name (commercial, trademark, ...)</label></td>
	            	<td colspan="3"><input class="minwidth300" name="name_alias" id="name_alias_input" value="" type="text"></td>
	            </tr>
	            <tr>
	            	<td class="titlefieldcreate">
            		<span class="fieldrequired"><label for="customerprospect">Prospect / Customer</label></span></td>
            		<td class="maxwidthonsmartphone">
            			<select class="flat" name="client" id="customerprospect">
            				<option value="1">Customer</option><option value="2">Prospect</option><option value="3">Prospect / Customer</option><option value="0">Nor prospect, nor customer</option>
            			</select></td>
            		<td><label for="customer_code">Customer code</label></td>
            		<td>
            			<table class="nobordernopadding">
	            			<tbody>
	            				<tr><td><input name="code_client" id="customer_code" class="maxwidthonsmartphone" value="CU1803-0012" maxlength="15" type="text"></td><td><div class="inline-block"><div class="classfortooltip inline-block inline-block" style="padding: 0px; padding: 0px; padding-right: 3px !important;"><img src="/theme/eldy/img/info.png" alt="" title="" style="vertical-align: middle; cursor: help"></div></div></td></tr>
	            			</tbody>
	            		</table>
	            	</td>
	            </tr>
	            <tr>
	            	<td>
	            		<span class="fieldrequired">
	            			<label for="fournisseur">Supplier</label>
	            		</span>
	            	</td>
	            	<td>
	            		<select class="flat" id="fournisseur" name="fournisseur">
							<option value="1">Yes</option>
							<option value="0" selected="">No</option>
						</select>
					</td>
					<td>
						<label for="supplier_code">Supplier code</label>
					</td>
					<td>
						<table class="nobordernopadding">
							<tbody>
								<tr>
									<td><input name="code_fournisseur" id="supplier_code" class="maxwidthonsmartphone" value="SU1803-0006" maxlength="15" type="text"></td>
									<td><div class="inline-block"><div class="classfortooltip inline-block inline-block" style="padding: 0px; padding: 0px; padding-right: 3px !important;"><img src="/theme/eldy/img/info.png" alt="" title="" style="vertical-align: middle; cursor: help"></div></div></td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<label for="status">Status</label>
					</td>
					<td colspan="3">
						<select id="status" class="flat status" name="status">
							<option value="0">Closed</option>
							<option value="1" selected="">Open</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<label for="barcode">Bar code</label></td>
						<td colspan="3"><input name="barcode" id="barcode" value="" type="text">
					</td>
				</tr>
				<tr>
					<td class="tdtop">
						<label for="address">Address</label>
					</td>
					<td colspan="3">
						<textarea name="address" id="address" class="quatrevingtpercent" rows="_ROWS_2" wrap="soft"></textarea>
					</td>
				</tr>
				<tr>
					<td><label for="zipcode">Zip Code</label></td>
					<td>
						<input id="zipcode" class="maxwidthonsmartphone maxwidth100 quatrevingtpercent ui-autocomplete-input" autocomplete="off" name="zipcode" value="" type="text">
						</td><td><label for="town">City</label></td><td><!-- Autocomplete -->

						<input id="town" class="maxwidthonsmartphone maxwidth100 quatrevingtpercent ui-autocomplete-input" autocomplete="off" name="town" value="" type="text">
					</td>
				</tr>
				<tr>
					<td>
						<label for="selectcountry_id">Country</label>
					</td>
					<td colspan="3" class="maxwidthonsmartphone">
						<select id="selectcountry_id" class="flat maxwidth200onsmartphone selectcountry minwidth300" name="country_id">
							<option value="0"></option>
							<option value="30">Afghanistan (AF)</option>
							<option value="31">Åland Islands (AX)</option>
							<option value="32">Albania (AL)</option>
							<option value="13">Algeria (DZ)</option>
							<option value="33">American Samoa (AS)</option>
							<option value="34">Andorra (AD)</option>
						</select>

						<img src="/mukesh/erp2-test/public/theme/eldy/img/info.png" alt="" title="You can change values for this list from menu Setup - Dictionaries" class="hideonsmartphone">
					</td>
				</tr>
				<tr>
					<td>
						<label for="state_id">State/Province</label>
					</td>
					<td colspan="3" class="maxwidthonsmartphone">
						<select id="state_id" class="flat maxwidth200onsmartphone minwidth300" name="state_id">
							<option value="0">&nbsp;</option>
							<option value="794">AK - Alaska</option>
							<option value="793">AL - Alabama</option>
							<option value="796">AR - Arkansas</option>
						</select> 
						<img src="/theme/eldy/img/info.png" alt="" title="You can change values for this list from menu Setup - Dictionaries" class="hideonsmartphone">
					</td>
				</tr>
				<tr>
					<td>
						<label for="email">E-mail</label>
					</td>
					<td>
						<input name="email" id="email" value="" type="text">
					</td>
					<td>
						<label for="url">Web</label>
					</td>
					<td>
						<input name="url" id="url" value="" type="text">
					</td>
				</tr>
				<tr>
					<td><label for="fax">Fax</label></td>
					<td><input name="fax" id="fax" class="maxwidth100onsmartphone quatrevingtpercent" value="" type="text"></td><td colspan="2"></td>
				</tr>
				<tr>
					<td><label for="idprof1">Prof Id</label></td>
					<td><input class="maxwidth100onsmartphone quatrevingtpercent" name="idprof1" id="idprof1" maxlength="128" value="" type="text"></td><td colspan="2"></td>
				</tr>
				<tr>
					<td><label for="typent_id">Third party type</label></td>
					<td class="maxwidthonsmartphone">
						<select id="typent_id" class="flat typent_id" name="typent_id"><option value="0">&nbsp;</option>
							<option value="101">Medical Customer</option>
							<option value="100">Recreational Customer</option>
						</select> <img src="/theme/eldy/img/info.png" alt="" title="You can change values for this list from menu Setup - Dictionaries" class="hideonsmartphone"></td>
					<td><label for="effectif_id">Staff</label></td>
					<td class="maxwidthonsmartphone">
						<select id="effectif_id" class="flat effectif_id" name="effectif_id"><option value="0">&nbsp;</option>
							<option value="1">1 - 5</option>
							<option value="2">6 - 10</option>
							<option value="3">11 - 50</option>
							<option value="4">51 - 100</option>
							<option value="5">100 - 500</option>
							<option value="6">&gt; 500</option>
						</select> <img src="/theme/eldy/img/info.png" alt="" title="You can change values for this list from menu Setup - Dictionaries" class="hideonsmartphone">
					</td>
				</tr>
				<tr>
					<td><label for="forme_juridique_code">Legal form</label></td>
					<td class="maxwidthonsmartphone">
						<div id="particulier2" class="visible">
							<select class="flat minwidth200" name="forme_juridique_code" id="forme_juridique_code">
								<option value="0">&nbsp;</option>
							</select> <img src="/theme/eldy/img/info.png" alt="" title="You can change values for this list from menu Setup - Dictionaries" class="hideonsmartphone">
						</div>
					</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td class="toptd"><label for="custcats">Customers Categories</label></td>
					<td colspan="3">
						<select id="custcats" class="multiselect" multiple="" name="custcats[]" style="width: 90%">
							<option value="1">Customer1</option>
							<option value="7">Customer5</option>
						</select>
					</td>
				</tr>
				<tr class="hideonsmartphone">
					<td><label for="photoinput">Logo</label></td>
					<td colspan="3">
						<input class="flat" name="photo" id="photoinput" type="file">
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="center" style="margin-bottom: 30px;">
		<input class="button" name="create" value="Create third party" type="submit"> &nbsp; &nbsp; 
		<input id="close_add_customer" class="button" value="Cancel" type="button">
	</div>
</form>

<!-- Autocomplete Zip code-->
<script type="text/javascript">jQuery(document).ready(function() {
	var fields = ["town","selectcountry_id","state_id"];
	var nboffields = fields.length;
	var autoselect = 0;
	//alert(fields + " " + nboffields);

	jQuery("input#zipcode").autocomplete({
		dataType: "json",
		minLength: 2,
		source: function( request, response ) {
			jQuery.getJSON( "/core/ajax/ziptown.php", { zipcode: request.term }, function(data){
				response( jQuery.map( data, function( item ) {
					if (autoselect == 1 && data.length == 1) {
						jQuery("#zipcode").val(item.value);
						// TODO move this to specific request
						if (item.states) {
							jQuery("#state_id").html(item.states);
						}
						for (i=0;i<nboffields;i++) {
							if (item[fields[i]]) {   // If defined
                            	//alert(item[fields[i]]);
								jQuery("#" + fields[i]).val(item[fields[i]]);
							}
						}
					}
					return item
				}));
			});
		},
		select: function( event, ui ) {
		    needtotrigger = "";
			for (i=0;i<nboffields;i++) {
				//alert(fields[i] + " = " + ui.item[fields[i]]);
				if (fields[i]=="selectcountry_id")
				{
				    if (ui.item[fields[i]] > 0)     // Do not erase country if unknown
				    {
				    	oldvalue=jQuery("#" + fields[i]).val();
				        newvalue=ui.item[fields[i]];
				    	//alert(oldvalue+" "+newvalue);
				        jQuery("#" + fields[i]).val(ui.item[fields[i]]);
				        if (oldvalue != newvalue)	// To force select2 to refresh visible content
				        {
					    	needtotrigger="#" + fields[i];
						}

				        // If we set new country and new state, we need to set a new list of state to allow change
                        if (ui.item.states && ui.item["state_id"] != jQuery("#state_id").value) {
                            jQuery("#state_id").html(ui.item.states);
                        }
				    }
				}
                else if (fields[i]=="state_id" || fields[i]=="state_id")
                {
                    if (ui.item[fields[i]] > 0)     // Do not erase state if unknown
                    {
				    	oldvalue=jQuery("#" + fields[i]).val();
				        newvalue=ui.item[fields[i]];
				    	//alert(oldvalue+" "+newvalue);
                        jQuery("#" + fields[i]).val(ui.item[fields[i]]);    // This may fails if not correct country
				        if (oldvalue != newvalue)	// To force select2 to refresh visible content
				        {
					    	needtotrigger="#" + fields[i];
						}
                    }
                }
				else if (ui.item[fields[i]]) {   // If defined
			    	oldvalue=jQuery("#" + fields[i]).val();
			        newvalue=ui.item[fields[i]];
			    	//alert(oldvalue+" "+newvalue);
			        jQuery("#" + fields[i]).val(ui.item[fields[i]]);
			        if (oldvalue != newvalue)	// To force select2 to refresh visible content
			        {
				    	needtotrigger="#" + fields[i];
					}
				}

				if (needtotrigger != "")	// To force select2 to refresh visible content
				{
					// We introduce a delay so hand is back to js and all other js change can be done before the trigger that may execute a submit is done
					// This is required for example when changing zip with autocomplete that change the country
					jQuery(needtotrigger).delay(500).queue(function() {
						jQuery(this).trigger("change");
					});
				}
			}
		}
	});
	});
</script>

<!-- Autocomplete City-->
<script type="text/javascript">jQuery(document).ready(function() {
	var fields = ["zipcode","selectcountry_id","state_id"];
	var nboffields = fields.length;
	var autoselect = 0;
	//alert(fields + " " + nboffields);

	jQuery("input#town").autocomplete({
		dataType: "json",
		minLength: 2,
		source: function( request, response ) {
			jQuery.getJSON( "/core/ajax/ziptown.php", { town: request.term }, function(data){
				response( jQuery.map( data, function( item ) {
					if (autoselect == 1 && data.length == 1) {
						jQuery("#town").val(item.value);
						// TODO move this to specific request
						if (item.states) {
							jQuery("#state_id").html(item.states);
						}
						for (i=0;i<nboffields;i++) {
							if (item[fields[i]]) {   // If defined
                            	//alert(item[fields[i]]);
								jQuery("#" + fields[i]).val(item[fields[i]]);
							}
						}
					}
					return item
				}));
			});
		},
		select: function( event, ui ) {
		    needtotrigger = "";
			for (i=0;i<nboffields;i++) {
				//alert(fields[i] + " = " + ui.item[fields[i]]);
				if (fields[i]=="selectcountry_id")
				{
				    if (ui.item[fields[i]] > 0)     // Do not erase country if unknown
				    {
				    	oldvalue=jQuery("#" + fields[i]).val();
				        newvalue=ui.item[fields[i]];
				    	//alert(oldvalue+" "+newvalue);
				        jQuery("#" + fields[i]).val(ui.item[fields[i]]);
				        if (oldvalue != newvalue)	// To force select2 to refresh visible content
				        {
					    	needtotrigger="#" + fields[i];
						}

				        // If we set new country and new state, we need to set a new list of state to allow change
                        if (ui.item.states && ui.item["state_id"] != jQuery("#state_id").value) {
                            jQuery("#state_id").html(ui.item.states);
                        }
				    }
				}
                else if (fields[i]=="state_id" || fields[i]=="state_id")
                {
                    if (ui.item[fields[i]] > 0)     // Do not erase state if unknown
                    {
				    	oldvalue=jQuery("#" + fields[i]).val();
				        newvalue=ui.item[fields[i]];
				    	//alert(oldvalue+" "+newvalue);
                        jQuery("#" + fields[i]).val(ui.item[fields[i]]);    // This may fails if not correct country
				        if (oldvalue != newvalue)	// To force select2 to refresh visible content
				        {
					    	needtotrigger="#" + fields[i];
						}
                    }
                }
				else if (ui.item[fields[i]]) {   // If defined
			    	oldvalue=jQuery("#" + fields[i]).val();
			        newvalue=ui.item[fields[i]];
			    	//alert(oldvalue+" "+newvalue);
			        jQuery("#" + fields[i]).val(ui.item[fields[i]]);
			        if (oldvalue != newvalue)	// To force select2 to refresh visible content
			        {
				    	needtotrigger="#" + fields[i];
					}
				}

				if (needtotrigger != "")	// To force select2 to refresh visible content
				{
					// We introduce a delay so hand is back to js and all other js change can be done before the trigger that may execute a submit is done
					// This is required for example when changing zip with autocomplete that change the country
					jQuery(needtotrigger).delay(500).queue(function() {
						jQuery(this).trigger("change");
					});
				}
			}
		}
	});
	});
</script>

<!-- JS CODE TO ENABLE select2 for id = selectcountry_id -->
<script type="text/javascript">
$(document).ready(function () {
	$('#selectcountry_id').select2({
	    dir: 'ltr',
		width: 'resolve',		/* off or resolve */
		minimumInputLength: 0
	});
});
</script>

<!-- JS CODE TO ENABLE select2 for id = state_id -->
<script type="text/javascript">
$(document).ready(function () {
	$('#state_id').select2({
	    dir: 'ltr',
		width: 'resolve',		/* off or resolve */
		minimumInputLength: 0
	});
});
</script>

<!-- JS CODE TO ENABLE select2 for id = forme_juridique_code -->
<script type="text/javascript">
$(document).ready(function () {
	$('#forme_juridique_code').select2({
	    dir: 'ltr',
		width: 'resolve',		/* off or resolve */
		minimumInputLength: 0
	});
});
</script>

<!-- JS CODE TO ENABLE select2 for id custcats -->
<script type="text/javascript">
function formatResult(record) {
return record.text;	};
function formatSelection(record) {
return record.text;	};
$(document).ready(function () {
	$('#custcats').select2({
		dir: 'ltr',
		// Specify format function for dropdown item
		formatResult: formatResult,
	 	templateResult: formatResult,		/* For 4.0 */
		// Specify format function for selected item
		formatSelection: formatSelection,
	 	templateResult: formatSelection		/* For 4.0 */
	});
});
</script>