<?php require('../brux.php'); require('is_restrict.php');
if ((isset($_POST["Form_Update"])) && ($_POST["Form_Update"] == "updateIT")){
	$updateSQL = sprintf("UPDATE `firm` SET name=%s, email=%s, phone=%s, address=%s, webmail=%s, timezone=%s WHERE id=%s",
			GetSQLValueString($_POST['name'], "text"),
			GetSQLValueString($_POST['email'], "text"),
			GetSQLValueString($_POST['phone'], "text"),
			GetSQLValueString($_POST['address'], "text"),
			GetSQLValueString($_POST['webmail'], "text"),
			GetSQLValueString($_POST['timezone'], "text"),
			GetSQLValueString($_POST['id'], "int"));
	$Result = mysql_query($updateSQL, $connect) or die(mysql_error());
	$updateGoTo = "success.php";
	if (isset($_SERVER['QUERY_STRING'])){
		$updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
		$updateGoTo .= $_SERVER['QUERY_STRING'];
	}
	header(sprintf("Location: %s", $updateGoTo));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Administrator - Firm</title>
<?php include('../in_head.php');?>
</head>

<body>
	<?php require('slice/header.php');?>
	<h1 class="heading">Firm</h1>
	<div id="loginPage">
	<div class="container">
		<form class="form-horizontal" id="firm" name="firm" method="POST" action="<?php echo $editFormAction;?>">
		<div class="title"><p class="text-primary">Complete the form with current and valid information</p></div>
		<div class="form-group">
			<label for="inputUser" class="col-sm-2 control-label">Name:</label>
			<div class="col-sm-10"><input type="text" id="inputUser" name="name" class="form-control" value="<?php echo firm('name');?>"></div>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="col-sm-2 control-label">Email Address:</label>
			<div class="col-sm-10"><input type="email" id="inputEmail" name="email" class="form-control" value="<?php echo firm('email');?>"></div>
		</div>
		<div class="form-group">
			<label for="InputPhone" class="col-sm-2 control-label">Phone Number:</label>
			<div class="col-sm-10"><input type="text" id="InputPhone" name="phone" class="form-control" value="<?php echo firm('phone');?>"></div>
		</div>
		<div class="form-group">
			<label for="InputName" class="col-sm-2 control-label">Address:</label>
			<div class="col-sm-10"><textarea name="address" id="address" cols="45" rows="5" class="form-control"><?php echo firm('address'); ?></textarea></div>
		</div>
		<div class="form-group">
			<label for="InputWebmail" class="col-sm-2 control-label">Webmail URL:</label>
			<div class="col-sm-10"><input type="text" id="InputWebmail" name="webmail" class="form-control" value="<?php echo firm('webmail');?>"></div>
		</div>
		<div class="form-group">
			<label for="InputTimezone" class="col-sm-2 control-label">Timezone:</label>
			<div class="col-sm-10"><input type="text" id="InputTimezone" name="timezone" class="form-control" value="<?php echo firm('timezone');?>"></div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-3">
				<input name="id" type="hidden" id="id" value="<?php echo firm('id');?>">
				<input type="hidden" name="Form_Update" value="updateIT">
				<input type="submit" class="btn btn-md btn-primary btn-block" value="Update">
			</div>
		</div>
		</form>
	</div>
	</div>
<?php include('slice/footer.php'); include('../in_foot.php');?>
</body>
</html>