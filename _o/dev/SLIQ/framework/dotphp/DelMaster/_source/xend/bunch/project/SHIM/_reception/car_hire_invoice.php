<?php do_session(); $loc = getAppLoc(); require('../Connections/dbcon.php');

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

$currentPage = $_SERVER["PHP_SELF"];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "payForm")) {
  $updateSQL = sprintf("UPDATE pos_carhire SET Destination=%s, TimeIn=%s, Amount=%s, InvoiceStatus=%s, StatusUpdated=%s WHERE puid=%s",
                       GetSQLValueString($_POST['Destination'], "text"),
                       GetSQLValueString($_POST['TimeIn'], "text"),
                       GetSQLValueString($_POST['Amount'], "text"),
                       GetSQLValueString($_POST['InvoiceStatus'], "text"),
                       GetSQLValueString($_POST['StatusUpdated'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($updateSQL, $dbcon) or die(mysql_error());
}

$maxRows_dataSet = 20;
$pageNum_dataSet = 0;
if (isset($_GET['pageNum_dataSet'])) {
  $pageNum_dataSet = $_GET['pageNum_dataSet'];
}
$startRow_dataSet = $pageNum_dataSet * $maxRows_dataSet;

mysql_select_db($database_dbcon, $dbcon);


$query_dataSet = "SELECT * FROM pos_carhire WHERE InvoiceStatus = 'unpaid' ORDER BY tuid DESC";
$query_limit_dataSet = sprintf("%s LIMIT %d, %d", $query_dataSet, $startRow_dataSet, $maxRows_dataSet);
$dataSet = mysql_query($query_limit_dataSet, $dbcon) or die(mysql_error());
$row_dataSet = mysql_fetch_assoc($dataSet);

if (isset($_GET['totalRows_dataSet'])) {
  $totalRows_dataSet = $_GET['totalRows_dataSet'];
} else {
  $all_dataSet = mysql_query($query_dataSet);
  $totalRows_dataSet = mysql_num_rows($all_dataSet);
}
$totalPages_dataSet = ceil($totalRows_dataSet/$maxRows_dataSet)-1;

$queryString_dataSet = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_dataSet") == false && 
        stristr($param, "totalRows_dataSet") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_dataSet = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_dataSet = sprintf("&totalRows_dataSet=%d%s", $totalRows_dataSet, $queryString_dataSet);
?>

<link rel="stylesheet" type="text/css" href="../script/css/screen.css"/>


<?php if ($totalRows_dataSet > 0) { // Show if recordset not empty ?>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="viewTabHr">
  <tr>
    <td colspan="10" class="tabTitle" scope="col"><strong>RESULT</strong> 
    <span style="text-transform:none;">
    (Showing <?php echo ($startRow_dataSet + 1) ?> - 
	<?php echo min($startRow_dataSet + $maxRows_dataSet, $totalRows_dataSet) ?> of 
	<?php echo $totalRows_dataSet ?>   records)</span>
    
    
     <span style="float:right; padding-right:10px; text-transform:none;"> 
     <a href="<?php printf("%s?pageNum_dataSet=%d%s", $currentPage, 0, $queryString_dataSet); ?>">First</a> ~ 
     <a href="<?php printf("%s?pageNum_dataSet=%d%s", $currentPage, min($totalPages_dataSet, $pageNum_dataSet + 1), $queryString_dataSet); ?>">Next</a> ~ 
     <a href="<?php printf("%s?pageNum_dataSet=%d%s", $currentPage, max(0, $pageNum_dataSet - 1), $queryString_dataSet); ?>">Previous</a> ~ 
     <a href="<?php printf("%s?pageNum_dataSet=%d%s", $currentPage, $totalPages_dataSet, $queryString_dataSet); ?>">Last</a>
     </span>
    </td>
  </tr>
  <tr class="cellTitle">
    <th width="30" align="center" valign="middle" scope="col" style="border-left:solid 1px #EFEFEF;">S/N</th>
    <th width="120" align="left" valign="middle" scope="col">DRIVER</th>
    <th align="left" valign="middle" scope="col">DETAILS</th>
    
    <th width="80" align="left" valign="middle" scope="col">TIME-OUT</th>
    <th width="140" align="left" valign="middle" scope="col">TIME-IN</th>
    <th width="90" align="right" valign="middle" scope="col">(&#8358;) AMOUNT </th>
    
    <th width="120" align="center" valign="middle" scope="col">DATE</th>
    <th width="80" align="center" valign="middle" scope="col">STATUS</th>
  </tr>
  <?php  $sn = ''; ?>

    <?php do { ?>
    
   
      <form id="payForm" name="payForm" method="POST" action="<?php echo $editFormAction; ?>">
<tr>
        <td height="30" align="center" valign="middle" scope="col"><?php echo $sn = ($sn + 1) ?></td>
        <td align="left">
		<input name="InvoiceStatus" type="hidden" id="InvoiceStatus" value="paid"/>
		<input name="id" type="hidden" id="id" value="<?php echo $row_dataSet['puid']; ?>" />
		<input type="hidden" name="StatusUpdated" id="StatusUpdated" value="<?php echo unix_time(); ?>" />
		<input name="process" type="hidden" id="process" value="go" />
		<?php echo $row_dataSet['Driver']; ?>
          
        </td>
        <td align="left" valign="middle">
         
        <textarea name="Destination" id="Destination" cols="45" rows="1"></textarea></td>
        
        <td align="left" valign="middle" >
        <?php echo $row_dataSet['TimeOut']; ?></td>
        <td align="center" valign="middle" ><input name="TimeIn" type="text" id="TimeIn" size="20" /></td>
        <td align="center" valign="middle">
        <input name="Amount" type="text" id="Amount" size="10" /></td>
        
        
       
        
        <td align="center"><?php echo get_date($row_dataSet['tuid'], 'report'); ?></td>
     <td align="center" valign="middle" >
     <input type="submit" name="PayBtn" id="PayBtn" value="Pay" />
      </td> </tr>
<input type="hidden" name="MM_update" value="payForm" />
      </form>

      <?php } while ($row_dataSet = mysql_fetch_assoc($dataSet)); ?>
</table>

<?php } else {
 echo "No Record Found";
} // Show if recordset empty ?>
<?php
mysql_free_result($dataSet);
?>