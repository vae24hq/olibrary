<?php require_once('../Connections/ifund.php');  ?>
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

mysql_select_db($database_ifund, $ifund);
$query_company = "SELECT * FROM company";
$company = mysql_query($query_company, $ifund) or die(mysql_error());
$row_company = mysql_fetch_assoc($company);
$totalRows_company = mysql_num_rows($company);
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

if (isset($_POST['uname'])) {
  $loginUsername=$_POST['uname'];
  $password=$_POST['pin'];
  $MM_fldUserAuthorization = "status";
  $MM_redirectLoginSuccess = "come.php";
  $MM_redirectLoginFailed = "cpass.php?cmd=invalid";
  $MM_redirecttoReferrer = true;
  mysql_select_db($database_ifund, $ifund);
  	
  $LoginRS__query=sprintf("SELECT uname, pin, status FROM clients WHERE uname=%s AND pin=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $ifund) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'status');
    
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
<title>i-Fund NetSoft | <?php echo $row_company['bname']; ?></title>
<link rel="stylesheet" type="text/css" href="../source/ifund.css"/>
<script src="../source/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../source/SpryValidationPassword.js" type="text/javascript"></script>
<link href="../source/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../source/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr>
    <td height="400" align="center" valign="middle"><form ACTION="<?php echo $loginFormAction; ?>" id="login" name="login" method="POST">
     <?php if(!empty($_GET['cmd']) && $_GET['cmd'] == 'out') { ?> <table width="98%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td height="24" align="center" valign="middle" class="ifsty1br">YOU'RE NOT LOGGED IN !</td>
        </tr>
      </table>
            <?php }?>
            <?php if(!empty($_GET['cmd']) && $_GET['cmd'] == 'invalid') { ?>
        <table width="98%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td height="24" align="center" valign="middle" class="ifsty1br">INCORRECT LOGIN DETAILS !</td>
              </tr>
            </table>
            <?php }?>
            <?php if(!empty($_GET['cmd']) && $_GET['cmd'] == 'done') { ?>
            <table width="98%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td height="24" align="center" valign="middle" class="ifsty2b">YOU'VE LOGGED OUT SUCCESSFULLY !</td>
              </tr>
            </table>
            <?php }?>
            <?php if(!empty($_GET['cmd']) && $_GET['cmd'] == 'cpass') { ?>
            <table width="98%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td height="24" align="center" valign="middle" class="ifsty2b">YOUR PASSWORD HAS BEEN CHANGED !</td>
              </tr>
            </table>
            <span class="ifsty1br">[
Enter your new password]</span>
            <?php session_destroy(); ?> <?php }?>
            <table width="400" border="0" cellspacing="1" cellpadding="0">
              <tr>
          <td height="240" align="center" valign="middle" background="../source/bglogin.jpg" class="ifsty2n"><table width="90%" border="0" cellspacing="1" cellpadding="0">
            <tr>
              <td width="40%" height="24">&nbsp;</td>
              <td width="60%" height="24" align="left" valign="bottom" class="ifsty1b">Member ID :</td>
            </tr>
            <tr>
              <td height="24">&nbsp;</td>
              <td height="24" align="left" valign="middle"><span id="sprytextfield3">
                <input name="uname" type="text" class="fs01" id="uname" value="<?php if(!empty($_POST['uname'])) {echo $_POST['uname'];} ?>" size="30" />
               <br /> <span class="textfieldRequiredMsg">A value is required.</span></span><br /><span class="textfieldRequiredMsg">A value is required.</span></td>
            </tr>
            <tr>
              <td height="24">&nbsp;</td>
              <td height="24" align="left" valign="bottom" class="ifsty1b">Password :</td>
            </tr>
            <tr>
              <td height="24">&nbsp;</td>
              <td height="24" align="left" valign="middle"><span id="sprytextfield2">
                <input name="pin" type="password" class="fs01" id="pin" size="30" />
                <br /><span class="textfieldRequiredMsg">A value is required.</span></span><br /><span class="passwordRequiredMsg">A value is required.</span></td>
            </tr>
            <tr>
              <td height="36">&nbsp;</td>
              <td height="36" align="left" valign="middle"><input name="LogBtn" type="submit" class="fs02" id="LogBtn" value="Login" /></td>
            </tr>
          </table></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="1" class="ifsty1n">
  <tr>
    <td align="center" valign="middle"><hr width="100%" size="1" noshade="noshade" class="ifhr" /></td>
  </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="20" align="left" valign="middle" class="ifsty2n">&nbsp;&nbsp;&copy; iNetSoft 2009 | <?php echo $row_company['bname']; ?></td>
  </tr>
</table>
<script type="text/javascript">
<!--


var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
//-->
</script>
</body>
</html>
<?php
mysql_free_result($company);
?>
