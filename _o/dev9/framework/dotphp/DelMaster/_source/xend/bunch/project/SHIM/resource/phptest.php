<?php require_once('../Connections/dbcon.php'); ?>
<?php
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

$maxRows_dataSet = 10;
$pageNum_dataSet = 0;
if (isset($_GET['pageNum_dataSet'])) {
  $pageNum_dataSet = $_GET['pageNum_dataSet'];
}
$startRow_dataSet = $pageNum_dataSet * $maxRows_dataSet;

$colname_dataSet = "-1";
if (isset($_POST['fuidd'])) {
  $colname_dataSet = $_POST['fuidd'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_dataSet = sprintf("SELECT * FROM hr_set");
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


 if ($totalRows_dataSet == 0) { // Show if recordset empty ?>
  No Record
  <?php } // Show if recordset empty ?>
<?php if ($totalRows_dataSet > 0) { // Show if recordset not empty ?>
    <?php do { ?>
      Record
      <?php } while ($row_dataSet = mysql_fetch_assoc($dataSet)); ?>
  <?php } // Show if recordset not empty ?>
  
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40">
	<?php if ($pageNum_dataSet > 0) { // Show if not first page ?>
  		<a href="<?php printf("%s?pageNum_dataSet=%d%s", $currentPage, 0, $queryString_dataSet); ?>">First</a>
	
~
<a href="<?php printf("%s?pageNum_dataSet=%d%s", $currentPage, max(0, $pageNum_dataSet - 1), $queryString_dataSet); ?>">Previous</a>
<?php } // Show if not first page ?>

<?php if ($pageNum_dataSet < $totalPages_dataSet) { // Show if not last page ?>
  <a href="<?php printf("%s?pageNum_dataSet=%d%s", $currentPage, min($totalPages_dataSet, $pageNum_dataSet + 1), $queryString_dataSet); ?>">Next</a>
 
  
~

 ~ <a href="<?php printf("%s?pageNum_dataSet=%d%s", $currentPage, $totalPages_dataSet, $queryString_dataSet); ?>">Last</a></td>
  <?php } // Show if not last page ?>
   </tr>
</table>

 
<?php
mysql_free_result($dataSet);
?>
