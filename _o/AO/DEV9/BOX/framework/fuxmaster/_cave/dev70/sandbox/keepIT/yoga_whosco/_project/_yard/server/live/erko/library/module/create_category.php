<?php $loader = new Loader;  $loader->action();
require('Connections/dbcon.php');
include("dw/getsqlvaluestring.php");
$editFormAction = './'; #$_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "CreateForm")) {
  $insertSQL = sprintf("INSERT INTO category (suid, buid, entryStamp, category, acronym, isSubOf, details) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString(doRand('suid'), "text"),
                       GetSQLValueString(doRand('buid'), "text"),
                       GetSQLValueString(doTimeStamp('now'), "text"),
					   GetSQLValueString($_POST['category'], "text"),
                       GetSQLValueString($_POST['acronym'], "text"),
                       GetSQLValueString($_POST['isSubOf'], "text"),
                       GetSQLValueString($_POST['details'], "text"));
  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($insertSQL, $dbcon) or die(mysql_error());
  $insertGoTo = "./?link=create_category-created&category=".$_POST['category'];
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_dbcon, $dbcon);
$query_dataset = "SELECT * FROM category ORDER BY category ASC";
$dataset = mysql_query($query_dataset, $dbcon) or die(mysql_error());
$row_dataset = mysql_fetch_assoc($dataset);
$totalRows_dataset = mysql_num_rows($dataset);
?>
<script src="assets/_spry/SpryValidationTextField.js" type="text/javascript"></script>
<link href="assets/_spry/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="assets/_spry/SpryValidationSelect.css" rel="stylesheet" type="text/css">

<link href="assets/_spry/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
<script src="assets/_spry/SpryValidationSelect.js" type="text/javascript"></script>
<script src="assets/_spry/SpryValidationTextarea.js" type="text/javascript"></script>
<div class="hrView">
<?php if($loader->action() == 'created') { ?><p class="success">You have successfully created <?php if(!empty($_GET['category'])){ echo $_GET['category']; } ?> category</p> <?php } 
  if($loader->action() == 'default') { ?>
  <div class="heading">Please complete the form below </div>
  <form action="<?php echo $editFormAction; ?>" method="POST" name="CreateForm" id="CreateForm">
   <span id="sprycategory">
   <label for="category">category:</label>
   <input type="text" name="category" id="category">
   <span class="textfieldRequiredMsg">required!</span></span><br>
   <span id="spryacronym">
   <label for="acronym">acronym:</label>
   <input name="acronym" type="text" id="acronym" size="10">
</span><br>
<span id="spryisSubOf">
<label for="isSubOf">Group:</label>
<span class="dropdown">
<select name="isSubOf" id="isSubOf" class="dropdown-select">
  <option selected="selected" value="">Select</option>
  <option value="none">No Group</option>
  <?php
do {  
?>
  <option value="<?php echo $row_dataset['buid']?>"><?php echo $row_dataset['category']?></option>
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
<textarea name="details" id="details" cols="45" rows="5"></textarea>
</span><span class="buttons">
    <input name="createButton" type="submit" id="createButton" value="create">
    <input type="reset" name="clearButton" id="clearButton" value="clear">
    </span>
<input type="hidden" name="MM_insert" value="CreateForm">
  </form>
  <script type="text/javascript">
var sprycategory = new Spry.Widget.ValidationTextField("sprycategory", "none", {validateOn:["blur"]});
var spryacronym = new Spry.Widget.ValidationTextField("spryacronym", "none", {validateOn:["blur"], isRequired:false});
var spryisSubOf = new Spry.Widget.ValidationSelect("spryisSubOf");
var sprydetails = new Spry.Widget.ValidationTextarea("sprydetails", {isRequired:false, validateOn:["blur"]});
</script>
  <?php }?>
</div>


<?php
mysql_free_result($dataset);
?>
