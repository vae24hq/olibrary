<?php
require('Connections/dbcon.php');
include("dw/getsqlvaluestring.php");

$colname_dataset = "-1";
if (isset($_REQUEST['prod'])) {
  $colname_dataset = $_REQUEST['prod'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_dataset = sprintf("SELECT * FROM product WHERE suid = %s", GetSQLValueString($colname_dataset, "text"));
$dataset = mysql_query($query_dataset, $dbcon) or die(mysql_error());
$row_dataset = mysql_fetch_assoc($dataset);
$totalRows_dataset = mysql_num_rows($dataset);
?>

<?php if(isset($_REQUEST['prod'])) {  //display result?>
	<div class="viewTabHr">
    <div  class="cellTitle">RETURNED</div>
     <?php if ($totalRows_dataset == 0) {  ?>        
        <div class="warning">No record found!</div>
    <?php } ?>
  <?php if ($totalRows_dataset > 0) { // Show if recordset not empty ?>
	<?php if ((isset($row_dataset['suid'])) && ($row_dataset['suid'] != "")) {
		if($row_dataset['photo'] !='none.jpg') {unlink('download/'.$row_dataset['photo']);}
  $deleteSQL = sprintf("DELETE FROM product WHERE suid=%s",
                       GetSQLValueString($row_dataset['suid'], "text"));
  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($deleteSQL, $dbcon) or die(mysql_error());
}?>

<div class="success">The product <?php echo $row_dataset['product']; ?> has been deleted.</div>
    <?php } // Show if recordset not empty ?>
</div>
<?php }  //end result section?>
<?php
mysql_free_result($dataset);
?>
