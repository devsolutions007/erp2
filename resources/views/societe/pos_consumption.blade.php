<div class="tabs" data-role="controlgroup" data-type="horizontal">
	<a class="tabTitle">
		<img src="/theme/eldy/img/object_company.png" alt="" title="Third party" class="inline-block valigntextbottom"> <span class="tabTitleText">Third party</span>
	</a>
	<div class="inline-block tabsElem">
		<!-- id tab = card -->
		<a data-role="button" id="card" class="tabunactive tab inline-block" href="/societe/card.php?socid=1">Card</a>
	</div>
	<div class="inline-block tabsElem">
		<!-- id tab = customer -->
		<a data-role="button" id="customer" class="tabunactive tab inline-block" href="/comm/card.php?socid=1">Customer</a>
	</div>
	<div class="inline-block tabsElem">
		<!-- id tab = supplier -->
		<a data-role="button" id="supplier" class="tabunactive tab inline-block" href="/fourn/card.php?socid=1">Supplier</a>
	</div>
	<div class="inline-block tabsElem">
		<!-- id tab = marketing -->
		<a data-role="button" id="marketing" class="tabunactive tab inline-block" href="/societe/marketing.php?socid=1">Marketing</a>
	</div>
	<div class="inline-block tabsElem">
		<!-- id tab = custom -->
		<a data-role="button" id="custom" class="tabunactive tab inline-block" href="/societe/custom.php?socid=1">Custom</a>
	</div>
	<div class="inline-block tabsElem tabsElemActive">
		<!-- id tab = consumption -->
		<a data-role="button" id="consumption" class="tabactive tab inline-block" href="/societe/consumption.php?socid=1">Order/Purchase</a>
	</div>
	<div class="inline-block tabsElem">
		<!-- id tab = rib -->
		<a data-role="button" id="rib" class="tabunactive tab inline-block" href="/societe/rib.php?socid=1">Bank accounts</a>
	</div>
	<div class="inline-block tabsElem">
		<!-- id tab = margin -->
		<a data-role="button" id="margin" class="tabunactive tab inline-block" href="/margin/tabs/thirdpartyMargins.php?socid=1">Margins</a>
	</div>
	<div class="inline-block tabsElem">
		<!-- id tab = track -->
		<a data-role="button" id="track" class="tabunactive tab inline-block" href="/societe/track.php?action=view&amp;socid=1">Track</a>
	</div>
	<div class="inline-block tabsElem">
		<!-- id tab = note -->
		<a data-role="button" id="note" class="tabunactive tab inline-block" href="/societe/note.php?id=1">Notes</a>
	</div>
	<div class="inline-block tabsElem">
		<!-- id tab = document -->
		<a data-role="button" id="document" class="tabunactive tab inline-block" href="/societe/document.php?socid=1">Linked files</a>
	</div>
	<div class="inline-block tabsElem">
		<!-- id tab = agenda -->
		<a data-role="button" id="agenda" class="tabunactive tab inline-block" href="/societe/agenda.php?socid=1">Events</a>
	</div>
</div>


