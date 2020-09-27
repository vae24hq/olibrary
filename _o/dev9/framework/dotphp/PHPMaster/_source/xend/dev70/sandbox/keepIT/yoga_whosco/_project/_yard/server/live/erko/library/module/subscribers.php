<?php require('Connections/dbcon.php'); ?>
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

$currentPage = './';#$_SERVER["PHP_SELF"];

$maxRows_dataset = 20;
$pageNum_dataset = 0;
if (isset($_GET['pageNum_dataset'])) {
  $pageNum_dataset = $_GET['pageNum_dataset'];
}
$startRow_dataset = $pageNum_dataset * $maxRows_dataset;

mysql_select_db($database_dbcon, $dbcon);
$query_dataset = "SELECT * FROM subscription WHERE subscription =  'newsletter' AND status = 'subscribed' ORDER BY entrydate DESC";
$query_limit_dataset = sprintf("%s LIMIT %d, %d", $query_dataset, $startRow_dataset, $maxRows_dataset);
$dataset = mysql_query($query_limit_dataset, $dbcon) or die(mysql_error());
$row_dataset = mysql_fetch_assoc($dataset);

if (isset($_GET['totalRows_dataset'])) {
  $totalRows_dataset = $_GET['totalRows_dataset'];
} else {
  $all_dataset = mysql_query($query_dataset);
  $totalRows_dataset = mysql_num_rows($all_dataset);
}
$totalPages_dataset = ceil($totalRows_dataset/$maxRows_dataset)-1;

$queryString_dataset = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_dataset") == false && 
        stristr($param, "totalRows_dataset") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_dataset = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_dataset = sprintf("&totalRows_dataset=%d%s", $totalRows_dataset, $queryString_dataset);
?>
<table border="0" cellspacing="0" cellpadding="0" class="viewTabHr" width="100%">
   <tr >
    <td colspan="6" scope="row" class="cellTitle">RESULT:
    <?php if ($totalRows_dataset != 0) {  ?>
    Showing <?php echo ($startRow_dataset + 1) ?>- <?php echo min($startRow_dataset + $maxRows_dataset, $totalRows_dataset) ?> of <?php echo $totalRows_dataset ?> record(s) <a href="<?php printf("%s?pageNum_dataset=%d%s", $currentPage, 0, $queryString_dataset); ?>">first</a> ~ <a href="<?php printf("%s?pageNum_dataset=%d%s", $currentPage, max(0, $pageNum_dataset - 1), $queryString_dataset); ?>">previous</a> ~ <a href="<?php printf("%s?pageNum_dataset=%d%s", $currentPage, min($totalPages_dataset, $pageNum_dataset + 1), $queryString_dataset); ?>">next</a> ~ <a href="<?php printf("%s?pageNum_dataset=%d%s", $currentPage, $totalPages_dataset, $queryString_dataset); ?>">last</a>
    <?php } ?>
    </td>
  </tr>
 <?php if ($totalRows_dataset != 0) { ?> 
 <tr class="tabTitle">
    <th width="10" scope="col">no</th>
    <th align="left" valign="middle" scope="col">id</th>
    <th align="left" valign="middle" scope="col">name</th>
    <th align="left" valign="middle" scope="col">email</th>
    <th align="left" valign="middle" scope="col">phone no</th>
    <th scope="col" width="220">manage</th>
  </tr>
  <?php $serialNo = $startRow_dataset; ?>
  <?php do { ?>
  <tr>
    
      <td scope="row"><?php echo $serialNo = ($serialNo + 1) ;?></td>
      <td><?php echo $row_dataset['ref']; ?></td>
      <td><?php echo $row_dataset['name']; ?></td>
      <td><?php echo $row_dataset['email']; ?></td>
      <td><?php echo $row_dataset['phone']; ?></td>
      <td><a href="./?link=unsubscribe&user=<?php echo $row_dataset['suid']; ?>">unsubscribe</a> | <a href="./?link=modify_subscriber&user=<?php echo $row_dataset['suid']; ?>">modify </a>| <a href="./?link=delete_subscriber&user=<?php echo $row_dataset['suid']; ?>">delete</a></td>
      
  </tr>
 <?php } while ($row_dataset = mysql_fetch_assoc($dataset)); ?>

  <?php } ?>
  <?php if ($totalRows_dataset == 0) { // Show if recordset empty ?>
  <tr>
    <td colspan="6" class="warning">No record found!</td>
  </tr>
  <?php } // Show if recordset empty ?>
</table>
<?php
mysql_free_result($dataset);
?>
