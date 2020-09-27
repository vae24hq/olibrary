<?php
	require_once('../Connections/ifund.php'); 
	require('dw.php');

if ((isset($_GET['id'])) && ($_GET['id'] != "") && (isset($_POST['dell']))) {
  $deleteSQL = sprintf("DELETE FROM transfers WHERE id=%s",
                       GetSQLValueString($_GET['id'], "int"));

  mysql_select_db($database_ifund, $ifund);
  $Result1 = mysql_query($deleteSQL, $ifund) or die(mysql_error());

  $deleteGoTo = "done.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_clientz = "-1";
if (isset($_GET['by'])) {
  $colname_clientz = $_GET['by'];
}
mysql_select_db($database_ifund, $ifund);
$query_clientz = sprintf("SELECT * FROM clients WHERE uname = %s", GetSQLValueString($colname_clientz, "text"));
$clientz = mysql_query($query_clientz, $ifund) or die(mysql_error());
$row_clientz = mysql_fetch_assoc($clientz);
$totalRows_clientz = mysql_num_rows($clientz);

$colname_client = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_client = $_SESSION['MM_Username'];
}
mysql_select_db($database_ifund, $ifund);
$query_client = sprintf("SELECT * FROM officer WHERE officer = %s", GetSQLValueString($colname_client, "text"));
$client = mysql_query($query_client, $ifund) or die(mysql_error());
$row_client = mysql_fetch_assoc($client);
$totalRows_client = mysql_num_rows($client);

$colname_transfers = "-1";
if (isset($_GET['id'])) {
  $colname_transfers = $_GET['id'];
}
mysql_select_db($database_ifund, $ifund);
$query_transfers = sprintf("SELECT * FROM transfers WHERE id = %s", GetSQLValueString($colname_transfers, "int"));
$transfers = mysql_query($query_transfers, $ifund) or die(mysql_error());
$row_transfers = mysql_fetch_assoc($transfers);
$totalRows_transfers = mysql_num_rows($transfers);
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
</head>

<body>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="24" align="center" valign="middle" bgcolor="#999999"><a href="panel.php">Admin Panel</a> &nbsp;- <a href="message.php?page=messages">Messages</a> - <a href="manageclients.php">Manage Client</a> - <a href="../i-fundadmin/settings.php">Settings</a> - <a href="<?php echo $logoutAction ?>">Logout</a></td>
  </tr>
</table>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle" bgcolor="#E1E1E1"><strong>MANAGE CLIENTS - TRANSFERS - DELETE</strong></td>
  </tr>
</table>
<form id="updtrans" name="updtrans" method="POST">
  <table width="900" border="1" bordercolor="#ECECEC" align="center" cellpadding="0" cellspacing="1">
    <tr>
      <td colspan="6" align="left" valign="middle" bgcolor="#ADADAD"> <strong>&nbsp;Transfer Info for [<?php echo $row_transfers['by']; ?>] / Transfer Date : <?php echo $row_transfers['transdate']; ?> / Current Balance : <?php echo $row_clientz['accbal']; ?></strong></td>
    </tr>
    <tr>
      <td width="10%" align="center" valign="middle" bgcolor="#ECECEC"><strong>Serial No</strong></td>
      <td width="15%" align="center" valign="middle" bgcolor="#ECECEC"><strong>Type</strong></td>
      <td width="15%" align="center" valign="middle" bgcolor="#ECECEC"><strong>Amount</strong></td>
      <td width="20%" align="center" valign="middle" bgcolor="#ECECEC"><strong>Dest. Acc/No</strong></td>
      <td width="20%" align="center" valign="middle" bgcolor="#ECECEC"><strong>Dest. Acc.Name</strong></td>
      <td width="20%" align="center" valign="middle" bgcolor="#ECECEC"><strong>Dest. Bank</strong></td>
    </tr>
    <tr>
      <td width="10%" align="center" valign="middle"><?php echo $row_transfers['trasno']; ?></td>
      <td width="15%" align="center" valign="middle"><?php echo $row_transfers['type']; ?></td>
      <td width="15%" align="center" valign="middle"><?php echo $row_transfers['amount']; ?></td>
      <td width="20%" align="center" valign="middle"><?php echo $row_transfers['toaccount']; ?></td>
      <td width="20%" align="center" valign="middle"><?php echo $row_transfers['toaccholder']; ?></td>
      <td width="20%" align="center" valign="middle"><?php echo $row_transfers['tobank']; ?></td>
    </tr>
    <tr>
      <td align="left" valign="middle" bgcolor="#ECECEC"><strong>Paragraph Title :</strong></td>
      <td colspan="2" align="left" valign="middle"><input name="tdesptitle" type="text" id="tdesptitle" value="<?php echo $row_transfers['tdesptitle']; ?>" /></td>
      <td colspan="3" rowspan="2" align="center" valign="middle" bgcolor="#C1C1C1"><input name="dell" type="hidden" id="dell" value="yaz" />        <input type="submit" name="button" id="button" value="Delete Transfer" /></td>
    </tr>
    <tr>
      <td align="center" valign="middle" bgcolor="#ECECEC"><strong>Paragraph <br />
      Details :</strong></td>
      <td colspan="2" align="left" valign="middle"><textarea name="tdesptalk" id="tdesptalk" cols="45" rows="5"><?php echo $row_transfers['tdesptalk']; ?></textarea></td>
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
</form>
</body>
</html>
<?php
mysql_free_result($clientz);

mysql_free_result($client);

mysql_free_result($transfers);
?>
