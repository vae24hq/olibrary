<?php
	require_once('../konect.php'); 
	require('dw.php');

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "update")) {
  $updateSQL = sprintf("UPDATE clients SET trans_1=%s, trans_2=%s, trans_3=%s, trans_4=%s, trans_5=%s, trans_6=%s, `trans_7`=%s WHERE id=%s",
                       GetSQLValueString($_POST['trans_1'], "text"),
                       GetSQLValueString($_POST['trans_2'], "text"),
                       GetSQLValueString($_POST['trans_3'], "text"),
                       GetSQLValueString($_POST['trans_4'], "text"),
                       GetSQLValueString($_POST['trans_5'], "text"),
                       GetSQLValueString($_POST['trans_6'], "text"),
                       GetSQLValueString($_POST['trans_7'], "text"),
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
<script src="../source/SpryValidationSelect.js" type="text/javascript"></script>
<link href="../source/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../source/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<style type="text/css">
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
</style>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="24" align="center" valign="middle" bgcolor="#999999"><?php include('_nav.php');?></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="50" align="center" valign="middle">TRANSACTION HISTORY</td>
  </tr>
</table>
<form id="update" name="update" method="POST" action="<?php echo $editFormAction; ?>">
  <input name="id" type="hidden" id="id" value="<?php echo $row_clientz['id']; ?>" />
  <table width="100%" border="0" bordercolor="#ECECEC" align="center" cellpadding="0" cellspacing="1">
    <tr>
      <td colspan="4" align="center" valign="middle"><input name="trans_1" type="text" id="trans_1" value="<?php echo $row_clientz['trans_1']; ?>" size="170" /></td>
    </tr>
    <tr>
      <td colspan="4" align="center" valign="middle"><input name="trans_2" type="text" id="trans_2" value="<?php echo $row_clientz['trans_2']; ?>" size="170" /></td>
    </tr>
    <tr>
      <td colspan="4" align="center" valign="middle"><input name="trans_3" type="text" id="trans_3" value="<?php echo $row_clientz['trans_3']; ?>" size="170" /></td>
    </tr>
    <tr>
      <td colspan="4" align="center" valign="middle"><input name="trans_4" type="text" id="trans_4" value="<?php echo $row_clientz['trans_4']; ?>" size="170" /></td>
    </tr>
    <tr>
      <td colspan="4" align="center" valign="middle"><input name="trans_5" type="text" id="trans_5" value="<?php echo $row_clientz['trans_5']; ?>" size="170" /></td>
    </tr>
    <tr>
      <td colspan="4" align="center" valign="middle"><input name="trans_6" type="text" id="trans_6" value="<?php echo $row_clientz['trans_6']; ?>" size="170" /></td>
    </tr>
    <tr>
      <td colspan="4" align="center" valign="middle"><input name="trans_7" type="text" id="trans_7" value="<?php echo $row_clientz['trans_7']; ?>" size="170" /></td>
    </tr>
    <tr>
      <td colspan="4" align="center" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td height="40" colspan="4" align="center" valign="middle"><input type="submit" name="SAVE" id="SAVE" value="Save Details" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="update" />
</form>
<table cellspacing="0" cellpadding="0" width="100%" border="0">
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
</body>
</html><?php
mysql_free_result($client);

mysql_free_result($clientz);
?>
