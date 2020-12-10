<?php require('../brux.php');
if (isset($_POST['uname'])){
	$loginUsername = $_POST['uname'];
	$password = $_POST['pin'];
	$MM_fldUserAuthorization = "status";
	$MM_redirectLoginSuccess = "loading.php";
	$MM_redirectLoginFailed = "login.php?action=invalid";
	$MM_redirecttoReferrer = true;

	$LoginRS__query=sprintf("SELECT `uname`, `pin`, `status` FROM `client` WHERE `uname`=%s AND `pin`=%s",
			GetSQLValueString($loginUsername, "text"),
			GetSQLValueString($password, "text")); 
	$LoginRS = mysql_query($LoginRS__query, $connect) or die(mysql_error());
	$loginFoundUser = mysql_num_rows($LoginRS);
	if ($loginFoundUser){
		$loginStrGroup  = mysql_result($LoginRS,0,'status');
		//declare two session variables and assign them
		$_SESSION['MM_Username'] = $loginUsername;
		$_SESSION['MM_UserGroup'] = $loginStrGroup;
		header("Location: " . $MM_redirectLoginSuccess );
	}
	else {
		header("Location: ". $MM_redirectLoginFailed );
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login :: iNetB - <?php echo firm('name');?></title>
<?php include('../in_head.php');?>

<script type="text/javascript">
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
	<?php require_once('slice/header.php');?>
	<div id="logPage">
		<form name="logForm" id="logForm" method="POST" action="<?php echo $loginFormAction;?>">
			<div class="loginForm">
				<?php require('slice/login.form.php');?>
			</div>
		</form>
	</div>
<?php include('../in_foot.php');?>
</body>
</html>