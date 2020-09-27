<?php
	require_once('../konect.php'); 
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
</style></head>

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
<table width="900" 
                              border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td><table cellspacing="0" cellpadding="0" width="94%" 
                                align="left" border="0">
        <tbody>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td height="40" align="center" valign="middle" bgcolor="#E1E1E1">ACTION COMPLETED</td>
    </tr>
    <tr>
      <td height="40" align="center" valign="middle"><p class="black_bold">Your previous action was successfull. <br />
      </p></td>
    </tr>
  </tbody>
</table>
</body>
</html>
<?php
mysql_free_result($clientz);

mysql_free_result($tranz);

mysql_free_result($unreadinbox);

mysql_free_result($client);

mysql_free_result($code);
?>
