<?php require('../brux.php');
if ((isset($_POST["Form_Insert"])) && ($_POST["Form_Insert"] == "InsertIT")){
	#Check if username or email exists
	$isTakenUser = recordExist('uname', 'client', $_POST["uname"]);
	$isTakenEmail = recordExist('email', 'client', $_POST["email"]);
	if($isTakenUser){$_POST['user_exist'] = $_POST["uname"];}
	elseif($isTakenEmail){$_POST['email_exist'] = $_POST["email"];}
	else {
		$postService = implode("\n", $_POST['service']);
		$postAsset = implode("\n", $_POST['asset']);
		$insertSQL = sprintf("INSERT INTO `client` (`buid`, `title`, `fname`, `mname`, `lname`, `birthdate`, `sex`, `city`, `state`, `country`, `address`, `phone`, `nationality`, `occupation`, `idtype`, `idnumber`, `idexpiration`, `acctype`, `currency`, `annual`, `assetworth`, `creditworth`, `service`, `asset`, `calltime`, `uname`, `email`, `passw`, `pin`, `securityhint`, `nok`, `nokphone`, `nokemail`, `nokaddress`, `nokrelationship`, `statement`, `comment`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
			GetSQLValueString(randomize('buid'), "text"),
			GetSQLValueString($_POST['title'], "text"),
			GetSQLValueString($_POST['fname'], "text"),
			GetSQLValueString($_POST['mname'], "text"),
			GetSQLValueString($_POST['lname'], "text"),

			GetSQLValueString($_POST['birthdate'], "text"),
			GetSQLValueString($_POST['sex'], "text"),
			GetSQLValueString($_POST['city'], "text"),
			GetSQLValueString($_POST['state'], "text"),
			GetSQLValueString($_POST['country'], "text"),

			GetSQLValueString($_POST['address'], "text"),
			GetSQLValueString($_POST['phone'], "text"),
			GetSQLValueString($_POST['nationality'], "text"),
			GetSQLValueString($_POST['occupation'], "text"),
			GetSQLValueString($_POST['idtype'], "text"),
			GetSQLValueString($_POST['idnumber'], "text"),
			GetSQLValueString($_POST['idexpiration'], "text"),

			GetSQLValueString($_POST['acctype'], "text"),
			GetSQLValueString($_POST['currency'], "text"),
			GetSQLValueString($_POST['annual'], "text"),
			GetSQLValueString($_POST['assetworth'], "text"),
			GetSQLValueString($_POST['creditworth'], "text"),
			GetSQLValueString($postService, "text"),
			GetSQLValueString($postAsset, "text"),
			GetSQLValueString($_POST['calltime'], "text"),

			GetSQLValueString($_POST['uname'], "text"),
			GetSQLValueString($_POST['email'], "text"),
			GetSQLValueString($_POST['passw'], "text"),
			GetSQLValueString($_POST['pin'], "text"),
			GetSQLValueString($_POST['securityhint'], "text"),

			GetSQLValueString($_POST['nok'], "text"),
			GetSQLValueString($_POST['nokphone'], "text"),
			GetSQLValueString($_POST['nokemail'], "text"),
			GetSQLValueString($_POST['nokaddress'], "text"),
			GetSQLValueString($_POST['nokrelationship'], "text"),

			GetSQLValueString('Your account has been setup', "text"),
			GetSQLValueString('No comment', "text"));
		$Result = mysql_query($insertSQL, $connect) or die(mysql_error());
		header("Location: register.php?action=registered&user=".$_POST['fname']);
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Registration :: iNetB - <?php echo firm('name');?></title>
<?php include('../in_head.php');?>
<script type="text/javascript" charset="utf-8">
	function closeWindow(){
		if (confirm("Are you sure you want to Close Window?")){
			close();
		}
	}
</script>

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
	<div id="regPage">
		<form name="regForm" id="regForm" method="POST" action="<?php echo $editFormAction;?>" onsubmit="return(validateReg());">
		<h1 class="title">Online Registration</h1>
		<div class="content">
			<?php if(!empty($_POST['user_exist'])){?>
			<p class="error-box box-round bg-danger">Sorry the User ID<?php if(!empty($_POST['user_exist'])){echo ' <strong>('.$_POST['user_exist'].')</strong> ';} else {echo ' you entered ';}?>is already taken!</p>
			<?php }?>

			<?php if(!empty($_POST['email_exist'])){?>
			<p class="error-box box-round bg-danger">Sorry the email address <?php if(!empty($_POST['email_exist'])){echo ' <strong>('.$_POST['email_exist'].')</strong> ';} else {echo ' you entered ';}?>is already taken!</p>
			<?php }?>

			<?php if(!empty($_GET['action']) && $_GET['action'] == 'registered'){?>
				<p class="text-default" style="margin-top:20px;">
					Dear <?php if(!empty($_GET['user'])){echo ' <strong>'.ucwords($_GET['user']).'</strong>';} else {echo 'Customer';}?>,<br><br>
					This is a confirmation that your registration for our service online has been received by us.<br>
					You will be contacted using the information you provided during your form submission, as soon as your record has been processed &amp; your account setup.<br><br>
					However, should you have any enquiry please connect with our customer support.<br>
					Thank you for using our service.<br><br>
				</p>
				<p class="text-primary">
					<strong><?php echo firm('name');?></strong><br>
					<?php echo firm('email');?><br>
					<?php echo firm('phone');?>
				</p>
				<p style="text-align: center;"><a class="btn btn-danger" href="#" onclick="closeWindow(); return false;">Close</a></p>
			<?php } else {?>
			<div class="table-responsive">

<?php
include('slice/register.person.php');
include('slice/register.account.php');
include('slice/register.nok.php');
include('slice/register.login.php');
?>
			</div>

			<?php }?>
		</div>
		</form>
	</div>
<?php include('../in_foot.php');?>
</body>
</html>