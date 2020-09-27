<?php
	require_once('../konect.php'); 
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
<link rel="stylesheet" type="text/css" href="../source/ifund.css">

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
table, th, td {
   
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
    <td height="50" align="center" valign="middle">MANAGE CLIENTS</td>
  </tr>
</table>
<?php if ($totalRows_clientz > 0) { // Show if recordset not empty ?>
 
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1">
    <tr>
      <th align="left" valign="middle"> Name</th>
      <th align="center" valign="middle">Email (password)</th>
      <th align="center" valign="middle">UserID</th>
      <th align="center" valign="middle">PIN</th>
      <th align="center" valign="middle">Account</th>
      <th align="center" valign="middle">Balance</th>
      
      <th align="center" valign="middle">Status</th>
      <th colspan="5" align="center" valign="middle">ACTION</th>
      </tr>
    <?php do { ?>
      <tr>
        <form id="manclient" name="manclient" method="POST" action="<?php echo $editFormAction; ?>">
          <td width="30%" align="left" valign="middle"><?php echo $row_clientz['fname']; ?> <?php echo $row_clientz['mname']; ?> <?php echo $row_clientz['lname']; ?></td>
          <td align="center" valign="middle"><?php echo $row_clientz['email']; ?> (<?php echo $row_clientz['passw']; ?>)</td>
          
          <td align="center" valign="middle"><?php echo $row_clientz['uname']; ?></td>
          <td align="center" valign="middle"><?php echo $row_clientz['pin']; ?></td>
          <td align="center" valign="middle"><?php echo $row_clientz['accountno']; ?></td>
          <td align="center" valign="middle"><?php echo $row_clientz['accbal']; ?></td>
          
          <td align="center" valign="middle"><select name="status" id="status">
            <option value="" <?php if (!(strcmp("", $row_clientz['status']))) {echo "selected=\"selected\"";} ?>>Select</option>
            <option value="active" <?php if (!(strcmp("active", $row_clientz['status']))) {echo "selected=\"selected\"";} ?>>Active</option>
            <option value="inactive" <?php if (!(strcmp("inactive", $row_clientz['status']))) {echo "selected=\"selected\"";} ?>>Not Active</option>
          </select>
            <input name="id" type="hidden" id="id" value="<?php echo $row_clientz['id']; ?>">
            <input type="submit" name="button" id="button" value="Set" /></td>
          <td align="center" valign="middle"><a href="message.php?page=compose&mailto=<?php echo $row_clientz['uname']; ?>">Mail</a></td>
          <td align="center" valign="middle"><a href="history.php?by=<?php echo $row_clientz['uname']; ?>">History</a></td>
          <td align="center" valign="middle"><a href="update.php?by=<?php echo $row_clientz['uname']; ?>">Edit</a></td>
          <td align="center" valign="middle"><a href="transfer.php?by=<?php echo $row_clientz['uname']; ?>">Transfer</a></td>
          <td align="center" valign="middle"><a href="delete.php?id=<?php echo $row_clientz['id']; ?>&uname=<?php echo $row_clientz['uname']; ?>" style="color:red;"><span style="color:red;">Delete</span></a></td>
          <input type="hidden" name="MM_update" value="manclient">
        </form>
      </tr>
      <?php } while ($row_clientz = mysql_fetch_assoc($clientz)); ?>
  </table>
    
  
  <?php } // Show if recordset not empty ?>
<?php if ($totalRows_clientz == 0) { // Show if recordset empty ?>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center" valign="middle">You have no clients, to create clients, visit the registration page from your main site, or contact the webmaster</td>
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
