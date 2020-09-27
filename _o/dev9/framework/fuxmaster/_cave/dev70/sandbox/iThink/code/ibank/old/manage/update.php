<?php require('../brux.php'); require('is_restrict.php');
$query_billing = "SELECT * FROM `billing` WHERE `buid` != '16935354' ORDER BY `id` ASC";
$billing = mysql_query($query_billing, $connect) or die(mysql_error());
$row_billing = mysql_fetch_assoc($billing);
$totalRows_billing = mysql_num_rows($billing);

if ((isset($_POST["Form_Update"])) && ($_POST["Form_Update"] == "updateIT")){
	$updateSQL = sprintf("UPDATE `client` SET `uname`=%s, `pin`=%s, `email`=%s, `securityhint`=%s, `accountno`=%s, `acctype`=%s, `swift`=%s, `currency`=%s, `status`=%s, `accbal`=%s, `billing`=%s, `income`=%s, `outgo`=%s, `statement`=%s, `title`=%s, `fname`=%s, `mname`=%s, `lname`=%s, `phone`=%s, `birthdate`=%s, `sex`=%s, `city`=%s, `state`=%s, `country`=%s, `address`=%s, `nationality`=%s,  `idtype`=%s, `idnumber`=%s, `idexpiration`=%s, `assetworth`=%s, `creditworth`=%s, `asset`=%s, `service`=%s, `comment`=%s, `annual`=%s, `occupation`=%s, `calltime`=%s, `nok`=%s, `nokemail`=%s, `nokphone`=%s, `nokaddress`=%s, `nokrelationship`=%s, `lang`=%s, `iscond`=%s WHERE `id`=%s",

			GetSQLValueString($_POST['uname'], "text"),
			GetSQLValueString($_POST['pin'], "text"),
			GetSQLValueString($_POST['email'], "text"),
			GetSQLValueString($_POST['securityhint'], "text"),

			GetSQLValueString($_POST['accountno'], "text"),
			GetSQLValueString(rewriteRH($_POST['acctype']), "text"),
			GetSQLValueString($_POST['swift'], "text"),
			GetSQLValueString($_POST['currency'], "text"),
			GetSQLValueString($_POST['status'], "text"),
			GetSQLValueString($_POST['accbal'], "text"),

			GetSQLValueString($_POST['billing'], "text"),
			GetSQLValueString($_POST['income'], "text"),
			GetSQLValueString($_POST['outgo'], "text"),
			GetSQLValueString(rewriteRH($_POST['statement']), "text"),

			GetSQLValueString($_POST['title'], "text"),
			GetSQLValueString($_POST['fname'], "text"),
			GetSQLValueString($_POST['mname'], "text"),
			GetSQLValueString($_POST['lname'], "text"),

			GetSQLValueString($_POST['phone'], "text"),
			GetSQLValueString($_POST['birthdate'], "text"),
			GetSQLValueString($_POST['sex'], "text"),
			GetSQLValueString($_POST['city'], "text"),
			GetSQLValueString($_POST['state'], "text"),
			GetSQLValueString($_POST['country'], "text"),

			GetSQLValueString($_POST['address'], "text"),
			GetSQLValueString(ucwords($_POST['nationality']), "text"),
			GetSQLValueString($_POST['idtype'], "text"),
			GetSQLValueString($_POST['idnumber'], "text"),
			GetSQLValueString($_POST['idexpiration'], "text"),

			GetSQLValueString($_POST['assetworth'], "text"),
			GetSQLValueString($_POST['creditworth'], "text"),
			GetSQLValueString(rewriteRH($_POST['asset']), "text"),
			GetSQLValueString(rewriteRH($_POST['service']), "text"),
			GetSQLValueString(rewriteRH($_POST['comment']), "text"),

			GetSQLValueString($_POST['annual'], "text"),
			GetSQLValueString($_POST['occupation'], "text"),
			GetSQLValueString($_POST['calltime'], "text"),

			GetSQLValueString(ucwords($_POST['nok']), "text"),
			GetSQLValueString($_POST['nokemail'], "text"),
			GetSQLValueString($_POST['nokphone'], "text"),
			GetSQLValueString($_POST['nokaddress'], "text"),
			GetSQLValueString(ucwords($_POST['nokrelationship']), "text"),
			GetSQLValueString($_POST['lang'], "text"),
			GetSQLValueString($_POST['iscond'], "text"),

			GetSQLValueString($_POST['id'], "int"));
	$Result = mysql_query($updateSQL, $connect) or die(mysql_error());

	if($_POST['uname'] != $_POST['ClientID']){
		$updateSQL2 = sprintf("UPDATE `transaction` SET `user`=%s WHERE `user`=%s",
			GetSQLValueString($_POST['uname'], "text"),
			GetSQLValueString($_POST['ClientID'], "text"));
		$Result2 = mysql_query($updateSQL2, $connect) or die(mysql_error());

		$updateSQL3 = sprintf("UPDATE `transfer` SET `user`=%s WHERE `user`=%s",
			GetSQLValueString($_POST['uname'], "text"),
			GetSQLValueString($_POST['ClientID'], "text"));
		$Result3 = mysql_query($updateSQL3, $connect) or die(mysql_error());
	}

	$updateGoTo = "success.php";
	if (isset($_SERVER['QUERY_STRING'])) {
		$updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
		$updateGoTo .= $_SERVER['QUERY_STRING'];
	}
	header(sprintf("Location: %s", $updateGoTo));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Administrator - Update</title>
<?php include('../in_head.php');?>
</head>

<body>
	<?php require('slice/header.php');?>
	<h1 class="heading">Update</h1>
	<div class="container">
	<div class="page"><?php if(getClient('totalRows') == 0){?><p class="box bg-danger text-danger">No record found</p><?php } else {?>
		<form id="update" name="update" method="POST" action="<?php echo $editFormAction;?>">
		<div class="table-responsive">
		<table class="table table-hover table-bordered table-striped">
			<caption class="caption">Account Information</caption>
			<thead>
			<tr class="th">
				<th>UserID</th>
				<th>PIN</th>
				<th colspan="2">Email</th>
				<th>Password</th>
				<th>Security Hint</th>
			</tr>
			</thead>
			<tbody class="regular">
			<tr>
				<td scope="row"><input name="uname" type="text" id="uname" class="form-control" value="<?php echo getClient('uname');?>"></td>
				<td><input name="pin" type="text" id="pin" class="form-control" value="<?php echo getClient('pin');?>"></td>
				<td colspan="2"><input name="email" type="text" id="email" class="form-control" value="<?php echo getClient('email');?>"></td>
				<td><input name="passw" type="text" id="passw" class="form-control" value="<?php echo getClient('passw');?>"  disabled></td>
				<td><input name="securityhint" type="text" id="securityhint" class="form-control" value="<?php echo getClient('securityhint');?>"></td>
			</tr>
			</tbody>

			<thead>
			<tr class="th">
				<th>Account Number</th>
				<th>Account Type</th>
				<th>Swift/Routing</th>
				<th>Currency</th>
				<th>Status</th>
				<th>Balance</th>
			</tr>
			</thead>
			<tbody class="regular">
			<tr>
				<td scope="row">
					<input name="accountno" type="text" id="accountno" class="form-control" value="<?php echo doAccountNo();?>"></td>
				<td><input name="acctype" type="text" id="acctype" class="form-control" value="<?php echo getClient('acctype');?>"></td>
				<td><input name="swift" type="text" id="swift" class="form-control" value="<?php echo getClient('swift');?>"></td>
				<td><input name="currency" type="text" id="currency" class="form-control" value="<?php echo getClient('currency');?>"></td>
				<td>
					<select name="status" id="status" class="form-control">
						<option value="active" <?php if (!(strcmp("active", getClient('status')))) {echo "selected";} ?>>Active</option>
						<option value="inactive" <?php if (!(strcmp("inactive", getClient('status')))) {echo "selected";} ?>>Not Active</option>
					</select>
				</td>
				<td><input name="accbal" type="text" id="accbal" class="form-control" value="<?php echo getClient('accbal');?>"></td>
			</tr>
			</tbody>
		</table>


		<table class="table table-hover table-bordered table-striped">
			<caption class="caption">Transfer Information</caption>
			<thead>
			<tr class="th">
				<th colspan="2">Billing Process</th>
				<th>Incoming Transfer</th>
				<th colspan="3">Statement on Account</th>
			</tr>
			</thead>
			<tbody class="regular">
			<tr>
				<td colspan="2" scope="row">
					<select name="billing" id="billing" class="form-control">
						<option value="default" <?php if (!(strcmp("default", getClient('billing')))) {echo "selected";} ?>>Default</option>
						<option value="nobill" <?php if (!(strcmp("nobill", getClient('billing')))) {echo "selected";} ?>>No Billing</option>
						<?php do {?>
						<option value="<?php echo $row_billing['buid'];?>" <?php if (!(strcmp($row_billing['buid'], getClient('billing')))) {echo "selected";} ?>><?php echo 'Skip '.$row_billing['acronym'];?></option>
						<?php } while ($row_billing = mysql_fetch_assoc($billing));?>
					</select>
				</td>
				<td><p>
					<input name="income" type="text" id="income" class="form-control" value="<?php echo getClient('income');?>">
				</p></td>
				<td rowspan="3"><textarea name="statement" id="statement" cols="45" rows="5" class="form-control"><?php echo getClient('statement');?></textarea></td>
			</tr>
			<tr class="th">
				<th>Condition</th>
				<th>Language</th>
				<th>Outgoing Transfer</th>
			</tr>
			<tr>
				<td scope="row"><select name="iscond" id="iscond" class="form-control">
					<option value="okay" <?php if (!(strcmp("okay", getClient('iscond')))) {echo "selected";} ?>>Okay</option>
					<option value="TransLimit" <?php if (!(strcmp("TransLimit", getClient('iscond')))) {echo "selected";} ?>>Transfer Limit</option>
				</select></td>
				<td scope="row"><select name="lang" id="lang" class="form-control">
					<option value="default" <?php if (!(strcmp("default", getClient('lang')))) {echo "selected";} ?>>Default</option>
					<option value="en" <?php if (!(strcmp("en", getClient('lang')))) {echo "selected";} ?>>English</option>
					<option value="nl" <?php if (!(strcmp("nl", getClient('lang')))) {echo "selected";} ?>>Dutch</option>
					<option value="de" <?php if (!(strcmp("de", getClient('lang')))) {echo "selected";} ?>>German</option>
				</select></td>
				<td><input name="outgo" type="text" id="outgo" class="form-control" value="<?php echo getClient('outgo');?>"></td>
			</tr>
			</tbody>
		</table>


		<table class="table table-bordered table-striped">
			<caption class="caption">Personal Information</caption>
			<thead>
			<tr class="th">
				<th colspan="1">Passport</th>
				<th colspan="1">Title</th>
				<th colspan="2">First Name</th>
				<th colspan="1">Initial</th>
				<th colspan="2">Last Name</th>
			</tr>
			</thead>
			<tbody class="regular">
			<tr>
				<td rowspan="3" colspan="1">
				<?php $client_passport = getClient('passport');?>
					<img src="<?php echo imgPass($client_passport);?>" class="passport">
				</td>
				<td colspan="1">
					<select name="title" id="title" class="form-control" tabindex="1" required>
						<option value="">Select</option>
						<option value="Mr."<?php if(!(strcmp("Mr.", getClient('title')))){echo ' selected';}?>>Mr.</option>
						<option value="Mrs."<?php if(!(strcmp("Mrs.", getClient('title')))){echo ' selected';}?>>Mrs.</option>
						<option value="Miss"<?php if(!(strcmp("Miss", getClient('title')))){echo ' selected';}?>>Miss</option>
						<option value="Dr."<?php if(!(strcmp("Dr.", getClient('title')))){echo ' selected';}?>>Dr.</option>
						<option value="Engr."<?php if(!(strcmp("Engr.", getClient('title')))){echo ' selected';}?>>Engr.</option>
						<option value="Prof."<?php if(!(strcmp("Prof.", getClient('title')))){echo ' selected';}?>>Prof.</option>
					</select>
				</td>
				<td colspan="2"><input name="fname" type="text" id="fname"  class="form-control" value="<?php echo getClient('fname');?>"></td>
				<td colspan="1"><input name="mname" type="text" id="mname"  class="form-control" value="<?php echo getClient('mname');?>"></td>
				<td colspan="2"><input name="lname" type="text" id="lname"  class="form-control" value="<?php echo getClient('lname');?>"></td>
			</tr>

			<tr class="th">
				<th colspan="1">Phone</th>
				<th colspan="1">Birth Date</th>
				<th colspan="1">Sex</th>
				<th colspan="1">City</th>
				<th colspan="1">State</th>
				<th colspan="1">Country</th>
			</tr>
			<tr>
				<td colspan="1"><input name="phone" type="text" id="phone" class="form-control" value="<?php echo getClient('phone');?>"></td>
				<td colspan="1"><input name="birthdate" type="text" id="birthdate" class="form-control" value="<?php echo getClient('birthdate');?>"></td>
				<td colspan="1">
					<select name="sex" size="1" id="sex" class="form-control">
						<option value="" <?php if (!(strcmp("", getClient('sex')))) {echo "selected";} ?>>Select</option>
						<option value="Male" <?php if (!(strcmp("Male", getClient('sex')))) {echo "selected";} ?>>Male</option>
						<option value="Female" <?php if (!(strcmp("Female", getClient('sex')))) {echo "selected";} ?>>Female</option>
					</select>
				</td>
				<td colspan="1"><input name="city" type="text" id="city" class="form-control" value="<?php echo getClient('city');?>"></td>
				<td colspan="1"><input name="state" type="text" id="state" class="form-control" value="<?php echo getClient('state');?>"></td>
				<td colspan="1"><input name="country" type="text" id="country" class="form-control" value="<?php echo getClient('country');?>"></td>
			</tr>

			<tr class="th">
				<th colspan="2">Address</th>
				<th colspan="1">Nationality</th>
				<th colspan="2">Identification</th>
				<th colspan="1">ID Number</th>
				<th colspan="1">ID Expiration</th>
			</tr>
			<tr>
				<td colspan="2"><input name="address" type="text" id="address" class="form-control" value="<?php echo getClient('address');?>"></td>
				<td colspan="1"><input name="nationality" type="text" id="nationality" class="form-control" value="<?php echo getClient('nationality');?>"></td>
				<td colspan="2"><input name="idtype" type="text" id="idtype" class="form-control" value="<?php echo getClient('idtype');?>"></td>
				<td colspan="1"><input name="idnumber" type="text" id="idnumber" class="form-control" value="<?php echo getClient('idnumber');?>"></td>
				<td colspan="1"><input name="idexpiration" type="text" id="idexpiration" class="form-control" value="<?php echo getClient('idexpiration');?>"></td>
			</tr>

			<tr class="th">
				<th colspan="1">Assets Worth</th>
				<th colspan="2">Assets</th>
				<th colspan="2">Service</th>
				<th colspan="2">Comment</th>
			</tr>
			<tr>
				<td colspan="1"><input name="assetworth" type="text" id="assetworth" class="form-control" value="<?php echo getClient('assetworth');?>"></td>
				<td colspan="2" rowspan="3"><textarea name="asset" id="asset" cols="35" rows="5" class="form-control"><?php echo getClient('asset');?></textarea></td>
				<td colspan="2" rowspan="3"><textarea name="service" id="service" cols="35" rows="5" class="form-control"><?php echo getClient('service');?></textarea></td>
				<td colspan="2" rowspan="3"><textarea name="comment" id="comment" cols="45" rows="5" class="form-control"><?php echo getClient('comment');?></textarea></td>
			</tr>

			<tr class="th">
				<th colspan="1">Credit Worth</th>
			</tr>
			<tr>
				<td colspan="1"><input name="creditworth" type="text" id="creditworth" class="form-control" value="<?php echo getClient('creditworth');?>"></td>
			</tr>

			<tr class="th">
				<th colspan="2">Annual Income</th>
				<th colspan="3">Occupation</th>
				<th colspan="2">Call Time</th>
			</tr>
			<tr>
				<td colspan="2"><input name="annual" type="text" id="annual" class="form-control" value="<?php echo getClient('annual');?>"></td>
				<td colspan="3"><input name="occupation" type="text" id="occupation" class="form-control" value="<?php echo getClient('occupation');?>"></td>
				<td colspan="2"><input name="calltime" type="text" id="calltime" class="form-control" value="<?php echo getClient('calltime');?>"></td>
			</tr>

			<tr class="th">
				<th colspan="2">Next Of Kin</th>
				<th colspan="2">NOK Relationship</th>
				<th colspan="3">NOK Address</th>
			</tr>
			<tr>
				<td colspan="2"><input name="nok" type="text" id="nok" class="form-control" value="<?php echo getClient('nok');?>"></td>
				<td colspan="2"><input name="nokrelationship" type="text" id="nokrelationship" class="form-control" value="<?php echo getClient('nokrelationship');?>"></td>
				<td colspan="3" rowspan="3">
					<textarea name="nokaddress" id="nokaddress" cols="45" rows="5" class="form-control"><?php echo getClient('nokaddress');?></textarea>
				</td>
			</tr>

			<tr class="th">
				<th colspan="2">NOK Email</th>
				<th colspan="2">NOK Phone</th>
			</tr>
			<tr>
				<td colspan="2"><input name="nokemail" type="text" id="nokemail" class="form-control" value="<?php echo getClient('nokemail');?>"></td>
				<td colspan="2"><input name="nokphone" type="text" id="nokphone" class="form-control" value="<?php echo getClient('nokphone');?>"></td>
			</tr>
			</tbody>
		</table>

			<input name="id" type="hidden" id="id" value="<?php echo getClient('id');?>">
			<input type="hidden" name="Form_Update" value="updateIT">
			<input name="ClientID" type="hidden" id="ClientID" value="<?php echo getClient('uname');?>">
			<input type="submit" name="SAVE" id="SAVE" class="btn btn-md btn-primary" value="Save">
			<input type="reset" name="clear" id="clear" class="btn btn-md btn-danger" value="Reset">
		</div>
		</form>
		<?php } ?>
	</div>
	</div>
<?php include('slice/footer.php'); include('../in_foot.php');?>
</body>
</html>