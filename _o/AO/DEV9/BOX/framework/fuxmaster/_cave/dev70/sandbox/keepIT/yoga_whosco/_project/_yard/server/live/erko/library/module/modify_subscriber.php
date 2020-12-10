<?php
$loader = new Loader;  $loader->action();
require('Connections/dbcon.php');
include("dw/getsqlvaluestring.php");
$editFormAction = './'; #$_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "Modify")) {
  $updateSQL = sprintf("UPDATE subscription SET name=%s, email=%s, phone=%s WHERE buid=%s",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['buid'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($updateSQL, $dbcon) or die(mysql_error());
  $updateGoTo = "./?link=modify_subscriber-done&user=".$_POST['subscriberid'];
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_dataset = "-1";
if (isset($_REQUEST['user'])) {
  $colname_dataset = $_REQUEST['user'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_dataset = sprintf("SELECT * FROM subscription WHERE suid = %s OR email =%s OR ref =%s", GetSQLValueString($colname_dataset, "text"),GetSQLValueString($colname_dataset, "text"), GetSQLValueString($colname_dataset, "text"));
$dataset = mysql_query($query_dataset, $dbcon) or die(mysql_error());
$row_dataset = mysql_fetch_assoc($dataset);
$totalRows_dataset = mysql_num_rows($dataset);?>

<script src="assets/_spry/SpryValidationTextField.js" type="text/javascript"></script>
<link href="assets/_spry/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<?php if(!isset($_REQUEST['user'])) { #BEGIN show form ?>
<div class="vertView">
  <div class="heading">Please complete the form below </div>
  <form id="Opperation" name="Opperation" method="POST" action="<?php echo $editFormAction; ?>">
    <span id="spryuserinfo">
    <label for="user">Newsletter ID/Email</label>
    <input type="text" name="user" id="user" autofocus />
    <span class="textfieldRequiredMsg">required!</span></span> <span class="buttons">
    <input type="submit" name="send" id="send" value="Search">
    <input type="reset" name="ClearButton" id="ClearButton" value="Clean">
    <input name="action" type="hidden" id="action" value="process">
    </span>
  </form>
</div>
<script type="text/javascript">
var spryuserinfo = new Spry.Widget.ValidationTextField("spryuserinfo", "none", {validateOn:["blur"]});
</script>
<?php }  #END show form 
 if(isset($_REQUEST['user'])) { #Display Result 
 if ($totalRows_dataset == 0) {  //result is empty ?>
<div class="viewTabHr">
  <p class="warning">No record found!</p>
</div>
<?php } 
if ($totalRows_dataset > 0) { //result is not empty 
 if($loader->action() == 'default') { //show update form ?>
<div class="hrView">
<div class="heading">Please update the record and save</div>
  <form id="Modify" name="Modify" method="POST" action="<?php echo $editFormAction; ?>">
   
    <input name="buid" type="hidden" id="buid" value="<?php echo $row_dataset['buid']; ?>" />
    <input name="subscriberid" type="hidden" id="subscriberid" value="<?php echo $row_dataset['suid']; ?>" />
    <span id="spryname">
    <label for="name">name</label>
    <input name="name" type="text" id="name" value="<?php echo $row_dataset['name']; ?>" />
    <span class="textfieldRequiredMsg">required!</span></span><br>
    <span id="sprytemail">
    <label for="email">email address</label>
    <input name="email" type="text" id="email" value="<?php echo $row_dataset['email']; ?>">
    <span class="textfieldInvalidFormatMsg">check email</span></span><br>
    <span id="spryphone">
    <label for="phone">phone no</label>
    <input name="phone" type="text" id="phone" value="<?php echo $row_dataset['phone']; ?>">
    </span> <span class="buttons">
    <input name="save" type="submit" id="save" value="Save">
    <input type="reset" name="ClearButton" id="ClearButton" value="default">
    <input type="hidden" name="MM_update" value="Modify">
    </span>
  </form>
</div>
<script type="text/javascript">
    var spryname = new Spry.Widget.ValidationTextField("spryname", "none", {validateOn:["blur"]});
    var sprytemail = new Spry.Widget.ValidationTextField("sprytemail", "email", {validateOn:["blur"], isRequired:false});
    var spryphone = new Spry.Widget.ValidationTextField("spryphone", "none", {isRequired:false, validateOn:["blur"]});
  </script>
<?php }  //end show upate form
 if($loader->action() == 'done') { //show updated notification ?>
  <div class="hrView">
    <p class="success">The record for [<?php echo $row_dataset['ref'];?>] has been modified</p>
  </div>
  <?php } //end updated notification 
   } //end result is not empty
 }  //end result section 
 mysql_free_result($dataset); ?>