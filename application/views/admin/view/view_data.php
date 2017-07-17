
<input name="b_print" type="button" class="ipt btn btn-primary pull-right"   onClick="printdiv('div_print');" value=" Print ">

<div class="subscription_form_view " id="div_print">
	<div class="subscription_view_logo">
		<img src="<?php echo base_url(); ?>/assets/frontend/images/apparel_banner_en.jpg">
	</div>
	<center>
		<h1>Subscription Form</h1>
		<h2>For</h2>
		<h3>Bi-Lingual Fortnightly Print Version</h3>
	</center>
	<table>
			<td>
				<div class="subscription_view_date">
					Date:  <?php $entry_date=explode(' ',$register_view->entry_daty); echo $entry_date[0]; ?>	 
				</div>
			</td>
		</tr>		
		<tr>
			<td>
				Dear Editor, 
			</td>
		</tr>
		<tr>
			<td>
				I would like to subscribe the Newspaper as
				
				<?php if($register_view->subscripion_type==1) echo 'Quaterly'; ?>
				<?php if($register_view->subscripion_type==2) echo 'Half Yearly'; ?>
				<?php if($register_view->subscripion_type==3) echo 'Yearly'; ?>
			</td>
		</tr>
		<tr>
			<td>
				Name: <?php echo $register_view->name;?>
			</td>
		</tr>
		<tr>
			<td>
				Address: <?php echo $register_view->address;?>
			</td>
		</tr>	
		<tr>
			<td>
				City: <?php echo $register_view->city;?>
			</td>
			<td>
				Postal Code: <?php echo $register_view->postal_code;?>
			</td>
		</tr>	
		<tr>
			<td>
				Email: <?php echo $register_view->email_id;?>
			</td>
			<td>
				Mobile: <?php echo $register_view->mobile;?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<div style="background:#f0dd79; font-weight:bold;padding:10px 10px;">
					Subscription fees should be paid through crossed cheque to  "The Apparel News" or through 'Bkash' @ 01712606082.
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<b>Subscription fees</b> 
			</td>
		</tr>	
		<tr>
			<td colspan="2">
				 Quaterly Tk 600 + Tk 120 (courier charge)<br>
				 Half Yearly Tk 1200 + Tk 240 (courier charge)<br>
				 Quaterly Tk 600 + Tk 480 (courier charge)
			</td>
		</tr>
		<tr>
			<td colspan="2">
				Courier Charge will be applicable if the newspaper is delivered by Courier services 
			</td>
		</tr>		
	</table>	
	
	<div class="subscription_view_footer">
		<b>Editorial, News & Commercial office:</b> 304, Elephant Road, Level5 (Near Bata Signal, Opposite of Mercantile Bank), Dhaka-1205 <br>
		<b>Circulation & Distribution office:</b> 161/2(1st floor), Bir Uttam C. R. Dutta Road, Hatirpool Bazar, Elephant Road, Dhaka-1205 <br>
		Phone: +88-02-029670554, Mobile:+88-01712031549, Fax: +88-02-029670554, Email:info@theapparelnews.com, amit.kbiswas82@gmail.com
	</div>
</div>

<script language="javascript">
	function printdiv(printpage)
	{
	var headstr = "<html><head><title></title></head><body>";
	var footstr = "</body>";
	var newstr = document.all.item(printpage).innerHTML;
	var oldstr = document.body.innerHTML;
	document.body.innerHTML = headstr+newstr+footstr;
	window.print();
	document.body.innerHTML = oldstr;
	return false;
	}
</script>
