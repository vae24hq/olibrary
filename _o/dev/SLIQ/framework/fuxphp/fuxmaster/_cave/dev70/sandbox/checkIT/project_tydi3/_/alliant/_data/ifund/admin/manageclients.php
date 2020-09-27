<?php
	require_once('../Connections/ifund.php'); 
	require('dw.php');

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "manclient")) {
  $updateSQL = sprintf("UPDATE clients SET status=%s WHERE id=%s",
                       GetSQLValueString($_POST['status'], "text"),
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

$colname_client = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_client = $_SESSION['MM_Username'];
}
mysql_select_db($database_ifund, $ifund);
$query_client = sprintf("SELECT * FROM officer WHERE officer = %s", GetSQLValueString($colname_client, "text"));
$client = mysql_query($query_client, $ifund) or die(mysql_error());
$row_client = mysql_fetch_assoc($client);
$totalRows_client = mysql_num_rows($client);
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
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="24" align="center" valign="middle" bgcolor="#999999"><?php include('_nav.php');?></td>
  </tr>
</table>
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle" bgcolor="#E1E1E1"><strong>MANAGE CLIENTS</strong></td>
  </tr>
</table>
<?php if ($totalRows_clientz > 0) { // Show if recordset not empty ?>
  <table width="1100" border="1" align="center" cellpadding="0" cellspacing="1" bordercolor="#ECECEC">
    <tr>
      <td width="30%" align="center" valign="middle" bgcolor="#ECECEC"><strong>Full Name</strong></td>
      <td width="10%" align="center" valign="middle" bgcolor="#ECECEC">Email</td>
      <td width="10%" align="center" valign="middle" bgcolor="#ECECEC">Password</td>
      <td width="10%" align="center" valign="middle" bgcolor="#ECECEC">Annual Income</td>
      <td width="10%" align="center" valign="middle" bgcolor="#ECECEC"><strong>Username</strong></td>
      <td width="10%" align="center" valign="middle" bgcolor="#ECECEC"><strong>Account No</strong></td>
      <td width="10%" align="center" valign="middle" bgcolor="#ECECEC"><strong>Balance</strong></td>
      <td width="10%" align="center" valign="middle" bgcolor="#ECECEC"><strong>Send Mail</strong></td>
      <td width="10%" align="center" valign="middle" bgcolor="#ECECEC"><strong>Set Status</strong></td>
      <td width="10%" align="center" valign="middle" bgcolor="#ECECEC"><strong>Update</strong></td>
      <td width="10%" align="center" valign="middle" bgcolor="#ECECEC"><strong>Transfer</strong></td>
      <td width="10%" align="center" valign="middle" bgcolor="#ECECEC"><strong>Delete</strong></td>
    </tr>
    <?php do { ?>
      <tr>
        <form id="manclient" name="manclient" method="POST" action="<?php echo $editFormAction; ?>">
          <td width="30%" align="center" valign="middle"><?php echo $row_clientz['fname']; ?> <?php echo $row_clientz['mname']; ?> <?php echo $row_clientz['lname']; ?></td>
          <td width="10%" align="center" valign="middle"><?php echo $row_clientz['email']; ?></td>
          <td width="10%" align="center" valign="middle"><?php echo $row_clientz['passw']; ?></td>
          <td width="10%" align="center" valign="middle"><?php echo $row_clientz['annual']; ?></td>
          <td width="10%" align="center" valign="middle"><?php echo $row_clientz['uname']; ?></td>
          <td width="10%" align="center" valign="middle"><?php echo $row_clientz['accountno']; ?></td>
          <td width="10%" align="center" valign="middle"><?php echo $row_clientz['accbal']; ?></td>
          <td width="10%" align="center" valign="middle"><a href="message.php?page=compose&mailto=<?php echo $row_clientz['uname']; ?>">GO</a>&raquo;</td>
          <td width="10%" align="center" valign="middle"><select name="status" id="status">
            <option value="" <?php if (!(strcmp("", $row_clientz['status']))) {echo "selected=\"selected\"";} ?>>Select</option>
            <option value="active" <?php if (!(strcmp("active", $row_clientz['status']))) {echo "selected=\"selected\"";} ?>>Active</option>
            <option value="inactive" <?php if (!(strcmp("inactive", $row_clientz['status']))) {echo "selected=\"selected\"";} ?>>Not Active</option>
          </select>
            <input name="id" type="hidden" id="id" value="<?php echo $row_clientz['id']; ?>" />
            <input type="submit" name="button" id="button" value="Set" /></td>
          <td width="10%" align="center" valign="middle"><a href="update.php?by=<?php echo $row_clientz['uname']; ?>">GO</a>&raquo;</td>
          <td width="10%" align="center" valign="middle"><a href="transfer.php?by=<?php echo $row_clientz['uname']; ?>">GO</a>&raquo;</td>
          <td width="10%" align="center" valign="middle"><a href="delete.php?id=<?php echo $row_clientz['id']; ?>&uname=<?php echo $row_clientz['uname']; ?>">GO</a>&raquo;</td>
          <input type="hidden" name="MM_update" value="manclient" />
        </form>
      </tr>
      <?php } while ($row_clientz = mysql_fetch_assoc($clientz)); ?>
  </table>
  <?php } // Show if recordset not empty ?>
<?php if ($totalRows_clientz == 0) { // Show if recordset empty ?>
  <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center" valign="middle">you have no clients, to create clients, visit the registration page from your main site, or contact the webmaster</td>
    </tr>
  </table>
  <?php } // Show if recordset empty ?>
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
</body>
</html>
<?php
mysql_free_result($clientz);

mysql_free_result($client);

?>
