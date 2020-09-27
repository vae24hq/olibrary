<?php require_once('../core.php');
// *** Validate request to login to this site.
$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['uname'])) {
  $loginUsername=$_POST['uname'];
  $password=$_POST['pin'];
  $MM_fldUserAuthorization = "status";
  $MM_redirectLoginSuccess = "loading.php";
  $MM_redirectLoginFailed = "log.php?cmd=invalid";
  $MM_redirecttoReferrer = true;
  mysql_select_db($db, $konect);
  	
  $LoginRS__query=sprintf("SELECT uname, pin, status FROM clients WHERE uname=%s AND pin=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $konect) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
if ($loginFoundUser) {
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

<head>
<meta charset="utf-8">
<title>iNetSoft -<?php echo firm('bname');?></title>
<link rel="stylesheet" type="text/css" href="../source/inetsoft.css">
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<script src="../source/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../source/SpryValidationPassword.js" type="text/javascript"></script>
<link href="../source/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../source/SpryValidationPassword.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php include ('slice_header.php');?>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr>
    <td height="400" align="center" valign="middle"><form ACTION="<?php echo $loginFormAction; ?>" id="login" name="login" method="POST">
        <?php if(isset($_GET['cmd']) && $_GET['cmd'] == 'out') { ?>
        <table width="98%" border="0" cellspacing="1" cellpadding="0">
          <tr>
            <td height="24" align="center" valign="middle" class="warning">YOU'RE NOT LOGGED IN !</td>
          </tr>
        </table>
        <?php }?>
        <?php  if(isset($_GET['cmd']) &&  $_GET['cmd']== 'invalid') { ?>
        <table width="98%" border="0" cellspacing="1" cellpadding="0">
          <tr>
            <td height="24" align="center" valign="middle" class="warning">INCORRECT LOGIN DETAILS !</td>
          </tr>
        </table>
        <?php }?>
        <?php  if(isset($_GET['cmd']) &&  $_GET['cmd']== 'done') { ?>
        <table width="98%" border="0" cellspacing="1" cellpadding="0">
          <tr>
            <td height="24" align="center" valign="middle" class="notice">YOU'VE LOGGED OUT SUCCESSFULLY !</td>
          </tr>
        </table>
        <?php }?>
        <?php  if(isset($_GET['cmd']) &&  $_GET['cmd']== 'cpass') { ?>
        <table width="98%" border="0" cellspacing="1" cellpadding="0">
          <tr>
            <td height="24" align="center" valign="middle" class="notice">YOUR PASSWORD HAS BEEN CHANGED !</td>
          </tr>
        </table>
        <span class="warning">[Enter your new password]</span>
        <?php }?>
        <table width="400" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="240" align="center" valign="middle" background="../source/bglogin.jpg" class="ifsty2n"><table width="90%" border="0" cellspacing="1" cellpadding="0">
                <tr>
                  <td width="40%" height="24">&nbsp;</td>
                  <td width="60%" height="24" align="left" valign="bottom" class="ifsty1b">Member ID: </td>
                </tr>
                <tr>
                  <td height="24">&nbsp;</td>
                  <td height="24" align="left" valign="middle"><span id="spryusername">
                    <input name="uname" type="text" class="fs01" id="uname" value="<?php if(!empty($_POST['uname'])) {if(!empty($_POST['uname'])) {echo $_POST['uname'];}} ?>" size="30">
                    </span></td>
                </tr>
                <tr>
                  <td height="24">&nbsp;</td>
                  <td height="24" align="left" valign="bottom" class="ifsty1b">Password: </td>
                </tr>
                <tr>
                  <td height="24">&nbsp;</td>
                  <td height="24" align="left" valign="middle"><span id="sprypassword">
                    <input name="pin" type="password" class="fs01" id="pin" size="30">
                    </span></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td align="left" valign="middle"><input name="LogBtn" type="submit" class="LogBtn" id="LogBtn" value="Login"></td>
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
<?php include ('slice_footer.php');?>
<script type="text/javascript">
var spryusername = new Spry.Widget.ValidationTextField("spryusername");
var sprypassword = new Spry.Widget.ValidationTextField("sprypassword");
</script>
</body>
</html>