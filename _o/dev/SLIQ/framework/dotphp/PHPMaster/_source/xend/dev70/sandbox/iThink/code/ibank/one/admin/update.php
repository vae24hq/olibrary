<?php
	require_once('../Connections/ifund.php'); 
	require('dw.php');

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "update")) {
  $updateSQL = sprintf("UPDATE clients SET accountno=%s, pin=%s, swift=%s, uname=%s, securityhint=%s, acctype=%s, `currency`=%s, status=%s, income=%s, outgo=%s, accbal=%s, fname=%s, lname=%s, mname=%s, title=%s, sex=%s, email=%s, phone=%s, birthdate=%s, nationality=%s, address=%s, city=%s, `state`=%s, country=%s, `statement`=%s WHERE id=%s",
                       GetSQLValueString($_POST['accountno'], "text"),
                       GetSQLValueString($_POST['pin'], "text"),
                       GetSQLValueString($_POST['swift'], "text"),
					   GetSQLValueString($_POST['uname'], "text"),
                       GetSQLValueString($_POST['securityhint'], "text"),
                       GetSQLValueString($_POST['acctype'], "text"),
                       GetSQLValueString($_POST['currency'], "text"),
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($_POST['income'], "text"),
                       GetSQLValueString($_POST['outgo'], "text"),
                       GetSQLValueString($_POST['accbal'], "text"),
                       GetSQLValueString($_POST['fname'], "text"),
                       GetSQLValueString($_POST['lname'], "text"),
                       GetSQLValueString($_POST['mname'], "text"),
                       GetSQLValueString($_POST['title'], "text"),
                       GetSQLValueString($_POST['sex'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['birthdate'], "text"),
                       GetSQLValueString($_POST['nationality'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['city'], "text"),
                       GetSQLValueString($_POST['state'], "text"),
                       GetSQLValueString($_POST['country'], "text"),
                       GetSQLValueString($_POST['statement'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_ifund, $ifund);
  $Result1 = mysql_query($updateSQL, $ifund) or die(mysql_error());

  $updateGoTo = "done.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_clientz = "-1";
if (isset($_GET['uname'])) {
  $colname_clientz = $_GET['uname'];
}
mysql_select_db($database_ifund, $ifund);
$query_clientz = sprintf("SELECT * FROM clients WHERE uname = %s", GetSQLValueString($colname_clientz, "text"));
$clientz = mysql_query($query_clientz, $ifund) or die(mysql_error());
$row_clientz = mysql_fetch_assoc($clientz);

$colname_client = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_client = $_SESSION['MM_Username'];
}
mysql_select_db($database_ifund, $ifund);
$query_client = sprintf("SELECT * FROM officer WHERE officer = %s", GetSQLValueString($colname_client, "text"));
$client = mysql_query($query_client, $ifund) or die(mysql_error());
$row_client = mysql_fetch_assoc($client);
$totalRows_client = mysql_num_rows($client);

$colname_clientz = "-1";
if (isset($_GET['by'])) {
  $colname_clientz = $_GET['by'];
}
mysql_select_db($database_ifund, $ifund);
$query_clientz = sprintf("SELECT * FROM clients WHERE uname = %s", GetSQLValueString($colname_clientz, "text"));
$clientz = mysql_query($query_clientz, $ifund) or die(mysql_error());
$row_clientz = mysql_fetch_assoc($clientz);
$totalRows_clientz = mysql_num_rows($clientz);
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>ADMIN PANEL</title>
<link rel="stylesheet" type="text/css" href="../source/ifund.css">
<script src="../source/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../source/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="../source/SpryValidationSelect.js" type="text/javascript"></script>
<link href="../source/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../source/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="../source/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="24" align="center" valign="middle" bgcolor="#999999"><?php include('_nav.php');?></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="50" align="center" valign="middle">MANAGE CLIENTS</td>
  </tr>
</table>
<form id="update" name="update" method="POST" action="<?php echo $editFormAction; ?>">
  <table width="100%" border="1" bordercolor="#ECECEC" align="center" cellpadding="0" cellspacing="1">
    <tr>
      <td colspan="4" align="center" valign="middle" bgcolor="#D8D8D8">[ACCOUNT INFORMATION]
      <input name="id" type="hidden" id="id" value="<?php echo $row_clientz['id']; ?>" /></td>
    </tr>
    <tr>
      <td width="25%" align="center" valign="middle" bgcolor="#ECECEC"><strong>Account Number</strong></td>
      <td width="25%" align="center" valign="middle" bgcolor="#ECECEC"><strong>Username</strong></td>
      <td width="25%" align="center" valign="middle" bgcolor="#ECECEC"><strong>Password</strong></td>
      <td width="25%" align="center" valign="middle" bgcolor="#ECECEC"><strong>Security Hint</strong></td>
    </tr>
    <tr>
      <td width="25%" align="center" valign="middle"><span id="sprytextfield1">
        <input name="accountno" type="text" id="accountno" value="<?php echo $row_clientz['accountno']; ?>" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      <td width="25%" align="center" valign="middle"><span id="sprytextfield2">
        <input name="uname" type="text" id="uname" value="<?php echo $row_clientz['uname']; ?>" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      <td width="25%" align="center" valign="middle"><span id="sprytextfield3">
        <input name="pin" type="text" id="pin" value="<?php echo $row_clientz['pin']; ?>" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      <td width="25%" align="center" valign="middle"><span id="sprytextfield4">
        <input name="securityhint" type="text" id="securityhint" value="<?php echo $row_clientz['securityhint']; ?>" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr>
      <td align="center" valign="middle" bgcolor="#ECECEC"><strong>Account Type</strong></td>
      <td align="center" valign="middle" bgcolor="#ECECEC"><strong>Currency</strong></td>
      <td align="center" valign="middle" bgcolor="#ECECEC"><strong>Account Status</strong></td>
      <td align="center" valign="middle" bgcolor="#ECECEC"><strong>Account Balance</strong></td>
    </tr>
    <tr>
      <td align="center" valign="middle"><span id="sprytextfield5">
        <input name="acctype" type="text" id="acctype" value="<?php echo $row_clientz['acctype']; ?>" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      <td align="center" valign="middle"><span id="sprytextfield6">
        <input name="currency" type="text" id="currency" value="<?php echo $row_clientz['currency']; ?>" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      <td align="center" valign="middle"><select name="status" id="status">
        <option value="" <?php if (!(strcmp("", $row_clientz['status']))) {echo "selected=\"selected\"";} ?>>Select</option>
        <option value="active" <?php if (!(strcmp("active", $row_clientz['status']))) {echo "selected=\"selected\"";} ?>>Active</option>
        <option value="inactive" <?php if (!(strcmp("inactive", $row_clientz['status']))) {echo "selected=\"selected\"";} ?>>Not Active</option>
      </select></td>
      <td align="center" valign="middle"><span id="sprytextfield7">
        <input name="accbal" type="text" id="accbal" value="<?php echo $row_clientz['accbal']; ?>" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr>
      <td align="center" valign="middle" bgcolor="#ECECEC"><strong>Incoming Transfer Amount</strong></td>
      <td align="center" valign="middle" bgcolor="#ECECEC"><strong>Outgoing Transfer Amount</strong></td>
      <td colspan="2" align="center" valign="middle" bgcolor="#ECECEC"><strong>Statement on Account</strong></td>
    </tr>
    <tr>
      <td align="center" valign="middle"><span id="sprytextfield8">
        <input name="income" type="text" id="income" value="<?php echo $row_clientz['income']; ?>" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      <td align="center" valign="middle"><span id="sprytextfield9">
        <input name="outgo" type="text" id="outgo" value="<?php echo $row_clientz['outgo']; ?>" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      <td colspan="2" align="center" valign="middle"><span id="sprytextarea1">
        <textarea name="statement" id="statement" cols="45" rows="5"><?php echo $row_clientz['statement']; ?></textarea>
      <span class="textareaRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr>
      <td colspan="4" align="center" valign="middle" bgcolor="#D8D8D8">[PERSONAL INFORMATION]</td>
    </tr>
    <tr>
      <td align="center" valign="middle" bgcolor="#ECECEC"><strong>Title</strong></td>
      <td align="center" valign="middle" bgcolor="#ECECEC"><strong>First Name</strong></td>
      <td align="center" valign="middle" bgcolor="#ECECEC"><strong>Middle Name</strong></td>
      <td align="center" valign="middle" bgcolor="#ECECEC"><strong>Last Name</strong></td>
    </tr>
    <tr>
      <td align="center" valign="middle"><span id="sprytextfield10">
        <input name="title" type="text" id="title" value="<?php echo $row_clientz['title']; ?>" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      <td align="center" valign="middle"><span id="sprytextfield11">
        <input name="fname" type="text" id="fname" value="<?php echo $row_clientz['fname']; ?>" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      <td align="center" valign="middle"><input name="mname" type="text" id="mname" value="<?php echo $row_clientz['mname']; ?>" /></td>
      <td align="center" valign="middle"><span id="sprytextfield12">
        <input name="lname" type="text" id="lname" value="<?php echo $row_clientz['lname']; ?>" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr>
      <td align="center" valign="middle" bgcolor="#ECECEC"><strong>Sex</strong></td>
      <td align="center" valign="middle" bgcolor="#ECECEC"><strong>Passport View</strong></td>
      <td align="center" valign="middle" bgcolor="#ECECEC"><strong>Swift Code</strong></td>
      <td align="center" valign="middle" bgcolor="#ECECEC"><strong>Birth Date</strong></td>
    </tr>
    <tr>
      <td align="center" valign="middle"><span id="spryselect1">
        <select name="sex" size="1" id="sex">
          <option value="" <?php if (!(strcmp("", $row_clientz['sex']))) {echo "selected=\"selected\"";} ?>>Select</option>
          <option value="Male" <?php if (!(strcmp("Male", $row_clientz['sex']))) {echo "selected=\"selected\"";} ?>>Male</option>
          <option value="Female" <?php if (!(strcmp("Female", $row_clientz['sex']))) {echo "selected=\"selected\"";} ?>>Female</option>
        </select>
      <span class="selectRequiredMsg">Please select an item.</span></span></td>
      <td align="center" valign="middle"><img src="../ifund/upload/<?php echo $row_clientz['passport']; ?>" alt="" name="" width="120" height="120" /></td>
      <td align="center" valign="middle"><input name="swift" type="text" id="swift" value="<?php echo $row_clientz['swift']; ?>"></td>
      <td align="center" valign="middle"><span id="sprytextfield13">
        <input name="birthdate" type="text" id="birthdate" value="<?php echo $row_clientz['birthdate']; ?>" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr>
      <td colspan="4" align="center" valign="middle" bgcolor="#D8D8D8">[CONTACT INFORMATION]</td>
    </tr>
    <tr>
      <td align="center" valign="middle" bgcolor="#ECECEC"><strong>Address</strong></td>
      <td align="center" valign="middle" bgcolor="#ECECEC"><strong>City</strong></td>
      <td align="center" valign="middle" bgcolor="#ECECEC"><strong>State</strong></td>
      <td align="center" valign="middle" bgcolor="#ECECEC"><strong>Country</strong></td>
    </tr>
    <tr>
      <td align="center" valign="middle"><span id="sprytextfield14">
        <input name="address" type="text" id="address" value="<?php echo $row_clientz['address']; ?>" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      <td align="center" valign="middle"><span id="sprytextfield15">
        <input name="city" type="text" id="city" value="<?php echo $row_clientz['city']; ?>" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      <td align="center" valign="middle"><span id="sprytextfield16">
        <input name="state" type="text" id="state" value="<?php echo $row_clientz['state']; ?>" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      <td align="center" valign="middle"><span id="sprytextfield17">
        <input name="country" type="text" id="country" value="<?php echo $row_clientz['country']; ?>" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr>
      <td align="center" valign="middle"><strong>Email</strong></td>
      <td align="center" valign="middle"><strong>Phone Number</strong></td>
      <td align="center" valign="middle"><strong>Nationality</strong></td>
      <td align="center" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td align="center" valign="middle"><span id="sprytextfield18">
        <input name="email" type="text" id="email" value="<?php echo $row_clientz['email']; ?>" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      <td align="center" valign="middle"><span id="sprytextfield19">
        <input name="phone" type="text" id="phone" value="<?php echo $row_clientz['phone']; ?>" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      <td align="center" valign="middle"><span id="sprytextfield20">
        <input name="nationality" type="text" id="nationality" value="<?php echo $row_clientz['nationality']; ?>" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      <td align="center" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td height="40" colspan="4" align="center" valign="middle"><input type="submit" name="SAVE" id="SAVE" value="Save Details" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="update" />
</form>
<table cellspacing="0" cellpadding="0" width="100%" 
                              border="0">
  <tbody>
    <tr>
      <td background="../img/heading_bg.jpg" 
                                height="28">&nbsp;</td>
    </tr>
    <tr>
      <td><table cellspacing="0" cellpadding="0" width="94%" 
                                align="left" border="0">
        <tbody>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td height="40" align="center" valign="middle"><p class="black_bold"><a href="javascript:history.go(-1);">&laquo;Go Back</a> | <a href="javascript:location.reload()">Refresh</a></p></td>
    </tr>
  </tbody>
</table>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10");
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11");
var sprytextfield12 = new Spry.Widget.ValidationTextField("sprytextfield12");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var sprytextfield13 = new Spry.Widget.ValidationTextField("sprytextfield13");
var sprytextfield14 = new Spry.Widget.ValidationTextField("sprytextfield14");
var sprytextfield15 = new Spry.Widget.ValidationTextField("sprytextfield15");
var sprytextfield16 = new Spry.Widget.ValidationTextField("sprytextfield16");
var sprytextfield17 = new Spry.Widget.ValidationTextField("sprytextfield17");
var sprytextfield18 = new Spry.Widget.ValidationTextField("sprytextfield18");
var sprytextfield19 = new Spry.Widget.ValidationTextField("sprytextfield19");
var sprytextfield20 = new Spry.Widget.ValidationTextField("sprytextfield20");
//-->
</script>
</body>
</html>
<?php
mysql_free_result($client);

mysql_free_result($clientz);
?>
