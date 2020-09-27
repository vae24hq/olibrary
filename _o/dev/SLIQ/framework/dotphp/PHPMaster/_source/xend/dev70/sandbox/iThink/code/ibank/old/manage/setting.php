<?php require('../brux.php'); require('is_restrict.php');
if ((isset($_POST["Form_Update"])) && ($_POST["Form_Update"] == "updateIT")){
	$updateSQL = sprintf("UPDATE `mang` SET user=%s, password=%s, name=%s, email=%s, phone=%s WHERE id=%s",
			GetSQLValueString($_POST['user'], "text"),
			GetSQLValueString($_POST['password'], "text"),
			GetSQLValueString($_POST['name'], "text"),
			GetSQLValueString($_POST['email'], "text"),
			GetSQLValueString($_POST['phone'], "text"),
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
<title>Administrator - Setting</title>
<?php include('../in_head.php');?>
</head>

<body>
	<?php require('slice/header.php');?>
	<h1 class="heading">Setting</h1>
	<div id="loginPage">
	<div class="container">
		<form class="form-horizontal" id="login" name="login" method="POST" action="<?php echo $editFormAction;?>">
			<div class="title"><p class="text-primary">Complete the form with current and valid information</p></div>
			<div class="form-group">
				<label for="inputUser" class="col-sm-2 control-label">Username:</label>
				<div class="col-sm-10"><input type="text" id="inputUser" name="user" class="form-control" value="<?php echo admin('user');?>"></div>
			</div>
			<div class="form-group">
				<label for="inputPassword" class="col-sm-2 control-label">Password:</label>
				<div class="col-sm-10"><input type="password" id="inputPassword" name="password" class="form-control" value="<?php echo admin('password');?>"></div>
			</div>
			<div class="form-group">
				<label for="InputName" class="col-sm-2 control-label">Full Name:</label>
				<div class="col-sm-10"><input type="text" id="InputName" name="name" class="form-control" value="<?php echo admin('name');?>"></div>
			</div>
			<div class="form-group">
				<label for="inputEmail" class="col-sm-2 control-label">Email Address:</label>
				<div class="col-sm-10"><input type="email" id="inputEmail" name="email" class="form-control" value="<?php echo admin('email');?>"></div>
			</div>
			<div class="form-group">
				<label for="InputPhone" class="col-sm-2 control-label">Phone Number:</label>
				<div class="col-sm-10"><input type="text" id="InputPhone" name="phone" class="form-control" value="<?php echo admin('phone');?>"></div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-3">
					<input name="id" type="hidden" id="id" value="<?php echo admin('id');?>">
					<input type="hidden" name="Form_Update" value="updateIT">
					<input type="submit" class="btn btn-md btn-primary" value="Update">
				</div>
			</div>
		</form>
	</div>
	</div>
<?php include('slice/footer.php'); include('../in_foot.php');?>
</body>
</html>