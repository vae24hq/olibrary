<?php require('../brux.php'); require('is_restrict.php');
if ((isset($_POST["Form_Update"])) && ($_POST["Form_Update"] == "UpdateIT")){
	$updateSQL = sprintf("UPDATE `client` SET `email`=%s, `passw`=%s, `pin`=%s, `securityhint`=%s WHERE `buid`=%s",

			GetSQLValueString($_POST['email'], "text"),
			GetSQLValueString($_POST['passw'], "text"),
			GetSQLValueString($_POST['pin'], "text"),
			GetSQLValueString($_POST['securityhint'], "text"),

			GetSQLValueString($_POST['buid'], "text"));
	$Result = mysql_query($updateSQL, $connect) or die(mysql_error());
	$updateGoTo = "success.php";
	#echo '<meta http-equiv="Refresh" content="0; URL='.$updateGoTo.'">';
	header(sprintf("Location: %s", $updateGoTo));
}?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Setting :: iNetB - <?php echo firm('name');?></title>
<?php include('../in_head.php');?>
<script type="text/javascript">
	window.onload = function () {
		document.getElementById("passw").onchange = confirmPassword;
		document.getElementById("repassw").onchange = confirmPassword;
	}

	function confirmPassword(){
		var repassword=document.getElementById("repassw").value;
		var password=document.getElementById("passw").value;
		if(password!=repassword){
			document.getElementById("repassw").setCustomValidity("Passwords don't match");
		} else {document.getElementById("repassw").setCustomValidity('');}
	}

	function showPassword(target){
		var $trigger = "show"+target;
		var password = document.getElementById(target);
		var toggle = document.getElementById($trigger);

		if (toggle.innerHTML == 'Show'){
			password.setAttribute('type', 'text');
			toggle.innerHTML = 'Hide';
		} else {
			password.setAttribute('type', 'password');
			toggle.innerHTML = 'Show';
		}
	}
</script>
</head>

<body>

<!-- BEGIN LAYOUT FOR SETTINGS -->
<div id="content">
	<div class="col-md-12">
		<form id="update" name="update" method="POST" action="<?php echo $editFormAction;?>">
		<div class="table-responsive">

			<table class="record col-md-12">
				<tr><td class="col-md-12 table-heading" colspan="12">Login Information</td></tr>
				<tr>
					<th colspan="2" class="col-md-2 title"><span class="hr-title">User ID</span></th>
					<td colspan="10" class="col-md-10">
						<div class="col-md-6">
							<input name="uname_stay" type="text" id="uname_stay" class="form-control" value="<?php echo $userInfo['uname'];?>" tabindex="30" disabled>
						</div>
					</td>
				</tr>
				<tr>
					<th colspan="2" class="col-md-2 title"><span class="hr-title">Email Address</span></th>
					<td colspan="10" class="col-md-10">
						<div class="col-md-10">
							<input name="email" type="email" id="email" class="form-control" value="<?php echo $userInfo['email'];?>" tabindex="1" required>
						</div>
					</td>
				</tr>
				<tr>
					<th colspan="2" class="col-md-2 title"><span class="hr-title">Password</span></th>
					<td colspan="3" class="col-md-3" style="border-right: 0">
						<div class="col-md-12">
							<input name="passw" type="password" id="passw" class="form-control" value="<?php echo $userInfo['passw'];?>" tabindex="2" required>
						</div>
					</td>
					<td colspan="1" class="col-md-1" style="border-left: 0">
						<a href="#" onclick="showPassword('passw'); return false;" id="showpassw" class="showhide">Show</a>
					</td>

					<th colspan="2" class="col-md-2 title"><span class="hr-title">Re-type Password</span></th>
					<td colspan="3" class="col-md-3" style="border-right: 0">
						<div class="col-md-12">
							<input name="repassw" type="password" id="repassw" class="form-control" value="<?php echo $userInfo['passw'];?>" tabindex="3" required>
						</div>
					</td>
					<td colspan="1" class="col-md-1" style="border-left: 0">
						<a href="#" onclick="showPassword('repassw'); return false;" id="showrepassw" class="showhide">Show</a>
					</td>
				</tr>
				<tr>
					<th colspan="2" class="col-md-2 title"><span class="hr-title">Security PIN</span></th>
					<td colspan="3" class="col-md-3" style="border-right: 0">
						<div class="col-md-12">
							<input name="pin" type="password" id="pin" class="form-control" value="<?php echo $userInfo['pin'];?>" tabindex="4" required>
						</div>
					</td>
					<td colspan="1" class="col-md-1" style="border-left: 0">
						<a href="#" onclick="showPassword('pin'); return false;" id="showpin" class="showhide">Show</a>
					</td>

					<th colspan="2" class="col-md-2 title"><span class="hr-title">Security PIN Hint</span></th>
					<td colspan="4" class="col-md-4">
						<div class="col-md-12">
							<input name="securityhint" type="text" id="securityhint" class="form-control" value="<?php echo $userInfo['securityhint'];?>" tabindex="5" required>
						</div>
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
