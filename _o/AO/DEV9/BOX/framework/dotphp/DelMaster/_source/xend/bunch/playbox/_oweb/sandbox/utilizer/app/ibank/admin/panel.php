<?php
	require_once('../Connections/ifund.php'); 
	require('dw.php');
	
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "updatesettins")) {
  $updateSQL = sprintf("UPDATE officer SET officer=%s, password=%s, fulname=%s, email=%s, phone=%s WHERE id=%s",
                       GetSQLValueString($_POST['officer'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['fulname'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['phone'], "text"),
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

mysql_select_db($database_ifund, $ifund);
$query_clientz = "SELECT * FROM clients ORDER BY accountno DESC";
$clientz = mysql_query($query_clientz, $ifund) or die(mysql_error());
$row_clientz = mysql_fetch_assoc($clientz);
$totalRows_clientz = mysql_num_rows($clientz);

mysql_select_db($database_ifund, $ifund);
$query_tranz = "SELECT * FROM transfers ORDER BY id DESC";
$tranz = mysql_query($query_tranz, $ifund) or die(mysql_error());
$row_tranz = mysql_fetch_assoc($tranz);
$totalRows_tranz = mysql_num_rows($tranz);

mysql_select_db($database_ifund, $ifund);
$query_unreadinbox = "SELECT * FROM mails WHERE mridno = '$_SESSION[MM_Username]' AND mrclocation='inbox' AND mrtrash !='yes' AND mrread = 'no'";
$unreadinbox = mysql_query($query_unreadinbox, $ifund) or die(mysql_error());
$row_unreadinbox = mysql_fetch_assoc($unreadinbox);
$totalRows_unreadinbox = mysql_num_rows($unreadinbox);

$colname_client = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_client = $_SESSION['MM_Username'];
}
mysql_select_db($database_ifund, $ifund);
$query_client = sprintf("SELECT * FROM officer WHERE officer = %s", GetSQLValueString($colname_client, "text"));
$client = mysql_query($query_client, $ifund) or die(mysql_error());
$row_client = mysql_fetch_assoc($client);
$totalRows_client = mysql_num_rows($client);

mysql_select_db($database_ifund, $ifund);
$query_code = "SELECT * FROM codes ORDER BY id DESC";
$code = mysql_query($query_code, $ifund) or die(mysql_error());
$row_code = mysql_fetch_assoc($code);
$totalRows_code = mysql_num_rows($code);
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>ADMIN PANEL</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #069;
}
body {
	background-color: #FFF;
	margin-left: 0px;
	margin-top: 4px;
	margin-right: 0px;
	margin-bottom: 0px;
}
a:link {
	color: #036;
	text-decoration: underline;
}
a:visited {
	text-decoration: underline;
	color: #036;
}
a:hover {
	text-decoration: none;
	color: #A60000;
}
a:active {
	text-decoration: underline;
	color: #036;
}
-->
</style>
<script src="../source/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../source/SpryValidationConfirm.js" type="text/javascript"></script>
<link href="../source/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../source/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="24" align="center" valign="middle" bgcolor="#999999"><?php include('_nav.php');?></td>
  </tr>
</table>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" align="left" valign="middle" bgcolor="#E1E1E1"><strong>&nbsp;Information Bar</strong></td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="middle">You currently have a total of <strong><?php echo $totalRows_clientz ?> Clients, </strong>and a total of <strong><?php echo $totalRows_tranz ?> transfer requests,</strong> as well as <strong><?php echo $totalRows_unreadinbox ?> unread messages</strong></td>
  </tr>
  <tr>
    <td width="232" align="center" valign="middle">INTERNATIONAL TRANSFER CODE :</td>
    <td width="668" align="left" valign="middle"><strong><?php echo $row_code['intran']; ?></strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle"><a href="Documentation.doc">Download Documentation</a></td>
  </tr>
</table>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle"><form action="<?php echo $editFormAction; ?>" id="updatesettins" name="updatesettins" method="POST">
      <table width="98%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td height="22" colspan="2" align="left" valign="middle" bgcolor="#E1E1E1">Here you can update your account/officer information
            <input name="id" type="hidden" id="id" value="<?php echo $row_client['id']; ?>" /></td>
          </tr>
        <tr>
          <td width="29%" height="22" align="right" valign="middle">Username : </td>
          <td width="71%" height="22" align="left" valign="middle"><span id="sprytextfield5">
            <input name="officer" type="text" id="officer" value="<?php echo $row_client['officer']; ?>" />
            <span class="textfieldRequiredMsg">A value is required.</span></span></td>
        </tr>
        <tr>
          <td height="22" align="right" valign="middle">Password : </td>
          <td height="22" align="left" valign="middle"><span id="sprytextfield1">
            <input name="password" type="password" id="password" value="<?php echo $row_client['password']; ?>" />
            <span class="textfieldRequiredMsg">A value is required.</span></span></td>
        </tr>
        <tr>
          <td height="22" align="right" valign="middle">Re-Password : </td>
          <td height="22" align="left" valign="middle"><span id="spryconfirm1">
            <input name="password1" type="password" id="password1" value="<?php echo $row_client['password']; ?>" />
            <span class="confirmRequiredMsg">A value is required.</span><span class="confirmInvalidMsg">The values don't match.</span></span></td>
        </tr>
        <tr>
          <td height="22" align="right" valign="middle">Fullname : </td>
          <td height="22" align="left" valign="middle"><span id="sprytextfield2">
            <input name="fulname" type="text" id="fulname" value="<?php echo $row_client['fulname']; ?>" />
</span></td>
        </tr>
        <tr>
          <td height="22" align="right" valign="middle">Email :</td>
          <td height="22" align="left" valign="middle"><span id="sprytextfield3">
          <input name="email" type="text" id="email" value="<?php echo $row_client['email']; ?>" />
          <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
        </tr>
        <tr>
          <td height="22" align="right" valign="middle">Phone&nbsp;:</td>
          <td height="22" align="left" valign="middle"><span id="sprytextfield4">
          <input name="phone" type="text" id="phone" value="<?php echo $row_client['phone']; ?>" />
</span></td>
        </tr>
        <tr>
          <td align="right" valign="middle">&nbsp;</td>
          <td height="30" align="left" valign="middle"><input type="submit" name="button" id="button" value="Save" /></td>
        </tr>
      </table>
      <input type="hidden" name="MM_update" value="updatesettins" />
    </form></td>
  </tr>
</table>
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
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "password");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {isRequired:false});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {isRequired:false});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
//-->
</script>
</body>
</html>
<?php
mysql_free_result($clientz);

mysql_free_result($tranz);

mysql_free_result($unreadinbox);

mysql_free_result($client);

mysql_free_result($code);
?>
