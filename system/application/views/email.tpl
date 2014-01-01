x<script type="text/javascript">
{literal}
function validateIt() {
	var name_length = $('#ag_name').val().length;
	var job_length = $('#job_name').val().length;
	var valid = true;
	if (name_length == 0) {
		$('#ag_name').css('background-color', '#FF9F9F');
		valid = false;
	}
	if (job_length == 0) {
		$('#job_name').css('background-color', '#FF9F9F');
		valid = false;
	}
	if (!valid) {
		 $('html,body').animate({scrollTop:0},1000,function(){});

	}
	return valid;
}
{/literal}
</script>
<style type="text/css">
{literal}
input, textarea {margin-top:5px; margin-bottom:5px; margin-left:25px}
{/literal}
</style>
<div style="margin-left:30px; margin-bottom:20px;">
<form action="/content/rep_area/email/" method="post">
		<table  border="0" cellpadding="0" cellspacing="0" class="find_res">
		<h2 style="color:#FFFFFF; text-align:center; margin-top:30px; margin-bottom:20px;"><b>SPECIFICATION REGISTRATION</b></h2> 
					
			<tr>
				<td><label>AGENCY NAME</label></td>
				<td><input id="ag_name" name="Agency Name" size="53" type="text"></td>
			</tr>
			<tr>
				<td><label>JOB NAME</label></td>
				<td><input name="Job Name" size="53" type="text" id="job_name"></td>
			</tr>
			<tr>
				<td><label>DATE</label></td>
				<td><input id="ID_Date_BF2A600E" name="Date" size="53" type="text"></td>
			</tr>
			<tr>
				<td><label>SPECIFIER NAME</label></td>
				<td><input id="ID_Specifier Name_BF2A600E" name="specifier_name" size="53" type="text"></td>
			</tr>
			<tr>
				<td><label>INSTALLATION LOCATION</label></td>
				<td><input id="ID_Installation Location_BF2A600E" name="Installation Location" size="53" type="text"></td>
			</tr>
			<tr>
				<td><label>BUYER'S NAME - (if known)</label></td>
				<td><input id="ID_Buyer's Name_BF2A600E" name="bname" size="53" type="text"></td>
			</tr>
			<tr>
				<td><label>Brief Product Description</label></td>
				<td><textarea name="Product Description" rows="4" cols="62"></textarea></td>
			</tr>
			<tr>
				<td><label>Appoximate date of purchase</label></td>
				<td><input id="ID_Approximate Date of Purchase_BF2A600E" name="purchase" size="53" type="text"></td>
			</tr>
			<tr>
				<td><label>Approximate value @ Dealer Net</label></td>
				<td><input id="ID_Approximate Value @ Dealer Net_BF2A600E" name="dealer" size="53" type="text"></td>
			</tr>
			<tr>
				<td><label>Any other information</label></td>
				<td><textarea id="ID_Other Info_BF2A600E" name="other_info" rows="5" cols="62"></textarea></td>
			</tr>
			<tr>
				<td><label>Email</label></td>
				<td><input type="text" name="copy_mail"></td>
			</tr>
			<tr>
				<td colspan="2"><input id="ID_submitButtonName_BF2A600E" name="submitButtonName" style="margin:0" type="submit" name="send" value="Send" onclick="return validateIt();">&nbsp;
				<input id="ID_submitButtonName_BF2A600E" name="submitButtonName" type="button"  style="margin:0" onclick="window.location = '/content/rep_area/'" value="Back"></td>
			</tr>	
		</tbody>
		</table>
	</form>
</div>