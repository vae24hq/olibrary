<?php
	require_once('../Connections/ifund.php'); 
	require('dw.php');

$currentPage = $_SERVER["PHP_SELF"];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "updtrans")) {
  $updateSQL = sprintf("UPDATE transfers SET `statement`=%s, trurl=%s, trsptitle=%s, trsurlset=%s, trsptalk=%s, trsprequest=%s, trsprequestcode=%s, trsptitle2=%s, trsptalk2=%s, trsprequest2=%s, trsprequestcode2=%s, tdesptitle=%s, tdesptalk=%s, pera=%s, perb=%s, perc=%s, perd=%s, pere=%s, perf=%s, per=%s WHERE id=%s",
                       GetSQLValueString($_POST['statement'], "text"),
                       GetSQLValueString($_POST['trurl'], "text"),
                       GetSQLValueString($_POST['trsptitle'], "text"),
                       GetSQLValueString($_POST['trsurlset'], "text"),
                       GetSQLValueString($_POST['trsptalk'], "text"),
                       GetSQLValueString($_POST['trsprequest'], "text"),
                       GetSQLValueString($_POST['trsprequestcode'], "text"),
                       GetSQLValueString($_POST['trsptitle2'], "text"),
                       GetSQLValueString($_POST['trsptalk2'], "text"),
                       GetSQLValueString($_POST['trsprequest2'], "text"),
                       GetSQLValueString($_POST['trsprequestcode2'], "text"),
                       GetSQLValueString($_POST['tdesptitle'], "text"),
                       GetSQLValueString($_POST['tdesptalk'], "text"),
                       GetSQLValueString($_POST['pera'], "text"),
                       GetSQLValueString($_POST['perb'], "text"),
                       GetSQLValueString($_POST['perc'], "text"),
                       GetSQLValueString($_POST['perd'], "text"),
                       GetSQLValueString($_POST['pere'], "text"),
                       GetSQLValueString($_POST['perf'], "text"),
                       GetSQLValueString($_POST['per'], "text"),
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

$maxRows_transfers = 1;
$pageNum_transfers = 0;
if (isset($_GET['pageNum_transfers'])) {
  $pageNum_transfers = $_GET['pageNum_transfers'];
}
$startRow_transfers = $pageNum_transfers * $maxRows_transfers;

$colname_transfers = "-1";
if (isset($_GET['by'])) {
  $colname_transfers = $_GET['by'];
}
mysql_select_db($database_ifund, $ifund);
$query_transfers = sprintf("SELECT * FROM transfers WHERE `by` = %s ORDER BY id DESC", GetSQLValueString($colname_transfers, "text"));
$query_limit_transfers = sprintf("%s LIMIT %d, %d", $query_transfers, $startRow_transfers, $maxRows_transfers);
$transfers = mysql_query($query_limit_transfers, $ifund) or die(mysql_error());
$row_transfers = mysql_fetch_assoc($transfers);

if (isset($_GET['totalRows_transfers'])) {
  $totalRows_transfers = $_GET['totalRows_transfers'];
} else {
  $all_transfers = mysql_query($query_transfers);
  $totalRows_transfers = mysql_num_rows($all_transfers);
}
$totalPages_transfers = ceil($totalRows_transfers/$maxRows_transfers)-1;

$queryString_transfers = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_transfers") == false && 
        stristr($param, "totalRows_transfers") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_transfers = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_transfers = sprintf("&totalRows_transfers=%d%s", $totalRows_transfers, $queryString_transfers);
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
    <td height="24" align="center" valign="middle" bgcolor="#999999"><?php include('_nav.php');?></td>
  </tr>
</table>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle" bgcolor="#E1E1E1"><strong>MANAGE CLIENTS - TRANSFERS -</strong></td>
  </tr>
</table>
<?php if ($totalRows_transfers > 0) { // Show if recordset not empty ?>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#F2F2F2">Showing <strong><?php echo ($startRow_transfers + 1) ?> of <?php echo $totalRows_transfers ?> Records avaliable.  |  &nbsp;&nbsp;<a href="<?php printf("%s?pageNum_transfers=%d%s", $currentPage, min($totalPages_transfers, $pageNum_transfers + 1), $queryString_transfers); ?>">Next</a> - <a href="<?php printf("%s?pageNum_transfers=%d%s", $currentPage, max(0, $pageNum_transfers - 1), $queryString_transfers); ?>">Previous</a> - <a href="<?php printf("%s?pageNum_transfers=%d%s", $currentPage, 0, $queryString_transfers); ?>">First</a> - <a href="<?php printf("%s?pageNum_transfers=%d%s", $currentPage, $totalPages_transfers, $queryString_transfers); ?>">Last</a></strong></td>
  </tr>
</table>

  <?php do { ?>
    <form action="<?php echo $editFormAction; ?>" id="updtrans" name="updtrans" method="POST">
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
          <td colspan="3" align="left" valign="middle" bgcolor="#ECECEC"><strong>Statement on Transfer</strong></td>
          <td align="center" valign="middle" bgcolor="#ECECEC"><strong>Transfer State</strong></td>
          <td align="center" valign="middle"><strong>Required State</strong></td>
          <td align="center" valign="middle">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" align="left" valign="middle"><textarea name="statement" id="statement" cols="45" rows="5"><?php echo $row_transfers['statement']; ?></textarea>
          <input name="id" type="hidden" id="id" value="<?php echo $row_transfers['id']; ?>" /></td>
          <td align="center" valign="middle"><select name="trurl" id="trurl">
            <option value="" <?php if (!(strcmp("", $row_transfers['trurl']))) {echo "selected=\"selected\"";} ?>>Select</option>
            <option value="intertranscode.php" <?php if (!(strcmp("intertranscode.php", $row_transfers['trurl']))) {echo "selected=\"selected\"";} ?>>New Transfer</option>
            <option value="transprocess.php" <?php if (!(strcmp("transprocess.php", $row_transfers['trurl']))) {echo "selected=\"selected\"";} ?>>Processing</option>
          </select></td>
          <td align="center" valign="middle"><select name="trsurlset" id="trsurlset">
            <option value="" <?php if (!(strcmp("", $row_transfers['trsurlset']))) {echo "selected=\"selected\"";} ?>>Select</option>
            <option value="transprocess.php" <?php if (!(strcmp("transprocess.php", $row_transfers['trsurlset']))) {echo "selected=\"selected\"";} ?>>New Transfer</option>
            <option value="transproces.php" <?php if (!(strcmp("transproces.php", $row_transfers['trsurlset']))) {echo "selected=\"selected\"";} ?>>Processing</option>
            <option value="completed.php" <?php if (!(strcmp("completed.php", $row_transfers['trsurlset']))) {echo "selected=\"selected\"";} ?>>Completed</option>
          </select></td>
          <td align="center" valign="middle">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="6" align="center" valign="middle" bgcolor="#ECECEC"><strong>SET PERCENTAGE FOR LOADING TO REQUIRED STAGE PAG</strong></td>
        </tr>
        <tr>
          <td align="center" valign="middle" bgcolor="#ECECEC">1st</td>
          <td align="center" valign="middle" bgcolor="#ECECEC">2nd</td>
          <td align="center" valign="middle" bgcolor="#ECECEC">3rd</td>
          <td align="center" valign="middle" bgcolor="#ECECEC">4th</td>
          <td align="center" valign="middle" bgcolor="#ECECEC">5th</td>
          <td align="center" valign="middle" bgcolor="#ECECEC">6th</td>
        </tr>
        <tr>
          <td align="center" valign="middle"><input name="pera" type="text" id="pera" value="<?php echo $row_transfers['pera']; ?>" size="10" /></td>
          <td align="center" valign="middle"><input name="perb" type="text" id="perb" value="<?php echo $row_transfers['perb']; ?>" size="10" /></td>
          <td align="center" valign="middle"><input name="perc" type="text" id="perc" value="<?php echo $row_transfers['perc']; ?>" size="10" /></td>
          <td align="center" valign="middle"><input name="perd" type="text" id="perd" value="<?php echo $row_transfers['perd']; ?>" size="10" /></td>
          <td align="center" valign="middle"><input name="pere" type="text" id="pere" value="<?php echo $row_transfers['pere']; ?>" size="10" /></td>
          <td align="center" valign="middle"><input name="perf" type="text" id="perf" value="<?php echo $row_transfers['perf']; ?>" size="10" /></td>
        </tr>
        <tr>
          <td colspan="6" align="center" valign="middle" bgcolor="#ECECEC"><strong> SET STATEMENT AFTER PERCENTAGE, ON LOADING TO REQUIRED STAGE PAGE</strong></td>
        </tr>
        <tr>
          <td colspan="6" align="left" valign="middle"><input name="per" type="text" id="per" value="<?php echo $row_transfers['per']; ?>" size="60" /></td>
        </tr>
        <tr>
          <td colspan="3" align="left" valign="middle" bgcolor="#C1C1C1"><strong> SET REQUIRED STAGE PAGE ENTRIES </strong></td>
          <td colspan="3" align="center" valign="middle" bgcolor="#C1C1C1"><strong>SET TRANSFER STAGE PAGE ENTRIES</strong></td>
        </tr>
        <tr>
          <td align="left" valign="middle" bgcolor="#ECECEC"><strong>Paragraph Title :</strong></td>
          <td colspan="2" align="left" valign="middle"><input name="trsptitle" type="text" id="trsptitle" value="<?php echo $row_transfers['trsptitle']; ?>" /></td>
          <td align="center" valign="middle" bgcolor="#ECECEC"><strong>Paragraph Title :</strong></td>
          <td colspan="2" align="left" valign="middle"><input name="trsptitle2" type="text" id="trsptitle2" value="<?php echo $row_transfers['trsptitle2']; ?>" /></td>
        </tr>
        <tr>
          <td align="left" valign="middle" bgcolor="#ECECEC"><strong>Paragraph Line :</strong></td>
          <td colspan="2" align="left" valign="middle"><input name="trsptalk" type="text" id="trsptalk" value="<?php echo $row_transfers['trsptalk']; ?>" /></td>
          <td align="center" valign="middle" bgcolor="#ECECEC"><strong>Paragraph Line :</strong></td>
          <td colspan="2" align="left" valign="middle"><input name="trsptalk2" type="text" id="trsptalk2" value="<?php echo $row_transfers['trsptalk2']; ?>" /></td>
        </tr>
        <tr>
          <td align="left" valign="middle" bgcolor="#ECECEC"><strong>Required Code :</strong></td>
          <td colspan="2" align="left" valign="middle"><input name="trsprequest" type="text" id="trsprequest" value="<?php echo $row_transfers['trsprequest']; ?>" /></td>
          <td align="center" valign="middle" bgcolor="#ECECEC"><strong>Required Code :</strong></td>
          <td colspan="2" align="left" valign="middle"><input name="trsprequest2" type="text" id="trsprequest2" value="<?php echo $row_transfers['trsprequest2']; ?>" /></td>
        </tr>
        <tr>
          <td align="left" valign="middle" bgcolor="#ECECEC"><strong>Code Value : </strong></td>
          <td colspan="2" align="left" valign="middle"><input name="trsprequestcode" type="text" id="trsprequestcode" value="<?php echo $row_transfers['trsprequestcode']; ?>" /></td>
          <td align="center" valign="middle" bgcolor="#ECECEC"><strong>Code Value : </strong></td>
          <td colspan="2" align="left" valign="middle"><input name="trsprequestcode2" type="text" id="trsprequestcode2" value="<?php echo $row_transfers['trsprequestcode2']; ?>" /></td>
        </tr>
        <tr bgcolor="#C1C1C1">
          <td colspan="6" align="left" valign="middle"><strong>FINAL STAGE</strong></td>
        </tr>
        <tr>
          <td align="left" valign="middle" bgcolor="#ECECEC"><strong>Paragraph Title :</strong></td>
          <td colspan="2" align="left" valign="middle"><input name="tdesptitle" type="text" id="tdesptitle" value="<?php echo $row_transfers['tdesptitle']; ?>" /></td>
          <td colspan="3" rowspan="2" align="center" valign="middle" bgcolor="#C1C1C1"><input type="submit" name="button" id="button" value="Save Transfer" /> 
            | <strong> [<a href="delete_transfer.php?id=<?php echo $row_transfers['id']; ?>">Delete This Transfer</a>]</strong></td>
        </tr>
        <tr>
          <td align="center" valign="middle" bgcolor="#ECECEC"><strong>Paragraph <br />
          Details :</strong></td>
          <td colspan="2" align="left" valign="middle"><textarea name="tdesptalk" id="tdesptalk" cols="45" rows="5"><?php echo $row_transfers['tdesptalk']; ?></textarea></td>
        </tr>
      </table>
      <input type="hidden" name="MM_update" value="updtrans" />
    </form>
    <?php } while ($row_transfers = mysql_fetch_assoc($transfers)); ?>
  <?php } // Show if recordset not empty ?>
  <?php if ($totalRows_transfers == 0) { // Show if recordset empty ?>
  <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center" valign="middle">NO RECORDS OF TRANSFER FOR THIS CLIENT</td>
    </tr>
  </table>
  <?php } // Show if recordset empty ?>
<table width="900" 
                              border="0" align="center" cellpadding="0" cellspacing="0">
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

mysql_free_result($transfers);
?>
