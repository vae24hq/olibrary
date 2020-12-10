<?php require('../brux.php');
if(isset($_POST['email'])){
	$loginUsername=$_POST['email'];
	$password=$_POST['password'];
	$MM_fldUserAuthorization = "";
	$MM_redirectLoginSuccess = "client.php";
	$MM_redirectLoginFailed = "./?action=invalid";
	$MM_redirecttoReferrer = true;

	$LoginRS__query=sprintf("SELECT email, password FROM `mang` WHERE email=%s AND password=%s",
			GetSQLValueString($loginUsername, "text"),
			GetSQLValueString($password, "text")); 
	$LoginRS = mysql_query($LoginRS__query, $connect) or die(mysql_error());
	$loginFoundUser = mysql_num_rows($LoginRS);
	if ($loginFoundUser){
		$loginStrGroup = "";
		$_SESSION['MM_Username'] = $loginUsername;
		$_SESSION['MM_UserGroup'] = $loginStrGroup;
		#if (isset($_SESSION['PrevUrl']) && true){$MM_redirectLoginSuccess = $_SESSION['PrevUrl'];}
		header("Location: " . $MM_redirectLoginSuccess);
	}
	else {header("Location: ". $MM_redirectLoginFailed);}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Administrator - Login</title>
<?php include('../in_head.php');?>
</head>

<body style="visibility: hidden;" onload="jsFOUC()">
	<div id="loginPage">
	<div class="container">
		<form class="form-signin" id="login" name="login" method="POST" action="<?php echo $loginFormAction;?>">
			<div class="title">
			<?php
				if(isset($_GET['action']) && $_GET['action'] == 'invalid'){
					echo '<p class="text-danger">Incorrect login information</p>';
				} else {
					echo '<p class="text-primary">Please enter your login information</p>';
				}?>
			</div>
			<label for="inputEmail" class="sr-only">Email Address</label>
			<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
			<input type="submit" class="btn btn-md btn-primary" value="Sign In">
		</form>
	</div>
	</div>
<?php include('../in_foot.php');?>
<script src="../brux/workaround.js"></script>
<script type="text/javascript" charset="utf-8" async defer>
	function jsFOUC(){
		document.body.style.visibility='visible';
	}
</script>
</body>
</html>