<div class="tabBar">
	<div class="arearef heightref valignmiddle" width="100%">
		<!-- Start banner content -->
		<div style="vertical-align: middle">
			<div class="pagination" style="display: none;">
				<ul>
					<li class="noborder litext">
						<a href="#">Back to list</a>
					</li>
					<li class="pagination">
						<span class="inactive"><i class="fa fa-chevron-left opacitymedium"></i></span>
					</li>
					<li class="pagination">
						<a href="#"><i class="fa fa-chevron-right"></i></a>
					</li>
				</ul>
			</div>
			<div class="inline-block floatleft">
				<div class="floatleft inline-block valignmiddle divphotoref">
					<img class="photosociete photoref" alt="No photo" src="theme/common/nophoto.png">
				</div>
			</div>
			<div class="inline-block floatleft valignmiddle refid refidpadding">Main Customer <div class="refidno">
				<!-- BEGIN part to show address block -->
				<a href="#" class="hideonsmartphone" onclick="return copyToClipboard('Main Customer<br>United States','Use Ctrl+C to copy to clipboard');">
					<img src="theme/eldy/img/object_address.png" alt="" title="Address" class="inline-block valigntextbottom"></a> United States
					<div style="clear: both;"></div>
					<div class="nospan float" style="margin-right: 10px">
						<img src="theme/eldy/img/object_email.png" alt="" title="E-mail" class="inline-block valigntextbottom"> <a style="text-overflow: ellipsis;" href="mailto:future_web@outlook.com">future_web@outlook.com</a>
					</div>
					<!-- END Part to show address block -->
				</div>
			</div>
		</div><!-- End banner content -->
	</div>
	<div class="underrefbanner clearboth"></div>
	<div class="fichecenter"></div>
	<br>
	<form method="POST" action="#">
		<div style="float: right;">
			<input class="common_btn_menu" name="order_btn" id="order_btn" value="Order" title="Order" type="button">
			<input class="common_btn_menu select_btn_menu " name="purchase_btn" id="purchase_btn" value="Purchase" title="Purchase" type="button">
		</div>
		<table class="liste purchase_table" width="100%">
			<tbody>
				<tr class="liste_titre">
					<th class="liste_titre" align="center">
						<a href="/societe/pos_consumption.php?sortfield=doc_number&amp;sortorder=desc&amp;begin=&amp;socid=1&amp;type_element=invoice">Ref.</a>
					</th>
					<th class="liste_titre_sel" width="150" align="center">
						<a href="/societe/pos_consumption.php?sortfield=dateprint&amp;sortorder=asc&amp;begin=&amp;socid=1&amp;type_element=invoice">Date</a><span class="nowrap"><img src="/theme/eldy/img/1uparrow.png" alt="" title="Z-A" class="imgup"></span>
					</th>
					<th class="liste_titre" align="center"><a href="/societe/pos_consumption.php?sortfield=fk_statut&amp;sortorder=desc&amp;begin=&amp;socid=1&amp;type_element=invoice">Status</a></th>
					<th class="liste_titre" align="center">Product</th>
					<th class="liste_titre" align="center"><a href="/societe/pos_consumption.php?sortfield=prod_qty&amp;sortorder=desc&amp;begin=&amp;socid=1&amp;type_element=invoice">Quantity</a></th>
					<th class="liste_titre" align="center">Price</th>
				</tr>
				<tr class="oddeven">
					<td class="nobordernopadding nowrap" width="100"><a href="/compta/facture/card.php?facid=98" class="classfortooltip"><img src="/theme/eldy/img/object_bill.png" alt=" FA1802-2117" class="classfortooltip"></a> <a href="/compta/facture/card.php?facid=98" class="classfortooltip">FA1802-2117</a></td><td width="80" align="center">02/08/2018</td><td style="width: 60px;" align="center"><img src="/theme/eldy/img/statut6.png" alt="" title="Paid" class="inline-block valigntextbottom"> Paid</td><td class="product-cont" data-id="133"><a href="/product/card.php?id=133" class="classfortooltip"><img src="/theme/eldy/img/object_product.png" alt=" bgood 12x10 Anonymous Bag" class="classfortooltip"></a> <a href="/product/card.php?id=133" class="classfortooltip">bgood 12x10 Anonymous Bag</a> - bgood 12x10 Anonymous Bag</td><td>1</td><td>3.50</td>
				</tr>
				<tr class="oddeven">
					<td class="nobordernopadding nowrap" width="100"><a href="/compta/facture/card.php?facid=98" class="classfortooltip"><img src="/theme/eldy/img/object_bill.png" alt=" FA1802-2117" class="classfortooltip"></a> <a href="/compta/facture/card.php?facid=98" class="classfortooltip">FA1802-2117</a></td><td width="80" align="center">02/08/2018</td><td style="width: 60px;" align="center"><img src="/theme/eldy/img/statut6.png" alt="" title="Paid" class="inline-block valigntextbottom"> Paid</td><td class="product-cont" data-id="126"><a href="/product/card.php?id=126" class="classfortooltip"><img src="/theme/eldy/img/object_product.png" alt=" Bakked - Dabaratus" class="classfortooltip"></a> <a href="/product/card.php?id=126" class="classfortooltip">Bakked - Dabaratus</a> - Bakked - Dabaratus</td><td>1</td><td>40.00</td>
				</tr>
				<tr class="oddeven">
					<td class="nobordernopadding nowrap" width="100"><a href="/compta/facture/card.php?facid=98" class="classfortooltip"><img src="/theme/eldy/img/object_bill.png" alt=" FA1802-2117" class="classfortooltip"></a> <a href="/compta/facture/card.php?facid=98" class="classfortooltip">FA1802-2117</a></td><td width="80" align="center">02/08/2018</td><td style="width: 60px;" align="center"><img src="/theme/eldy/img/statut6.png" alt="" title="Paid" class="inline-block valigntextbottom"> Paid</td><td class="product-cont" data-id="125"><a href="/product/card.php?id=125" class="classfortooltip"><img src="/theme/eldy/img/object_product.png" alt=" Bakked - 500mg Cartridge" class="classfortooltip"></a> <a href="/product/card.php?id=125" class="classfortooltip">Bakked - 500mg Cartridge</a> - Bakked - 500mg Cartridge</td><td>1</td><td>17.50</td>
				</tr>
				<tr class="liste_total">
					<td>Total</td>
					<td colspan="3"></td>
					<td>25</td><td>14.038</td>
				</tr>
			</tbody>
		</table>
		<table class="liste order_table" width="100%" style="display: none;">
			<tbody>
				<tr class="liste_titre">
					<th class="liste_titre" align="center">
						<a href="/societe/pos_consumption.php?sortfield=doc_number&amp;sortorder=desc&amp;begin=&amp;socid=1&amp;type_element=order">Ref.</a>
					</th>
					<th class="liste_titre_sel" width="150" align="center">
						<a href="/societe/pos_consumption.php?sortfield=dateprint&amp;sortorder=asc&amp;begin=&amp;socid=1&amp;type_element=order">Date</a><span class="nowrap"><img src="/theme/eldy/img/1uparrow.png" alt="" title="Z-A" class="imgup"></span>
					</th>
					<th class="liste_titre" align="center"><a href="/societe/pos_consumption.php?sortfield=fk_statut&amp;sortorder=desc&amp;begin=&amp;socid=1&amp;type_element=order">Status</a>
					</th>
					<th class="liste_titre" align="center">Product</th>
					<th class="liste_titre" align="center"><a href="/societe/pos_consumption.php?sortfield=prod_qty&amp;sortorder=desc&amp;begin=&amp;socid=1&amp;type_element=order">Quantity</a></th>
					<th class="liste_titre" align="center">Price</th>
				</tr>
				<tr class="liste_total">
					<td>Total</td><td colspan="3"></td>
					<td>0</td><td>0.00</td>
				</tr>
			</tbody>
		</table>
		<!-- Begin title '' -->
		<table class="notopnoleftnoright" style="margin-bottom: 6px;" width="80%" border="0"><tbody><tr><td class="nobordernopadding valignmiddle"><div class="titre inline-block"></div></td><td class="nobordernopadding valignmiddle" align="right"><div class="pagination"><ul><li class="pagination"><span class="active">1</span></li><li class="pagination"><a class="paginationnext" href="/societe/pos_consumption.php?page=1&amp;socid=1&amp;type_element=invoice&amp;sortfield=dateprint&amp;sortorder=DESC"><i class="fa fa-chevron-right" title="Next"></i></a></li></ul></div>
		</td></tr></tbody></table>
		<!-- End title -->
	</form>
</div>
<script type="text/javascript">
	$("#order_btn").click(function(){
		$(this).addClass('select_btn_menu');
		$("#purchase_btn").removeClass('select_btn_menu');
		$('.order_table').css('display', 'table');
		$('.purchase_table').css('display', 'none');
		//$("#content-php").load( "/societe/pos_consumption.php?socid=" + 1 + "&type_element=order&button_third=Search&limit=25" );
		//$("#addcustomer_modal").css("display", "block");  
	});

	$("#purchase_btn").click(function(){
		//$("#content-php").load( "/societe/pos_consumption.php?socid=" + 1 + "&type_element=invoice&button_third=Search&limit=25" );
		//$("#addcustomer_modal").css("display", "block");  
		$(this).addClass('select_btn_menu');
		$("#order_btn").removeClass('select_btn_menu');
		$('.order_table').css('display', 'none');
		$('.purchase_table').css('display', 'table');
	});
</script>