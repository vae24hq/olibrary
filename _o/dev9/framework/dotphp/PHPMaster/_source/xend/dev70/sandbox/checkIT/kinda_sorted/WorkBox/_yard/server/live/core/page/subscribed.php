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

$colname_dataset = "-1";
if (isset($_GET['ref'])) {
  $colname_dataset = $_GET['ref'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_dataset = sprintf("SELECT * FROM subscription WHERE `ref` = %s", GetSQLValueString($colname_dataset, "text"));
$dataset = mysql_query($query_dataset, $dbcon) or die(mysql_error());
$row_dataset = mysql_fetch_assoc($dataset);
$totalRows_dataset = mysql_num_rows($dataset);
?>

    <h4 class="heading">Newsletter Subscription</h4>
    <article class="container"> <h4 class="hide">Newsletter Subscription</h4>
      <p>Dear <b><?php echo $row_dataset['name']; ?></b></p>
      <p class="spaced">You have successfully subscribed to our newsletter. </p>
      <p>Please note your REFRENCE ID:<b><?php echo $row_dataset['ref']; ?></b> should you choose to contact us about your subscription.<br><br>Thank you.</p>
    </article>
  <?php
mysql_free_result($dataset);
?>
