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

mysql_select_db($database_dbcon, $dbcon);
$query_RecentProduct = "SELECT * FROM product ORDER BY puid DESC Limit 2";
$RecentProduct = mysql_query($query_RecentProduct, $dbcon) or die(mysql_error());
$row_RecentProduct = mysql_fetch_assoc($RecentProduct);
$totalRows_RecentProduct = mysql_num_rows($RecentProduct);
?>
<div>
<h3 class="subheading">New Arrival Product</h3>
<?php do { ?>
  <div class="showcase"><?php if($row_RecentProduct['photo'] !='none.jpg') {?><img src="http://whosco.com/erko/download/<?php echo $row_RecentProduct['photo']; ?>" class="flex"><?php } ?>
    <p><b><?php echo $row_RecentProduct['product']; ?></b></p>
    <p><?php echo $row_RecentProduct['details']; ?></p></div>
  <?php } while ($row_RecentProduct = mysql_fetch_assoc($RecentProduct)); ?>
</div>
<?php
mysql_free_result($RecentProduct);
?>
