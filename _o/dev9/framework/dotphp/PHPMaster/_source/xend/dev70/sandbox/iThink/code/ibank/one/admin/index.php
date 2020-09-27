<?php require_once('../Connections/ifund.php'); ?>
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

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['officer'])) {
  $loginUsername=$_POST['officer'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "panel.php";
  $MM_redirectLoginFailed = "./?cmd=invalid";
  $MM_redirecttoReferrer = true;
  mysql_select_db($database_ifund, $ifund);
  
  $LoginRS__query=sprintf("SELECT officer, password FROM officer WHERE officer=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $ifund) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>

<head>
<meta charset="utf-8">
<title>ADMIN PANEL</title>
<link rel="stylesheet" type="text/css" href="../source/ifund.css">
</head>

<body>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle"><form id="login" name="login" method="POST" action="<?php echo $loginFormAction; ?>">
        <table width="98%" border="0" cellspacing="1" cellpadding="0">
          <tr>
            <td colspan="2" align="left" valign="middle" bgcolor="#B2B2B2">&nbsp;&nbsp;ADMIN PANEL
              <?php if (isset($_GET['cmd']) && $_GET['cmd'] == 'invalid') { echo " - <font color=red>Incorrect Details</font>" ; } ?></td>
          </tr>
          <tr>
            <td width="30%" align="left" valign="middle">Username:</td>
            <td width="70%" align="left" valign="middle"><input type="text" name="officer" id="officer" /></td>
          </tr>
          <tr>
            <td align="left" valign="middle">Password:</td>
            <td align="left" valign="middle"><input type="password" name="password" id="password" /></td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td align="left" valign="middle"><input type="submit" name="button" id="button" value="Login" /></td>
          </tr>
        </table>
      </form></td>
  </tr>
</table>
</body>
</html>