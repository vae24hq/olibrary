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

$maxRows_dataSet = 20;
$pageNum_dataSet = 0;
if (isset($_GET['pageNum_dataSet'])) {
  $pageNum_dataSet = $_GET['pageNum_dataSet'];
}
$startRow_dataSet = $pageNum_dataSet * $maxRows_dataSet;

mysql_select_db($database_dbcon, $dbcon);


$query_dataSet = "SELECT * FROM pos_swimpool ORDER BY tuid DESC";
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
    <td colspan="5" class="tabTitle" scope="col"><strong>RESULT</strong> 
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
    <th width="50" align="center" valign="middle" scope="col" style="border-left:solid 1px #EFEFEF;">S/N</th>
    <th align="left" valign="middle" scope="col">DETAILS</th>
    <th width="90" align="right" valign="middle" scope="col">AMOUNT </th>
    
    <th width="120" align="center" valign="middle" scope="col">DATE</th>
  </tr>
  <?php  $sn = ''; ?>

    <?php do { ?>
      <tr class="tabContent">
        <td height="30" align="center" valign="middle" scope="col"><?php echo $sn = ($sn + 1) ?></td>
        <td align="left">
         
            <?php echo $row_dataSet['Description']; ?>
          
        </td>
        <td align="right" valign="middle">&#8358;<?php echo number_format($row_dataSet['Amount']); ?></td>
        
        
        <td align="center"><?php echo get_date($row_dataSet['tuid'], 'report'); ?></td>
      </tr>
      <?php } while ($row_dataSet = mysql_fetch_assoc($dataSet)); ?>
</table>

<?php }?>
 
 <?php if ($totalRows_dataSet == 0) { // Show if recordset empty ?>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="viewTabHr">
    <tr>
      <td height="24" colspan="7" align="left" valign="middle" class="tabTitle" scope="col"><strong>NOTIFICATION</strong></td>
    </tr>
    <tr class="tabContent infoError">
      <td height="50" colspan="6" align="left" valign="middle" style="text-transform:none; padding-left:20px;">NO RECORD FOUND!</td>
    </tr>
  </table>
<?php } // Show if recordset empty ?>
<?php
mysql_free_result($dataSet);
?>
