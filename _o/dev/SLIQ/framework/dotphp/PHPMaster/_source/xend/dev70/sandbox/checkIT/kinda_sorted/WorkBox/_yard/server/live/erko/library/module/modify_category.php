<?php $loader = new Loader;  $loader->action();
require('Connections/dbcon.php');
include("dw/getsqlvaluestring.php");
$editFormAction = './'; #$_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "Modify")) {
	$updateSQL = sprintf("UPDATE category SET category=%s, acronym=%s, isSubOf=%s, details=%s WHERE buid=%s",
					   GetSQLValueString($_POST['category'], "text"),
                       GetSQLValueString($_POST['acronym'], "text"),
                       GetSQLValueString($_POST['isSubOf'], "text"),
                       GetSQLValueString($_POST['details'], "text"),
					   GetSQLValueString($_POST['buid'], "text"));
  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($updateSQL, $dbcon) or die(mysql_error());
  $updateGoTo = "./?link=modify_category-done&category=".$_POST['category'];
  header(sprintf("Location: %s", $updateGoTo));
}

if(!empty($_GET['cat'])) {
mysql_select_db($database_dbcon, $dbcon);
$query = "SELECT * FROM category WHERE suid = ".$_GET['cat'];
$data = mysql_query($query, $dbcon) or die(mysql_error());
$row_data = mysql_fetch_assoc($data);


$query_dataset = "SELECT * FROM category WHERE suid <> ".$_GET['cat']." ORDER BY category ASC";
$dataset = mysql_query($query_dataset, $dbcon) or die(mysql_error());
$row_dataset = mysql_fetch_assoc($dataset);
$totalRows_dataset = mysql_num_rows($dataset);
}
?>
<script src="assets/_spry/SpryValidationTextField.js" type="text/javascript"></script>
<link href="assets/_spry/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="assets/_spry/SpryValidationSelect.css" rel="stylesheet" type="text/css">
<link href="assets/_spry/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
<script src="assets/_spry/SpryValidationSelect.js" type="text/javascript"></script>
<script src="assets/_spry/SpryValidationTextarea.js" type="text/javascript"></script>
<div class="hrView">
<?php if($loader->action() == 'done') { ?><p class="success">You have successfully updated <?php if(!empty($_GET['category'])){ echo $_GET['category']; } ?> category</p> <?php } 
  if($loader->action() == 'default') { ?>
  <div class="heading">Please complete the form below </div>
  <form action="<?php echo $editFormAction; ?>" method="POST" name="Modify" id="Modify">
   <span id="sprycategory">
   <label for="category">category:</label>
   <input name="category" type="text" id="category" value="<?php echo $row_data['category']; ?>">
   <span class="textfieldRequiredMsg">required!</span></span><br>
   <span id="spryacronym">
   <label for="acronym">acronym:</label>
   <input name="acronym" type="text" id="acronym" size="10" value="<?php echo $row_data['acronym']; ?>">
</span><br>
<span id="spryisSubOf">
<label for="isSubOf">Group:</label>
<span class="dropdown">
<select name="isSubOf" id="isSubOf" class="dropdown-select">
<option  value="">Select</option>
  <option <?php if (!(strcmp("none", $row_data['isSubOf']))) {echo "selected=\"selected\"";} ?> value="none">No Group</option>
  <?php
do {  
?>
  <option  <?php if (!(strcmp($row_dataset['buid'], $row_data['isSubOf']))) {echo "selected=\"selected\"";} ?> value="<?php echo $row_dataset['buid']?>"><?php echo $row_dataset['category']?></option>  
  <?php
} while ($row_dataset = mysql_fetch_assoc($dataset));
  $rows = mysql_num_rows($dataset);
  if($rows > 0) {
      mysql_data_seek($dataset, 0);
	  $row_dataset = mysql_fetch_assoc($dataset);
  }
?>
</select>
</span>

<span class="selectRequiredMsg">selection required.</span></span> <br>
<span id="sprydetails">
<label for="details">details:</label>
<textarea name="details" id="details" cols="45" rows="5"><?php echo $row_data['details']; ?></textarea>
</span><span class="buttons">
    <input name="save" type="submit" id="save" value="Save">
    <input type="reset" name="ClearButton" id="ClearButton" value="default">
    <input type="hidden" name="MM_update" value="Modify">
    <input name="buid" type="hidden" id="buid" value="<?php echo $row_data['buid']; ?>">
    </span>

  </form>
  <script type="text/javascript">
var sprycategory = new Spry.Widget.ValidationTextField("sprycategory", "none", {validateOn:["blur"]});
var spryacronym = new Spry.Widget.ValidationTextField("spryacronym", "none", {validateOn:["blur"], isRequired:false});
var spryisSubOf = new Spry.Widget.ValidationSelect("spryisSubOf");
var sprydetails = new Spry.Widget.ValidationTextarea("sprydetails", {isRequired:false, validateOn:["blur"]});
</script>
  <?php }?>
</div>


<?php if(!empty($_GET['cat'])) { mysql_free_result($dataset); } ?>
