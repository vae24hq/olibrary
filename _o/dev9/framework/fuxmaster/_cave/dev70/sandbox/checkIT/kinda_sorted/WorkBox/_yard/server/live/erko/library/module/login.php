<?php require('Connections/dbcon.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = './?link=login'; #$_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['UserID'])) {
  $loginUsername=doCrypt($_POST['UserID']);
  $password= doCrypt($_POST['Password'],'crypt');
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "./?link=dashboard";
  $MM_redirectLoginFailed = "./?link=login-failed";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_dbcon, $dbcon);
  
  $LoginRS__query=sprintf("SELECT UserID, Password FROM users WHERE UserID=%s AND Password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $dbcon) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
 
	$loader = new Loader;
	$action =  $loader->action();
	$isLoggedIn = isLoggedIn('autologin');
	if($isLoggedIn== 'loggedin') {
		$LoginToRefer = LoginToRefer();
		$msg ='<span class="info">You are already logged in, please <a href="./'.$LoginToRefer.'">continue</a></span>';}
	else {
		if ($action=='default') {$msg = 'Please enter your login information'; }
		elseif ($action=='failed') {$msg = '<span class="warning">Please enter a valid login information</span>'; }
		elseif ($action=='logout') {$msg = '<span class="success">You have logged out successfully</span>'; }
		elseif ($action=='expired') {$msg = '<span class="info">Your session has expired, re-login to continue</span>'; }
		else {$msg = '<span class="info">Please enter your login information</span>'; }
	}
?>
<script src="assets/_spry/SpryValidationTextField.js" type="text/javascript"></script>
<link href="assets/_spry/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="assets/_spry/SpryValidationPassword.css" rel="stylesheet" type="text/css">
<script src="assets/_spry/SpryValidationPassword.js" type="text/javascript"></script>
<div class="hrView login">
  <form action="<?php echo $loginFormAction; ?>" method="POST" name="LoginForm" id="LoginForm">
  <div class="heading"><?php echo $msg; ?></div>
    <?php if($isLoggedIn != 'loggedin') {?>
    <span id="spryUserID">
    <label for="UserID">User ID:</label>
    <input type="text" name="UserID" id="UserID">
    <span class="textfieldRequiredMsg">required!</span></span><br>
    <span id="spryPassword">
    <label for="Password">Password:</label>
    <input type="password" name="Password" id="Password">
    <span class="passwordRequiredMsg">required!</span></span> <span class="buttons">
    <input type="submit" name="LoginButton" id="LoginButton" value="Login">
    <input type="reset" name="ClearButton" id="ClearButton" value="Clean">
    </span>
    <?php } ?>
  </form>
</div>
<?php if($isLoggedIn != 'loggedin') {?>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("spryUserID", "none", {validateOn:["blur"]});
var sprypassword1 = new Spry.Widget.ValidationPassword("spryPassword", {validateOn:["blur"]});
</script> 
<?php }?>
