<?php require('../brux.php'); require('is_restrict.php');
if ((isset($_POST["Form_Update"])) && ($_POST["Form_Update"] == "UpdateIT")){
	$updateSQL = sprintf("UPDATE `client` SET `nok`=%s, `nokemail`=%s, `nokphone`=%s, `nokaddress`=%s, `nokrelationship`=%s WHERE `buid`=%s",

			GetSQLValueString($_POST['nok'], "text"),
			GetSQLValueString($_POST['nokemail'], "text"),
			GetSQLValueString($_POST['nokphone'], "text"),
			GetSQLValueString($_POST['nokaddress'], "text"),
			GetSQLValueString($_POST['nokrelationship'], "text"),

			GetSQLValueString($_POST['buid'], "text"));
	$Result = mysql_query($updateSQL, $connect) or die(mysql_error());
	$updateGoTo = "success.php";
	header(sprintf("Location: %s", $updateGoTo));
}?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>NOK Update :: iNetB - <?php echo firm('name');?></title>
<?php include('../in_head.php');?>
</head>
<body>
<!-- BEGIN LAYOUT FOR UPDATE -->
<div id="content">
	<div class="col-md-12">
		<form id="update" name="update" method="POST" action="<?php echo $editFormAction;?>">
		<div class="table-responsive">

			<table class="record col-md-12">
				<tr><td class="col-md-12 table-heading" colspan="12">Next Of Kin Information</td></tr>
				
				<tr>
					<th colspan="3" class="col-md-4">Next Of Kin (NOK Full Name)</th>
					<th colspan="3" class="col-md-3">NOK Email Address</th>
					<th colspan="2" class="col-md-3">NOK Phone Number</th>
					<th colspan="2" class="col-md-2">NOK Relationship</th>
				</tr>
				
				
				<tr>
					<td colspan="3"><input name="nok" type="text" id="nok" class="form-control" value="<?php echo $userInfo['nok'];?>" tabindex="1" required></td>
					<td colspan="3">
						<input name="nokemail" type="email" id="nokemail" class="form-control" value="<?php echo $userInfo['nokemail'];?>" tabindex="2" required>
					</td>
					<td colspan="2">
						<input name="nokphone" type="text" id="nokphone" class="form-control" value="<?php echo $userInfo['nokphone'];?>" tabindex="3" required>
					</td>
					<td colspan="2">
						<input name="nokrelationship" type="text" id="nokrelationship" class="form-control" value="<?php echo $userInfo['nokrelationship'];?>" tabindex="4" required placehoder="Wife, Brother, etc">
					</td>
				</tr>

				<tr>
					<th colspan="10">NOK Contact Address</th>
				</tr>
				<tr>
					<td colspan="10">
						<textarea name="nokaddress" id="nokaddress" cols="45" rows="5" class="form-control" tabindex="5" required><?php echo $userInfo['nokaddress'];?></textarea>
					</td>
				</tr>
			</table>
			<table class="col-md-12 no-border">
				<tr>
					<td colspan="12" class="col-md-12">
						<div class="" style="text-align: center; padding: 30px 0 40px;">
							<input type="hidden" name="buid" id="buid" value="<?php echo $userInfo['buid'];?>">
							<input type="hidden" name="Form_Update" value="UpdateIT">
							<input type="submit" name="UpdateBTN" id="UpdateBTN" class="btn btn-md btn-primary" value="Update">
							<input type="reset" name="clear" id="clear" class="btn btn-md btn-danger" value="Reset">
						</div>
					</td>
				</tr>
			</table>

		</div>
		</form>
	</div>
</div>
</body>
</html>