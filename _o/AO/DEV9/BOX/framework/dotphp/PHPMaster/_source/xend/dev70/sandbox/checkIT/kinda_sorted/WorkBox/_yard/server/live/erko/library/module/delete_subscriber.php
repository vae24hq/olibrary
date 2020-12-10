<?php
require('Connections/dbcon.php');
include("dw/getsqlvaluestring.php");

$colname_dataset = "-1";
if (isset($_REQUEST['user'])) {
  $colname_dataset = $_REQUEST['user'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_dataset = sprintf("SELECT * FROM subscription WHERE suid = %s OR email =%s OR ref =%s", GetSQLValueString($colname_dataset, "text"),GetSQLValueString($colname_dataset, "text"), GetSQLValueString($colname_dataset, "text"));
$dataset = mysql_query($query_dataset, $dbcon) or die(mysql_error());
$row_dataset = mysql_fetch_assoc($dataset);
$totalRows_dataset = mysql_num_rows($dataset);
?>

<script src="assets/_spry/SpryValidationTextField.js" type="text/javascript"></script>
<link href="assets/_spry/SpryValidationTextField.css" rel="stylesheet" type="text/css">

<?php if(!isset($_REQUEST['user'])) { ?>
<div class="vertView">
<div class="heading">Please complete the form below </div>
<form id="Opperation" name="Opperation" method="post" action="">
  <span id="spryuserinfo">
  <label for="user">Newsletter ID/Email</label> 
<input type="text" name="user" id="user" autofocus />
  <span class="textfieldRequiredMsg">required!</span></span>
  <span class="buttons">
  <input type="submit" name="send" id="send" value="Delete">
  <input type="reset" name="ClearButton" id="ClearButton" value="Clean">
  <input name="action" type="hidden" id="action" value="process">
  </span>
</form>
</div>
<script type="text/javascript">
var spryuser = new Spry.Widget.ValidationTextField("spryuserinfo", "none", {validateOn:["blur"]});
</script>
<?php } ?>

<?php if(isset($_REQUEST['user'])) {  //display result?>
	<div class="viewTabHr">
    <div  class="cellTitle">RETURNED</div>
     <?php if ($totalRows_dataset == 0) {  ?>        
        <div class="warning">No record found!</div>
    <?php } ?>
  <?php if ($totalRows_dataset > 0) { // Show if recordset not empty ?>
	<?php if ((isset($row_dataset['buid'])) && ($row_dataset['buid'] != "")) {
  $deleteSQL = sprintf("DELETE FROM subscription WHERE buid=%s",
                       GetSQLValueString($row_dataset['buid'], "text"));
  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($deleteSQL, $dbcon) or die(mysql_error());
}?>

<div class="success">The user <?php echo $row_dataset['name']; ?> has been deleted.</div>
    <?php } // Show if recordset not empty ?>
</div>
<?php }  //end result section?>
<?php
mysql_free_result($dataset);
?>
